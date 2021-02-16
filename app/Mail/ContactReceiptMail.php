<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactReceiptMail extends Mailable
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
        $this->subject = $subject;
        $this->body_message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.contact.receipt')
                    ->text('emails.contact.receipt_plain');
    }
}
