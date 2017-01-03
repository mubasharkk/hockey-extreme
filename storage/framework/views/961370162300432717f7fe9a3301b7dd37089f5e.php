<div class="box">

    <div class="box-header">

        <div class="btn-group">
            <a class="btn btn-primary menu-tools" data-action="expand-all"><i class="fa fa-plus-square-o"></i>&nbsp;<?php echo e(trans('admin::lang.expand')); ?></a>
            <a class="btn btn-primary menu-tools" data-action="collapse-all"><i class="fa fa-minus-square-o"></i>&nbsp;<?php echo e(trans('admin::lang.collapse')); ?></a>
        </div>

        <div class="btn-group">
            <a class="btn btn-info <?php echo e($id); ?>-save"><i class="fa fa-save"></i>&nbsp;<?php echo e(trans('admin::lang.save')); ?></a>
        </div>

        <div class="btn-group">
            <a class="btn btn-warning <?php echo e($id); ?>-refresh"><i class="fa fa-refresh"></i>&nbsp;<?php echo e(trans('admin::lang.refresh')); ?></a>
        </div>

    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive no-padding">
        <div class="dd" id="<?php echo e($id); ?>">
            <ol class="dd-list">
                <?php echo $__env->renderEach('admin::menu.branch', $items, 'branch'); ?>
            </ol>
        </div>
    </div>
    <!-- /.box-body -->
</div>