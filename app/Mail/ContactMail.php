<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use SerializesModels;

    public $contactData;

    /**
     * Create a new message instance.
     *
     * @param $contactData
     */
    public function __construct($contactData)
    {
        $this->contactData = $contactData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Contact Us Message')
        ->view('emails.contact')  // Assuming you have an 'emails.contact' view
        ->with('contactData', $this->contactData);
    }
}
