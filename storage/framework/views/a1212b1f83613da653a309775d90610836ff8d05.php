<?php if(Session::has('success')): ?>
    <?php $success = Session::get('success');?>
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i><?php echo e($success->get('title')[0]); ?></h4>
        <p><?php echo e($success->get('message')[0]); ?></p>
    </div>
<?php endif; ?>