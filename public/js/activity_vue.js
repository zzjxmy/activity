new Vue({
    el:'#app',
    data:function () {
        return {
            total:0,
            tableData:[],
            formData: {
                pageSize:15,
                currentPage:1
            },
            loading: false
        }
    },
    methods: {
        loadData:function(){
            var self = this;
            if(self.loading == false)self.loading = true;
            $.get(ajax_url,this.formData,function (res) {
                if(res.status === 200) {
                    self.tableData = res.data;
                    self.total = res.total;
                }else{
                    self.$message.error(res.message);
                }
                self.loading = false;
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
        },
        deleteConfirm:function(index,row,ajaxDeleteUrl) {
            var self = this;
            this.$confirm('确定删除这条数据?', '提示', {
                confirmButtonText: '确定',
                cancelButtonText: '取消',
                type: 'warning'
            }).then(function(){
                self.$message({
                    type: 'success',
                    message: '删除成功!'
                });
            }).catch(function() {
                self.$message({
                    type: 'info',
                    message: '已取消删除'
                });
            })
        },
        timeChange:function(value){
            alert(value);
        }
    },
    created:function () {
        this.loadData();
    }
});