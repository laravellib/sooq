<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Protocol;

class AdRefused extends Notification
{
    use Queueable;

    private $ad_id = '';

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($ad)
    {
        $this->ad_id = $ad;
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
    public function toMail($notifiable)
    {
        $url     = Protocol::home().'/vi/'.$this->ad_id;
        $contact = Protocol::home().'/contact';

        return (new MailMessage)
                    ->subject('You Recent Ad Has Been Refused!')
                    ->greeting('Hello Dear!')
                    ->line('You recent ad has been refused.')
                    ->action('View AD', $url)
                    ->line('For more informations please contact us.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}