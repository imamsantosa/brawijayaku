<?php $__env->startSection('title'); ?>
    <?php echo e(auth()->user()->full_name); ?> | RailPicture.id
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
                    <div class="timeline-text">
                        <div class="account-info">
                            <img src="<?php echo e(url('avatars/'.auth()->user()->avatar)); ?>" class="img-thumbnail image-info"/>
                            <div class="identity-info">
                                <h4 class="name-info"><?php echo e(auth()->user()->full_name); ?> <?php echo (auth()->user()->is_admin)? '<span style="font-size: 45%;" class="label label-primary">Admin</span>' : ''; ?></h4>
                                <h5 class="id-info"><?php echo e('@'.auth()->user()->username); ?></h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="timeline-text">
                        <?php echo e(auth()->user()->status_message); ?>

                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 12px">
                <div class="col-md-4 col-xs-4">
                    <a role="button" class="btn btn-primary btn-brawijaya btn-block"><?php echo e($data['post_count']); ?> Posts</a>
                </div>
                <div class="col-md-4 col-xs-4">
                    <a role="button" class="btn btn-primary btn-brawijaya btn-block following-btn"><?php echo e($data['following_count']); ?> Following</a>
                </div>
                <div class="col-md-4 col-xs-4">
                    <a role="button" class="btn btn-primary btn-brawijaya btn-block follower-btn"><?php echo e($data['follower_count']); ?> Follower<?php echo e(($data['follower_count'] >= 2)? 's':''); ?></a>
                </div>
            </div>
        </div>
    </div>

    <?php echo $__env->make('partials.photo_list_profile', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer-additional'); ?>
    <?php echo $__env->make('partials.following_follower_list', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <script>
        $(document).ready(function(){

        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>