<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiBaseController;
use App\InterfaceActivity\Activity as InterfaceActivity;
use App\Models\Activity;
use App\Serializers\CustomSerializer;
use App\TraitActivity\FieldVerify;
use App\Transformers\ActivityTransformer;
use Illuminate\Http\Request;

class ActivityController extends ApiBaseController implements InterfaceActivity
{
    use FieldVerify;

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

        }catch (\Exception $exception){
            dd($exception->getMessage());
        }
    }

    public function verify(Request $request)
    {
        Activity::commitVerify($request);
        $info = Activity::getActivityInfoByStaticTmpId($request->input('activity_id'));
        if(!$info)throw new \Exception('活动不存在');
        $this->setData(get_activity_info($info->id))->check($request);
    }
}
