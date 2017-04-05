<el-table
        :data="tableData"
        style="width: 100%">
    <el-table-column type="expand" class="table table-striped b-t b-light">
        <template scope="props">
            <el-form label-position="left" inline class="demo-table-expand">
                <el-form-item label="商品名称">
                    <span>@{{ props.row.name }}</span>
                </el-form-item>
                <el-form-item label="所属店铺">
                    <span>@{{ props.row.shop }}</span>
                </el-form-item>
                <el-form-item label="商品 ID">
                    <span>@{{ props.row.id }}</span>
                </el-form-item>
                <el-form-item label="店铺 ID">
                    <span>@{{ props.row.shopId }}</span>
                </el-form-item>
                <el-form-item label="商品分类">
                    <span>@{{ props.row.category }}</span>
                </el-form-item>
                <el-form-item label="店铺地址">
                    <span>@{{ props.row.address }}</span>
                </el-form-item>
                <el-form-item label="商品描述">
                    <span>@{{ props.row.desc }}</span>
                </el-form-item>
            </el-form>
        </template>
    </el-table-column>
    <el-table-column
            label="商品 ID"
            prop="id">
    </el-table-column>
    <el-table-column
            label="商品名称"
            prop="name">
    </el-table-column>
    <el-table-column
            label="描述"
            prop="desc">
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