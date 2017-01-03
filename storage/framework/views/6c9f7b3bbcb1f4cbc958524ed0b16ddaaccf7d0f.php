<div class="form-group <?php echo !$errors->has($errorKey) ?: 'has-error'; ?>">

    <label for="<?php echo e($id); ?>" class="col-sm-2 control-label"><?php echo e($label); ?></label>

    <div class="col-sm-6">

        <?php echo $__env->make('admin::form.error', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
            <input type="text" name="<?php echo e($name); ?>" value="<?php echo e(old($column, $value)); ?>" class="form-control <?php echo e($class); ?>"  placeholder="<?php echo e($placeholder); ?>" <?php echo $attributes; ?> />
        </div>

        <?php echo $__env->make('admin::form.help-block', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    </div>
</div>