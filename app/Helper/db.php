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
            Schema::create(md5($tableName),function(Blueprint $table) use($filed){
                $table->bigIncrements('id')->unsigned();
                if(!in_array('token',$filed))$table->char('token',32);
                $table->string('nick_name',32);
                $table->char('mobile',11);
                $table->char('user_token',32);
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
                $table->index('user_token');
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
if(!function_exists('dropTable')){
    function dropTable($tableName){
        Schema::dropIfExists(md5($tableName));
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