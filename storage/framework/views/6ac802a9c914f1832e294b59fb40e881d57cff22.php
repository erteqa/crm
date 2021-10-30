<?php $__env->startSection('content'); ?>

    <div class="modal-header">
        <div class="flash-message">
            <?php $__currentLoopData = ['danger', 'warning', 'success', 'info']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(Session::has('alert-' . $msg)): ?>
                    <p class="alert alert-<?php echo e($msg); ?>"><?php echo e(Session::get('alert-' . $msg)); ?> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">

                    <h4 class="modal-title"><?php echo e(__('lang.Send')); ?> SMS</h4>
                </div>

                <div class="modal-body" id="smsbody" >
                    <form id="sendsms"  method="post" action="">
                        <?php echo e(csrf_field()); ?>

                        <div class="row">
                            <div class="col-xs-12">
                                <div class="input-group">
                                    <div class="input-group-addon"><span class="icon-envelope-o"
                                                                         aria-hidden="true"></span></div>
                                    <input type="text" class="form-control" placeholder="SMS" name="mobile"
                                           value="<?php echo e($Customer->phone); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 mb-1">
                                <label
                                        for="shortnote"><?php echo e(__('lang.Customer')); ?></label>
                                <input type="text" class="form-control"
                                       value="<?php echo e($Customer->name); ?>"></div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 mb-1"><label
                                        for="shortnote"><?php echo e(__('lang.Message')); ?></label>
                                <textarea class="form-control " name="text_message" id="sms_tem" title="Contents"
                                          rows="3"></textarea></div>
                        </div>


                        <input type="hidden" class="form-control"
                               id="smstype" value="">

                        <button type="submit" class="btn btn-primary"
                                id="submitSMS"><?php echo e(__('lang.Send')); ?></button>
                    </form>
                </div>


            </div>
        </div>
    </div>




<?php $__env->stopSection(); ?>
<?php $__env->startSection('subject'); ?>
    Subject !!!!!!!!!!!
<?php $__env->stopSection(); ?>
<script src="//cdn.ckeditor.com/4.11.3/full/ckeditor.js"></script>
<?php echo $__env->make("layouts.Admin_app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* C:\dd\crmlaraveltest\resources\views/Crm/Customer/sendsms_view.blade.php */ ?>