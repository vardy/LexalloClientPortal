<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        if(auth()->user()) {
            return view('landing');
        } else {
            return view('home');
        }
    }

    public function landing() {
        if(auth()->user()) {
            return view('landing');
        } else {
            return view('home');
        }
    }
}
