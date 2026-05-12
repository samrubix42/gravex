<?php

declare(strict_types=1);

namespace App\Mail;

use App\Models\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactSubmissionMail extends Mailable
{
    use Queueable;
    use SerializesModels;

    public function __construct(public Contact $contact)
    {
    }

    public function build(): self
    {
        return $this->subject('New Contact Submission')
            ->view('emails.contact-submission');
    }
}
