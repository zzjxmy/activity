new Vue({
    el: '#app',
    data: function () {
        return {
            total: 0,
            tableData: [],
            formData: {
                pageSize: 15,
                page: 1
            },
            loading: false,
            fullscreenLoading: false,
            dialogFormVisible: false,
            form: {}
        }
    },
    methods: {
        loadData: function () {
            var self = this;
            if(self.loading == false)self.loading = true;
            $.get(ajax_url,this.formData,function (res) {
                if(res.status === 200) {
                    self.tableData = res.data;
                    self.total = res.total;
                } else {
                    self.$message.error(res.message);
                }
                self.loading = false;
            });
        },
        onSubmit: function (formData) {
            this.formData = Object.assign(this.formData, formData);
            if (this.formData.page == 1) this.loadData();
            this.formData.page = 1;
        },
        currentChange: function (page) {
            this.formData.page = page;
            this.loadData();
        },
        sizeChange: function (size) {
            this.formData.pageSize = size;
            this.formData.page = 1;
            this.loadData();
        },
        //编辑
        handleEdit: function (url) {
            var self = this;
            self.fullscreenLoading = true;
            $.get(url, function (res) {
                self.fullscreenLoading = false;
                if (res.status === 200) {
                    self.dialogFormVisible = true;
                    self.form = res.data;
                    //console.log(res.data);
                } else {
                    self.$message.error(res.message);
                }
            });
        },
        //跳转页面
        redirectUrl: function (url){
            window.location.href = url;
        },
        //编辑后保存
        editSave:function(url){
            var self = this;
            self.fullscreenLoading = true;
            $.get(url, this.form, function (res) {
                self.fullscreenLoading = false;
                if (res.status === 200) {
                    self.$message.error('修改成功');
                } else {
                    self.$message.error('修改失败');
                }
            });
        },
        //删除
        handleDelete: function (index, row) {
            this.tableData.splice(index, 1);
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
    created: function () {
        is_ajax=='1'?this.loadData():'';
    }
});