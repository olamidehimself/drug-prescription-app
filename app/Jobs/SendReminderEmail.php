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

    protected $unique_emails;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($unique_emails)
    {
        $this->unique_emails = $unique_emails;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->unique_emails)->send(new EmailReminder());
    }
}
