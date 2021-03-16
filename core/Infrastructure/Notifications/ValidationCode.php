<?php

namespace Acme\Infrastructure\Notifications;

use Acme\Infrastructure\Eloquent\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ValidationCode extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(public User $user, public string $code)
    {
    }

    public function via(): array
    {
        return ['mail'];
    }

    public function toMail(): MailMessage
    {
        return (new MailMessage)
            ->view('mails.send_code_verification', [
                'user' => $this->user,
                'code' => $this->code,
            ]);
    }
}
