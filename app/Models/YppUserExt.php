<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class YppUserExt extends Model
{
    protected $connection = 'ypp_app';
    protected $table = 't_user_ext';
    public $keyType = 'string';
}
