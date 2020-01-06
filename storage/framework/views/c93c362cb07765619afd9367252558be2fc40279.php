<?php $__env->startSection('content'); ?>
<div class="container">
   <div class="post-header" style="background-image: url(<?php echo e($page->getFeaturedImageUrl()); ?>)">
       <div class="heading">
            <h1 class="text-uppercase"><?php echo e($page->title); ?></h1>
            <p>Published by <?php echo e($page->user->name); ?></p>
       </div>
   </div>
   <div class="post-content py-4">
        <?php echo $page->content; ?>

   </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/manuelinhertz/MEGAsync Downloads/larablog/resources/views/pages/show.blade.php ENDPATH**/ ?>