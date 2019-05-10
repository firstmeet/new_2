<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmail extends Mailable
{
    use Queueable, SerializesModels;
     public $cont;
     public $subject;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($cont,$subject)
    {
        //
        $this->cont=$cont;
        $this->subject=$subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->subject)->view('email.index')->with(['cont'=>$this->cont]);
    }
}
