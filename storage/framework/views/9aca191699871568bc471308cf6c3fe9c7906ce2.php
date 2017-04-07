<?php $__env->startSection('content'); ?>
    <!-- content -->
    <div id="content" class="app-content" role="main">
        <div class="app-content-body ">
            <div class="bg-light lter b-b wrapper-md">
                <h1 class="m-n font-thin h3"><?php echo e($master_title); ?></h1>
            </div>
            <div class="wrapper-md">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <?php echo e($operate_title); ?>

                    </div>
                    <div class="table-responsive">
                        <table ui-jq="dataTable" ui-type="datatable" ui-config="dataTable" class="table table-striped b-t b-b">
                            <thead>
                            <tr>
                                <th  style="width:10%">ID</th>
                                <th  style="width:18%">角色名</th>
                                <th  style="width:18%">显示名</th>
                                <th  style="width:18%">描述</th>
                                <th  style="width:18%">创建时间</th>
                                <th  style="width:18%">更新时间</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- /content -->
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>