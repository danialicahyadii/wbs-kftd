<?php

namespace App\Mail;

use App\Models\Pengaduan;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Crypt;

class Status extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(protected Pengaduan $pengaduan, $keterangan)
    {
        $this->keterangan = $keterangan;
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
        $pengaduan = $this->pengaduan->statusPengaduan;
        $keterangan = $this->keterangan;
        return new Content(
            markdown: 'mail.status',
            with: [
                'tiket' => $this->pengaduan->tiket,
                'url' => $url,
                'keterangan' => $keterangan,
                'status' => $pengaduan->nama
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
