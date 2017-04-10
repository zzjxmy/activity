<?php
namespace App\Models;


use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        self::creating(function(){
            $this->create_time = date('Y-m-d H:i:s');
        });
        self::updating(function(){
            $this->update_time = date('Y-m-d H:i:s');
        });
    }
}
