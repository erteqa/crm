<?php $__env->startSection('title'); ?>
    <?php echo e(__('lang.Division_Update')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <form method="post">
    <div class="col-lg-4">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <?php echo e(__('lang.Division_Update')); ?>

            </div>
            <div class="panel-body">

                <div class="form-group">
                    <?php echo e(csrf_field()); ?>

                    <label><?php echo e(__('lang.Name')); ?></label>
                    <input type="text" name="name" placeholder="<?php echo e(__('lang.Name')); ?>" class="form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>"   value="<?php echo e($division->name); ?>" required >
                </div>
                <div class="form-group">
                    <label><?php echo e(__('lang.Department_Name')); ?></label>
                    <select class="js-example-basic-single form-control" name="department_id">
                        
                        <?php if(!is_null($departments)): ?>
                            <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(!is_null($division->Department)): ?>
                                <option <?php echo e($department->id==$division->Department->id?'selected="selected"':''); ?>   value="<?php echo e($department->id); ?>" ><?php echo e($department->name); ?></option>
                              <?php else: ?>
                                    <option    value="<?php echo e($department->id); ?>" ><?php echo e($department->name); ?></option>
                                <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </select>
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
<?php /* C:\dd\crmlaraveltest\resources\views/Crm/Division/Update_view.blade.php */ ?>