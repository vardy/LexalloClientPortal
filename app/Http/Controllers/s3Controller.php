<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class s3Controller extends Controller
{
    public function index() {
        auth()->user()->authorizeRoles('admin');

        dd(Storage::disk('s3')->allFiles());
    }
}