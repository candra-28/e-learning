<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AddStudent extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $rand_password)
    {
        $this->user = $user;
        $this->rand_password = $rand_password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->view('view.name');
        $subject = '👋 Selamat datang di web E - Learning';
        return $this->view('back-learning.email.add-student')
            ->subject($subject)
            ->with(
                [
                    'user' => $this->user,
                    'rand_password'  => $this->rand_password
                ]
            );
    }
}
