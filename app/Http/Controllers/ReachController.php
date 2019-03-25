<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\ReachMessage;

class ReachController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        return view('reach');
    }

    /*
    $reachStorageDirectory = '/reach/';
    \Storage::disk('local')->put($reachStorageDirectory . 'kappa.txt', 'Some text.');
    */

    public function store(Request $request) {

        // Validate request contains a message to save
        request()->validate([
            'reachMessageContent' => 'required'
        ]);

        // Save message to database entry
        $reach = new ReachMessage();
        $reach->user_id = auth()->user()->id;
        $reach->save();

        // Location to store message
        $reachStorageDirectory = '/reach/';
        $fileStoragePath = $reachStorageDirectory . $reach->id;

        // Content of message
        $reachContent = $request->reachMessageContent;

        // Store message
        \Storage::disk('local')->put($fileStoragePath, $reachContent);
    }
}
