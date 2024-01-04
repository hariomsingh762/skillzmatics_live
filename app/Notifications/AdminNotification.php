<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Mail\Mailable;
use App\Models\ProdcutInquiry;

class AdminNotification extends Mailable
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $inquiry;
    public function __construct(array $inquiry)
    {
        $this->inquiry = $inquiry;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    // public function toMail($notifiable)
    // {
    //     return (new MailMessage)
    //         ->subject('New Inquiry Submitted')
    //         ->line('A new inquiry has been submitted.')
    //         ->line('Name: ' . $this->inquiry['first_name'] . ' ' . $this->inquiry['last_name'])
    //         ->line('Email: ' . $this->inquiry['email'])
    //         ->line('Company Name: ' . $this->inquiry['company_name'])
    //         ->line('Phone: ' . $this->inquiry['phone'])
    //         ->line('City: ' . $this->inquiry['city'])
    //         ->line('State: ' . $this->inquiry['state'])
    //         ->line('Hear From: ' . $this->inquiry['hear_about_us'])
    //         ->line('Message: ' . $this->inquiry['message'])
    //         ->action('View Inquiry', url('/inquiries/' . $this->inquiry['id']))
    //         ->line('Thank you for using our application!');
    // }

    public function build()
    {
        return $this->subject('New Inquiry Submitted')
            ->view('backend.admin.product-inquiry.admin_notification')
            ->with('inquiry', $this->inquiry);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    
}
