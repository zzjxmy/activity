<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

/**
 * App\Models\Activity
 *
 * @mixin \Eloquent
 */
class Activity extends Model
{
    protected $table = 'activity';
    public $timestamps = false;
    public $guarded = ['id'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        self::creating(function(){
            $this->create_time = time();
        });
        self::updating(function(){
            $this->update_time = time();
        });
    }

    public static function commitVerify(Request $request){
        $validator = \Validator::make($request->input(),[
            'activity_id' => 'required|min:32:max:32',
        ],[
            'activity_id.required' => '无效活动',
            'activity_id.min' => '无效活动',
            'activity_id.max' => '无效活动',
        ]);
        if($validator->fails()){
            throw new \Exception($validator->errors()->first());
        }
    }

    public static function verify(Request $request){
        $validator = \Validator::make($request->input(),[
            'activityId' => 'required|alpha_num|size:32',
            'activityType' => 'required|integer|in:1,2,3',
            'activityTime' => 'required',
            'activityStatus' => 'in:1',
            'likeCheck' => 'in:like',
            'orderCheck' => 'in:order',
            'activityCheck' => 'in:activity',
            'liveCheck' => 'in:live',
            'dongtaiCheck' => 'in:dongtai',
            'like' => 'required_with:likeCheck|array',
            'order' => 'required_with:orderCheck|array',
            'activity' => 'required_with:activityCheck|array',
            'live' => 'required_with:liveCheck|array',
            'dongtai' => 'required_with:dongtaiCheck|array',
        ],self::message());
        return $validator;
    }

    private static function message(){
        return [
            'activityId.required' => '无效活动',
            'activityId.alpha_num' => '无效活动',
            'activityId.size' => '无效活动',
            'activityType.required' => '无效类型',
            'activityType.integer' => '无效类型',
            'activityType.in' => '无效类型',
            'activityTime.required' => '请选择活动时间',
            'activityStatus.in' => '无效审核状态',
            'likeCheck.in' => '无效组件',
            'orderCheck.in' => '无效组件',
            'activityCheck.in' => '无效组件',
            'liveCheck.in' => '无效组件',
            'dongtaiCheck.in' => '无效组件',
            'like.required_with' => '无效组件',
            'like.array' => '无效组件',
            'order.required_with' => '无效组件',
            'order.array' => '无效组件',
            'activity.required_with' => '无效组件',
            'activity.array' => '无效组件',
            'live.required_with' => '无效组件',
            'live.array' => '无效组件',
            'dongtai.required_with' => '无效组件',
            'dongtai.array' => '无效组件',
        ];
    }

    /**
     * 获取活动所有的信息
     * @param $id
     * @return object collection
     */
    public static function getActivityAllInfoById($id){
        return Activity::where('id',$id)->with(['modules','fields'])->first();
    }

    /**
     * 根据活动ID(static_tmp_id)获取Activity表信息
     * @param $id
     * @param array $fields
     * @return mixed
     */
    public static function getActivityInfoByStaticTmpId($id,$fields = ['*']){
        return Activity::where('static_tmp_id',$id)->first($fields);
    }

    //with static_tmp
    public function static_tmp(){
        return $this->hasOne(StaticTmp::class,'id','static_tmp_id');
    }

    //with count vote
    public function vote(){
        return $this->hasMany(Vote::class,'activity_id','id');
    }

    //with count modules
    public function modules(){
        return $this->hasMany(Modules::class,'activity_id','id');
    }

    //with count fields
    public function fields(){
        return $this->hasMany(ActivityFieldInfo::class,'activity_id','id');
    }
}
