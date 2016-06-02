<!DOCTYPE html>
<html>
<head>
    <title><?php echo $__env->yieldContent('title'); ?> | Brawijayaku</title>
    <link rel="stylesheet" href="<?php echo e(url('assets/css/bootstrap.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('assets/css/style.css')); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <?php echo $__env->yieldContent('header-additional'); ?>
</head>
<body>
<?php echo $__env->make('partials.header_user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="container">
    <div class="row" style="margin-top: 80px">
        <div class="col-md-offset-2 col-md-8">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo e(url('assets/js/jquery-1.12.3.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(url('assets/js/bootstrap.min.js')); ?>"></script>
<?php echo $__env->yieldContent('footer-additional'); ?>
</body>
</html>