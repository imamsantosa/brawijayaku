<?php $__env->startSection('title'); ?>
    Upload Image | RailPicture.id
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header-additional'); ?>
    <link rel="stylesheet" type="text/css" href=" <?php echo e(url('assets/lib/datepicker/css/datepicker.css')); ?> ">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php if(Session::has('status')): ?>
        <div class="alert alert-<?php echo e(Session::get('status')); ?> text-center" role="alert">
            <strong><?php echo e(Session::get('title')); ?></strong> <?php echo Session::get('message'); ?>

        </div>
    <?php endif; ?>

    <div class="panel panel-default">
        <div class="panel-body">
            <h2 style="margin-top: -3px"><span class="glyphicon glyphicon-cog"></span> Setting</h2>
            <hr>
            <form class="form-horizontal" style="margin-bottom: 0px;" method="POST" action="<?php echo e(route('user-profile-edit-save')); ?>">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Username :</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Username" name="username" required="required" value="<?php echo e(auth()->user()->username); ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Birthdate :</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="BirthDate" name="birthdate" id="birthdate" value="<?php echo e(auth()->user()->birthdate); ?>" required="required">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Email :</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" placeholder="Email" name="email" value="<?php echo e(auth()->user()->email); ?>" required="required">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Full Name :</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Full Name" name="full_name" value="<?php echo e(auth()->user()->full_name); ?>" required="required">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Status :</label>
                            <div class="col-sm-10">
                                <textarea name="status_message" class="form-control" required="required"><?php echo e(auth()->user()->status_message); ?></textarea>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <a role="button" class="btn btn-primary btn-brawijaya btn-block ch-pass">Change Password</a>
                    </div>
                    <div class="col-md-4">
                        <a role="button" class="btn btn-primary btn-brawijaya btn-block ch-ava">Change Avatar</a>
                    </div>
                    <div class="col-md-4">
                        <input type="submit" class="btn btn-primary btn-brawijaya btn-block" value="Save Change">
                    </div>
                </div>
            </form>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer-additional'); ?>
    <div class="modal fade modal-ch-pass" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog modal-md" style="margin: 190px auto;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Change Password</h4>
                </div>
                <div class="modal-body info-ch-p" style="display: none;">
                    <div class="info-ch-pass-suc">
                    </div>
                </div>
                <form action="" method="POST" class="form-change-password form-horizontal">
                    <div class="modal-body">
                        <div class="info-ch-pass">
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Old Password :</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" placeholder="old password" name="old" required="required">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">New Password :</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" placeholder="new password" name="new1" required="required">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Confirm New Password :</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" placeholder="confirm new password" name="new2" required="required">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary btn-brawijaya submt-btn" value="Change">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade modal-ch-ava" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog modal-md" style="margin: 190px auto;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Change Avatar</h4>
                </div>
                <div class="modal-body info-ch-p" style="display: none;">
                    <div class="info-ch-ava-suc">
                    </div>
                </div>
                <form class="form-horizontal" action="<?php echo e(route('user-avatar-change')); ?>" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="file" name="image" id="image" required="required" >
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <img src="" id="image-preview" class="img-thumbnail" style="display: none;">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary btn-brawijaya submt-btn" value="Change">
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script type="text/javascript" src=" <?php echo e(url('assets/lib/datepicker/js/bootstrap-datepicker.js')); ?> " ></script>
    <script>
        $( document ).ready(function() {
            $('#birthdate').datepicker({
                format: "yyyy-mm-dd"
            }).on('changeDate', function(ev) {
                $('#birthdate').datepicker('hide');
            });

            $('.ch-pass').on('click', function (e) {
                $('.modal-ch-pass').modal('show');
            })

            $('.form-change-password').on('submit', function (e) {
                e.preventDefault();

                $.ajax({
                    method: 'POST',
                    url: "<?php echo e(route('api-change-password')); ?>",
                    data: $(this).serialize(),
                })
                .done(function (msg) {
                    var res = msg;
                    if(!res.error){
                        chPassInfoSuc(res);
                        $('.form-change-password').hide();
                        $('.info-ch-p').show();

                        setTimeout(function () {
                            $('.modal-ch-pass').modal('hide');
                        }, 1000);
                    } else {
                        chPassInfo(res);
                    }
                });

            });

            function chPassInfo(res){
                $('.info-ch-pass').html('<div class="alert alert-'+res.status+'">'+res.message+'</div>');
            }
            function chPassInfoSuc(res){
                $('.info-ch-pass-suc').html('<div class="alert alert-'+res.status+'">'+res.message+'</div>');
            }

            $('.ch-ava').on('click', function(e){
                $('.modal-ch-ava').modal('show');
            })

            function readImage(input) {

                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#image-preview').show();
                        $('#image-preview').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#image").on('change', function(){
                readImage(this);
            });
        });
    </script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>