<div class="form-group">
    <label for="<?php echo e($id); ?>" class="col-sm-2 control-label"><?php echo e($label); ?></label>

    <div class="col-sm-6">
        <input type="text" id="<?php echo e($id); ?>" name="<?php echo e($name); ?>" value="<?php echo e($value); ?>" class="form-control" readonly <?php echo $attributes; ?> />

        <?php echo $__env->make('admin::form.help-block', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    </div>
</div>