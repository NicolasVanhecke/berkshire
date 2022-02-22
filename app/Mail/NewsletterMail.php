<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewsletterMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $request;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( $formMessage )
    {
        $this->formMessage = $formMessage;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $formMsg = [
            'name' => $this->formMessage['name'],
            'email' => $this->formMessage['email'],
            'phone' => $this->formMessage['phone'],
            'question' => $this->formMessage['question']
        ];

        return $this->view( 'emails.newsletter' )
                    ->with( 'formMsg', $formMsg );
    }
}
