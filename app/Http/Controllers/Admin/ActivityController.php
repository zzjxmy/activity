<?php

namespace App\Http\Controllers\Admin;

use App\Models\Activity;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;

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
        try{
            //验证信息
            $verify = Activity::verify($request);
            $activityId = $request->input('activityId');
            if($verify->fails())return $this->response([],10001,$verify->errors()->first());
            $time = time_format($request->input('activityTime'));
            if(!$time) return $this->response([],10002);
            //整合数据
            $module = $this->checkModule($request);
            $addInfo = $this->checkInfo($request);
            //检查活动是否已经存在
            if(Activity::where(['activity_id'=>$activityId])->count())return $this->response([],0,'活动已经存在');
            //数据插入
            \DB::transaction(function() use($addInfo,$module,$activityId){
                //活动数据插入
                Activity::save([
                    ''
                ]);
                //表创建
                $this->makeTable($addInfo,$activityId);
                //组件数据插入
                array_walk($module,function($key,$value) use ($activityId){
                    $value['name'] = $key;
                    $value['activity_id'] = $activityId;
                    Activity::create($value);
                },[]);
            });
            return $this->response([],200);
        }catch (\Exception $exception){
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
                    'start_time' => $time?$time['start']:'',
                    'end_time' => $time?$time['end']:'',
                    'num' => isset($value['num'])?intval($value['num']):0,
                ];
                if(isset($value['selfToken']))$newModule[$key]['selfToken'] = $value['selfToken'];
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
        $attributes = $request->only(['name','field','type','explode','length','default','required']);
        $fileds = [];
        $countField = count($attributes['field']);
        if($countField != count(array_unique($attributes['field']))){
            throw new \Exception('请勿使用相同的字段名');
        }
        foreach ($attributes as $key => $value){
            if(count($attributes[$key]) != $countField)throw new \Exception('无效字段');
            for ($i=0;$i<count($value);$i++){
                $fileds[$i][$key] = $value[$i];
            }
        }
        return $fileds;
    }

    /**
     * 新建表
     * @param array $fileds
     * @param string $tableName
     * @throws \Exception
     */
    private function makeTable(array $fileds,$tableName){
        try{
            Schema::create(md5($tableName),function(Blueprint $table) use($fileds){
                $table->increments('id');
                foreach ($fileds as $val){
                    $validator = \Validator::make($val,[
                        'field' => 'required|alpha|min:1|max:30'
                    ]);
                    if($validator->fails())throw new \Exception($validator->errors()->first());
                    if($val['type'] == 2){
                        $table->text($val['field']);
                    }else{
                        $table->string($val['field'],$val['length']?intval($val['length']):255)->default($val['default']?:'');
                    }
                }
                $table->timestamps();
            });
        }catch (\Exception $exception){
            throw new \Exception('表创建失败，请检查自定添加内容');
        }
    }
}
