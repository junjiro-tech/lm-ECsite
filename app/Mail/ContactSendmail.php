<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactSendmail extends Mailable
{
    use Queueable, SerializesModels;
    
    private $name;
    private $email;
    private $body;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($contact_data)
    {
        $this->name = $contact_data['name'];
        $this->email = $contact_data['email'];
        $this->body = $contact_data['body'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
        ->from('junjiro.tech@gmail.com')
        ->subject('自動送信メール')    //subject=件名
        ->view('contacts.mail')
        ->with([
            'name' => $this->name,
            'email' => $this->email,
            'body' => $this->body
            ]);
    }
}
