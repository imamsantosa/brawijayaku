<?php $__env->startSection('title'); ?>
    Messages
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php if(Session::has('error')): ?>
        <div class="alert alert-<?php echo e(Session::get('error')); ?>" role="alert">
            <strong><?php echo e(Session::get('title')); ?></strong><br/>
            <h5><?php echo Session::get('message'); ?></h5>
        </div>
    <?php endif; ?>

    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-info text-center"><h4><?php echo "Search Result for <strong>\"".$query."\"</strong>"; ?></h4></div>
                    <hr>
                    <ul class="message-list" >
                        <?php if(count($result) != 0): ?>
                            <?php foreach($result as $r): ?>
                                <li style="margin-bottom: 5px;">
                                    <a href="<?php echo e(route('user-profile', ['username' => $r->username])); ?>" class="timeline-text message-item">
                                        <div class="row">
                                            <div class="col-xs-6 text-left">
                                                <div class="account-info">
                                                    <img style="padding: 0px; " src="<?php echo e(url('avatars/'.$r->avatar)); ?>" class="img-thumbnail image-info"/>
                                                    <div class="identity-info">
                                                        <h4 class="name-info"><?php echo e($r->full_name); ?></h4>
                                                        <h5 class="id-info"><?php echo e('@'.$r->username); ?></h5>
                                                    </div>
                                                    <div class="message-last">
                                                        <?php echo e($r->status_message); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="alert alert-warning text-center">User Not Found!!! Please try again or check your input!!</div>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer-additional'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>