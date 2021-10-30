<?php $__env->startSection('title'); ?>
    <?php echo e(__('lang.Add_Article')); ?>

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
                <?php echo e(__('lang.Add_Article')); ?>

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
                    <input type="text" name="title" placeholder="<?php echo e(__('lang.tilte')); ?>" class="form-control"   value="<?php echo e($Article['title']); ?>" required >
                </div>
                <div class="form-group">
                    <label><?php echo e(__('lang.Catrgory')); ?></label>
                    <select class="js-example-basic-single form-control" name="category_id">
                        
                        <?php if(!is_null($Cats)): ?>
                            <?php $__currentLoopData = $Cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option <?php echo e($Article->category_id == $Cat->id?'selected="selected"':''); ?> value="<?php echo e($Cat->id); ?>"><?php echo e($Cat->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="row">
                    <div class="col-xs-12 mb-1"><label
                                for="shortnote"><?php echo e(__('lang.content')); ?></label><br>
                        <textarea required name="content" rows="4"   class="summernote form-control ckeditor"  title="Contents"><?php echo $Article->content; ?></textarea></div>
                </div>
                <select class="js-example-basic-single form-control" name="status">

                    <option <?php echo e($Article->status == 'all'?'selected="selected"':''); ?> value="all"><?php echo e(__('lang.all')); ?></option>
                    <option <?php echo e($Article->status == 'Deprtment_me'?'selected="selected"':''); ?> value="Deprtment_me"><?php echo e(__('lang.Deprtment_me')); ?></option>
                    <option <?php echo e($Article->status == 'none'?'selected="selected"':''); ?> value="none"><?php echo e(__('lang.none')); ?></option>
                </select>
            </div>
            <div class="panel-footer">
               <input type="submit" class="btn btn-primary" value="<?php echo e(__('lang.Send')); ?>">
            </div>
        </div>
    </div>
    </form>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('subject'); ?>
    <?php echo e(__('lang.Subject')); ?>}}
<?php $__env->stopSection(); ?>
<script src="//cdn.ckeditor.com/4.11.3/full/ckeditor.js"></script>
<?php echo $__env->make("layouts.Admin_app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* H:\root\home\eritqaaacademy-001\www\crm\CRMV3\crmlaraveltest\resources\views/Crm/Article/Update_view.blade.php */ ?>