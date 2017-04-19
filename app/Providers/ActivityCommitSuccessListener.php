<?php

namespace App\Providers;

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
        if(isset($event->activityInfo['call_back']) && !empty($event->activityInfo['call_back'])){
            $function = explode('::',$event->activityInfo['call_back']);
            if(count($function) == 2 && class_exists($function[0])){
                $obj = app()->make($function[0]);
                if(method_exists($obj,$function[1])){
                    call_user_func_array([$obj,$function[1]],[$event->data,$event->activityInfo]);
                }
            }
        }
    }
}
