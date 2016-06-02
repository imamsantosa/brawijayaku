<?php $__env->startSection('title'); ?>
    List Report
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
                    <h3><span class="glyphicon glyphicon-exclamation-sign"></span> Report List</h3>
                    <hr>
                    <ul class="message-list" style="overflow-y: scroll; max-height: 500px;">
                        <?php if(count($reports) != 0): ?>
                            <?php foreach($reports as $report): ?>
                                <li style="margin-bottom: 5px;" class="<?php echo e(($report->status === 1)? 'solved' : (($report->status === 0)? 'waiting' : 'reject')); ?>">
                                    <a href="<?php echo e(route('admin-single-report', ['id' => $report->id])); ?>" class="timeline-text message-item">
                                        <div class="row">
                                            <div class="col-xs-6 text-left">
                                                <div class="account-info">
                                                    <img style="padding: 0px; " src="<?php echo e(url('avatars/'.$report->reporter->avatar)); ?>" class="img-thumbnail image-info"/>
                                                    <div class="identity-info">
                                                        <h4 class="name-info"><?php echo e($report->reporter->full_name); ?> <?php echo ($report->reporter->is_admin)? '<span style="font-size: 45%;" class="label label-primary">Admin</span>' : ''; ?></h4>
                                                        <h5 class="id-info"><?php echo e('@'.$report->reporter->username); ?></h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-6 text-right">
                                                <?php echo e($report->created_at()); ?>

                                            </div>
                                        </div>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="alert alert-warning text-center">Reporting not found</div>
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
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>