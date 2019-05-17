<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendPdfMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
     public $zip_dest;
     public $cont;
     public $title;
    public function __construct($cont,$title,$zip_dest)
    {
        $this->zip_dest=$zip_dest;
        $this->cont=$cont;
        $this->title=$title;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.pdf')->subject($this->title)->attach($this->zip_dest);
    }
}
