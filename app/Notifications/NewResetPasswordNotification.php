<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewResetPasswordNotification extends Notification
{
    use Queueable;

    public $token;
    /**
     * Create a new notification instance.
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->priority("1")
                    ->from("noreply@zambongroup.com", "Zach System IT")
                    ->greeting('Bonjour,')
                    ->subject('Changement de mot de passe')
                    ->line('Vous recevez cet e-mail car vous avez demandé une réinitialisation de votre mot de passe sur notre plateforme. Pour continuer le processus de réinitialisation, veuillez cliquer sur le lien ci-dessous :')
                    ->action('Réinitialiser votre mot de passe', url('reset-password/'.$this->token))
                    ->line("Si vous n'avez pas demandé de réinitialisation de mot de passe, veuillez ignorer cet e-mail. Votre mot de passe restera inchangé.")
                    ->line('Cette demande de réinitialisation expire dans 60 minutes, alors assurez-vous de suivre le lien dès que possible.')
                    ->line('Merci,')
                    ->salutation("L'équipe IT, Zach System");
    }
    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [

        ];
    }
}
