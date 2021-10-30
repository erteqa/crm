<?php $__env->startSection('title'); ?>
    <?php echo e(__('lang.Add_Course')); ?>

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
        <div class="panel panel-primary">
            <div class="panel-heading">
                <?php echo e(__('lang.Add_Course')); ?>

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
                    <label><?php echo e(__('lang.title')); ?></label>
                    <input type="text" name="title" placeholder="<?php echo e(__('lang.title')); ?>" class="form-control<?php echo e($errors->has('title') ? ' is-invalid' : ''); ?>"   value="<?php echo e(old('title')); ?>" required >
                </div>

                <div class="form-group">
                    <label><?php echo e(__('lang.teacher')); ?></label>
                    <input type="text" name="teacher" placeholder="<?php echo e(__('lang.teacher')); ?>" class="form-control<?php echo e($errors->has('teacher') ? ' is-invalid' : ''); ?>"   value="<?php echo e(old('teacher')); ?>"  >
                </div>

                <div class="form-group">
                    <label><?php echo e(__('lang.writer')); ?></label>
                    <input type="text" name="writer" placeholder="<?php echo e(__('lang.writer')); ?>" class="form-control<?php echo e($errors->has('writer') ? ' is-invalid' : ''); ?>"   value="<?php echo e(old('writer')); ?>"  >
                </div>



                <div class="form-group">
                    <label><?php echo e(__('lang.category')); ?></label>
                    <input type="text" name="category" placeholder="<?php echo e(__('lang.category')); ?>" class="form-control<?php echo e($errors->has('category') ? ' is-invalid' : ''); ?>"   value="<?php echo e(old('category')); ?>"  >
                </div>

                <div class="form-group">
                    <label><?php echo e(__('lang.difficulty')); ?></label>
                    <input type="text" name="difficulty" placeholder="<?php echo e(__('lang.difficulty')); ?>" class="form-control<?php echo e($errors->has('difficulty') ? ' is-invalid' : ''); ?>"   value="<?php echo e(old('difficulty')); ?>"  >
                </div>

                <div class="form-group">
                    <label><?php echo e(__('lang.hashtag')); ?></label>
                    <input type="text" name="hashtag" placeholder="<?php echo e(__('lang.hashtag')); ?>" class="form-control<?php echo e($errors->has('hashtag') ? ' is-invalid' : ''); ?>"   value="<?php echo e(old('hashtag')); ?>"   >
                </div>


                <div class="form-group">
                    <label><?php echo e(__('lang.link')); ?></label>
                    <input type="text" name="link" placeholder="<?php echo e(__('lang.link')); ?>" class="form-control<?php echo e($errors->has('link') ? ' is-invalid' : ''); ?>"   value="<?php echo e(old('link')); ?>"  >
                </div>


                <div class="form-group">
                    <label><?php echo e(__('lang.date')); ?></label>
                    <input type="date" name="date" placeholder="<?php echo e(__('lang.date')); ?>" class="form-control<?php echo e($errors->has('date') ? ' is-invalid' : ''); ?>"   value="<?php echo e(old('date')); ?>" required >
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
<?php /* H:\root\home\eritqaaacademy-001\www\crm\CRMV3\crmlaraveltest\resources\views/Academy/Course/Add_view.blade.php */ ?>