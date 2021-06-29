<?php

namespace App\Listeners;

use App\Events\EventOneCreated;
use App\Notifications\GoSendEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendMailEventOne implements ShouldQueue
{


    /**
     * Handle the event.
     *
     * @param  EventOneCreated  $event
     * @return void
     */
    public function handle($event)
    {
         $event->getEnrollment()->notify(new GoSendEmail);

    }
}
