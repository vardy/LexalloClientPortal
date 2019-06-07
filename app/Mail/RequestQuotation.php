<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RequestQuotation extends Mailable
{
    use Queueable, SerializesModels;

    protected $user;
    protected $request;

    /**
     * Create a new message instance.
     *
     * @param User $user
     * @param Request $request
     */
    public function __construct(User $user, Request $request) {

        $this->user = $user;
        $this->request = $request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build() {

        $current_date_time = date('d/m/Y H:i:s', time());

        return $this->markdown('mail.request_quotation')
                    ->from(env('MAIL_USERNAME'))
                    ->subject('Quotation Request: ' . $this->user->company . ' | ' . $current_date_time)
                    ->with([
                        'user' => $this->user,
                        'quote_request_submission' => $this->request
                    ]);
    }
}
