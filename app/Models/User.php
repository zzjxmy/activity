<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use Notifiable;
    use EntrustUserTrait;

    public $guarded = ['id'];
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        self::creating(function(){
            $this->created_at = date('Y-m-d H:i:s');
        });
        self::updating(function(){
            $this->updated_at = date('Y-m-d H:i:s');
        });
    }

    //参数验证
    public function verify(){
        return \Validator::make(\Request::input(), [
            'name'=>'required|max:25',
            'password'=>'required|max:100',
            'role'=>'max:255',
        ], $this->messages());
    }

    private function messages(){
        return [
            'name.required' => '用户名必填,且唯一',
            'password.required' => '密码必填,且唯一',
            'role.required' => '描述过长'
        ];
    }
}
