<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class SendFormMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $email;

    protected $image;

    protected $generated_image;


    /**
     * Create a new message instance.
     */
    public function __construct($email, $image, $generated_image)
    {
        $this->email = $email;

        $this->image = $image;

        $this->generated_image = $generated_image;

    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'String Art',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.send-form',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [Storage::disk('local')->path($this->image), Storage::disk('local')->path($this->generated_image)];
    }

    public function build()
    {
        // $mail = $this->with([
        //     'result' => $this->email,
        // ])->to(env('B_EMAIL_FOR_PHOTO'));

        $mail = $this->with([
            'result' => $this->email,
        ])->to('naromisho87@gmail.com');

        return $mail;

    }

}
