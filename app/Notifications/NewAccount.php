<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewAccount extends Notification {

    use Queueable;


    public function __construct($user) {

        $this->user = $user;
    }


    public function via($notifiable) {

        return ['mail'];
    }


    public function toMail($notifiable) {

        return (new MailMessage)
                    ->line('Your Red Cedar Court HOA account has been created.  Click here to confirm your account and set your password.')
                    ->action('Set Your Password', url("/set-password"))
                    ->line('Thank you for using our new web application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable) {

        return [
            //
        ];
    }
}
