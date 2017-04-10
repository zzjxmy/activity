<?php $__env->startSection('content'); ?>
<!-- content -->
<div id="content" class="app-content" role="main">
    <div class="app-content-body ">


        <div class="bg-light lter b-b wrapper-md">
            <h1 class="m-n font-thin h3">活动新增</h1>
        </div>
        <div class="wrapper-md" ng-controller="FormDemoCtrl">
            <div class="panel panel-default">
                <div class="panel-heading font-bold">
                    内容填写
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" method="post" action="<?php echo e(url('activity')); ?>">
                        <?php echo csrf_field(); ?>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">选择活动</label>
                            <div class="col-sm-10">
                                <select name="activityId" class="form-control m-b">
                                    <?php $__currentLoopData = $activity; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($value['id']); ?>"><?php echo e($value['site_name']); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">活动类型</label>
                            <div class="col-sm-10">
                                <select name="activityType" class="form-control m-b" id="activity_type">
                                    <option value="1">默认</option>
                                    <option value="2">拉新</option>
                                    <option value="3">纯展示</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">活动时间</label>
                            <div class="col-sm-10" ng-controller="DatepickerDemoCtrl">
                                <div class="input-group w-md">
                                    <input name="activityTime" id="from_date" ui-jq="daterangepicker" ui-config="activity_dates" class="form-control w-md" placeholder="活动开放时间" required>
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-default" onclick="$('#from_date').click()">
                                            <i class="glyphicon glyphicon-calendar"></i>
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">需要审核</label>
                            <div class="col-sm-10">
                                <label class="i-switch i-switch-lg bg-info m-t-xs m-r is_check">
                                    <input name="activityStatus" type="checkbox" value="1" id="is_check" checked="checked">
                                    <i></i>
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">优惠券码</label>
                            <div class="col-sm-10">
                                <input name="activityCoupon" ui-jq="tagsinput" ui-config="" class="form-control" style="display: none;" placeholder="优惠券码，可添加多个">
                            </div>
                        </div>
                        <?php echo $__env->make('module.module', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <?php echo $__env->make('module.attr-module',['fields' => []], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo $__env->make('module.attr-add-module', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!-- /content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>