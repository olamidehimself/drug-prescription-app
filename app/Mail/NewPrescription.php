<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewPrescription extends Mailable
{
    use Queueable, SerializesModels;

    public $patient;
    public $prescription;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($patient, $prescription)
    {
        $this->patient = $patient;
        $this->prescription = $prescription;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.new_prescription')->with(['patients' => $this->patient, 'prescription' => $this->prescription]);
    }
}
