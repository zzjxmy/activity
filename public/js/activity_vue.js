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
            form: {},
            curIndex: '',
            dialogType:''
        }
    },
    methods: {
        //请求列表数据
        loadData: function () {
            var self = this;
            if (self.loading == false)self.loading = true;
            $.get(ajax_url, this.formData, function (res) {
                if (res.status === 200) {
                    self.tableData = res.data;
                    self.total = res.total;
                } else {
                    self.$message.error(res.message);
                }
                self.loading = false;
            });
        },

        //列表搜索查询
        onSubmit: function (formData) {
            this.formData = Object.assign(this.formData, formData);
            if (this.formData.page == 1) this.loadData();
            this.formData.page = 1;
        },

        //自定义表单提交
        onSearch: function (formId,url,successUrl) {
            var self = this;
            self.loading = true;
            $.ajax({
                url: url,
                type: 'POST',
                data: $('#'+formId).serialize(),
                success: function( res ) {
                    self.loading = false;
                    if (res.status === 200) {
                        self.$message.success(res.message);
                        setTimeout(function () {
                            if(successUrl && successUrl != ''){
                                self.redirectUrl(successUrl);
                            }else{
                                window.location.reload();
                            }
                        },1500);
                    } else {
                        self.$message.error(res.message);
                    }
                }
            });
        },

        //url跳转
        redirectUrl: function (url){
            window.location.href = url;
        },

        //当前页修改
        currentChange: function (page) {
            this.formData.page = page;
            this.loadData();
        },

        //当前页面显示条数修改
        sizeChange: function (size) {
            this.formData.pageSize = size;
            this.formData.page = 1;
            this.loadData();
        },

        //编辑或添加弹出框
        showDialog: function (dialogType,index, url) {
            var self = this;
            self.curIndex = index;
            self.dialogType = dialogType;
            if(dialogType == 'add'){
                self.form = {};
                self.dialogFormVisible = true;
            }else if(dialogType == 'update'){
                self.fullscreenLoading = true;
                $.get(url, function (res) {
                    self.fullscreenLoading = false;
                    if (res.status === 200) {
                        self.dialogFormVisible = true;
                        self.form = res.data;
                    } else {
                        self.$message.error(res.message);
                    }
                });
            }
        },

        //编辑或添加后保存
        saveDialogData:function(url){
            var self = this;
            var type = 'POST';
            if(self.dialogType == 'update') type = 'PUT';
            self.fullscreenLoading = true;
            $.ajax({
                url: url,
                type: type,
                data: this.form,
                success: function (res) {
                    self.fullscreenLoading = false;
                    if (res.status === 200) {
                        self.$message.success(res.message);
                        self.dialogFormVisible = false;
                        if(self.dialogType == 'update') Vue.set(self.tableData, self.curIndex, res.data);//修改
                        if(self.dialogType == 'add') self.tableData.push(res.data);//添加
                    } else {
                        self.$message.error(res.message);
                    }
                }
            });
        },

        //删除
        deleteConfirm: function (index, row, ajaxDeleteUrl) {
            var self = this;
            this.$confirm('确定删除这条数据?', '提示', {
                confirmButtonText: '确定',
                cancelButtonText: '取消',
                type: 'warning'
            }).then(function () {
                $.ajax({
                    url: ajaxDeleteUrl,
                    type: 'DELETE',
                    success: function (res) {
                        self.fullscreenLoading = false;
                        if (res.status === 200) {
                            self.$message.success(res.message);
                            self.tableData.splice(index, 1);
                            setTimeout(function () {
                                self.loadData();
                            },1500);
                        } else {
                            self.$message.error(res.message);
                        }
                    }
                });
            }).catch(function () {
                self.$message({
                    type: 'info',
                    message: '已取消删除'
                });
            })
        },

    },

    //初始化列表数据
    created: function () {
        is_ajax=='1'?this.loadData():'';
    }
});