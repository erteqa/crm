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
                                           value="<?php echo e($Customer->email); ?> ">
                                </div>

                            </div>

                        </div>
                        <div class="row">
                            <div class="col-xs-12 mb-1"><label
                                        for="shortnote"><?php echo e(__('lang.Customer_Name')); ?></label>
                                <input type="text" class="form-control"
                                       name="customername" value="<?php echo e($Customer->name); ?> "></div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 mb-1"><label
                                        for="shortnote"><?php echo e(__('lang.Subject')); ?></label>
                                <input type="text" class="form-control"
                                       name="subject" value="" id="subject">
                            </div>
                        </div>
                        <div class="control-group hidden-phone">
                            <label class="control-label" for="textarea2"><?php echo e(__('lang.messag')); ?></label>
                            <div class="controls">
                                <textarea class="ckeditor" name="message" id="textarea2" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="panel-footer">
                                <input type="submit" class="btn btn-primary" value="<?php echo e(__('lang.Send')); ?>">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="container">
                    <form method="post" action="<?php echo e(route('store')); ?>" enctype="multipart/form-data"
                          class="dropzone" id="dropzone">
                        <?php echo csrf_field(); ?>
                    </form>
                    <script type="text/javascript">
                        Dropzone.options.dropzone =
                            {
                                maxFilesize: 12,
                                renameFile: function(file) {
                                    var dt = new Date();
                                    var time = dt.getTime();
                                    return time+file.name;
                                },
                                acceptedFiles: ".jpeg,.jpg,.png,.gif,.pdf",
                                addRemoveLinks: true,
                                timeout: 50000,
                                removedfile: function(file)
                                {
                                    var name = file.upload.filename;
                                    //alert(name);
                                    $.ajax({
                                        headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        },
                                        type: 'post',
                                        url: '<?php echo e(route('filedelete')); ?>',
                                        data: {_token: '<?php echo e(csrf_token()); ?>',filename: name},
                                        success: function (data){
                                            alert("File has been successfully removed!!");
                                        },
                                        error: function(e) {
                                            alert("error="+e);
                                        }});
                                    var fileRef;
                                    return (fileRef = file.previewElement) != null ?
                                        fileRef.parentNode.removeChild(file.previewElement) : void 0;
                                },

                                success: function(file, response)
                                {
                                    console.log(response);
                                },
                                error: function(file, response)
                                {
                                    return false;
                                }
                            };
                    </script>
                </div>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('subject'); ?>
    Subject !!!!!!!!!!!
<?php $__env->stopSection(); ?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>

<script src="//cdn.ckeditor.com/4.11.3/full/ckeditor.js"></script>

<?php echo $__env->make("layouts.Admin_app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* H:\root\home\eritqaaacademy-001\www\crm\CRMV3\crmlaraveltest\resources\views/Crm/Customer/sendemail_view.blade.php */ ?>