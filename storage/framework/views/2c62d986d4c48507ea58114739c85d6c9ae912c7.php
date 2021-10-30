
<?php $__env->startSection('title'); ?>
    <?php echo e(__('lang.Task_Update')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <form method="post">
    <div class="col-lg-4">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <?php echo e(__('lang.Task_Update')); ?>

            </div>
            <div class="panel-body">

                <div class="form-group">
                    <?php echo e(csrf_field()); ?>

                    <label><?php echo e(__('lang.Name')); ?></label>
                    <input type="text" name="name" placeholder="<?php echo e(__('lang.Name')); ?>" class="form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>"   value="<?php echo e($Task->name); ?>" required >
                </div>
                <div class="form-group">
                    <label><?php echo e(__('lang.Employee')); ?></label>
                    <select class="js-example-basic-single form-control" name="user_id" required>

                        <?php if(!is_null($employees)): ?>
                            <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(!is_null($employee->Task)): ?>
                                    <option <?php echo e($employee->id==$Task->User->id?'selected="selected"':''); ?>   value="<?php echo e($employee->id); ?>" ><?php echo e($employee->name); ?></option>
                                <?php else: ?>
                                    <option    value="<?php echo e($employee->id); ?>" ><?php echo e($employee->name); ?></option>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label><?php echo e(__('lang.task_type')); ?></label>
                    <select class="js-example-basic-single form-control" name="task_type_id" required>

                        <?php if(!is_null($Tasktypes)): ?>
                            <?php $__currentLoopData = $Tasktypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Ta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option <?php echo e($Ta->id==$Task->task_type_id?'selected="selected"':''); ?>   value="<?php echo e($Ta->id); ?>" ><?php echo e($Ta->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label><?php echo e(__('lang.Customers_Name')); ?></label>
                    <select class="js-example-basic-single form-control" name="customer_id" required>

                        <?php if(!is_null($customers)): ?>
                            <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(!is_null($customer->Task) and !is_null($Task->Customer)): ?>
                                    <option <?php echo e($customer->id==$Task->Customer->id?'selected="selected"':''); ?>   value="<?php echo e($customer->id); ?>" ><?php echo e($customer->name); ?></option>
                                <?php else: ?>
                                    <option    value="<?php echo e($customer->id); ?>" ><?php echo e($customer->name); ?></option>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label><?php echo e(__('lang.State')); ?></label>
                    <select class="js-example-basic-single form-control" name="state_id" required>

                        <?php if(!is_null($status)): ?>
                            <?php $__currentLoopData = $status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(!is_null($state->Task)): ?>
                                    <option <?php echo e($state->id==$Task->State->id?'selected="selected"':''); ?>   value="<?php echo e($state->id); ?>" ><?php echo e($state->name); ?></option>
                                <?php else: ?>
                                    <option    value="<?php echo e($state->id); ?>" ><?php echo e($state->name); ?></option>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label><?php echo e(__('lang.Duration')); ?></label>
                    <input type="text" name="duration" placeholder="<?php echo e(__('lang.Duration')); ?>" class="form-control<?php echo e($errors->has('duration') ? ' is-invalid' : ''); ?>"   value="<?php echo e($Task->duration); ?>" >
                </div>
                <div class="form-group">
                    <label><?php echo e(__('lang.Description')); ?></label>
                    <input type="text" name="description" placeholder="<?php echo e(__('lang.Description')); ?>" class="form-control<?php echo e($errors->has('description') ? ' is-invalid' : ''); ?>"   value="<?php echo e($Task->description); ?>" >
                </div>


            </div>
            <div class="panel-footer">
               <input type="submit" class="btn btn-primary" value="Save">
            </div>
        </div>
    </div>
        <script>
            $(document).ready(function() {
                $('.js-example-basic-single').select2();
            });
        </script>
    </form>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('subject'); ?>
    Subject !!!!!!!!!!!
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.Admin_app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* /home/eritqaaa/public_html/crmold.eritqaa.com.tr/resources/views/Crm/Task/Update_view.blade.php */ ?>