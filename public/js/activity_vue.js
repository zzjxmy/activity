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
            fullscreenLoading: false,
            dialogFormVisible: false,
            form: {}
        }
    },
    methods: {
        loadData: function () {
            var self = this;
            $.get(ajax_url, this.formData, function (res) {
                if (res.status === 200) {
                    self.tableData = res.data;
                    self.total = res.total;
                } else {
                    self.$message.error(res.message);
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

        //编辑后保存
        editSave:function(url){
            console.log(url, this.form);
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
        }


    },
    created: function () {
        this.loadData();
    }
});