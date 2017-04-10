<div class="form-group" id="activity_attr">
    <?php echo $__env->make('module.attr-update-module',['fields' => isset($fields)?$fields:[]], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>
<div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
        <button type="submit" class="btn btn-sm btn-info" id="add_attr" onclick="return false">添加自定义属性</button>
        <button type="submit" class="btn btn-sm btn-primary">提交</button>
    </div>
</div>
<div class="line line-dashed b-b line-lg pull-in dongtai-module"></div>