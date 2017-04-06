<el-table
        :data="tableData"
        style="width: 100%">
    <el-table-column type="expand" class="table table-striped b-t b-light">
        <template scope="props">
            <el-form label-position="left" inline class="demo-table-expand">
                <el-form-item label="ID">
                    <span>@{{ props.row.name }}</span>
                </el-form-item>
                <el-form-item label="活动名称">
                    <span>@{{ props.row.shop }}</span>
                </el-form-item>
                <el-form-item label="活动类型">
                    <span>@{{ props.row.id }}</span>
                </el-form-item>
                <el-form-item label="需要审核">
                    <span>@{{ props.row.shopId }}</span>
                </el-form-item>
                <el-form-item label="动态表名">
                    <span>@{{ props.row.category }}</span>
                </el-form-item>
                <el-form-item label="活动开始时间">
                    <span>@{{ props.row.address }}</span>
                </el-form-item>
                <el-form-item label="活动结束时间">
                    <span>@{{ props.row.desc }}</span>
                </el-form-item>
            </el-form>
        </template>
    </el-table-column>
    <el-table-column
            label="ID"
            prop="id" width="90">
    </el-table-column>
    <el-table-column
            label="活动名称"
            prop="activity_name" width="300">
    </el-table-column>
    <el-table-column
            label="活动类型"
            prop="type" align="center">
        <template scope="scope">
            @{{['','默认','拉新','存展示'][scope.row.type]}}
        </template>
    </el-table-column>
    <el-table-column
            label="需要审核"
            prop="status" align="center">
        <template scope="scope">
            @{{scope.row.status==1?'是':'否'}}
        </template>
    </el-table-column>
    <el-table-column
            label="动态表名"
            prop="table_name" width="300">
    </el-table-column>
    <el-table-column
            label="活动开始时间"
            prop="start_time">
        <template scope="scope">
            @{{(new Date(scope.row.start_time * 1000)).Format('yyyy-MM-dd hh:mm:ss')}}
        </template>
    </el-table-column>
    <el-table-column
            label="活动结束时间"
            prop="end_time">
        <template scope="scope">
            @{{(new Date(scope.row.end_time * 1000)).Format('yyyy-MM-dd hh:mm:ss')}}
        </template>
    </el-table-column>
    <el-table-column
            label="创建时间"
            prop="create_time">
        <template scope="scope">
            @{{(new Date(scope.row.create_time * 1000)).Format('yyyy-MM-dd hh:mm:ss')}}
        </template>
    </el-table-column>
    <el-table-column label="操作">
        <template scope="scope">
            <el-button
                    size="small"
            @click="handleEdit(scope.$index,scope.row.id)">编辑</el-button>
            <el-button
                    size="small"
                    type="danger"
            @click="handleDelete(scope.$index,scope.row)">删除</el-button>
        </template>
    </el-table-column>
</el-table>