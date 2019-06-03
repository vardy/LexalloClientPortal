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
        return $this->markdown('mail.request_quotation')
                    ->with([
                        'user' => $this->user,
                        'quote_request_submission' => $this->request
                    ]);
    }
}
