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
        return $this->from('example@example.com')->to('dahischeng@gmail.com')->markdown('emails.itineraries', ['map' => $this->map, 'user' => $this->user]);
    }
}

// $user_attractions = $this->user_to->attractions;
// //->setOptions(['defaultFont' => 'sans-serif'])
// $attractions = $this->user_to->attractions;
// // dd($attractions);
// $pdf = PDF::loadView('emails.PDF', ['attractions' => $user_attractions])->setPaper('a4');

// return $this
//     ->to($this->user_to->email)
//     ->attachData($pdf->output(), 'attractions.pdf')
//     ->view('emails.show',['attractions'=>$attractions]);
