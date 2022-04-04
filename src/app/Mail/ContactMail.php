<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    private $name;
    private $mail;
    private $number;
    private $comment;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($contact_data)
    {
        $this->name = $contact_data['name'];
        $this->mail = $contact_data['mail'];
        $this->number = $contact_data['number'];
        $this->comment = $contact_data['comment'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from('example@gmail.com')
            ->subject('自動送信メール')
            ->view('contact.mail')
            ->with([
                'name' => $this->name,
                'mail' => $this->mail,
                'number' => $this->number,
                'comment' => $this->comment,
            ]);
    }
}
