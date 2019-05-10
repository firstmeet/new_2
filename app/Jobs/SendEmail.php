<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
     protected $email,$info;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($email,$email_cont)
    {
        //
        $this->email=$email;
        $this->info=$email_cont;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::send('email.index',['cont'=>$this->info->body],function($message){
            Log::info("mail_info",$this->info->toArray());
            $message->subject($this->info->title);
            $message->to($this->email);
        });
    }
}
