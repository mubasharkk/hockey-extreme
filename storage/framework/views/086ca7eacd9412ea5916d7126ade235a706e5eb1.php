<?php if(!isset($branch['children'])): ?>
    <li class="dd-item" data-id="<?php echo e($branch['id']); ?>">
        <div class="dd-handle">
            <strong><?php echo e($branch['title']); ?></strong>&nbsp;&nbsp;&nbsp;
            <a href="<?php echo e(admin_url($branch['uri'])); ?>" class="dd-nodrag"><?php echo e(admin_url($branch['uri'])); ?></a>
            <span class="pull-right action dd-nodrag" data-field-name="_edit">
                <a href="/<?php echo e($path); ?>/<?php echo e($branch['id']); ?>/edit"><i class="fa fa-edit"></i></a>
                <a href="javascript:void(0);" data-id="<?php echo e($branch['id']); ?>" class="_delete"><i class="fa fa-trash"></i></a>
            </span>
        </div>
    </li>
<?php else: ?>
    <li class="dd-item" data-id="<?php echo e($branch['id']); ?>">
        <div class="dd-handle">
            <strong><?php echo e($branch['title']); ?></strong>
            <span class="pull-right action dd-nodrag" data-field-name="_edit">
                <a href="/<?php echo e($path); ?>/<?php echo e($branch['id']); ?>/edit"><i class="fa fa-edit"></i></a>
                <a href="javascript:void(0);" data-id="<?php echo e($branch['id']); ?>" class="_delete"><i class="fa fa-trash"></i></a>
            </span>
        </div>
        <ol class="dd-list">
            <?php $__currentLoopData = $branch['children']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $branch): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <?php echo $__env->make('admin::menu.branch', $branch, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        </ol>
    </li>
<?php endif; ?>