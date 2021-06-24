<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Itineraries extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $map;
    public $user;

    public function __construct($map, $user)
    {
        $this->map = $map;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('example@example.com')->to('dahischeng@gmail.com')->markdown('emails.Itineraries', ['map' => $this->map, 'user' => $this->user]);
    }
}
