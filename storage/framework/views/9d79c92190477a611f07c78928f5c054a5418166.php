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
                    <h3><span class="glyphicon glyphicon-envelope"></span> Direct Message</h3>
                    <hr>
                    <ul class="message-list" style="overflow-y: scroll; max-height: 500px;">
                        <?php if(count($messages) != 0): ?>
                            <?php foreach($messages as $message): ?>
                            <li style="margin-bottom: 5px;">
                                <a href="<?php echo e(route('user-conversation', ['id' => $message['id']])); ?>" class="timeline-text message-item">
                                    <div class="row">
                                        <div class="col-xs-6 text-left">
                                            <div class="account-info">
                                                <img style="padding: 0px; " src="<?php echo e(url('avatars/'.$message['avatar'])); ?>" class="img-thumbnail image-info"/>
                                                <div class="identity-info">
                                                    <h4 class="name-info"><?php echo e($message['full_name']); ?> <?php echo ($message['is_admin'])? '<span style="font-size: 45%;" class="label label-primary">Admin</span>' : ''; ?></h4>
                                                    <h5 class="id-info"><?php echo e('@'.$message['username']); ?></h5>
                                                </div>
                                                <div class="message-last">
                                                    <?php echo e($message['message']); ?>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 text-right">
                                            <?php echo e($message['created_at']); ?>

                                        </div>
                                    </div>
                                </a>
                            </li>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="alert alert-warning text-center">You Dont Have Any Message!!!</div>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer-additional'); ?>
    <script>
        $(document).ready(function(){

        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>