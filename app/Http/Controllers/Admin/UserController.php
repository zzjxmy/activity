<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
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
                $data = User::where('name', $name)->paginate(intval($request->input('pageSize',15)))->toArray();
            }else{
                $data = User::paginate(intval($request->input('pageSize',15)))->toArray();
            }

            return $this->response($data);
        }

        return view('user.list',['searchPath'=>url('/user'),'operate_title'=>'用户列表']);
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
        $user = new User();
        $validator = $user->verify();
        if($validator->fails()) return $this->response([],-200,$validator->errors()->first());
        if($result = $user->create([
            'name'=>$request->input('name'),
            'password'=>bcrypt($request->input('password'))
        ])){
            $data['data'] =  User::whereId($result->id)->first();
            return $this->response($data,200,'添加成功');
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
        $data['data'] = User::whereId($id)->first();
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
        if(User::whereId($id)->update([
            'name'=>$request->input('name'),
            'password'=>bcrypt($request->input('password'))
        ])){
            $data['data'] =  User::whereId($id)->first();
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
        $role = User::find($id);
        if(!$role) return $this->response([],-200,'该记录不存在!');
        if(User::whereId($id)->delete()){
            return $this->response([],200,'删除成功');
        }else{
            return $this->response([],-200,'删除失败');
        }
    }


    public function anyTest(){
        $collection = collect(['product_id' => 1, 'price' => 100, 'discount' => false]);
        $filtered = $collection->except(['price', 'discount']);
        dd($filtered);

        $collection = collect([2, 4, 6, 8]);
        $collection->search(4);
        dd($collection->search(4));

        $collection = collect([1, 2, 3, 4, 5]);
        $collection->random();
        dd($collection);

        $collection = collect([1, 2, 3, 4, 5]);
        $collection->prepend(100);
        dd($collection);

        $collection = collect([
            ['product_id' => 'prod-100', 'name' => 'Desk'],
            ['product_id' => 'prod-200', 'name' => 'Chair'],
        ]);
        $plucked = $collection->pluck('name');
        dd($plucked);

        $collection = collect([1, 2, 3, 4, 5, 6]);

        list($underThree, $aboveThree) = $collection->partition(function ($i) {
            return $i < 3;
        });

        collect([1, 2, 3])->all();
        collect([1, 2, 3, 4, 5])->avg();

        $collection = collect([1, 2, 3, 4, 5, 6, 7]);
        $chunks = $collection->chunk(4);

        $combined = $collection->combine(['George', 29]);

        $collection->contains('Desk');

        $collection->count();

        $sorted = $collection->sortBy('price');
        $merged = $collection->merge(['price' => 200, 'discount' => false]);

        $collection = collect(['taylor', 'abigail', null])->map(function ($name) {
            return strtoupper($name);
        })->reject(function ($name) {
            return empty($name);
        });

        dd($collection);
    }
}
