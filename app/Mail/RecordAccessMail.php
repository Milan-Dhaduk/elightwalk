<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Record;

class RecordAccessMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $url;
    public $password;

    public function __construct($url, $password)
    {
        $this->url = $url;
        $this->password = $password;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Record Access Mail',
        );
    }


    public function build()
    {
        return $this->subject('Your Record Access Details')
                    ->view('emails.record_access')
                    ->with([
                        'url' => $this->url,
                        'password' => $this->password,
                    ]);
    }
}
