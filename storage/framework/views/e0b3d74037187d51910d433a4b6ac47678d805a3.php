<?php $__env->startSection('title'); ?>
    <?php echo e(__('lang.Update_Group')); ?>

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
                        <input type="text" name="name" placeholder="<?php echo e(__('Name')); ?>"
                               class="form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>"
                               value="<?php echo e($group->name); ?>" required>
                    </div>
                    <div class="form-group">
                        <label><?php echo e(__('Depatment Name')); ?></label>
                        <select class="js-example-basic-single form-control" name="department_id">
                            
                            <?php if(!is_null($Divisions)): ?>
                                <?php $__currentLoopData = $Divisions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Division): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(\App\Http\Controllers\Admin\Division_cont::permision($Division,'View')): ?>
                                    <?php if(!is_null($group->Division)): ?>
                                        <option <?php echo e($Division->id==$group->Division->id?'selected="selected"':''); ?>  value="<?php echo e($Division->id); ?>"><?php echo e($Division->name); ?></option>
                                    <?php else: ?>
                                        <option value="<?php echo e($Division->id); ?>"><?php echo e($Division->name); ?></option>
                                    <?php endif; ?>
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
<?php /* H:\root\home\eritqaaacademy-001\www\crm\CRMV3\crmlaraveltest\resources\views/Crm/Group/Update_view.blade.php */ ?>