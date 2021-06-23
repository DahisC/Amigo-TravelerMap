<?php

namespace App\Mail;

use App\User;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class amigo_map extends Mailable
{
    use Queueable, SerializesModels;

    public  $user_to;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user_to = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $user_attractions =$this->user_to->attractions;
        //->setOptions(['defaultFont' => 'sans-serif'])
        $attractions = $this->user_to->attractions;
        // dd($attractions);
        $pdf = PDF::loadView('emails.PDF',['attractions'=>$user_attractions])->setPaper('a4');

        return $this
            ->to($this->user_to->email)
            ->attachData($pdf->output(), 'attractions.pdf')
            ->view('emails.show',['attractions'=>$attractions]);
    }
}
