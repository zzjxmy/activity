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
                    <el-form-item label="权限名称">
                        <el-input v-model="formData.name" placeholder="权限名称"></el-input>
                    </el-form-item>
                    <el-form-item>
                        <el-button type="primary" @click="onSubmit(formData)">查询</el-button>
                    </el-form-item>
                    <el-form-item style="float: right;">
                        <el-button-group>
                            <el-button type="success" @click="showDialog('add','','')">添加权限</el-button>
                        </el-button-group>
                    </el-form-item>
                </el-form>
                <!-- /form -->
                <!-- table -->
                <el-table :data="tableData" style="width: 100%">
                    <el-table-column label="ID" prop="id"></el-table-column>
                    <el-table-column label="权限规则" prop="rule"></el-table-column>
                    <el-table-column label="权限名称" prop="name"></el-table-column>
                    <el-table-column label="权限描述" prop="description"></el-table-column>
                    <el-table-column label="创建时间" prop="created_at"></el-table-column>
                    <el-table-column label="更新时间" prop="updated_at"></el-table-column>
                    <el-table-column label="操作">
                        <template scope="scope">
                            <el-button size="small" @click="showDialog('update',scope.$index,'/permission/'+scope.row.id+'/edit')">编辑</el-button>
                            <el-button size="small" type="danger" @click="deleteConfirm(scope.$index, scope.row.id,'/permission/'+scope.row.id)">删除</el-button>
                        </template>
                    </el-table-column>
                </el-table>
                <!-- / table -->
                @include('page.default')

                <!-- dialog -->
                <el-dialog title="权限编辑" v-model="dialogFormVisible">
                    <el-form :model="form">
                        <el-form-item label="权限规则" label-width="120px">
                            <el-input v-model="form.rule" auto-complete="off"></el-input>
                        </el-form-item>
                        <el-form-item label="权限名称" label-width="120px">
                            <el-input v-model="form.name" auto-complete="off"></el-input>
                        </el-form-item>
                        <el-form-item label="权限描述" label-width="120px">
                            <el-input v-model="form.description" auto-complete="off"></el-input>
                        </el-form-item>
                    </el-form>
                    <div slot="footer" class="dialog-footer">
                        <el-button @click="dialogFormVisible = false">取 消</el-button>
                        <el-button type="primary" v-if="form.id" @click="saveDialogData('/permission/'+form.id) ">确 定</el-button>
                        <el-button type="primary" v-else="!form.id" @click="saveDialogData('/permission')">确 定</el-button>
                    </div>
                </el-dialog>
                <!-- /dialog -->
            </div>
        </div>
    </div>
@endsection

