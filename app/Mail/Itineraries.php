<?php

namespace App\Mail;

use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

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
        $pdf = PDF::loadView('emails.pdf')->setPaper('a4');
        return $this->attachData($pdf->output(), 'attractions.pdf')
            ->from('example@example.com')
            ->to('adwxsghu@gmail.com')
            ->markdown('emails.itineraries', ['map' => $this->map, 'user' => $this->user]);
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
