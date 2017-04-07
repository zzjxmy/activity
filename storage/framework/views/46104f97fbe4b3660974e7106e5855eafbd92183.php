<div class="block">
    <span class="demonstration">显示总数</span>
    <el-pagination
    @size-change="handleSizeChange"
    @current-change="handleCurrentChange"
    :current-page="currentPage1"
    :page-size="100"
    layout="total, prev, pager, next"
    :total="1000">
    </el-pagination>
</div>
<div class="block">
    <span class="demonstration">调整每页显示条数</span>
    <el-pagination
    @size-change="handleSizeChange"
    @current-change="handleCurrentChange"
    :current-page="currentPage2"
    :page-sizes="[100, 200, 300, 400]"
    :page-size="100"
    layout="sizes, prev, pager, next"
    :total="1000">
    </el-pagination>
</div>
<div class="block">
    <span class="demonstration">直接前往</span>
    <el-pagination
    @size-change="handleSizeChange"
    @current-change="handleCurrentChange"
    :current-page="currentPage3"
    :page-size="100"
    layout="prev, pager, next, jumper"
    :total="1000">
    </el-pagination>
</div>
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

<script>
    new Vue({
        el:'#app',
        data:{
            methods: {
                handleSizeChange:function(val) {
                    console.log('每页'+val+'条');
                },
                handleCurrentChange:function(val) {
                    this.currentPage = val;
                    console.log('每页'+val+'条');
                }
            },
            data:function() {
                return {
                    currentPage1: 5,
                    currentPage2: 5,
                    currentPage3: 5,
                    currentPage4: 4
                };
            }
        };
    })
</script>