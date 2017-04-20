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
     * 动态打赏
     */
    public function dongTai(){
        $this->queue('动态打赏',__FUNCTION__);
    }

    /**
     * 完成订单
     */
    public function order(){
        $this->queue('下单',__FUNCTION__);
    }

    /**
     * 直播间打赏
     */
    public function live(){
        $this->queue('直播间打赏',__FUNCTION__,'live');
    }

    /**
     * 充值
     */
    public function wyCharge(){
        $this->queue('充值',__FUNCTION__);
    }

    /**
     * 用户登录
     */
    public function userLogin(){
        $this->queue('用户登录',__FUNCTION__,'login-register');
    }

    /**
     * 用户注册
     */
    public function userRegister(){
        $this->queue('用户注册',__FUNCTION__,'login-register');
    }

}