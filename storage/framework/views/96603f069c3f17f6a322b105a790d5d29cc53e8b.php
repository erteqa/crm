<?php $__env->startSection('title'); ?>
    <?php echo e(__('lang.Task_Update')); ?>

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
        <?php endif; ?>
    </style>
    <form method="post">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="flash-message">
                <?php $__currentLoopData = ['danger', 'warning', 'success', 'info']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(Session::has('alert-' . $msg)): ?>

                        <p class="alert alert-<?php echo e($msg); ?>"><?php echo e(Session::get('alert-' . $msg)); ?> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="panel-heading">
                <?php echo e(__('lang.Task_Update')); ?>

            </div>
            <div class="panel-body" >
                <div class="form-group">
                    <?php echo e(csrf_field()); ?>

                    <label><?php echo e(__('lang.Name')); ?></label>
                    <input type="text"  readonly class="form-control"   value="<?php echo e($Task->name); ?>"  >
                </div>
                <div class="form-group">

                    <label><?php echo e(__('lang.TaskType')); ?></label>
                    <input type="text" readonly class="form-control"   value="<?php echo e(is_null( $Task->TaskType)?'':$Task->TaskType->name); ?>"  >
                </div>


                <div class="form-group">
                    <label><?php echo e(__('lang.Employee')); ?></label>
                    <input type="text" readonly class="form-control"   value="<?php echo e(is_null( $Task->User->name)?'':$Task->User->name); ?>"  >
                </div>

                <div class="form-group">
                    <label><?php echo e(__('lang.Customer')); ?></label>
                    <input type="text" readonly class="form-control"   value="<?php echo e(is_null($Task->Customer)?'':$Task->Customer->name); ?>"  >
                </div>

                <div class="form-group">
                    <label><?php echo e(__('lang.State')); ?></label>
                    <input type="text"  readonly class="form-control"   value="<?php echo e(is_null( $Task->State)?'':$Task->State->name); ?>"  >
                    <div class="progress progress-striped active">
                        <div class="progress-bar <?php echo e(\App\Http\Controllers\Style_cont::progress(is_null($Task->State)?'':$Task->State->percent)); ?>" role="progressbar" aria-valuenow="<?php echo e(is_null($Task->State)?'':$Task->State->percent); ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo e($Task->State->percent); ?>%">
                            <span class="sr-only"><?php echo e(is_null($Task->State)?'':$Task->State->percent); ?> % Complete (warning)</span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label><?php echo e(__('lang.Chang_State_to')); ?></label>
                    <input type="text" readonly class="form-control"   value="<?php echo e(is_null($Task->State->name)?'':$Task->State->name); ?>">
                </div>
                <div class="form-group">
                    <label><?php echo e(__('lang.Duration')); ?></label>
                    <input type="text"  readonly class="form-control"   value="<?php echo e($Task->duration); ?>"  >
                </div>

                <div class="form-group">
                    <label><?php echo e(__('lang.Description')); ?></label>
                    <input type="text"  readonly class="form-control"   value="<?php echo e($Task->description); ?>"  >
                </div>

                <div class="form-group">
                    <label><?php echo e(__('lang.Memo_User')); ?></label>
                    <input type="text"  readonly name ="memouser"  class="form-control"   value="<?php echo e($Task->memo_user); ?>"  >
                </div>

                <div class="form-group">
                    <label><?php echo e(__('lang.Memo_Customer')); ?></label>
                    <input type="text" name ="memo_customer"  class="form-control"   value="<?php echo e($Task->memo_customer); ?>" required >
                </div>



            </div>
            <div class="panel-footer">
               <input type="submit" class="btn btn-primary" value="Save">
            </div>
        </div>
    </div>
    </form>
<script>
    var slider = $('#progress');
    var textn = $('#prog');
    textn.text(slider.val() + '%');
    $(document).on('change', slider, function (e) {
        e.preventDefault();
        textn.text($('#progress').val() + '%');

    });
</script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('subject'); ?>
    Subject !!!!!!!!!!!
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.Web_app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* H:\root\home\eritqaaacademy-001\www\crm\CRMV3\crmlaraveltest\resources\views/Customer/Task/View_view.blade.php */ ?>