<?php $__env->startSection('title'); ?>
    <?php echo e(__('lang.Add_Division')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <form method="post">
    <div class="col-lg-10">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <?php echo e(__('lang.Add_Division')); ?>

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
                   <input type="text" name="name" placeholder="<?php echo e(__('lang.Division_Name')); ?>" class="form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>"   value="<?php echo e(old('name')); ?>" required >
               </div>
                <div class="form-group">
                    <label><?php echo e(__('lang.Departments_Name')); ?></label>
                    <select class="js-example-basic-single form-control" name="department_id">
                        
                        <?php if(!is_null($departments)): ?>
                            <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(!is_null($department)): ?>
                                    <?php if(\App\Http\Controllers\Admin\Department_cont::permision($department,'View')): ?>
                                <option  value="<?php echo e($department->id); ?>" ><?php echo e($department->name); ?></option>
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
<?php /* H:\root\home\eritqaaacademy-001\www\crm\CRMV3\crmlaraveltest\resources\views/Crm/Division/Add_view.blade.php */ ?>