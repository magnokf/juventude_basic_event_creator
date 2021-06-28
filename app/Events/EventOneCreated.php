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
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private $enrollment;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($enrollment)
    {
        $this->enrollment  =$enrollment;
    }

    /**
     * @return mixed
     */
    public function getEnrollment()
    {
        return $this->enrollment;
    }



}
