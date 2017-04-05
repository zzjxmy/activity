<div class="block">
    <span class="demonstration">完整功能</span>
    <el-pagination
    @size-change="handleSizeChange"
    @current-change="handleCurrentChange"
    :current-page="currentPage4"
    :page-sizes="[100, 200, 300, 400]"
    :page-size="100"
    layout="total, sizes, prev, pager, next, jumper"
    :total="400">
    </el-pagination>
</div>

<div class="block" style="text-align: right;" v-show="total > 0">
    <el-pagination @size-change="sizeChange" @current-change="currentChange" :current-page="formData.currentPage" :page-sizes="[100, 200, 300, 400]"
    :page-size="formData.pageSize"
    layout="total, sizes, prev, pager, next, jumper"
    :total="total">
    </el-pagination>
</div>
