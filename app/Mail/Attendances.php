<?php

namespace App\Mail;

use Faker\Provider\ar_EG\Address;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Attendances extends Mailable
{
    use Queueable, SerializesModels;

    public $nama;
    /**
     * Create a new message instance.
     *
     * @return void
     */

    public function __construct($nama)
    {
        $this->$nama = $nama;
    }
    /**
     * Build the message.
     *
     * @return $this
     */

    public function build()
    {
        return $this->view('attendance')->with([
            'name' => $this->nama,
        ]);
    }
    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Attendances',
        );
    }

    /**
     * Get the message content definition.

     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'attendance'
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
