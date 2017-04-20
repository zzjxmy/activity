<?php
/**
 * Created by PhpStorm.
 * User: zhangzhijian
 * Signature: change self
 * Date: 2017/4/12
 * Time: 18:08
 */

namespace App\Http\Controllers;

use Dingo\Api\Routing\Helpers;
use Illuminate\Routing\Controller;
use Illuminate\Support\Collection;

class ApiBaseController extends Controller{
    use Helpers;

    /**
     * 返回json格式数据
     * @param array $data
     * @param string $message
     * @param int $statusCode
     * @return \Dingo\Api\Http\Response
     */
    public function responseJson(array $data = [],$message = '请求成功',$statusCode = 200)
    {
        $jsonData = [
            'data' => $data,
            'message' => $message,
            'status_code' => $statusCode
        ];
        return $this->response->created()
            ->setContent(json_encode($jsonData))
            ->header('Content-Type','application/json')
            ->statusCode($statusCode);
    }

    public function responseData(array $data)
    {
        return \Response::json([
            'message' => '操作成功',
            'status_code' => 200,
            'data' => $data
        ], 200);
    }

    public function responseSuccess($message='操作成功')
    {
        return \Response::json([
            'message' => $message,
            'status_code' => 200
        ], 200);
    }

    public function responseFailed($message='未知错误')
    {
        return \Response::json([
            'message' => $message,
            'status_code' => 400
        ], 400);
    }

    public function responseError($message='操作失败')
    {
        return \Response::json([
            'message' => $message,
            'status_code' => 0
        ], 200);
    }

}