$(function(){
    $(".module input[type='checkbox']").on('change',function(){
        if($(this).prop('checked')){
            $('.'+$(this).attr('module-name')).removeClass('hidden');
        }else{
            $('.'+$(this).attr('module-name')).addClass('hidden');
        }
    });
});