<?php

namespace NewsGame\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class BienvenidaMail extends Mailable
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
    public function build()
    {
        $from = "bienvenido@NewsGame.com";
        $name = "Juan";
        $subject = "bienvenido a la familia";
        return $this->view('email.welcome')->from($from,$name)->subject($subject);
    }
}
