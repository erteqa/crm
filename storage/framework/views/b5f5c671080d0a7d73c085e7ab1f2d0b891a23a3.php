<?php $__env->startSection('content'); ?>


                <div class="modal-header">
                    <div class="flash-message">
                        <?php $__currentLoopData = ['danger', 'warning', 'success', 'info']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(Session::has('alert-' . $msg)): ?>

                                <p class="alert alert-<?php echo e($msg); ?>"><?php echo e(Session::get('alert-' . $msg)); ?> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <h4 class="modal-title"><?php echo e(__('lang.Email')); ?></h4>
                </div>

                <div class="modal-body"  id="emailbody" >
                    <form id="sendbill" method="post"  enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>

                        <div class="row">
                            <div class="col-xs-12">
                                <div class="input-group">
                                    <div class="input-group-addon"><span class="icon-envelope-o"
                                                                         aria-hidden="true"></span></div>
                                    <input type="text" class="form-control" placeholder="Email" name="mailtoc"
                                           value="<?php echo e($invoice->Customer->email); ?> ">
                                </div>

                            </div>

                        </div>
                        <div class="row">
                            <div class="col-xs-12 mb-1"><label
                                        for="shortnote"><?php echo e(__('lang.Customer_Name')); ?></label>
                                <input type="text" class="form-control"
                                       name="customername" value="<?php echo e($invoice->Customer->name); ?> "></div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 mb-1"><label
                                        for="shortnote"><?php echo e(__('lang.Subject')); ?></label>
                                <input type="text" class="form-control"
                                       name="subject" value="<?php echo e(__('lang.'.$Subject)); ?>" id="subject">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 mb-1"><label
                                        for="shortnote"><?php echo e(__('lang.Message')); ?></label><br>
                                <textarea name="message" rows="4"   class="summernote form-control ckeditor" id="contents" title="Contents"><?php echo e(__('lang.'.$Message)); ?></textarea></div>
                        </div>

                        <div class="form-group">
                            <input class="btn btn-primary" multiple="multiple" type="file" name="files[]" value="upload">
                        </div>
                        <div class="modal-footer">
                            <div class="panel-footer">
                                <input type="submit" class="btn btn-primary" value="<?php echo e(__('lang.Send')); ?>">
                            </div>


                        </div>

                    </form>
                </div>



<?php $__env->stopSection(); ?>
<?php $__env->startSection('subject'); ?>
    Subject !!!!!!!!!!!
<?php $__env->stopSection(); ?>
<script src="//cdn.ckeditor.com/4.11.3/full/ckeditor.js"></script>
<?php echo $__env->make("layouts.Admin_app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* C:\dd\crmlaraveltest\resources\views/Acounting/Invoice/sendemail_view.blade.php */ ?>