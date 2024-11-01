<?php

namespace App\Mail;

use App\Models\Pengaduan as ModelsPengaduan;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Crypt;

class Laporan extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(protected ModelsPengaduan $pengaduan)
    {
        //
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'WBS - KFTD | Tiket Pengaduanmu',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $url = route('pengaduan.show', Crypt::encrypt($this->pengaduan->id));
        return new Content(
            markdown: 'emails.laporan',
            with: [
                'tiket' => $this->pengaduan->tiket,
                'url' => $url
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
