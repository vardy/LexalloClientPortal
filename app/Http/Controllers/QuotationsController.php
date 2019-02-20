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
        //dd(\Storage::disk('s3')->allFiles());

        //NOTE: DUPLICATED IN LoginController.php
        $quotes = auth()->user()->quotations;

        return view('quotations.index', [
            'quotes' => $quotes
        ]);
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

        $file = $request->file('uploadedFile');
        $imageFileName = time() . '_' . $request->quoteLabel;
        $imageFilePath = '/clientportal/' . $imageFileName;

        \Storage::disk('s3')->put($imageFilePath, file_get_contents($file));

        return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Quotations  $quotations
     * @return \Illuminate\Http\Response
     */
    public function show(Quotations $quotations)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Quotations  $quotations
     * @return \Illuminate\Http\Response
     */
    public function edit(Quotations $quotations)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Quotations  $quotations
     * @return \Illuminate\Http\Response
     */
    public static function destroy(Quotations $quotations)
    {
        //
    }
}
