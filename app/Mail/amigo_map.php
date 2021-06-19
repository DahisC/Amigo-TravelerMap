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
        $user =$this->user_to;
        $pdf =  $pdf = PDF::loadView('emails.users.test',['user'=>$user])->setOptions(['defaultFont' => 'sans-serif'])->setPaper('a4');

        return $this
            ->to($this->user_to->email)
            ->from('example@example.com')
            ->attachData($pdf->output(), 'schedule.pdf')
            ->view('emails.users.show',compact('user'));
    }
}
