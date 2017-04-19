<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Activity
 *
 * @mixin \Eloquent
 */
class Modules extends Model
{
    protected $table = 'modules';
    public $timestamps = false;
    protected $guarded = ['id'];

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

    public static function getModules(){
        $info  = Modules::orderBy('create_time','desc')->get()->toArray();
        $modules = [];
        foreach ($info as $key=>$value){
            $modules[$value['name']][] = $value;
        }
        return $modules;
    }
}
