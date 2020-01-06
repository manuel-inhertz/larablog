<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Home | <?php echo e(config('app.name', 'Laravel')); ?></title>

        <!-- Scripts -->
        <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">

        <!-- Styles -->
        <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
                <div class="container">
                    <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                        <?php echo e(config('app.name', 'Laravel')); ?>

                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
                        <span class="navbar-toggler-icon"></span>
                    </button>
    
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            <?php if(auth()->guard()->guest()): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                                </li>
                                <?php if(Route::has('register')): ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                                    </li>
                                <?php endif; ?>
                            <?php else: ?>
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                                    </a>
    
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            <?php echo e(__('Logout')); ?>

                                        </a>
    
                                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                            <?php echo csrf_field(); ?>
                                        </form>
                                    </div>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="content p-4">
               <div class="container">
                    <!-- App Header -->
                    <div class="jumbotron text-center">
                        <h1 class="display-4"><?php echo e(config('app.name', 'Laravel')); ?></h1>
                        <p class="lead">This is a simple blogging platform built on semplicity</p>
                        <hr class="my-4">
                        <p>Manage users and content through the Dashboard</p>
                        <a class="btn btn-primary btn-lg" href="<?php echo e(route('admin')); ?>" role="button">Go to Dashboard</a>
                    </div>
                  
                    <div class="heading mb-4">
                        <h2>Recent posts from the platform:</h2>
                    </div>
                    <div class="posts-listing">
                        <div class="row">
                        
                            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-4">
                                <div class="card">
                                    <img src="<?php echo e($post->getFeaturedImageUrl()); ?>" class="card-img-top" alt="Image about <?php echo e($post->title); ?>">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo e($post->title); ?></h5>
                                        <p class="card-text"><small class="text-muted">Post by <?php echo e($post->user->name); ?></small></p>
                                        <p class="card-text"><?php echo e($post->getShortContent()); ?></p>
                                        <a href="/post/<?php echo e($post->alias); ?>" class="btn btn-sm btn-primary">Read more <i class="fas fa-chevron-right"></i></a>
                                    </div>
                                </div> 
                            </div>    
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           
                        </div>

                        <?php echo e($posts->links()); ?>

                    </div>
               </div>
            </div>
        </div>
    </body>
</html>
<?php /**PATH /home/manuel/MEGA/bizen.local/formazione/larablog/resources/views/frontend.blade.php ENDPATH**/ ?>