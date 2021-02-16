<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $email;
    public $first_name;
    public $last_name;
    public $subject;
    public $body_message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email, $first_name, $last_name, $subject, $message)
    {
        $this->email = $email;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->subject = 'Avalanche Calculator: ' . $subject;
        $this->body_message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->email, implode(' ', [$this->first_name, $this->last_name]))
                    ->view('emails.contact.contact')
                    ->text('emails.contact.contact_plain');
    }
}
