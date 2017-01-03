<div class="form-group">
    <label class="col-sm-2 control-label"><?php echo e($label); ?></label>
    <div class="col-sm-6">
        <div class="box box-solid box-default no-margin">
            <!-- /.box-header -->
            <div class="box-body">
                <?php echo $value; ?>&nbsp;
            </div><!-- /.box-body -->
        </div>

        <?php echo $__env->make('admin::form.help-block', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    </div>
</div>