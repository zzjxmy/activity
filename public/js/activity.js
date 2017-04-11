$(function(){
    $(".module input[type='checkbox']").on('change',function(){
        if($(this).prop('checked')){
            $('.'+$(this).attr('module-name')).removeClass('hidden');
        }else{
            $('.'+$(this).attr('module-name')).addClass('hidden');
        }
    });
    $("#activity_type").on('change',function(){
        switch ($(this).val()){
            case '1':
                ck(0);
                break;
            case '2':
                ck(1);
                break;
            case '3':
                ck(1);
                break;
        }
    });
    $(".activity_delete_attr").on('click',function(){
        var parent = $(this).parent().parent().parent();
        if(!parent.parent().hasClass('attr-parent')){
            parent.next().remove();
            parent.prev().remove();
            parent.remove();
        }
    });
    $("#add_attr").click(function(){
        $("#activity_attr").append($("#activity_add_attr").html());
        $(".activity_delete_attr").on('click',function(){
            var parent = $(this).parent().parent().parent();
            if(!parent.parent().hasClass('attr-parent')){
                parent.next().remove();
                parent.prev().remove();
                parent.remove();
            }
        });
    });

    function ck(type){
        if(type == 1){
            $('#is_check').attr('checked',false);
        }else{
            $(".is_check").click();
            $('#is_check').attr('checked',true);
        }
        $(".module input[type='checkbox']").each(function(i,k){
            if(type == 1){
                $(this).attr('disabled',true);
                $(this).attr('checked',false);
                $('.'+$(k).attr('module-name')).addClass('hidden');
            }else{
                $(this).attr('disabled',false);
            }
        });
    }

   //表单提交取消
    $("#form_reset").click(function(){
        $("form")[0].reset();
    });

});

Date.prototype.Format = function (fmt) { //author: meizz
    var o = {
        "M+": this.getMonth() + 1, //月份
        "d+": this.getDate(), //日
        "h+": this.getHours(), //小时
        "m+": this.getMinutes(), //分
        "s+": this.getSeconds(), //秒
        "q+": Math.floor((this.getMonth() + 3) / 3), //季度
        "S": this.getMilliseconds() //毫秒
    };
    if (/(y+)/.test(fmt)) fmt = fmt.replace(RegExp.$1, (this.getFullYear() + "").substr(4 - RegExp.$1.length));
    for (var k in o)
        if (new RegExp("(" + k + ")").test(fmt)) fmt = fmt.replace(RegExp.$1, (RegExp.$1.length == 1) ? (o[k]) : (("00" + o[k]).substr(("" + o[k]).length)));
    return fmt;
};

Array.prototype.contains = function (obj) {
    var i = this.length;
    while (i--) {
        if (this[i] === obj) {
            return true;
        }
    }
    return false;
};