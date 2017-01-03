<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title"><?php echo e($form->title()); ?></h3>

        <div class="box-tools">
            <?php if($form->allowDeletion()): ?>
            <div class="btn-group pull-right">
                <a href="javascript:void(0);" class="btn btn-sm btn-warning item_delete" data-id="<?php echo e($id); ?>"><i class="fa fa-trash"></i>&nbsp;<?php echo e(trans('admin::lang.delete')); ?></a>
            </div>
            <?php endif; ?>

            <div class="btn-group pull-right" style="margin-right: 10px">
                <a href="<?php echo e($resource); ?>" class="btn btn-sm btn-default"><i class="fa fa-list"></i>&nbsp;<?php echo e(trans('admin::lang.list')); ?></a>
            </div>
        </div>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <?php echo $form->open(['class' => "form-horizontal"]); ?>

        <div class="box-body">

            <?php $__currentLoopData = $form->fields(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <?php echo $field->render(); ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
            <div class="col-sm-2">

            </div>
            <div class="col-sm-6">

                <div class="btn-group pull-right">
                <?php echo $form->submit(); ?>

                </div>

                <div class="btn-group pull-left">
                    <input type="reset" class="btn btn-warning" value="<?php echo e(trans('admin::lang.reset')); ?>"/>
                </div>

            </div>

        </div>
        <!-- /.box-footer -->
    <?php echo $form->close(); ?>

</div>

