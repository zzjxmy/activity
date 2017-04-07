<?php

namespace App\Http\Controllers\Admin;

use App\Models\Activity;
use App\Models\ActivityFieldInfo;
use App\Models\Modules;
use App\Models\StaticTmp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param $request
     * @return \Illuminate\Http\Response | \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $data = $request->input();
        if ($request->ajax()) {
            $data = Activity::where(function ($query) use ($data) {
                if (isset($data['type']) && $data['type']) $query->where('type', intval($data['type']));
                if (isset($data['status']) && $data['status']) $query->where('status', intval($data['status']));
                if (isset($data['site_name']) && $data['site_name']) $query->where('site_name', 'like', '%' . $data['site_name'] . '%');
                if (isset($data['time']) && count($data['time'])) {
                    $query->where('start_time', '>=', strtotime($data['time'][0]));
                    $query->where('end_time', '<=', strtotime($data['time'][1] . ' 23:59:59'));
                }
                if (isset($data['create_time']) && count($data['create_time'])) {
                    $query->where('create_time', '>=', strtotime($data['create_time'][0]));
                    $query->where('create_time', '<=', strtotime($data['create_time'][1] . ' 23:59:59'));
                }
            })->with(['static_tmp' => function ($query) {
                $query->select(['id', 'site_name']);
            }, 'vote' => function ($query) {
                $query->select(['activity_id', 'type', 'money']);
            }])->paginate(intval($request->input('pageSize', 15)))->toArray();
            foreach ($data['data'] as $key => $val) {
                //count vote
                $vote = [
                    'activity_vote' => 0, 'live_vote' => 0, 'order_vote' => 0, 'dongtai_vote' => 0,
                    'praise_num' => 0, 'order_num' => 0, 'live_num' => 0, 'activity_num' => 0, 'dongtai_num' => 0
                ];
                foreach ($val['vote'] as $v) {
                    switch ($v['type']) {
                        case 1: //活动页投票
                            $vote['activity_vote'] += $v['money'];
                            $vote['activity_num']++;
                            break;
                        case 2: //直播间打赏
                            $vote['live_vote'] += $v['money'];
                            $vote['live_num']++;
                            break;
                        case 3: //下单
                            $vote['order_vote'] += $v['money'];
                            $vote['order_num']++;
                            break;
                        case 4: //点赞
                            $vote['praise_num']++;
                            break;
                        case 5: //动态打赏
                            $vote['dongtai_vote'] += $v['money'];
                            $vote['dongtai_num']++;
                            break;
                    }
                }
                $data['data'][$key]['vote'] = $vote;
            }
            return $this->response($data);
        }
        return view('activity.list', ['searchPath' => url('/activity')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //获取所有的活动 排除已经添加的
        $activity = Activity::get(['static_tmp_id'])->toArray();
        $activity = StaticTmp::whereNotIn('id',array_column($activity,'static_tmp_id'))->get(['id','site_name'])->toArray();
        return view('activity.add',['activity' => $activity]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response | \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $activityId = $request->input('activityId');
        try {
            //验证信息
            $verify = Activity::verify($request);
            if ($verify->fails()) throw new \Exception($verify->errors()->first());
            //查询活动
            $staticTmp = StaticTmp::where('id', $activityId)->first(['site_name']);
            if (!$staticTmp) throw new \Exception('无效活动');
            //获取表单数据
            $info = $this->getActivityInfo($request);
            $info['site_name'] = $staticTmp->site_name;
            //整合数据
            $module = $this->checkModule($request);
            $addInfo = $this->checkInfo($request);
            //检查活动是否已经存在
            if (Activity::where(['static_tmp_id' => $activityId])->count()) return $this->response([], 0, '活动已经存在');
            //表创建
            makeTable($addInfo, $info['table_name']);
            //数据插入
            \DB::transaction(function () use ($info, $addInfo, $module) {
                //活动数据新增
                $result = Activity::create($info);
                //组件数据新增
                array_walk($module, function ($value, $key) use ($result) {
                    $value['name'] = $key;
                    $value['activity_id'] = $result->id;
                    Modules::create($value);
                }, []);
                //表字段值新增
                array_walk($addInfo, function ($value, $key) use ($result) {
                    $value['activity_id'] = $result->id;
                    ActivityFieldInfo::create($value);
                }, []);
            });
            return $this->response([], 200);
        } catch (\Exception $exception) {
            //失败之后删除表
            dropTableIfExists(md5($activityId));
            return $this->response([], 0, $exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
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
    private function getActivityInfo(Request $request)
    {
        $time = time_format($request->input('activityTime'));
        if (!$time) throw new \Exception('时间格式错误');
        $data['start_time'] = strtotime($time['start_time']);
        $data['end_time'] = strtotime($time['end_time'] . ' 23:59:59');
        $data['static_tmp_id'] = $request->input('activityId');
        $data['coupon'] = $request->input('activityCoupon') ?: '';
        $data['table_name'] = md5($data['static_tmp_id']);
        $data['type'] = $request->input('activityType');
        $data['status'] = $request->input('activityStatus', 2);
        return $data;
    }

    /**
     * 分析组件信息
     * @param Request $request
     * @return array
     */
    private function checkModule(Request $request)
    {
        $modules = $request->only(['likeCheck', 'orderCheck', 'activityCheck', 'liveCheck', 'dongtaiCheck']);
        $newModule = [];
        foreach ($modules as $key => $module) {
            $value = $request->input($module);
            if ($value) {
                $time = isset($value['time']) ? time_format($value['time']) : false;
                $newModule[$key] = [
                    'start_time' => $time ? strtotime($time['start_time']) : 0,
                    'end_time' => $time ? strtotime($time['end_time'] . ' 23:59:59') : 0,
                    'num' => isset($value['num']) ? intval($value['num']) : 0,
                ];
                if (isset($value['selfToken'])) $newModule[$key]['token'] = $value['selfToken'];
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
    private function checkInfo(Request $request)
    {
        $attributes = $request->only([
            'name', 'field', 'type', 'explode', 'is_explode',
            'length', 'default', 'unique', 'required', 'order_by', 'search'
        ]);
        $filed = [];
        $defaultFiled = ['id', 'status', 'created_at', 'updated_at'];
        $countField = count($attributes['field']);
        if ($countField != count(array_unique($attributes['field'] ?: []))) {
            throw new \Exception('请勿使用相同的字段名');
        }
        foreach ($attributes as $key => $value) {
            if (count($attributes[$key]) != $countField) throw new \Exception('无效字段');
            for ($i = 0; $i < count($value); $i++) {
                if ($key == 'field' && in_array($value[$i], $defaultFiled)) {
                    throw new \Exception('请勿使用内置字段名');
                }
                if ($key == 'length') {
                    $filed[$i][$key] = empty($value[$i]) ? 255 : $value[$i];
                } else {
                    $filed[$i][$key] = is_null($value[$i]) ? '' : $value[$i];
                }
            }
        }
        return $filed;
    }
}
