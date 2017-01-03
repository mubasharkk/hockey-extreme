<div class="form-inline pull-right">
    <form action="/<?php echo $grid->resource(); ?>" method="get" pjax-container>
        <fieldset>

            <?php $__currentLoopData = $filters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $filter): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <?php echo $filter->render(); ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

            <div class="input-group input-group-sm">
                <div class="input-group-btn">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                </div>
            </div>

        </fieldset>
    </form>
</div>