<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\ReachMessage;
use App\User;

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

    public function thankyou() {
        return view('thankyou');
    }

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

        return redirect('/reach/thankyou');
    }

    public function view($reachId) {
        $message = ReachMessage::findOrFail($reachId);
        $user = User::findOrFail($message->user_id);

        $messageContent = \Storage::disk('local')->get('/reach/' . $message->id);

        return view('admin.reach_view', [
            'messageContent' => $messageContent,
            'user' => $user
        ]);
    }

    public function destroy($reachId) {
        ReachMessage::findOrFail($reachId)->delete();
        $pathToMessageFile = '/reach/' . $reachId;
        \Storage::disk('local')->delete($pathToMessageFile);

        return redirect('/admin');
    }
}
