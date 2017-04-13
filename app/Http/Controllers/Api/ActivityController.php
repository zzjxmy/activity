<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiBaseController;
use App\Http\InterfaceActivity\Activity;
use App\Http\TraitActivity\FieldVerify;

class ActivityController extends ApiBaseController implements Activity
{
    use FieldVerify;

    public function list(){

    }

    public function info(){

    }

    public function commit(){
        return $this->response->noContent();
    }

    public function verify($data)
    {
        // TODO: Implement verify() method.
    }
}
