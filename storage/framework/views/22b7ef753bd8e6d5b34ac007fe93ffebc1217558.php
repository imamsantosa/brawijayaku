<?php $__env->startSection('title'); ?>
    User Lists
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
                    <h3>User List</h3>
                    <hr>
                    <div class="lists-user" style="overflow-y: scroll; max-height: 500px;">
                        <?php foreach($users as $user): ?>
                            <div style="margin-bottom: 12px;" class="row">
                                <div class="col-xs-9">
                                    <div class="timeline-text">
                                        <div class="account-info">
                                            <img src="<?php echo e(url('/avatars/'.$user->avatar)); ?>" class="img-thumbnail image-info"/>
                                            <div class="identity-info">
                                                <a href="<?php echo e(route('user-profile', ['username' => $user->username])); ?>" role="button"><h4 class="name-info"><?php echo e($user->full_name); ?> <?php echo ($user->is_admin)? '<span style="font-size: 45%;" class="label label-primary">Admin</span>' : ''; ?></h4></a>
                                                <a href="<?php echo e(route('user-profile', ['username' => $user->username])); ?>" role="button"><h5 class="id-info"><?php echo e('@'.$user->username); ?></h5></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-3" id="btn-action-list">
                                    <?php if(auth()->user()->id !== $user->id): ?>
                                        <a role="button" data-id-user="<?php echo e($user->id); ?>" class="btn btn-primary btn-brawijaya btn-grey btn-block delete-btn"><span class="glyphicon glyphicon-remove"></span> Delete</a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer-additional'); ?>
    <script>
        $(document).ready(function () {
            $('.delete-btn').on('click', function (e) {
                e.preventDefault();
                var element = $(this);
                if(confirm("Are you sure to remove this user?")){
                    $.ajax({
                        method: 'POST',
                        url: "<?php echo e(route('api-delete-user')); ?>",
                        data: "user_id="+element.attr('data-id-user')
                    }).done(function (msg) {
                        var res = msg;
                        if(!res.error){
                            element.closest('.row').remove();
                        }
                    })
                }
            })
        })
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>