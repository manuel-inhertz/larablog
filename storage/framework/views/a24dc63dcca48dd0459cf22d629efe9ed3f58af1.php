<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
       <?php echo $__env->make('layouts/sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header bg-dark text-white  d-flex justify-content-between align-items-baseline">
                    <span>Posts</span>
                    <a href="<?php echo e(route('post.create')); ?>" class="btn btn-sm btn-primary">Add Post</a>
                </div>

                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>
                    
                    
                    
                    <div class="row">
                        
                        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-6">
                            <div class="card">
                                <img src="<?php echo e($post->getFeaturedImageUrl()); ?>" class="card-img-top" alt="Image about <?php echo e($post->title); ?>">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo e($post->title); ?></h5>
                                    <p class="card-text"><small class="text-muted">Post by <?php echo e($post->user->name); ?></small></p>
                                    <p class="card-text"><?php echo e($post->getShortContent()); ?></p>
                                    <a href="<?php echo e(route('post.show', $post->alias)); ?>" class="btn btn-sm btn-primary">Read more <i class="fas fa-chevron-right"></i></a>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $post)): ?>
                                        <a href="<?php echo e(route('post.edit', $post->alias)); ?>" class="btn btn-sm btn-success">Edit <i class="far fa-edit"></i></a>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $post)): ?>
                                        <a href="#" class="btn btn-sm btn-danger" data-action="<?php echo e(route('post.delete', $post->alias)); ?>">Delete <i class="fas fa-times"></i></a>
                                    <?php endif; ?>
                                </div>
                            </div> 
                        </div>    
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                       
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Volumes/DATA 128/MEGA/repos/BlocksCMS/resources/views/posts/index.blade.php ENDPATH**/ ?>