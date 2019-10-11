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
    public function __construct($inputs3)
    {
        $this->name = $inputs3['name'];
        $this->email = $inputs3['email'];
        $this->body = $inputs3['body'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
        ->from('tksmjf@gmail.com')
        ->subject('自動送信メール')    //subject=件名
        ->view('contacts.mail')
        ->with([
            'name' => $this->name,
            'email' => $this->email,
            'body' => $this->body
            ]);
    }
}
