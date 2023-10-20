<?php

namespace App\Mail;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class SendCertificate extends Mailable
{
    use Queueable, SerializesModels;

    public $certificate;

    /**
     * Create a new message instance.
     */
    public function __construct($certificate)
    {
        $this->certificate = $certificate;
    }

    public function build()
    {
        $certificate = $this->certificate;
        $certificateId = $certificate->id;
        $pdfPath = storage_path('app/public/sertifikat/' . $certificateId . '.pdf');
        return $this->view('emails.kelulusan')
            ->attach($pdfPath, [
                'as' => "Sertifikat-{$certificate->category->name}",
                'mime' => 'application/pdf',
            ]);
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Pengiriman Sertifikat HummaTech'
        );
    }

    /**
     * Digunakan untuk megenerate otomatis yang dari view menjadi pdf dan di lampirkan saat mengirim pdf
     */

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.kelulusan',
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
