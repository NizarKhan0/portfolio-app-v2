<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;

class ContactNotification extends Mailable
{
    public function __construct(
        public string $senderEmail,
        public ?string $senderName,
        public string $senderMessage,
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Portfolio Message from ' . ($this->senderName ?: $this->senderEmail),
            replyTo: $this->senderEmail,
        );
    }

    public function content(): Content
    {
        return new Content(
            html: 'emails.contact-notification',
        );
    }
}
