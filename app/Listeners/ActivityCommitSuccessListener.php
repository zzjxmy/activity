<?php

namespace App\Listeners;

use App\Events\ActivityCommitSuccessEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ActivityCommitSuccessListener
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
     * @param  ActivityCommitSuccessEvent  $event
     * @return void
     */
    public function handle(ActivityCommitSuccessEvent $event)
    {
        call_back($event->activityInfo['call_back'],[$event->data,$event->activityInfo]);
    }
}
