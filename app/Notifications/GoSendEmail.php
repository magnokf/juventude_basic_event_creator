<?php

namespace App\Notifications;

use App\Models\EventOne;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class GoSendEmail extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {

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

        return (new MailMessage)
                    ->subject("Confirme sua Inscrição -". config('app.name'))
                    ->greeting("Olá ! $notifiable->name")
                    ->line('Você está a um passo para confirmar sua inscrição no evento do Dia 03/07/21 (Sábado) – Início com a Missa as 18:00 hs.
                    Basta clicar no botão de confirmação!!')
                    ->action('Confirmar sua Inscrição', route('confirmation_event', $notifiable->uuid))
                    ->line('Estaremos aguardando você lá!');
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

        ];
    }
}
