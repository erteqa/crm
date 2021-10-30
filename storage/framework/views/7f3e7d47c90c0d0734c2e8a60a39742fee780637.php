<?php $__env->startSection('title'); ?>
    <?php echo e(__('lang.Add_Alert')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <form method="post">
    <div class="col-lg-10">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <?php echo e(__('lang.Add_Alert')); ?>

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
                   <input type="text" name="name" placeholder="<?php echo e(__('lang.Name')); ?>" class="form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>"   value="<?php echo e(old('name')); ?>" required >
               </div>
                <div class="form-group">

                    <label><?php echo e(__('lang.Time')); ?></label>
                    <input type="datetime-local" name="timebefore" class="form-control" placeholder="<?php echo e(__('lang.Time')); ?>" id="game-date-time-text"  required>
                </div>
                <div class="form-group">

                    <label><?php echo e(__('lang.Descrption')); ?></label>
                    <input type="text" name="description" placeholder="<?php echo e(__('lang.Description')); ?>" class="form-control<?php echo e($errors->has('description') ? ' is-invalid' : ''); ?>"   value="<?php echo e(old('timebefore')); ?>" required >
                </div>
                <div class="form-group">
                    <label><?php echo e(__('lang.Employee_Name')); ?></label>
                    <select class="js-example-basic-single form-control" name="user_id">
                        
                        <?php if(!is_null($users)): ?>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(!is_null($user)): ?>
                                <option  value="<?php echo e($user->id); ?>" ><?php echo e($user->name); ?></option>
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
<?php /* C:\dd\crmlaraveltest\resources\views/Crm/Alert/Add_view.blade.php */ ?>