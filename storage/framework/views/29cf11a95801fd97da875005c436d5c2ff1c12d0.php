<?php $__env->startSection('title'); ?>
    Broadcast to all user
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php if(Session::has('status')): ?>
        <div class="alert alert-<?php echo e(Session::get('status')); ?>" role="alert">
            <strong><?php echo e(Session::get('title')); ?></strong><br/>
            <h5><?php echo Session::get('message'); ?></h5>
        </div>
    <?php endif; ?>

    <div class="panel panel-default">
        <div class="panel-body">
            <h3> Broadcast Message</h3>
            <hr>
            <form class="form-horizontal" method="POST" action="<?php echo e(route('admin-broadcast-send')); ?>">
                <div class="form-group">
                    <div class="col-sm-12">
                        <textarea class="form-control" name="message" placeholder="write message ..." required="required"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12 text-center">
                        <input type="submit" class="form-control btn-brawijaya" value="Send Message">
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer-additional'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>