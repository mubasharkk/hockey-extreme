<div class="box">
    <div class="box-header">
        <h3 class="box-title"></h3>

        <?php if($grid->usePagination() && $grid->usePerPageSelector()): ?>
        <div class="input-group pull-left" style="width: 170px;">
            <span class="input-group-addon"><small><?php echo e(trans('admin::lang.show')); ?></small></span>
            <select class="form-control input-xs per-page" name="per-page">
                <?php echo $grid->perPageOptions(); ?>

            </select>
            <span class="input-group-addon"><small><?php echo e(trans('admin::lang.items')); ?></small></span>
        </div>
        <?php endif; ?>

        <?php echo $grid->renderFilter(); ?>


        <?php if($grid->allowExport()): ?>
        <div class="btn-group pull-right" style="margin-right: 10px">
            <a href="/<?php echo e($grid->exportUrl()); ?>" target="_blank" class="btn btn-sm btn-warning"><i class="fa fa-download"></i>&nbsp;&nbsp;<?php echo e(trans('admin::lang.export')); ?></a>
        </div>
        <?php endif; ?>

        <?php if($grid->allowCreation()): ?>
        <div class="btn-group pull-right" style="margin-right: 10px">
            <a href="/<?php echo e($grid->resource()); ?>/create" class="btn btn-sm btn-success"><i class="fa fa-save"></i>&nbsp;&nbsp;<?php echo e(trans('admin::lang.new')); ?></a>
        </div>
        <?php endif; ?>

    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
            <tr>
                <th><input type="checkbox" class="grid-select-all" /></th>
                <?php $__currentLoopData = $grid->columns(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $column): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <th><?php echo e($column->getLabel()); ?><?php echo $column->sorter(); ?></th>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

                <?php if($grid->isOrderable()): ?>
                    <th><?php echo e(trans('admin::lang.order')); ?></th>
                <?php endif; ?>

                <?php if($grid->allowActions()): ?>
                    <th><?php echo e(trans('admin::lang.action')); ?></th>
                <?php endif; ?>
            </tr>

            <?php $__currentLoopData = $grid->rows(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
            <tr <?php echo $row->getHtmlAttributes(); ?>>
                <td><input type="checkbox" class="grid-item" data-id="<?php echo e($row->id()); ?>" /></td>
                <?php $__currentLoopData = $grid->columnNames; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <td><?php echo $row->column($name); ?></td>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

                <?php if($grid->isOrderable()): ?>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-xs btn-info grid-order-up" data-id="<?php echo e($row->id()); ?>"><i class="fa fa-caret-up fa-fw"></i></button>
                            <button type="button" class="btn btn-xs btn-default grid-order-down" data-id="<?php echo e($row->id()); ?>"><i class="fa fa-caret-down fa-fw"></i></button>
                        </div>
                    </td>
                <?php endif; ?>

                <?php if($grid->allowActions()): ?>
                    <td>
                        <?php echo $row->actions(); ?>

                    </td>
                <?php endif; ?>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        </table>
    </div>
    <div class="box-footer clearfix">
        <input type="checkbox" class="grid-select-all" />&nbsp;&nbsp;&nbsp;
        <?php if($grid->allowBatchDeletion()): ?>
            <a class="btn btn-sm btn-danger batch-delete"><?php echo e(trans('admin::lang.batch_delete')); ?></a>
        <?php endif; ?>

            <a class="btn btn-sm btn-primary grid-refresh"><i class="fa fa-refresh"></i></a>

        <?php echo $grid->paginator(); ?>

    </div>
    <!-- /.box-body -->
</div>