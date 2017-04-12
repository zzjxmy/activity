<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $data = [];
            $name = $request->get('name');
            if(strlen($name) > 0) {
                $data = Role::where('name', $name)->paginate(intval($request->input('pageSize',15)))->toArray();
            }else{
                $data = Role::paginate(intval($request->input('pageSize',15)))->toArray();
            }

            return $this->response($data);
        }

        return view('role.list',['searchPath'=>url('/role'),'operate_title'=>'角色列表']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = new Role();
        $validator = $role->verify();
        if($validator->fails()) return $this->response([],-200,$validator->errors()->first());
        if($role->create([
            'name'=>$request->input('name'),
            'display_name'=>$request->input('display_name'),
            'description'=>$request->input('description')
        ])){
            return $this->response([],200,'添加成功');
        }else{
            return $this->response([],-200,'添加失败');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['data'] = Role::whereId($id)->first();
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
        if(Role::whereId($id)->update([
            'name'=>$request->input('name'),
            'display_name'=>$request->input('display_name'),
            'description'=>$request->input('description')
        ])){
            $data['data'] =  Role::whereId($id)->first();
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
        $role = Role::find($id);
        if(!$role) return $this->response([],-200,'该记录不存在!');
        if(Role::whereId($id)->delete()){
            return $this->response([],200,'删除成功');
        }else{
            return $this->response([],-200,'删除失败');
        }
    }
}
