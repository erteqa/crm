<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="flash-message">
            <?php $__currentLoopData = ['danger', 'warning', 'success', 'info']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(Session::has('alert-' . $msg)): ?>

                    <p class="alert alert-<?php echo e($msg); ?>"><?php echo e(Session::get('alert-' . $msg)); ?> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="row justify-content-center">

            <div class="col-md-8">

                <div class="card">

                    <div class="card-header">Customer <?php echo e(__('Login')); ?></div>



                    <div class="card-body">

                        <form method="POST" action="<?php echo e(route('Customer.login')); ?>">

                            <?php echo csrf_field(); ?>



                            <div class="form-group row">

                                <label for="email" class="col-sm-4 col-form-label text-md-right"><?php echo e(__('E-Mail Address')); ?></label>



                                <div class="col-md-6">

                                    <input id="email" type="email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" value="<?php echo e(old('email')); ?>" required autofocus>



                                    <?php if($errors->has('email')): ?>

                                        <span class="invalid-feedback">

                                        <strong><?php echo e($errors->first('email')); ?></strong>

                                    </span>

                                    <?php endif; ?>

                                </div>

                            </div>



                            <div class="form-group row">

                                <label for="password" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Password')); ?></label>



                                <div class="col-md-6">

                                    <input id="password" type="password" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password" required>



                                    <?php if($errors->has('password')): ?>

                                        <span class="invalid-feedback">

                                        <strong><?php echo e($errors->first('password')); ?></strong>

                                    </span>

                                    <?php endif; ?>

                                </div>

                            </div>



                            <div class="form-group row">

                                <div class="col-md-6 offset-md-4">

                                    <div class="checkbox">

                                        <label>

                                            <input type="checkbox" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>> <?php echo e(__('Remember Me')); ?>


                                        </label>

                                    </div>

                                </div>

                            </div>



                            <div class="form-group row mb-0">

                                <div class="col-md-8 offset-md-4">

                                    <button type="submit" class="btn btn-primary">

                                        <?php echo e(__('Login')); ?>


                                    </button>

                                    <a class="btn btn-link" href="<?php echo e(route('password.request')); ?>">

                                        <?php echo e(__('Forgot Your Password?')); ?>


                                    </a>

                                </div>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* /home/eritqaaa/public_html/crmold.eritqaa.com.tr/resources/views/auth/customerLogin.blade.php */ ?>