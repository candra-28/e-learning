<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendFeedback extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($emailFeedback)
    {
        $this->emailFeedback = $emailFeedback;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $emailFeedback = $this->emailFeedback;

        $data = compact('emailFeedback');
        return $this->subject('Feedback Web Ahmad Suherman')->view('email.feedback', $data);
    }
}
