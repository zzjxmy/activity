<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class YppUserExt extends Model
{
    protected $connection = 'ypp_huodong';
    protected $table = 'ypp_user_ext';
    public $keyType = 'string';
}
