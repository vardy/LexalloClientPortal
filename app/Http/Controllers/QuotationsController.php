<?php

namespace App\Http\Controllers;

use App\Quotations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class QuotationsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the quotations for the currently
     * logged in user.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //TODO: Show user's quotations by calling from DB
        // Database holds IDs of all files in S3 along with user IDs,
        // file names, time-created, and all other attributes.
        // S3 only holds files with UUIDs.

        //NOTE: DUPLICATED IN LoginController.php
        $quotes = auth()->user()->quotations;

        return view('quotations.index', [
            'quotes' => $quotes
        ]);

        //TODO: Add Material Design loading bar when uploading and getting files
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $userId = auth()->id();

        return view('quotations.create', [
            'userId' => $userId
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //TODO: Do not allow form submission if file is too large or non-existent.
        // Validation^
        // Store to DB with user details and file details.

        $file = $request->file('uploadedFile');

        $quote = new Quotations();
        $quote->quotationTitle = $request->quoteLabel;
        $quote->user_id = auth()->id();
        $quote->save();

        $fileName = $quote->id . '.pdf';
        \Storage::disk('s3')->put($fileName, file_get_contents($file));

        return redirect('/quotations');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Quotations  $quotations
     * @return \Illuminate\Http\Response
     */
    public function show($fileName, Quotations $quotations)
    {
        //TODO: Display in browser instead of file download

        if (!$fileName || !Storage::exists($fileName . '.pdf')) {
            abort(404);
        }

        $fileName = $fileName . '.pdf';

        return response()->stream(function() use ($fileName) {
            $stream = Storage::readStream($fileName);
            fpassthru($stream);
            if (is_resource($stream)) {
                fclose($stream);
            }
        }, 200, [
            'Cache-Control'         => 'must-revalidate, post-check=0, pre-check=0',
            'Content-Type'          => Storage::mimeType($fileName),
            'Content-Length'        => Storage::size($fileName),
            //'Content-Disposition'   => 'attachment; filename="' . basename($fileName) . '"', //TODO: UPDATE FILENAME HERE??!?!@?!
            'Content-Disposition'   => 'attachment; filename="' . 'A FILE??' . '"',
            'Pragma'                => 'public',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Quotations  $quotations
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Quotations $quotations)
    {
        $quote = Quotations::findOrFail($id);

        return view('quotations.edit', [
            'quote' => $quote
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Quotations  $quotations
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request, Quotations $quotations)
    {
        $quote = Quotations::findOrFail($id);
        $quote->quotationTitle = $request->quotationTitle;
        $quote->save();

        return redirect('/quotations');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Quotations  $quotations
     * @return \Illuminate\Http\Response
     */
    public static function destroy($id, Request $request, Quotations $quotations)
    {

        Quotations::findOrFail($id)->delete();
        Storage::delete($id . '.pdf');

        return redirect('/quotations');
    }
}
