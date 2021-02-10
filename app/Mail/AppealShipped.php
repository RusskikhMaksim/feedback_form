<?php

namespace App\Mail;

use App\Models\UserAppeal;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AppealShipped extends Mailable
{
    use Queueable, SerializesModels;

    private UserAppeal $appeal;

    /**
     * Create a new message instance.
     *
     * @param UserAppeal $appeal
     */
    public function __construct(UserAppeal $appeal)
    {
        $this->appeal = $appeal;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('feedbackform@example.com', 'Mailtrap')
                    ->subject('Notification')
                    ->view('emails.notify')
                    ->with(['client_name' => $this->appeal->client_name]);
    }
}
