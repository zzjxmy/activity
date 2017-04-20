<?php
/**
 * 异步回调
 * User: zhangzhijian
 * Signature: change self
 * Date: 2017/4/13
 * Time: 15:43
 */

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiBaseController;
use App\TraitActivity\Queue;

class MnsController extends ApiBaseController{
    use Queue;

    /**
     * 活动页投票
     */
    public function activityVote(){
        $this->queue('活动页投票',__METHOD__);
    }

    /**
     * 动态打赏
     */
    public function dongTai(){
        $this->queue('动态打赏',__METHOD__);
    }

    /**
     * 点赞
     */
    public function like(){
        $this->queue('点赞',__METHOD__);
    }

    /**
     * 下单
     */
    public function order(){
        $this->queue('下单',__METHOD__);
    }

    /**
     * 直播间打赏
     */
    public function live(){
        $this->queue('直播间打赏',__METHOD__);
    }

    /**
     * 用户登录
     */
    public function userLogin(){
        $this->queue('用户登录',__METHOD__);
    }

    /**
     * 用户注册
     */
    public function userRegister(){
        $this->queue('用户注册',__METHOD__);
    }

}