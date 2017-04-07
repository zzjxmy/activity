<el-table
        :data="tableData"
        style="width: 100%">
    <el-table-column
            label="角色ID"
            prop="id">
    </el-table-column>
    <el-table-column
            label="角色名"
            prop="name">
    </el-table-column>
    <el-table-column
            label="显示名"
            prop="display_name">
    </el-table-column>
    <el-table-column
            label="描述"
            prop="description">
    </el-table-column>
    <el-table-column
            label="创建时间"
            prop="created_at">
    </el-table-column>
    <el-table-column
            label="更新时间"
            prop="updated_at">
    </el-table-column>
    <el-table-column label="操作" >
        <template scope="scope">
            <el-button
                    size="small"
            @click="handleEdit('/role/'+scope.row.id)">编辑</el-button>
            <el-button
                    size="small"
                    type="danger"
            @click="handleDelete(scope.$index, scope.row.id)">删除</el-button>
        </template>
    </el-table-column>
</el-table>

<el-dialog title="角色编辑" v-model="dialogFormVisible">
    <el-form :model="form">
        <el-form-item label="角色名" label-width="120px">
            <el-input v-model="form.name" auto-complete="off"></el-input>
        </el-form-item>
        <el-form-item label="显示名" label-width="120px">
            <el-input v-model="form.display_name" auto-complete="off"></el-input>
        </el-form-item>
        <el-form-item label="描述" label-width="120px">
            <el-input v-model="form.description" auto-complete="off"></el-input>
        </el-form-item>
    </el-form>
    <div slot="footer" class="dialog-footer">
        <el-button @click="dialogFormVisible = false">取 消</el-button>
        <el-button type="primary" @click="editSave('/role/'+form.id+'/edit')">确 定</el-button>
    </div>
</el-dialog>
