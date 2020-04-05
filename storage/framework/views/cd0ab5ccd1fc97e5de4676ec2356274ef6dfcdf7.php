<?php $__env->startSection('content'); ?>
<div class="container">
   <div class="post-header" style="background-image: url(<?php echo e($post->getFeaturedImageUrl()); ?>)">
       <div class="heading">
            <h1 class="text-uppercase"><?php echo e($post->title); ?></h1>
            <p>Post by <?php echo e($post->user->name); ?></p>
       </div>
   </div>
   <div class="post-content py-4">
        <?php echo $post->getContent(); ?>

   </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/manuelinhertz/MEGA/repos/larablog/resources/views/posts/show.blade.php ENDPATH**/ ?>