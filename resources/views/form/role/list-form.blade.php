<script type="text/x-template" id="tableSearch">
    <el-form :inline="true" :model="formSearch" class="demo-form-inline">
        <el-form-item label="角色名称">
            <el-input v-model="formSearch.name" placeholder="角色名称"></el-input>
        </el-form-item>
        <el-form-item>
            <el-button type="primary" @click="onSearch()">查询</el-button>
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
            onSearch: function () {
                this.$emit('submit',this.formSearch);
            }
        }
    })
</script>