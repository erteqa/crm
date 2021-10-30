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
                    <input type="text" name="name" placeholder="<?php echo e(__('User Name')); ?>" class="form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>"   value="<?php echo e($State->name); ?>" required >
                </div>

                <div class="form-group">

                    <label><?php echo e(__('Percent')); ?></label>
                    <input type="number" name="percent" min="1" max="100" placeholder="<?php echo e(__('User Name')); ?>" class="form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>"   value="<?php echo e($State->percent); ?>" required >
                </div>
                <div class="progress progress-striped active">
                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?php echo e($State->percent); ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo e($State->percent); ?>%">
                        <span class="sr-only"><?php echo e($State->percent); ?>% Complete (success)</span>
                    </div>
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
<?php /* C:\dd\crmlaraveltest\resources\views/Crm/State/Update_view.blade.php */ ?>