<?php

namespace App\Listeners;

use App\Events\EventOneCreated;
use App\Notifications\GoSendEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendMailEventOne
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  EventOneCreated  $event
     * @return void
     */
    public function handle(EventOneCreated $event)
    {
        $eventOne = $event->getEventOne();

        $eventOne->notify(new GoSendEmail($eventOne));

        dd("Escutou o evento", $eventOne);
    }
}
