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
        return view('quotations.index', [
            'quotes' => auth()->user()->quotations
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
        return view('quotations.create');
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

        request()->validate([
            'quoteLabel' => 'required',
            'uploadedFile' => 'required',
            'uploadedFile' => 'max:49000'
        ]);

        $file = $request->file('uploadedFile');
        $fileName = $file->getClientOriginalName();

        // Setup quote object to commit to database.
        $quote = new Quotations();
        $quote->quotationLabel = $request->quoteLabel;
        $quote->user_id = auth()->id();
        $quote->originalFilename = $fileName;
        $quote->originalFileExtension = $file->getClientOriginalExtension();
        $quote->originalFileMime = $file->getClientMimeType();
        $quote->save(); // Commit

        $filePathToStore = '/clientportal/' . $quote->id;

        // Commit object to s3 with file path and contents of file (key:object)
        \Storage::disk('s3')->put($filePathToStore, file_get_contents($file));

        return redirect('/quotations');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Quotations  $quotations
     * @return \Illuminate\Http\Response
     */
    public function show($quoteID, Quotations $quotations)
    {
        //TODO: Display in browser instead of file download

        $filePathExpected = '/clientportal/' . $quoteID;

        if (!$quoteID || !Storage::exists($filePathExpected)) {
            abort(404);
        }

        return response()->stream(function() use ($filePathExpected) {
            $stream = Storage::readStream($filePathExpected);
            fpassthru($stream);
            if (is_resource($stream)) {
                fclose($stream);
            }
        }, 200, [
            'Cache-Control'         => 'must-revalidate, post-check=0, pre-check=0',
            'Content-Type'          => Storage::mimeType($filePathExpected),
            'Content-Length'        => Storage::size($filePathExpected),
            'Content-Disposition'   => 'attachment; filename="' . Quotations::findOrFail($quoteID)->originalFilename . '"',
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
        return view('quotations.edit', [
            'quote' => Quotations::findOrFail($id)
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
        request()->validate([
            'quoteLabel' => 'required',
        ]);

        $quote = Quotations::findOrFail($id);
        $quote->quotationLabel = $request->quotationLabel;
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

        $s3FilePath = '/clientportal/' . $id;
        Storage::delete($s3FilePath);

        return redirect('/quotations');
    }
}
