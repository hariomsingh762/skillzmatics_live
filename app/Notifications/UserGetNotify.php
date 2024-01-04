<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Mail\Mailable;
use App\Models\ProdcutInquiry;

class UserGetNotify extends Notification
{
    use Queueable;

    public $userData;
    public $companyData;

    public function __construct(array $userData, array $companyData)
    {
        $this->userData = $userData;
        $this->companyData = $companyData;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Your Account Has Been Created By Company')
            ->markdown('company.user-get-notify.user_get_notify', [
                'userData' => $this->userData,
                'companyData' => $this->companyData,
            ]);
    }
}


