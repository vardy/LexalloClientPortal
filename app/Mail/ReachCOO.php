<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

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
        $current_date_time = date('d/m/Y H:i:s', time());
        $user_name = $this->user->name;

        return $this->markdown('mail.reach_coo')
                    ->from(config('mail.from.address'))
                    ->subject('Reach: ' . $user_name . ' | ' . $current_date_time . ' | ' . $message_preview . '...')
                    ->with([
                        'user' => $this->user,
                        'reach_coo_submission' => $this->request
                    ]);
    }
}
