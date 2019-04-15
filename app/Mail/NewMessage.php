<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewMessage extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $consult;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $email, $consult) 
    {
        $this->name = $name;
        $this->email = $email;
        $this->consult = $consult;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.new-message')
            ->subject('Un cliente ha realizado una nueva consulta!');
    }
}
