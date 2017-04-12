<?php
namespace App\Models;


use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
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
        return \validator()::make(\Request::input(), [
            'name'=>'required|unique:roles|max:125',
            'display_name'=>'max:255',
            'description'=>'max:255',
        ], $this->messages());
    }

    private function messages(){
        return [
            'name.required' => '角色名必填,且唯一',
            'display_name.required' => '显示名过长',
            'description.required' => '描述过长'
        ];
    }
}
