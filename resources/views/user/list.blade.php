@extends('layouts.head')
@section('content')
    <div id="content" class="app-content" role="main" v-loading.fullscreen.lock="fullscreenLoading">
        <div class="app-content-body ">
            <div class="bg-light lter b-b wrapper-md">
                <h1 class="m-n font-thin h3">{{$operate_title}}</h1>
            </div>
            <div class="wrapper-md">
                <!-- form -->
                <el-form :inline="true" :model="formData" class="demo-form-inline">
                    <el-form-item label="用户名">
                        <el-input v-model="formData.name" placeholder="用户名"></el-input>
                    </el-form-item>
                    <el-form-item>
                        <el-button type="primary" @click="onSubmit(formData)">查询</el-button>
                    </el-form-item>
                    <el-form-item style="float: right;">
                        <el-button-group>
                            <el-button type="success" @click="showDialog('add','','')">添加用户</el-button>
                        </el-button-group>
                    </el-form-item>
                </el-form>
                <!-- /form -->
                <!-- table -->
                <el-table :data="tableData" style="width: 100%">
                    <el-table-column label="ID" prop="id"></el-table-column>
                    <el-table-column label="用户名" prop="name"></el-table-column>
                    <el-table-column label="角色名" prop="name"></el-table-column>
                    <el-table-column label="创建时间" prop="created_at"></el-table-column>
                    <el-table-column label="更新时间" prop="updated_at"></el-table-column>
                    <el-table-column label="操作">
                        <template scope="scope">
                            <el-button size="small" @click="showDialog('update',scope.$index,'/user/'+scope.row.id+'/edit')">编辑</el-button>
                            <el-button size="small" type="danger" @click="deleteConfirm(scope.$index, scope.row.id,'/user/'+scope.row.id)">删除</el-button>
                        </template>
                    </el-table-column>
                </el-table>
                <!-- / table -->
                @include('page.default')

                <!-- dialog -->
                <el-dialog title="用户编辑" v-model="dialogFormVisible">
                    <el-form :model="form">
                        <el-form-item label="用户名" label-width="120px">
                            <el-input v-model="form.name" auto-complete="off"></el-input>
                        </el-form-item>
                        <el-form-item label="密码" label-width="120px">
                            <el-input v-model="form.password" auto-complete="off"></el-input>
                        </el-form-item>
                        <el-form-item label="角色名" label-width="120px">
                            <el-input v-model="form.password" auto-complete="off"></el-input>
                        </el-form-item>
                    </el-form>
                    <div slot="footer" class="dialog-footer">
                        <el-button @click="dialogFormVisible = false">取 消</el-button>
                        <el-button type="primary" v-if="form.id" @click="saveDialogData('/user/'+form.id) ">确 定</el-button>
                        <el-button type="primary" v-else="!form.id" @click="saveDialogData('/user')">确 定</el-button>
                    </div>
                </el-dialog>
                <!-- /dialog -->
            </div>
        </div>
    </div>
@endsection

