<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailer;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
     protected $email,$cont;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($email,$cont)
    {
        //
        $this->email=$email;
        $this->cont=$cont;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mailer::send('email.index',['cont'=>$this->cont],function($message){
            $message->to($this->email);
        });
    }
}
