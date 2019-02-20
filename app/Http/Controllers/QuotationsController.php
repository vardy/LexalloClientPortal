<?php

namespace App\Http\Controllers;

use App\Quotations;
use Illuminate\Http\Request;

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
        //TODO: Store user ID with files
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
        $imageFileName = time() . '_' . $request->quoteLabel;
        $imageFilePath = '/clientportal/' . $imageFileName;

        \Storage::disk('s3')->put($imageFilePath, file_get_contents($file));

        return redirect('/quotations');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Quotations  $quotations
     * @return \Illuminate\Http\Response
     */
    public function show(Quotations $quotations)
    {
        //TODO: GET::resource
        // gets PDF file from server as $url and serves in browser.
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Quotations  $quotations
     * @return \Illuminate\Http\Response
     */
    public function edit(Quotations $quotations)
    {
        //TODO: Form with file upload
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Quotations  $quotations
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quotations $quotations)
    {
        //TODO: Swap file?
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Quotations  $quotations
     * @return \Illuminate\Http\Response
     */
    public static function destroy(Quotations $quotations)
    {
        //TODO: Delete from database as well as s3 filesystem.
    }
}
