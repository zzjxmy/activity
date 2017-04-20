<?php

namespace App\Http\Controllers\Admin;

use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->data['master_title'] = '权限管理';
        $this->data['selected_c'] = 'permission';
    }

    /**
     * Display a listing of the resource.
     * 权限列表
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        dd(\URL::getRequest()->path());
        if($request->ajax()){
            $data = [];
            $name = $request->get('name');
            if(strlen($name) > 0) {
                $data = Permission::where('name', $name)->paginate(intval($request->input('pageSize',15)))->toArray();
            }else{
                $data = Permission::paginate(intval($request->input('pageSize',15)))->toArray();
            }

            return $this->response($data);
        }

        return view('permission.list',['searchPath'=>url('/permission'),'operate_title'=>'权限列表']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['operate_title'] = '新增权限';
        return view('purview.create',$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $permission = new Permission();
        $validator = $permission->verify();
        if($validator->fails()) return $this->response([],-200,$validator->errors()->first());
        if($permission->create([
            'name'=>$request->input('name'),
            'rule'=>$request->input('rule'),
            'description'=>$request->input('description')
        ])){
            return $this->response([],200,'添加成功');
        }else{
            return $this->response([],-200,'添加失败');
        }
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['data'] = Permission::whereId($id)->first();
        return $this->response($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->input('id') != $id) return $this->response([],-200,'参数错误!');
        if(Permission::whereId($id)->update([
            'name'=>$request->input('name'),
            'rule'=>$request->input('rule'),
            'description'=>$request->input('description')
        ])){
            $data['data'] =  Permission::whereId($id)->first();
            return $this->response($data,200,'修改成功');
        }else{
            return $this->response([],-200,'修改失败');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Permission::find($id);
        if(!$role) return $this->response([],-200,'该记录不存在!');
        if(Permission::whereId($id)->delete()){
            return $this->response([],200,'删除成功');
        }else{
            return $this->response([],-200,'删除失败');
        }
    }
}
