<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <aside class="col-md-3 bg-dark py-4">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">Posts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">Pages</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">Users</a>
                </li>
            </ul>
        </aside>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header bg-dark text-white">Dashboard</div>

                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/manuel/MEGA/bizen.local/formazione/larablog/resources/views/home.blade.php ENDPATH**/ ?>