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
                            <div class="panel-heading">
                                <?php echo e(__('lang.reply')); ?>

                            </div>
                            <div class="panel-body">
                                <p><?php echo str_replace(array("\n"),"<br>",$Ticket->reply); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-footer ">
                <a class="btn btn-danger"
                   <?php if(!is_null($Ticket)): ?>
                   onclick="del('<?php echo e(route('Cu.Ticket.ForceDelete',['id'=>$Ticket->id])); ?>')"><?php echo e(__('Delete')); ?></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
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
<?php echo $__env->make("layouts.Web_app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* H:\root\home\eritqaaacademy-001\www\crm\CRMV3\crmlaraveltest\resources\views/Customer/Ticket/View_view.blade.php */ ?>