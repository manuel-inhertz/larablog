<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
       <?php echo $__env->make('layouts/sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header bg-dark text-white  d-flex justify-content-between align-items-baseline">
                    <span>Users</span>
                    <a href="<?php echo e(route('post.create')); ?>" class="btn btn-sm btn-primary">Add User</a>
                </div>

                <ul class="list-group">


                   
                    
                </ul>

                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Role</th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                    <tbody>
                     
                       <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       <tr>
                            <th scope="row"><?php echo e($user->id); ?></th>
                            <td><?php echo e($user->name); ?></td>
                            <td><?php echo e($user->getRole()); ?></td>
                            <td class="text-right"><a href="http://" class="btn btn-sm btn-success">Edit</a>
                                <a href="http://" class="btn btn-sm btn-danger">Delete</a></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                    </tbody>
                  </table> 
                
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/manuel/MEGA/bizen.local/formazione/larablog/resources/views/users/index.blade.php ENDPATH**/ ?>