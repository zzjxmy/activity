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
        //表单提交
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

        //编辑或添加
        showEditDialog: function (dialogType,index, url) {
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

        redirectUrl: function (url){
            window.location.href = url;
        },

        //编辑或添加后保存
        editSave:function(url){
            var self = this;
            self.fullscreenLoading = true;
            $.ajax({
                url: url,
                type: 'PUT',
                data: this.form,
                success: function (res) {
                    self.fullscreenLoading = false;
                    if (res.status === 200) {
                        self.$message.success(res.message);
                        self.dialogFormVisible = false;
                        Vue.set(self.tableData, self.curIndex, res.data);
                        //self.tableData[self.curIndex] = res.data;
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

        timeChange: function (value) {
            alert(value);
        }
    },
    created: function () {
        is_ajax=='1'?this.loadData():'';
    }
});