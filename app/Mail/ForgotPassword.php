<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ForgotPassword extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(Request $request)
    {
        $subject = 'Setel Ulang Kata Sandi';
        $users = User::where('usr_email', $request->usr_email)->first();
        // dd($users->usr_id);
        $resetPassword = DB::table('password_resets')->where('pwr_email', $request->usr_email)->first();
        return $this->view('front-learning.email.forgot-password', compact('resetPassword', 'users'))->subject($subject);
    }
}
