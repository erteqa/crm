<?php $__env->startSection('title'); ?>
    <?php echo e(__('lang.Ticket_View')); ?>

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
        label{
            float: right;
        }
        .lang{
            text-align: right;
        }
        <?php endif; ?>
        fieldset {
            border: 1px solid #ea2612;
        }

    </style>
    <form method="post">
        <?php echo e(csrf_field()); ?>

    <div class="col-lg-12">
        <div class="panel panel-primary">

            <div class="panel-heading lang">
                <?php echo e(__('lang.Ticket_View')); ?>

            </div>

            <div class="panel-body">
                <div class="form-group">
                    <div class="col-lg-12 lang">
                        <div class="panel panel-primary ">
                            <div class="panel-heading">
                                <?php echo e(__('lang.subject')); ?>

                            </div>
                            <div class="panel-body">
                                <p><?php echo str_replace(array("\n"),"<br>",$Ticket->subject); ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-12 lang">
                        <div class="panel panel-success">

                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-xs-12 mb-1"><label
                                                for="shortnote"><?php echo e(__('lang.reply')); ?></label><br>
                                        <textarea required name="reply" rows="4"   class="summernote form-control ckeditor" id="contents" title="Contents"><?php echo e($Ticket->reply); ?></textarea></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="panel-footer">
                <input type="submit" class="btn btn-primary" value="<?php echo e(__('lang.Send')); ?>">
            </div>
        </div>
    </div>
    </form>
    <script>
        $(document).ready(function () {
            $('#dataTables-example').DataTable({
                responsive: true
            });

        });

        function del($url) {
            var $ret_val = confirm('Yes Or No');
            if ($ret_val == true) {
                window.location.href = $url;
            }

        }
    </script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('subject'); ?>
    Subject !!!!!!!!!!!
<?php $__env->stopSection(); ?>
<script src="//cdn.ckeditor.com/4.11.3/full/ckeditor.js"></script>
<?php echo $__env->make("layouts.Admin_app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* H:\root\home\eritqaaacademy-001\www\crm\CRMV3\crmlaraveltest\resources\views/Crm/Ticket/View_view.blade.php */ ?>