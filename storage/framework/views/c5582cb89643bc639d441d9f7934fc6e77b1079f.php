<?php $__env->startSection('title'); ?>
    <?php echo e(__('lang.Employee_Update')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <form method="post">
        <div class="col-lg-4">
            <a class="btn btn-info" href="<?php echo e(route('Employee.Reset',['id'=>$employee->id])); ?>"> <?php echo e(__('lang.Reset_Passsword')); ?></a>

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <?php echo e(__('lang.Employee_Update')); ?>

                </div>
                <div class="flash-message">
                    <?php $__currentLoopData = ['danger', 'warning', 'success', 'info']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(Session::has('alert-' . $msg)): ?>

                            <p class="alert alert-<?php echo e($msg); ?>"><?php echo e(Session::get('alert-' . $msg)); ?> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="panel-body">

                    <div class="form-group">
                        <?php echo e(csrf_field()); ?>

                        <label><?php echo e(__('lang.Name')); ?></label>
                        <input type="text" name="name" placeholder="<?php echo e(__('lang.Name')); ?>"
                               class="form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>"
                               value="<?php echo e($employee->name); ?>" required>
                    </div>
                    <div class="form-group">
                        <label><?php echo e(__('lang.Phone')); ?></label>
                        <input type="tel" name="phone"
                               class="form-control<?php echo e($errors->has('phone') ? ' is-invalid' : ''); ?>"
                               value="<?php echo e($employee->phone); ?>"
                               placeholder="<?php echo e(__('lang.Phone')); ?>">
                    </div>
                    <div class="form-group">
                        <label><?php echo e(__('lang.Email')); ?></label>
                        <input type="email" name="email"
                               class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>"
                               value="<?php echo e($employee->email); ?>"
                               placeholder="<?php echo e(__('lang.Email')); ?>">
                    </div>


                    <div class="form-group">
                        <label><?php echo e(__('lang.Depatment_Name')); ?></label>
                        <select class="js-example-basic-single form-control" name="department_id">
                            
                            <?php if(!is_null($departments)): ?>
                                <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(!is_null($employee->Department)): ?>
                                        <option <?php echo e($department->id==$employee->Department->id?'selected="selected"':''); ?> value="<?php echo e($department->id); ?>"><?php echo e($department->name); ?></option>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label><?php echo e(__('lang.Division_Name')); ?></label>
                        <select class="js-example-basic-single form-control" name="division_id">
                            
                            <?php if(!is_null($divisions)): ?>
                                <?php $__currentLoopData = $divisions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $division): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(!is_null($employee->Division)): ?>
                                        <option <?php echo e($division->id==$employee->Division->id?'selected="selected"':''); ?> value="<?php echo e($division->id); ?>"><?php echo e($division->name); ?></option>
                                    <?php else: ?>
                                        <option value="<?php echo e($division->id); ?>"><?php echo e($division->name); ?></option>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label><?php echo e(__('lang.Role')); ?></label>
                        <select class="js-example-basic-single form-control" name="rolename">
                            
                            <?php if(!is_null($roles)): ?>
                                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php echo e($employee->hasRole($role)?'selected="selected"':''); ?> value="<?php echo e($role->name); ?>" ><?php echo e($role->name); ?></option>
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
<?php /* H:\root\home\eritqaaacademy-001\www\crm\CRMV3\crmlaraveltest\resources\views/Crm/Employee/Update_view.blade.php */ ?>