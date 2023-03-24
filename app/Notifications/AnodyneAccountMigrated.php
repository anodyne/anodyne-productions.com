<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AnodyneAccountMigrated extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(
        protected User $user,
        protected string $password
    ) {
        //
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
        return (new MailMessage())
            ->greeting('Greetings from Anodyne Productions!')
            ->line("We've been hard at work on a brand-new website and management system. As a result of these changes, the account associated with this email address has been migrated to the new system. For security reasons, we've generated a new password for you.")
            ->line('New password: '.$this->password)
            ->action('Log in', url('/login'))
            ->line('You can use the password reset feature to change your password to something of your own choosing.');
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
