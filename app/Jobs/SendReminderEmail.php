<?php

namespace App\Jobs;

use App\Mail\EmailReminder;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendReminderEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $mails;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($mails)
    {
        $this->mails = $mails;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->mails)->send(new EmailReminder());
    }
}
