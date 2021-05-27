<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AlertComdAdmin extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $subject;
    public $numCmd;
    public $cltNom;
    public $cltTel;
    public $montant;
    public function __construct($subject,$cltNom,$cltTel,$montant,$numCmd)
    {
       $this->cltNom = $cltNom;
       $this->cltTel = $cltTel;
       $this->montant = $montant;
       $this->subject = $subject;
       $this->numCmd = $numCmd;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->subject)->markdown('emails.AlertComdAdmin');
    }
}
