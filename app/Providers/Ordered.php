<?php

namespace App\Providers;

use App\Controllers\OrderController;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class Ordered
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $datax1;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($datax1)
    {
        $this->order = $datax1;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('ordered');
    }
}
