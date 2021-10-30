<?php $__env->startSection('title'); ?>
    <?php echo e(__('lang.Add_Task')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <form method="post">
    <div class="col-lg-10">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <?php echo e(__('lang.Add_Task')); ?>

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
                   <input type="text" name="name" placeholder="<?php echo e(__('lang.Task_Name')); ?>" class="form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>"   value="<?php echo e(old('name')); ?>" required >
               </div>
                <div class="form-group">
                    <label><?php echo e(__('lang.TaskType_Name')); ?></label>
                    <select class="js-example-basic-single form-control" name="task_type_id">
                        
                        <?php if(!is_null($tasktyps)): ?>
                            <?php $__currentLoopData = $tasktyps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tasktyp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(!is_null($tasktyp)): ?>
                                <option  value="<?php echo e($tasktyp->id); ?>" ><?php echo e($tasktyp->name); ?></option>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label><?php echo e(__('lang.Employee_Name')); ?></label>
                    <select class="js-example-basic-single form-control" name="user_id">
                        <option value="">Empty</option>
                        <?php if(!is_null($employees)): ?>
                            <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(!is_null($employee)): ?>
                                    <option  value="<?php echo e($employee->id); ?>" ><?php echo e($employee->name); ?></option>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label><?php echo e(__('lang.Customers_Name')); ?></label>
                    <select class="js-example-basic-single form-control" name="customer_id">
                        <option value="">Empty</option>

                        <?php if(!is_null($customers)): ?>

                            <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(\App\Http\Controllers\Admin\Customer_cont::permision($customer,'View')): ?>
                                <?php if(!is_null($customer)): ?>
                                    <option  value="<?php echo e($customer->id); ?>" ><?php echo e($customer->name); ?></option>
                                <?php endif; ?>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <?php endif; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label><?php echo e(__('lang.state_Name')); ?></label>
                    <select class="js-example-basic-single form-control" name="state_id">
                        <option value="">Empty</option>
                        <?php if(!is_null($status)): ?>
                            <?php $__currentLoopData = $status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(!is_null($state)): ?>
                                    <option  value="<?php echo e($state->id); ?>" ><?php echo e($state->name); ?></option>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="form-group">

                    <label><?php echo e(__('lang.Duration')); ?></label>
                    <input type="text" name="duration" placeholder="<?php echo e(__('lang.Duration')); ?>" class="form-control<?php echo e($errors->has('duration') ? ' is-invalid' : ''); ?>"   value="<?php echo e(old('duration')); ?>" >
                </div>
                <div class="form-group">
                    <label><?php echo e(__('lang.Description')); ?></label>
                    <input type="text" name="description" placeholder="<?php echo e(__('lang.Description')); ?>" class="form-control<?php echo e($errors->has('description') ? ' is-invalid' : ''); ?>"   value="<?php echo e(old('description')); ?>" >
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
    <?php echo e(__('lang.Subject')); ?>}}
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.Admin_app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* C:\dd\crmlaraveltest\resources\views/Crm/Task/Add_view.blade.php */ ?>