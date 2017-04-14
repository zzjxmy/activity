<?php
/**
 * Created by PhpStorm.
 * User: zhangzhijian
 * Signature: change self
 * Date: 2017/4/13
 * Time: 17:39
 */

namespace App\Transformers;


use League\Fractal\TransformerAbstract;

class ActivityTransformer extends TransformerAbstract{

    public function transform($data){
        return $data->toArray();
    }
}