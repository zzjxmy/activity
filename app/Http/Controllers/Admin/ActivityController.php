<?php

namespace App\Http\Controllers\Admin;

use App\Models\Activity;
use App\Models\ActivityFieldInfo;
use App\Models\Modules;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('activity.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('activity.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response | \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $activityId = $request->input('activityId');
        try{
            //验证信息
            $verify = Activity::verify($request);
            if($verify->fails())throw new \Exception($verify->errors()->first());
            //获取表单数据
            $info = $this->getActivityInfo($request);
            //整合数据
            $module = $this->checkModule($request);
            $addInfo = $this->checkInfo($request);
            //检查活动是否已经存在
            if(Activity::where(['activity_id'=>$activityId])->count())return $this->response([],0,'活动已经存在');
            //表创建
            makeTable($addInfo,$activityId);
            //数据插入
            \DB::transaction(function() use($info,$addInfo,$module,$activityId){
                //活动数据插入
                $result = Activity::create($info);
                //组件数据插入
                array_walk($module,function($value,$key) use ($result){
                    $value['name'] = $key;
                    $value['activity_id'] = $result->id;
                    Modules::create($value);
                },[]);
                //表字段值插入
                array_walk($addInfo,function($value,$key) use ($result){
                    $value['activity_id'] = $result->id;
                    ActivityFieldInfo::create($value);
                },[]);
            });
            return $this->response([],200);
        }catch (\Exception $exception){
            //失败之后删除表
            dropTable($activityId);
            return $this->response([],0,$exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * 分析表单信息
     * @param Request $request
     * @return array
     * @throws \Exception
     */
    private function getActivityInfo(Request $request){
        $time = time_format($request->input('activityTime'));
        if(!$time) throw new \Exception('时间格式错误');
        $data['start_time'] = strtotime($time['start_time']);
        $data['end_time'] = strtotime($time['start_time'] .' 23:59:59');
        $data['activity_id'] = $request->input('activityId');
        $data['coupon'] = $request->input('activityCoupon')?:'';
        $data['type'] = $request->input('activityType');
        $data['activity_id'] = $request->input('activityId');
        $data['status'] = $request->input('activityStatus',0);
        return $data;
    }

    /**
     * 分析组件信息
     * @param Request $request
     * @return array
     */
    private function checkModule(Request $request){
        $modules = $request->only(['likeCheck','orderCheck','activityCheck','liveCheck','dongtaiCheck']);
        $newModule = [];
        foreach ($modules as $key => $module){
            $value = $request->input($module);
            if($value){
                $time = isset($value['time'])?time_format($value['time']):false;
                $newModule[$key] = [
                    'start_time' => $time?strtotime($time['start_time']):0,
                    'end_time' => $time?strtotime($time['end_time'].' 23:59:59'):0,
                    'num' => isset($value['num'])?intval($value['num']):0,
                ];
                if(isset($value['selfToken']))$newModule[$key]['token'] = $value['selfToken'];
            }
        }
        return $newModule;
    }

    /**
     * 分析新增信息
     * @param Request $request
     * @return array
     * @throws \Exception
     */
    private function checkInfo(Request $request){
        $attributes = $request->only([
            'name','field','type','explode','isExplode',
            'length','default','required','order_by','search'
        ]);
        $filed = [];
        $defaultFiled = ['id','nick_name','mobile','status','created_at','updated_at'];
        $countField = count($attributes['field']);
        if($countField != count(array_unique($attributes['field']?:[]))){
            throw new \Exception('请勿使用相同的字段名');
        }
        foreach ($attributes as $key => $value){
            if(count($attributes[$key]) != $countField)throw new \Exception('无效字段');
            for ($i=0;$i<count($value);$i++){
                if($key == 'field' && in_array($value[$i],$defaultFiled)){
                    throw new \Exception('请勿使用内置字段名');
                }
                if($key == 'length'){
                    $filed[$i][$key] = empty($value[$i])?255:$value[$i];
                }else{
                    $filed[$i][$key] = is_null($value[$i])?'':$value[$i];
                }
            }
        }
        return $filed;
    }
}
