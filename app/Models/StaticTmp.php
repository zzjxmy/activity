<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Vote
 * @mixin \Eloquent
 * @package App\Models
 */
class StaticTmp extends Model
{
    protected $connection = 'ypp_cms_db';
    protected $table = 'static_tmp';
    protected $keyType = 'string';
    public $incrementing = false;
}
