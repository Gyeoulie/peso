<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AnnouncementNotification extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $announcementData;
    public $residentName;

    public function __construct($residentName, $announcementData)
    {
        $this->announcementData = $announcementData;
        $this->residentName = $residentName;

    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Important Update from Your Local PESO Office',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.announcement_notification',
            with: [
                'residentName' => $this->residentName->fname . ' ' . $this->residentName->lname,
                'announcementTitle' => $this->announcementData->announcement_Title,
                'announcementUrl' => route('announcement.show', ['id' => $this->announcementData->announcement_id]),
                'PESO' => $this->announcementData->peso->municipality->municipality_Name,
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
