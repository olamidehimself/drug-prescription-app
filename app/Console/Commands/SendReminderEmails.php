<?php

namespace App\Console\Commands;

use App\Prescription;
use App\Jobs\SendReminderEmail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Queue;

class SendReminderEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reminder:emails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email reminders to patients to use their drugs';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $incompletePrescriptions = Prescription::with('patient.user')->where('completed', 0)->orderBy('patient_id')->get();

        // dd($incompletePrescriptions->toArray());
        
        foreach ($incompletePrescriptions as $incomplete) {
            $data[] = $incomplete->patient->user->toArray();
            $prescriptions[] = $incomplete->toArray();
        }
        $data_emails = array_column($data, 'email');
        $unique_emails = array_unique($data_emails);
        
        // dd(...$unique_emails);
        Queue::push(new SendReminderEmail(...$unique_emails));
        
    }
}
