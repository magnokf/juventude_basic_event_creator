<?php

namespace App\Events;

use App\Models\EventOne;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class EventOneCreated
{
    /**
     * @return EventOne
     */
    public function getEventOne(): EventOne
    {
        return $this->eventOne;
    }

    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var EventOne $eventOne
     */
    private $eventOne;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(EventOne $eventOne)
    {
        $this->eventOne  = $eventOne;
    }
}
