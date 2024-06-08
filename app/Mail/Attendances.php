<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Attendances extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $tanggal;
    /**
     * Create a new message instance.
     *
     * @return void
     */

    public function __construct($nama, $tanggal)
    {
        $this->$nama = $nama;
        $this->$tanggal = $tanggal;
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
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content($nama, $tanggal)
    {
        return view('attendance', compact($nama, $tanggal));
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