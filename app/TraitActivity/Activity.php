<?php
/**
 * Created by PhpStorm.
 * User: zhangzhijian
 * Signature: change self
 * Date: 2017/4/19
 * Time: 10:34
 */

namespace App\TraitActivity;

use App\Models\YppUser;

trait Activity{

    use FieldVerify;

    public function activityCheck(){
        $this->checkToken()->setStatus();
        return $this;
    }

    public function checkToken(){
        if($this->data['is_login'] == 1){
            if(!isset($this->saveData['token'])){
                throw new \Exception('无效用户');
            }
            $userInfo = YppUser::where('id',$this->saveData['token'])->first(['id','mobile'])->with('yppUserExt',function($query){
                $query->select(['uid','nickname']);
            });
            if(!$userInfo)throw new \Exception('无效用户');
            $this->checkOnly()->isTest($userInfo);
            $this->saveData['nickname'] = $userInfo->yppUserExt->nickname;
            $this->saveData['mobile'] = $userInfo->mobile;
        }
        return $this;
    }

    public function checkOnly(){
        if($this->data['user_unique'] == 1){
            if(\DB::table($this->data['table_name'])->where('token',$this->saveData['token'])->count()){
                throw new \Exception('你已经提交过数据了');
            }
        }
        return $this;
    }

    public function isTest($userInfo){
        if($this->data['is_test'] == 1){
            if(!in_array($userInfo->mobile,explode(',',$this->data['test_mobile']))){
                throw new \Exception('活动暂未公开');
            }
        }
    }

    public function setStatus(){
        $this->saveData['status'] = $this->data['status']==1?0:1;
        return $this;
    }

    public function setUserInfo(){
        return $this;
    }
}