<?php
/**
 * Created by PhpStorm.
 * User: zhangzhijian
 * Signature: change self
 * Date: 2017/4/1
 * Time: 10:11
 */

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * 新建表
 * @param array $fileds
 * @param string $tableName
 * @throws \Exception
 */
if(!function_exists('makeTable')){
    function makeTable(array $filed,$tableName){
        try{
            Schema::create($tableName,function(Blueprint $table) use($filed){
                $table->bigIncrements('id')->unsigned();
                if(!in_array('token',$filed))$table->char('token',32);
                if(!in_array('mobile',$filed))$table->char('mobile',11);
                if(!in_array('nick_name',$filed))$table->char('nick_name',100);
                $table->tinyInteger('status')->unsigned()->default(1);
                foreach ($filed as $val){
                    $validator = \Validator::make($val,[
                        'field' => 'required|min:1|max:30'
                    ]);
                    if($validator->fails())throw new \Exception($validator->errors()->first());
                    if(!preg_match('/^[a-z]+$/',$val['field'])){
                        throw new \Exception('字段只能是小写英文字母');
                    }
                    if($val['type'] == 2){
                        $table->text($val['field']);
                    }else{
                        $table->string($val['field'],$val['length']?intval($val['length']):255)->default($val['default']?:'');
                    }
                }
                $table->string('refuse_reason')->default('');
                $table->integer('praise_num')->unsigned()->default(0);
                $table->integer('vote_num')->unsigned()->default(0);
                $table->timestamps();
                $table->index('token');
                $table->index('nick_name');
                $table->index('mobile');
                $table->index('status');
            });
            return true;
        }catch (\Exception $exception){
            throw new \Exception($exception->getMessage());
        }
    }
}

/**
 * 表修改
 */
if(!function_exists('updateTable')){
    function updateTable(array $filed,$tableName){
        try{
            Schema::create($tableName,function(Blueprint $table) use($filed){
                $table->bigIncrements('id')->unsigned();
                if(!in_array('token',$filed))$table->char('token',32);
                if(!in_array('mobile',$filed))$table->char('mobile',11);
                if(!in_array('nick_name',$filed))$table->char('nick_name',100);
                $table->tinyInteger('status')->unsigned()->default(1);
                foreach ($filed as $val){
                    $validator = \Validator::make($val,[
                        'field' => 'required|min:1|max:30'
                    ]);
                    if($validator->fails())throw new \Exception($validator->errors()->first());
                    if(!preg_match('/^[a-z]+$/',$val['field'])){
                        throw new \Exception('字段只能是小写英文字母');
                    }
                    if($val['type'] == 2){
                        $table->text($val['field']);
                    }else{
                        $table->string($val['field'],$val['length']?intval($val['length']):255)->default($val['default']?:'');
                    }
                }
                $table->string('refuse_reason')->default('');
                $table->integer('praise_num')->unsigned()->default(0);
                $table->integer('vote_num')->unsigned()->default(0);
                $table->timestamps();
                $table->index('token');
                $table->index('nick_name');
                $table->index('mobile');
                $table->index('status');
            });
            return true;
        }catch (\Exception $exception){
            throw new \Exception($exception->getMessage());
        }
    }
}

/**
 * 删除表
 * @param string $tableName
 */
if(!function_exists('dropTableIfExists')){
    function dropTableIfExists($tableName){
        Schema::dropIfExists($tableName);
    }
}


/**
 * 获取表所有字段
 * @param string $tableName
 */
if(!function_exists('getTableFiled')){
    function getTableFiled($tableName){
        $columns = Schema::getColumnListing($tableName);
        return $columns;
    }
}