<?php

namespace App\Http\Controllers;

use App\Quotations;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {

        if(auth()->user()) {
            auth()->user()->authorizeRoles('admin');
        } else {
            return redirect('/login');
        }

        return view('admin.control', [
            'users' => User::all()
        ]);
    }
}