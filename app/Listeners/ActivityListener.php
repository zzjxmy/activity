<?php

namespace App\Listeners;

use App\Events\ActivityEvent;
use App\Models\Activity;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use DefaultRedis;

class ActivityListener
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
     * @param  ActivityEvent  $event
     * @return void
     */
    public function handle(ActivityEvent $event)
    {
        if($event->action == 'delete'){
            $this->deleteActivity($event);
        }else{
            $this->addOrUpdateActivity($event);
        }
    }

    /**
     * 处理活动新增或修改事件
     */
    public function addOrUpdateActivity($event){
        $info = Activity::where('id',$event->id)->with(['modules','fields'])->first();
        if($info){
            DefaultRedis::set('activity.info:'.$event->id,json_encode($info->toArray()));
        }
    }
    /**
     * 处理活动删除事件.
     */
    public function deleteActivity($event){
        DefaultRedis::del('activity.info:'.$event->id);
    }

}
