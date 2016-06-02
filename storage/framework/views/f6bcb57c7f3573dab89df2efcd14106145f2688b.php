<?php $__env->startSection('title'); ?>
    Conversations with <?php echo e($user->full_name); ?> | RailPicture.id
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="panel panel-default">
        <div class="panel-body">
            <h3><a href="<?php echo e(route('user-message')); ?>" style="text-decoration: none; color: #333333"><span class="glyphicon glyphicon-chevron-left"></span> back</a> | <span class="glyphicon glyphicon-envelope"></span> Messaging with <?php echo e($user->full_name); ?></h3>
            <hr>
            <div class="message"  style="overflow-y: scroll; max-height: 350px;">
                <?php if(count($messages) != 0): ?>
                    <?php foreach($messages as $message): ?>
                        <?php if($message['sender_id'] != auth()->user()->id): ?>
                            <div class="well" style="max-width: 80%">
                                <div class="message-list">
                                    <div class="account-info">
                                        <div class="identity-info">
                                            <div class="row">
                                                <div class="col-xs-6 text-left">
                                                    <h4 class="name-info" style="margin-bottom: 1%"><a style="color: #333333"> <?php echo e($message['sender_name']); ?> :</a></h4>
                                                </div>
                                                <div class="col-xs-6 text-right">
                                                    <?php echo e($message['created_at']); ?>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="message-content"><?php echo e($message['message']); ?> </div>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="well" style="max-width: 80%; margin-left: 20%;">
                                <div class="message-list">
                                    <div class="account-info">
                                        <div class="identity-info">
                                            <div class="row">
                                                <div class="col-xs-6 text-left">
                                                    <h4 class="name-info" style="margin-bottom: 1%">You : </h4>
                                                </div>
                                                <div class="col-xs-6 text-right">
                                                    <?php echo e($message['created_at']); ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="message-content"><?php echo e($message['message']); ?> </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="alert alert-warning text-center">Message not found. Start Chatting!</div>
                <?php endif; ?>
            </div>
        </div>
        <!--tempat message-->
        <div class="panel-footer">
            <div class="row" style=" margin-top: -8px;">
                <div class="col-md-12">
                    <div class="comment-form">
                        <form action="" method="POST" class="form-horizontal">
                            <div class="form-group" style="margin-bottom: 0px">
                                <div class="col-md-12 col-xs-12">
                                    <input type="text" class="form-control" id="message" name="message" placeholder="write here ..." >
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer-additional'); ?>
    <script type="application/javascript">
        $(document).ready(function () {
            $('.message').scrollTop($('.message')[0].scrollHeight);
        });
        <?php /*$(document).ready(function () {*/ ?>
            <?php /*$("#input_comment").keyup(function (event) {*/ ?>
                <?php /*var message = $("#input_comment").val();*/ ?>

                <?php /*if (event.keyCode == 13) {*/ ?>
                    <?php /*if (message != '') {*/ ?>
                        <?php /*$("#input_comment").val("");*/ ?>
                        <?php /*$.ajax({*/ ?>
                            <?php /*url: "<?php echo e(route('api-send-message')); ?>",*/ ?>
                            <?php /*method: 'post',*/ ?>
                            <?php /*data: "recipient_id=" + "<?php echo e($recipient_id); ?>" + "&message=" + message*/ ?>
                        <?php /*})*/ ?>
                        <?php /*.done(function (msg) {*/ ?>
                            <?php /*if (!msg.error) {*/ ?>
                                <?php /*var ballon = "<div class=\"well\" style=\"max-width: 80%\">";*/ ?>
                                <?php /*ballon += "<div class=\"message-list\">";*/ ?>
                                <?php /*ballon += "<div class=\"account-info\">";*/ ?>
                                <?php /*ballon += "<div class=\"identity-info\">";*/ ?>
                                <?php /*ballon += "<h4 class=\"name-info\" style=\"margin-bottom: 1%\"><a >" + "<?php echo e(auth()->user()->full_name); ?>" + "</a></h4>";*/ ?>
                                <?php /*ballon += "<div><div>";*/ ?>
                                <?php /*ballon += "<div class=\"message-content\">" + message + "</div>";*/ ?>
                                <?php /*ballon += "<div><div>";*/ ?>

                                <?php /*$('.message').append(ballon);*/ ?>
                            <?php /*}*/ ?>
                        <?php /*});*/ ?>
                    <?php /*}*/ ?>
                <?php /*}*/ ?>
            <?php /*});*/ ?>
        <?php /*});*/ ?>
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>