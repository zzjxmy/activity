<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiBaseController;
use App\InterfaceActivity\Activity;
use App\Serializers\CustomSerializer;
use App\TraitActivity\FieldVerify;
use App\Transformers\ActivityTransformer;

class ActivityController extends ApiBaseController implements Activity
{
    use FieldVerify;

    public function list(){
        $activity = \App\Models\Activity::all();
        return $this->response()->collection($activity,new ActivityTransformer(),function($resource,$fractal){
            $fractal->setSerializer(new CustomSerializer());
        });
    }

    public function info(){

    }

    public function commit(){

    }

    public function verify($data)
    {
        // TODO: Implement verify() method.
    }
}
