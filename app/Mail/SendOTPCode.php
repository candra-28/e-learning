<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendOTPCode extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function build()
    {
        $subject = 'Akun Verifikasi';
        return $this->view('front-learning.email.account-verified')
            ->subject($subject)
            ->with(
                [
                    'user' => $this->user
                ]
            );
    }
}
