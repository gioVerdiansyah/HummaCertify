<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendCertificate extends Mailable
{
    use Queueable, SerializesModels;

    public $certificate, $type, $bidang, $sub_bidang = null;

    /**
     * Create a new message instance.
     */
    public function __construct($certificate, $type)
    {
        $this->certificate = $certificate;
        $this->type = ucfirst($type);

        if ($this->type == config('hummacertify.tata_letak')[0]) {
            $this->bidang = "Magang";
        } else if ($this->type == config('hummacertify.tata_letak')[1]) {
            $this->bidang = config('hummacertify.tata_letak')[1] . ' ' . $this->certificate->bidang;
            if (isset($this->certificate->sub_bidang)) {
                $this->sub_bidang = $this->certificate->sub_bidang;
            }
        } else {
            $this->bidang = config('hummacertify.tata_letak')[2] . ' ' . $this->certificate->bidang;
            if (isset($this->certificate->sub_bidang)) {
                $this->sub_bidang = $this->certificate->sub_bidang;
            }
        }
    }

    public function build()
    {
        $certificate = $this->certificate;
        $certificateId = $certificate->id;
        $pdfPath = storage_path('app/public/sertifikat/' . $certificateId . '.pdf');
        return $this->view('emails.kelulusan')
            ->attach($pdfPath, [
                'as' => "Sertifikat-{$this->type}-HummaTech",
                'mime' => 'application/pdf',
            ]);
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: "Sertifikat {$this->type} HummaTech"
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
        $type = strtolower($this->type);
        return new Content(
            view: 'emails.certificate',
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
