<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SalonCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $salon;
    public $type;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($salon)
    {
        $this->salon = $salon;
        $this->type  = 'all';
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.salon-created');
    }
}
