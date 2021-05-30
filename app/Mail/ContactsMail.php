<?php

namespace App\Mail;

use App\Http\Requests\ContactsRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactsMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $senderData;
    public $subject = "Новая заявка";

    /**
     * Create a new message instance.
     *
     * @param ContactsRequest $senderData
     */
    public function __construct(ContactsRequest $senderData)
    {
        $this->senderData = $senderData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->view('mail.contacts')
            ->with([
                'senderData' => $this->senderData
            ]);
    }
}
