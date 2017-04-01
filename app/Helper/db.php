<?php
/**
 * Created by PhpStorm.
 * User: zhangzhijian
 * Signature: change self
 * Date: 2017/4/1
 * Time: 10:11
 */

use Illuminate\Database\Schema\Blueprint;

/**
 * 新建表
 * @param array $fileds
 * @param string $tableName
 * @throws \Exception
 */
if(!function_exists('makeTable')){
    function makeTable(array $fileds,$tableName){
        try{
            Schema::create(md5($tableName),function(Blueprint $table) use($fileds){
                $table->bigIncrements('id')->unsigned();
                $table->tinyInteger('status')->unsigned()->default(1);
                foreach ($fileds as $val){
                    $validator = \Validator::make($val,[
                        'field' => 'required|alpha|min:1|max:30'
                    ]);
                    if($validator->fails())throw new \Exception($validator->errors()->first());
                    if($val['type'] == 2){
                        $table->text($val['field']);
                    }else{
                        $table->string($val['field'],$val['length']?intval($val['length']):255)->default($val['default']?:'');
                    }
                }
                $table->timestamps();
            });
            return true;
        }catch (\Exception $exception){
            throw new \Exception('表创建失败，请检查自定添加内容');
        }
    }
}

/**
 * 检测表是否存在
 */
if(!function_exists('tableExists')){
    function tableExists($tableName){
        
    }
}

/**
 * 获取表所有字段
 */
if(!function_exists('getTableFiled')){
    function getTableFiled($tableName){

    }
}