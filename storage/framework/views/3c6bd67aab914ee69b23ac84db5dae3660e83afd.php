<div class="box-group" id="accordion" style="margin-bottom: 20px">
    <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->

    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
    <div class="panel box box-primary" style="margin-bottom: 0px">
        <div class="box-header with-border">
            <h4 class="box-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo e($key); ?>">
                    <?php echo e($item['title']); ?>

                </a>
            </h4>
        </div>
        <div id="collapse<?php echo e($key); ?>" class="panel-collapse collapse <?php echo e($key == 0 ? 'in' : ''); ?>">
            <div class="box-body">
                <?php echo $item['content']; ?>

            </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

</div>
