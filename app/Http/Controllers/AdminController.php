<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        auth()->user()->authorizeRoles('admin');

        return view('admin.control');
    }
}