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
});