<?php $__env->startSection('title'); ?>
    <?php echo e(__('lang.Add_Part')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <style>
        <?php if(app()->getLocale()=='ar'): ?>
        form{
            text-align: right;
        }
        input{
            text-align: right;
        }
        textarea{
            text-align: right;
        }
        <?php endif; ?>
    </style>
    <form method="post">
        <?php echo e(csrf_field()); ?>

        <div class="col-lg-10">
            <a class="btn btn-primary" style="margin-bottom: 10px"
               href="<?php echo e(route('Part.Index',['id'=>$Lessonid])); ?>"><?php echo e(__('lang.Parts_View')); ?></a>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <?php echo e(__('lang.Add_Part')); ?>

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
                        <label><?php echo e(__('lang.num')); ?></label>
                        <input type="number" name="num" placeholder="<?php echo e(__('lang.num')); ?>" class="form-control<?php echo e($errors->has('num') ? ' is-invalid' : ''); ?>"   value="<?php echo e($Part->num); ?>" required >
                    </div>

                    <div class="form-group">
                        <label><?php echo e(__('lang.name')); ?></label>
                        <input type="text" name="name" placeholder="<?php echo e(__('lang.name')); ?>" class="form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>"   value="<?php echo e($Part->name); ?>"  >
                    </div>

                    <div class="form-group">
                        <label><?php echo e(__('lang.time')); ?></label>
                        <input type="text" name="time" placeholder="<?php echo e(__('lang.time')); ?>" class="form-control<?php echo e($errors->has('time') ? ' is-invalid' : ''); ?>"   value="<?php echo e($Part->time); ?>"  >
                    </div>

                    <div class="form-group">
                        <label><?php echo e(__('lang.link')); ?></label>
                        <input type="text" name="link" placeholder="<?php echo e(__('lang.link')); ?>" class="form-control<?php echo e($errors->has('link') ? ' is-invalid' : ''); ?>"   value="<?php echo e($Part->link); ?>"  required>
                    </div>

                    <div class="form-group">
                        <label><?php echo e(__('lang.date')); ?></label>
                        <input type="date" name="date" placeholder="<?php echo e(__('lang.date')); ?>" class="form-control<?php echo e($errors->has('date') ? ' is-invalid' : ''); ?>"   value="<?php echo e($Part->date); ?>" required >
                    </div>

                </div>
                <div class="panel-footer">
                    <input type="submit" class="btn btn-primary" value="<?php echo e(__('lang.Save')); ?>">
                </div>
            </div>
        </div>
    </form>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('subject'); ?>
    <?php echo e(__('lang.Subject')); ?>

<?php $__env->stopSection(); ?>
<script src="//cdn.ckeditor.com/4.11.3/full/ckeditor.js"></script>
<?php echo $__env->make("layouts.Admin_app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* H:\root\home\eritqaaacademy-001\www\crm\CRMV3\crmlaraveltest\resources\views/Academy/Part/Update_view.blade.php */ ?>