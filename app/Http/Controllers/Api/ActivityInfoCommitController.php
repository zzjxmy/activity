<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiBaseController;

class ActivityInfoCommitController extends ApiBaseController
{
    public function index(){
        return $this->response->noContent();
    }
}
