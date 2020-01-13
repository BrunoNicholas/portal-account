<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ShopCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $shop;
    public $type;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($shop)
    {
        $this->shop = $shop;
        $this->type = 'all';
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.shop-created');
    }
}
