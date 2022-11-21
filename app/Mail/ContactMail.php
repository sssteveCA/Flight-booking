<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Interfaces\Paths as P;
use Illuminate\Support\Facades\Log;

use function Psy\debug;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public array $mailData;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $mailData)
    {
        $this->mailData = $mailData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view(P::VIEW_EMAIL_CONTACTS)
            ->with([
                'title' => 'Richiesta di assistenza',
                'body' => $this->mailData['message']
            ])
            ->subject($this->mailData['subject'])
            ->from($this->mailData['email'],$this->mailData['name']);
    }
}
