<?php

namespace App\Http\Controllers;

use App\Mail\RequestQuotation;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    function send_quote_request($user_id, Request $request) {

        $user = User::findOrFail($user_id);

        Mail::to(env('QUOTE_REQUEST_EMAIL'))->send(
            new RequestQuotation($user, $request)
        );

        return redirect(route('quotations'))->with([
            'success-message' => 'Thanks for submitting a quotation request, you will get a response over email!'
        ]);
    }
}
