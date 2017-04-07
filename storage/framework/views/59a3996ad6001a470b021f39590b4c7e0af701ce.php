<?php $__env->startSection('content'); ?>
    <div id="content" class="app-content" role="main">
        <div class="app-content-body ">
            <div class="bg-light lter b-b wrapper-md">
                <h1 class="m-n font-thin h3">活动列表</h1>
            </div>
            <div class="wrapper-md">
                <?php $__env->startSection('form'); ?>
                    <?php echo $__env->make('form.activity.list-form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php $__env->stopSection(); ?>
                <table-search @submit="onSubmit"></table-search>
                <?php echo $__env->make('table.activity.list', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo $__env->make('page.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>