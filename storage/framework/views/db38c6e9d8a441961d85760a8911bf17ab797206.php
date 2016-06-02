<div class="panel panel-default">
    <div class="panel-body">
        <div class="row">
            <?php if(count($data['posts']) !== 0): ?>
            <?php foreach($data['posts'] as $post): ?>
            <div class="col-xs-4 image-item">
                <a role="button" href="<?php echo e(route('user-post-single', ['id' => $post->id])); ?>">
                    <img src="<?php echo e(url('images/'.$post->id.'.jpg')); ?>" class="img-thumbnail image-profile">
                    <div class="description-image-profil">
                        <div class="row text-center" style="margin-top: 20px;">
                            <div class="col-xs-12">
                                <p><?php echo e($post->caption); ?></p>
                            </div>
                            <div class="col-xs-12">
                                <p><span class="glyphicon glyphicon-star"></span> <?php echo e($post->like->count()); ?> <?php echo e(($post->like->count() <= 1)? 'Star' : 'Stars'); ?> </p>
                            </div>
                            <div class="col-xs-12">
                                <p><span class="glyphicon glyphicon-comment"></span> <?php echo e($post->comment->count()); ?> <?php echo e(($post->comment->count() <= 1)? 'Comment' : 'Comments'); ?> </p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <?php endforeach; ?>
            <?php else: ?>
                <div class="col-xs-12">
                    <div class="alert alert-warning text-center">Not yet any post</div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>