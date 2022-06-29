<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetPassword extends Mailable
{
    use Queueable, SerializesModels;
    public $token;
    public $email;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($token, $email)
    {
        //
        return $this->token = $token;
        return $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->view('dashboard.mail.reset-password')->with([
            'email'=>$this->email,
            'token'=>$this->token
        ]);
    }
}
