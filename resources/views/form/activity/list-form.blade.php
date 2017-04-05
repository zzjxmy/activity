<script type="text/x-template" id="tableSearch">
    <el-form :inline="true" :model="formSearch" class="demo-form-inline">
        <el-form-item label="审批人">
            <el-input v-model="formSearch.user" placeholder="审批人"></el-input>
        </el-form-item>
        <el-form-item label="活动区域">
            <el-select v-model="formSearch.region" placeholder="活动区域">
                <el-option label="区域一" value="shanghai"></el-option>
                <el-option label="区域二" value="beijing"></el-option>
            </el-select>
        </el-form-item>
        <el-form-item>
            <el-button type="primary" @click="onSubmit()">查询</el-button>
        </el-form-item>
    </el-form>
</script>
<script>
    Vue.component('table-search',{
        template:'#tableSearch',
        data:function () {
            return {
                formSearch:{}
            }
        },
        methods: {
            onSubmit: function () {
                this.$emit('submit',this.formSearch);
            }
        }
    })
</script>