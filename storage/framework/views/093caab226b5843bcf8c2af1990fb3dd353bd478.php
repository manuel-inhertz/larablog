<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
       <?php echo $__env->make('layouts/sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header bg-dark text-white  d-flex justify-content-between align-items-baseline">
                    <span>Pages</span>
                    <a href="<?php echo e(route('page.create')); ?>" class="btn btn-sm btn-primary">Add page</a>
                </div>

                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                    <div class="row">
                        
                        <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="row align-items-center">
                                    <div class="col-md-4">
                                        <img src="<?php echo e($page->getFeaturedImageUrl()); ?>" class="img-fluid" alt="Image about <?php echo e($page->title); ?>">
                                    </div>
                                    <div class="col-md-8 card-body">
                                        <h5 class="card-title"><?php echo e($page->title); ?></h5>
                                        <p class="card-text"><small class="text-muted">page by <?php echo e($page->user->name); ?></small></p>
                                        <p class="card-text"><?php echo e($page->getShortContent()); ?></p>
                                        <a href="<?php echo e(route('page.show', $page->alias)); ?>" class="btn btn-sm btn-primary">Read more <i class="fas fa-chevron-right"></i></a>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $page)): ?>
                                            <a href="<?php echo e(route('page.edit', $page->alias)); ?>" class="btn btn-sm btn-success">Edit <i class="far fa-edit"></i></a>
                                        <?php endif; ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $page)): ?>
                                            <a href="#" class="btn btn-sm btn-danger" data-action="<?php echo e(route('page.delete', $page->alias)); ?>">Delete <i class="fas fa-times"></i></a>
                                        <?php endif; ?>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/manuelinhertz/MEGA/repos/larablog/resources/views/pages/index.blade.php ENDPATH**/ ?>