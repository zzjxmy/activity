<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @param array $data
     * @param int $status
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function response($data = [] ,$status = 200 ,$message = ''){
        return response()->json([
            'status' => $status ,
            'msg' => $message?:trans('response.'.$status),
            'data' => $data
        ]);
    }
}
