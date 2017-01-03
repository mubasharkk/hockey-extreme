<div class="box <?php echo join($class, ' '); ?>">
    <div class="box-header with-border">
        <h3 class="box-title"><?php echo e($title); ?></h3>
        <div class="box-tools pull-right">
            <?php $__currentLoopData = $tools; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tool): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <?php echo $tool; ?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        </div><!-- /.box-tools -->
    </div><!-- /.box-header -->
    <div class="box-body" style="display: block;">
        <?php echo $content; ?>

    </div><!-- /.box-body -->
</div>