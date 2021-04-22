<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMailMessage extends Mailable
{
    use Queueable, SerializesModels;
    protected $poruka;


    public function __construct($poruka)
    {
        $this->poruka = $poruka;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      $email = session()->get('user')->email;
      return $this->from($email)->subject('Message from BusinessBlog')->view('components.mail.mail')->with('data', $this->poruka);

    }
}
