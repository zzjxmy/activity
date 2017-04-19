<?php

namespace App\Http\Controllers\Api;

use App\Events\ActivityCommitSuccessEvent;
use App\Http\Controllers\ApiBaseController;
use App\InterfaceActivity\Activity as InterfaceActivity;
use App\Models\Activity;
use App\Serializers\CustomSerializer;
use \App\TraitActivity\Activity as Tactivity;
use App\Transformers\ActivityTransformer;
use Illuminate\Http\Request;

class ActivityController extends ApiBaseController implements InterfaceActivity
{
    use Tactivity;
    protected $info;

    public function list(){
        $activity = Activity::all();
        return $this->response()->collection($activity,new ActivityTransformer(),function($resource,$fractal){
            $fractal->setSerializer(new CustomSerializer());
        });
    }

    public function info(){

    }

    public function commit(Request $request){
        try{
            $this->verify($request);
            if(!\DB::table($this->data['table_name'])->insert($this->saveData)){
                throw new \Exception('提交失败，请稍后再试');
            }
            event(new ActivityCommitSuccessEvent($this->data,$this->info));
            return $this->responseSuccess();
        }catch (\Exception $exception){
            return $this->responseError($exception->getMessage());
        }
    }

    public function verify(Request $request)
    {
        Activity::commitVerify($request);
        $info = Activity::getActivityInfoByStaticTmpId($request->input('activity_id'));
        if(!$info)throw new \Exception('活动不存在');
        $this->info = $info;
        $this->setCheckData(get_activity_info($info->id))->fieldCheck($request)->activityCheck();
    }
}
