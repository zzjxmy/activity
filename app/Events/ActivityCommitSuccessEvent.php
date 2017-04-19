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

class ActivityCommitSuccessEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $data,$activityInfo;

    /**
     * ActivityCommitSuccessEvent constructor.
     * @param $data array 用户提交的数据
     * @param $activityInfo Activity 活动数据
     */
    public function __construct(array $data,Activity $activityInfo)
    {
        $this->data = $data;
        $this->activityInfo = $activityInfo;
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
