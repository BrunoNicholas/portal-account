<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Salon;

class StyleCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $style;
    public $type;
    public $salon;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($style)
    {
        $this->style    = $style;
        $this->type     =  'all';
        $this->salon    = Salon::where('id',$style->salon_id)->first();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.style-created');
    }
}
