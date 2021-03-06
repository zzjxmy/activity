<?php

namespace App\Http\Controllers\Admin;

use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;

class PurviewController extends Controller
{
    public function __construct()
    {
        $this->data['master_title'] = '权限管理';
        $this->data['selected_c'] = 'purview';
    }

    /**
     * Display a listing of the resource.
     * 权限列表
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->data['operate_title'] = '权限列表';

        if($request->ajax()){
            return Datatables::of(Permission::query())->make(true);
        }

        return view('purview.list',$this->data);
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
        dd($request->all());
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
