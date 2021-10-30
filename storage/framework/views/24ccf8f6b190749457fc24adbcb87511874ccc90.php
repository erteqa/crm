<?php $__env->startSection('title'); ?>
    <?php echo e(__('Customer Update')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <form method="post">
        <div class="col-lg-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <?php echo e(__('Customer Update')); ?>

                </div>
                <div class="panel-body">

                    <div class="form-group">
                        <?php echo e(csrf_field()); ?>

                        <label><?php echo e(__('Name')); ?></label>
                        <input type="text" name="name" placeholder="<?php echo e(__('User Name')); ?>"
                               class="form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>"
                               value="<?php echo e($employee->name); ?>" required>
                    </div>
                    <div class="form-group">
                        <label><?php echo e(__('Phone')); ?></label>
                        <input type="tel" name="phone"
                               class="form-control<?php echo e($errors->has('phone') ? ' is-invalid' : ''); ?>"
                               value="<?php echo e($employee->phone); ?>"
                               placeholder="<?php echo e(__('Phone')); ?>">
                    </div>
                    <div class="form-group">
                        <label><?php echo e(__('Email')); ?></label>
                        <input type="email" name="email"
                               class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>"
                               value="<?php echo e($employee->email); ?>"
                               placeholder="<?php echo e(__('Email')); ?>">
                    </div>


                    <div class="form-group">
                        <label><?php echo e(__('Depatment Name')); ?></label>
                        <select class="js-example-basic-single form-control" name="department_id">
                            <option value="">Empty</option>
                            <?php if(!is_null($departments)): ?>
                                <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php echo e($department->id==$employee->Department->id?'selected="selected"':''); ?> value="<?php echo e($department->id); ?>"><?php echo e($department->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label><?php echo e(__('Division Name')); ?></label>
                        <select class="js-example-basic-single form-control" name="division_id">
                            <option value="">Empty</option>
                            <?php if(!is_null($divisions)): ?>
                                <?php $__currentLoopData = $divisions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $division): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option   <?php echo e($division->id==$employee->Division->id?'selected="selected"':''); ?> value="<?php echo e($division->id); ?>"><?php echo e($division->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label><?php echo e(__('Division Name')); ?></label>
                        <select class="js-example-basic-single form-control" name="role_id">
                            <option value="">Empty</option>
                            <?php if(!is_null($roles)): ?>
                                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php echo e($role->id==$employee->Role->id?'selected="selected"':''); ?> value="<?php echo e($role->id); ?>"><?php echo e($role->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </select>
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
<?php /* C:\xampp\htdocs\crmlaravel\resources\views/Crm/Employee/Update_view.blade.php */ ?>