<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class YppUser extends Model
{
    protected $connection = 'ypp_app';
    protected $table = 't_user';
    public $keyType = 'string';

    public function yppUserExt(){
        return $this->hasOne(YppUserExt::class,'uid','id');
    }
}
