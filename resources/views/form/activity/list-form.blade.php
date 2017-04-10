<script type="text/x-template" id="tableSearch">
    <el-form :inline="true" :model="formSearch" class="demo-form-inline">
        <el-form-item label="">
            <el-input v-model="formSearch.site_name" placeholder="活动名称"></el-input>
        </el-form-item>
        <el-form-item label="">
            <el-select v-model="formSearch.type" placeholder="活动类型">
                <el-option label="默认" value="1"></el-option>
                <el-option label="拉新" value="2"></el-option>
                <el-option label="纯展示" value="3"></el-option>
            </el-select>
        </el-form-item>
        <el-form-item label="">
            <el-select v-model="formSearch.status" placeholder="需要审核">
                <el-option label="是" value="1"></el-option>
                <el-option label="否" value="2"></el-option>
            </el-select>
        </el-form-item>
        <el-form-item label="">
            <el-date-picker
                    v-model="formSearch.time"
                    type="daterange"
                    placeholder="选择活动开放日期范围" format="yyyy/MM/dd">
            </el-date-picker>
        </el-form-item>
        <el-form-item label="">
            <el-date-picker
                    v-model="formSearch.create_time"
                    type="daterange"
                    placeholder="选择活动创建时间范围" format="yyyy/MM/dd">
            </el-date-picker>
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
                formSearch:{
                    'site_name':'',
                    'type':'',
                    'status':'',
                    'time':'',
                    'create_time':''
                }
            }
        },
        methods: {
            onSearch: function () {
                var data = Object.assign({},this.formSearch);
                if(data.create_time) {
                    data.create_time = data.create_time.map(function (v) {
                        return v.Format('yyyy/MM/dd');
                    });
                }
                if(data.time) {
                    data.time = data.time.map(function (v) {
                        return v.Format('yyyy/MM/dd');
                    });
                }
                this.$emit('submit',data);
            }
        }
    })
</script>