@section('vue')
    <style>
        .demo-table-expand {
            font-size: 0;
        }
        .demo-table-expand label {
            width: 90px;
            color: #99a9bf;
        }
        .demo-table-expand .el-form-item {
            margin-right: 0;
            margin-bottom: 0;
            width: 50%;
        }
    </style>
    <script>
        new Vue({
            el:'#app',
            data:function () {
                return {
                    total:0,
                    tableData:[],
                    formData: {
                        pageSize:15,
                        currentPage:1
                    }
                }
            },
            methods: {
                loadData:function(){
                    var self = this;
                    $.get('{{isset($searchPath)?$searchPath:Request::url()}}',this.formData,function (res) {
                        if(res.status === 200) {
                            self.tableData = res.data;
                            self.total = res.total;
                        }else{
                            self.$message.error(res.message);
                        }
                    });
                },
                onSubmit:function (formData) {
                    this.formData = Object.assign(this.formData, formData);
                    if(this.formData.currentPage == 1) this.loadData();
                    this.formData.currentPage = 1;
                },
                currentChange: function (page) {
                    this.formData.currentPage = page;
                    this.loadData();
                },
                sizeChange:function (size) {
                    this.formData.pageSize = size;
                    this.formData.currentPage = 1;
                    this.loadData();
                },
                handleEdit: function (index,id) {
                    this.tableData[index].name ='lllllll';
                },
                handleDelete: function (index,row) {
                    this.tableData.splice(index,1);
                    this.loadData();
                }
            },
            created:function () {
                this.loadData();
            }
        });
    </script>
@endsection