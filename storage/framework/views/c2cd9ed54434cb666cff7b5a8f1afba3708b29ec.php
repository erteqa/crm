<?php $__env->startSection('head'); ?>
  <style>

      .pass_show{position: relative}
      .pass_show .ptxt {
          position: absolute;
          top: 50%;
          right: 10px;
          z-index: 1;
          color: #f36c01;
          margin-top: -10px;
          cursor: pointer;
          transition: .3s ease all;
      }
      .pass_show .ptxt:hover{color: #333333;}
  </style>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <?php echo e(__('reset Password')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <form method="post">
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <?php echo e(__('Add Customer')); ?>

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

                         </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-4">
                                <label><?php echo e(__('lang.New_Password')); ?></label>
                                <div class="form-group pass_show">
                                    <input type="password" name="password" class="form-control" placeholder="New Password">
                                </div>
                                <label><?php echo e(__('lang.Confirm_Password')); ?></label>
                                <div class="form-group pass_show">
                                    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <input type="submit" class="btn btn-primary" value="Save">
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function(){
                $('.pass_show').append('<span class="ptxt">Show</span>');
            });


            $(document).on('click','.pass_show .ptxt', function(){

                $(this).text($(this).text() == "Show" ? "Hide" : "Show");

                $(this).prev().attr('type', function(index, attr){return attr == 'password' ? 'text' : 'password'; });

            });
            $(document).ready(function() {
                $('.js-example-basic-single').select2();
            });
        </script>
    </form>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('subject'); ?>
    <?php echo e(__('Subject')); ?>}}
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.Admin_app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* H:\root\home\eritqaaacademy-001\www\crm\CRMV3\crmlaraveltest\resources\views/Crm/Customer/Reset_view.blade.php */ ?>