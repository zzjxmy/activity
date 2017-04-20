<?php

namespace App\Models;

use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{
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
            'name'=>'required|max:125',
            'rule'=>'required|max:255',
            'description'=>'max:255',
        ], $this->messages());
    }

    private function messages(){
        return [
            'name.required' => '权限名必填,且唯一',
            'rule.required' => '权限规则必填',
            'description.required' => '描述过长'
        ];
    }
}
