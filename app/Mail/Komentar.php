<?php

namespace App\Mail;

use App\Models\Komentar as ModelsKomentar;
use App\Models\Pengaduan;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Crypt;

class Komentar extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(protected Pengaduan $pengaduan, protected ModelsKomentar $komentar)
    {
        //
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'WBS - KFTD | #'.$this->pengaduan->tiket,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $url = route('pengaduan.show', Crypt::encrypt($this->pengaduan->id));
        return new Content(
            markdown: 'mail.komentar',
            with: [
                'tiket' => $this->pengaduan->tiket,
                'url' => $url,
                'sender' => $this->komentar->user->name,
                'komentar' => $this->komentar->komentar,
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
