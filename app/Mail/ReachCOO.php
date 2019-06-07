<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ReachCOO extends Mailable
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

        $message_preview = substr($this->request->message, 0, 9);

        return $this->markdown('mail.reach_coo')
                    ->from(env('MAIL_USERNAME'))
                    ->subject('Reach: ' . $this->user->name . ' | ' . $message_preview . '...')
                    ->with([
                        'user' => $this->user,
                        'reach_coo_submission' => $this->request
                    ]);
    }
}
