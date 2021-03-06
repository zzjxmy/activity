<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Activity
 *
 * @mixin \Eloquent
 */
class ActivityFieldInfo extends Model
{
    protected $table = 'activity_field_info';
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
}
