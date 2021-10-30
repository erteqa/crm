<?php $__env->startSection('title'); ?>
    <?php __('lang.Ticket_View') ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <style>
        <?php if(app()->getLocale()=='ar'): ?>
        .ddf{
            text-align: right;
        }

        <?php endif; ?>
        fieldset {
            border: 1px solid #ea2612;
        }

    </style>
    <div class="col-lg-12">
        <div class="ddf form-group">
            <label class="ddf"><?php echo e($Article['title']); ?></label>
            <div  class="ddf row">
                <div class="col-xs-12 mb-1"><br>
                   <?php echo $Article->content; ?></div>
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
<?php echo $__env->make("layouts.Admin_app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* H:\root\home\eritqaaacademy-001\www\crm\CRMV3\crmlaraveltest\resources\views/Crm/Article/View_view.blade.php */ ?>