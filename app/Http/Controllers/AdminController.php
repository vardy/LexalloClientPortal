<?php

namespace App\Http\Controllers;

use App\Quotations;
use App\ReachMessage;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {

        if(auth()->user()) {
            auth()->user()->authorizeRoles(['admin','pm']);
        } else {
            return redirect('/login');
        }

        return view('admin.control', [
            'userObj' => User::class,
            'users' => User::all()->reverse(),
            'messages' => ReachMessage::all()->reverse()
        ]);
    }
}