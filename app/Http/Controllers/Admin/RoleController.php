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
            $currentPage = $request->get('currentPage',1);
            $pageSize = $request->get('pageSize');
            $skip = intval($currentPage-1)*$pageSize;
            if(strlen($name) > 0){
                $total = Role::where('name',$name)->count();
                $table = Role::where('name',$name)
                    ->skip($skip)
                    ->take($pageSize)
                    ->get();
                $data = ['code'=>1,'data'=>['table'=>$table,'total'=>$total]];
            }else{
                $table = Role::all();
                $total = Role::count();
                $data = ['code'=>1,'data'=>['table'=>$table,'total'=>$total]];
            }

            return response()->json($data);
        }

        return view('role.list',['searchPath'=>url('/role'),'operate_title'=>'角色列表']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
