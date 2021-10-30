
<?php $__env->startSection('title'); ?>
    <?php echo e(__('lang.Employee_Update')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <form method="post">
        <div class="col-lg-4">

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <?php echo e(__('lang.Employee_Update')); ?>

                </div>
                <div class="panel-body">

                    <div class="form-group">
                        <?php echo e(csrf_field()); ?>

                        <label><?php echo e(__('lang.Name')); ?></label>
                        <input type="text" name="name" placeholder="<?php echo e(__('lang.User_Name')); ?>"
                               class="form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>"
                               value="<?php echo e($employee->name); ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label><?php echo e(__('lang.Phone')); ?></label>
                        <input type="tel" name="phone"
                               class="form-control<?php echo e($errors->has('phone') ? ' is-invalid' : ''); ?>"
                               value="<?php echo e($employee->phone); ?>"
                               placeholder="<?php echo e(__('lang.Phone')); ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label><?php echo e(__('lang.Email')); ?></label>
                        <input type="email" name="email"
                               class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>"
                               value="<?php echo e($employee->email); ?>"
                               placeholder="<?php echo e(__('lang.Email')); ?>" readonly>
                    </div>


                    <div class="form-group">
                        <label><?php echo e(__('lang.Department_Name')); ?></label>
                        <input type="text" placeholder="<?php echo e(__('lang.Department_Name')); ?>"
                               class="form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>"
                               value="<?php echo e($employee->Department->name); ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label><?php echo e(__('lang.Division_Name')); ?></label>
                        <input type="text" placeholder="<?php echo e(__('lang.Division_Name')); ?>"
                               class="form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>"
                               value="<?php echo e($employee->Division->name); ?>" readonly>
                    </div>

                </div>

            </div>
            <div class="panel-footer">
                <input type="submit" class="btn btn-primary" value="Save">
            </div>
        </div>
        </div>
        <script>
            $(document).ready(function () {
                $('.js-example-basic-single').select2();
            });
        </script>
    </form>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('subject'); ?>
    Subject !!!!!!!!!!!
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.Admin_app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* /home/eritqaaa/public_html/crmold.eritqaa.com.tr/resources/views/Crm/Employee/View_view.blade.php */ ?>