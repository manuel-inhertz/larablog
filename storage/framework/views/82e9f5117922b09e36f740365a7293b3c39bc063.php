<?php $__env->startSection('content'); ?>
  <!--Intro Section-->
  <section class="view intro-2">
      <div class="mask rgba-stylish-strong h-100 d-flex justify-content-center align-items-center">
        <div class="container">
          <div class="row">
            <div class="col-xl-5 col-lg-6 col-md-10 col-sm-12 mx-auto mt-lg-5">

              <!--Form with header-->
              <div class="card">
                <div class="card-body p-0">

                  <!--Header-->
                  <div class="form-header purple-gradient p-2 text-center text-white mb-4">
                    <h3><i class="fas fa-user mt-2 mb-2"></i> Log in:</h3>
                  </div>

                  <!--Form-->
                  <form method="POST" action="<?php echo e(route('login')); ?>">
                      <?php echo csrf_field(); ?>

                      <div class="md-form row">
                          <div class="col-md-8 offset-md-2">
                              <input id="email" placeholder="<?php echo e(__('Email')); ?>" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus>
                              <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                  <span class="invalid-feedback" role="alert">
                                      <strong><?php echo e($message); ?></strong>
                                  </span>
                              <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                          </div>
                      </div>

                      <div class="md-form row">
                          <div class="col-md-8 offset-md-2">
                              <input id="password" placeholder="<?php echo e(__('Password')); ?>" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="current-password">
                              <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                  <span class="invalid-feedback" role="alert">
                                      <strong><?php echo e($message); ?></strong>
                                  </span>
                              <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                          </div>
                      </div>

                      <div class="form-group row">
                          <div class="col-md-8 offset-md-2">
                              <div class="custom-control custom-checkbox">
                                  <input class="custom-control-input" type="checkbox" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>

                                  <label class="custom-control-label" for="remember">
                                      <?php echo e(__('Remember Me')); ?>

                                  </label>
                              </div>
                          </div>
                      </div>

                      <div class="md-form row mb-0">
                          <div class="col-md-8 offset-md-2 text-center">
                              <button type="submit" class="btn btn-primary">
                                  <?php echo e(__('Login')); ?>

                              </button>

                              <?php if(Route::has('password.request')): ?>
                                  <a class="btn btn-link" href="<?php echo e(route('password.request')); ?>">
                                      <?php echo e(__('Forgot Your Password?')); ?>

                                  </a>
                              <?php endif; ?>
                          </div>
                      </div>
                  </form>

                </div>
              </div>
              <!--/Form with header-->

            </div>
          </div>
        </div>
      </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/manuelinhertz/MEGA/repos/larablog/resources/views/auth/login.blade.php ENDPATH**/ ?>