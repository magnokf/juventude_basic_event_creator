<?php

namespace App\Listeners;

use App\Events\EventOneCreated;
use App\Notifications\GoSendEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendMailEventOne
{


    /**
     * Handle the event.
     *
     * @param  EventOneCreated  $event
     * @return void
     */
    public function handle($event)
    {

        $event->enrollment->notify(new GoSendEmail($event->enrollment));

    }
}
