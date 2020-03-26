<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <?php echo $__env->make('layouts/sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header bg-dark text-white  d-flex justify-content-between align-items-baseline">Dashboard</div>

                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                    <p>Users count: <?php echo e($usersCount); ?></p>
                    <p>Posts count: <?php echo e($postsCount); ?></p>

                    <div class="posts-block py-2">
                        <div class="user-filter">
                            <form action="" method="get" class="form-inline">
                                <div class="form-group mb-2">
                                    <label class="col-form-label mr-2" for="user">Filter posts by user:</label>
                                    <select class="form-control mr-2" name="user" id="user" value=<?php echo e(old('user')); ?>>
                                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary mb-2 btn-sm">Filter</button>
                            </form>
                        </div>
                        <div class="posts-listing mt-3">
                            
                            <div class="row">
                                <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-12">
                                    <div class="card mb-3">
                                        <div class="row no-gutters">
                                            <div class="col-md-4">
                                                <img src="<?php echo e($post->getFeaturedImageUrl()); ?>" class="card-img h-100" alt="Image about <?php echo e($post->title); ?>">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body">
                                                    <h5 class="card-title"><?php echo e($post->title); ?></h5>
                                                    <p class="card-text"><small class="text-muted">Post by <?php echo e($post->user->name); ?></small></p>
                                                    <p class="card-text"><?php echo e($post->getShortContent()); ?></p>
                                                    <a href="/post/<?php echo e($post->alias); ?>" class="btn btn-sm btn-primary">Read more <i class="fas fa-chevron-right"></i></a>
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $post)): ?>
                                                        <a href="<?php echo e(route('post.edit', $post->alias)); ?>" class="btn btn-sm btn-success">Edit <i class="far fa-edit"></i></a>
                                                    <?php endif; ?>
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $post)): ?>
                                                        <a href="#" class="btn btn-sm btn-danger" data-action="<?php echo e(route('post.delete', $post->alias)); ?>">Delete <i class="fas fa-times"></i></a>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
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
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/manuel/MEGA/bizen.local/repos/larablog/resources/views/dashboard.blade.php ENDPATH**/ ?>