<?php

namespace App\Http\Controllers;

use App\Mail\ReachCOO;
use App\Mail\RequestQuotation;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    function send_quote_request($user_id, Request $request) {

        request()->validate([
            'source_language' => ['required'],
            'target_language' => ['required'],
            'other_comments' => ['required'],
            'delivery_date' => ['required']
        ]);

        $user = User::findOrFail($user_id);

        $mailUser = DB::table('users')->where('name', 'MAIL_QUOTES')->first();
        Mail::to($mailUser)->send(
            new RequestQuotation($user, $request)
        );

        return redirect(route('quotations'))->with([
            'success-message' => 'Thanks for submitting a quotation request, you will get a response over email!'
        ]);
    }

    function send_reach_coo($user_id, Request $request) {

        request()->validate([
            'message' => ['required']
        ]);

        $user = User::findOrFail($user_id);

        $mailUser = DB::table('users')->where('name', 'MAIL_COO')->first();
        Mail::to($mailUser)->send(
            new ReachCOO($user, $request)
        );

        return redirect(route('reach'))->with([
            'success-message' => 'Thanks for reaching out to us! You\'ll get a response over email shortly.'
        ]);
    }
}
