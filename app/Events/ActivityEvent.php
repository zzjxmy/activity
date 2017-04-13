<?php

namespace App\Events;

use App\Models\Activity;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ActivityEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $id,$action;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($id,$action = 'addOrUpdate')
    {
        $this->id = $id;
        $this->action = $action;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
