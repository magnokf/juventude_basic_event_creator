<?php

namespace App\Notifications;

use App\Models\EventOne;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;


class GoSendEmail extends Notification
{

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

        return (new  MailMessage)

                    ->subject("Confirme sua Inscrição -". config('app.name'))
                    ->greeting("Olá ! $notifiable->name")
                    ->line('Você está a um passo para confirmar sua inscrição no evento do Dia 30/07/2022 (Sábado) – Início as 18:00 hs.
                    Basta clicar no botão de confirmação!!')
                    ->action('Confirmar sua Inscrição', route('confirmation_event', $notifiable->uuid))
                    ->line('Estaremos aguardando você lá!')
                    ->line('Local: Paróquia Nossa Senhora da Glória');
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
