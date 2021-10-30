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

        .st-paid, .st-due, .st-partial, .st-canceled,.st-rejected,.st-pending,.st-accepted,.st-Recurring,.st-Stopped
        {
            text-transform: capitalize;
            color: #fff;
            padding: 4px;
            border-radius: 11px;
            font-size: 12px;
        }
        .st-paid,.st-accepted
        {
            background-color: #5ed45e;
        }
        .st-due,.st-Stopped
        {
            background-color: #ff6262;
        }
        .st-partial,.st-pending,.st-Recurring
        {
            background-color: #5da6fb;
        }
        .st-canceled,.st-rejected
        {
            background-color: #848030;
        }
    </style>
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <?php echo e(__('lang.Invoice_Editor')); ?>


                <div class="flash-message">
                    <?php $__currentLoopData = ['danger', 'warning', 'success', 'info']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(Session::has('alert-' . $msg)): ?>

                            <p class="alert alert-<?php echo e($msg); ?>"><?php echo e(Session::get('alert-' . $msg)); ?> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">

                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr>
                        <th>#</th>


                        <th><?php echo e(__('lang.Invoice_Number')); ?></th>
                        <th><?php echo e(__('lang.Customer')); ?></th>
                        <th><?php echo e(__('lang.Employee')); ?></th>
                        <th><?php echo e(__('lang.invoicedate')); ?></th>
                        <th><?php echo e(__('lang.invoiceduedate')); ?></th>
                        <th><?php echo e(__('lang.status')); ?></th>
                        <th><?php echo e(__('lang.Remaining_amount')); ?></th>
                        <th><?php echo e(__('lang.Action')); ?></th>

                    </tr>
                    </thead>
                    <?php $i=1?>
                    <tbody>
                    <?php $__currentLoopData = $invoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                            <tr class="odd gradeX">

                                <td><?php echo e($i++); ?></td>
                                <td><?php echo e($invoice->tid); ?></td>

                                <td><?php echo e(is_null($invoice->Customer)?'':$invoice->Customer->name); ?></td>
                                <td><?php echo e($invoice->User->name); ?></td>
                                <td><?php echo e($invoice->invoicedate); ?></td>
                                <td><?php echo e($invoice->invoiceduedate); ?></td>
                                <td><span class="tag tag-default st-<?php echo e($invoice['status']); ?>"><?php echo e(__('lang.'.$invoice['status'])); ?></span></td>
                                <td><?php echo e($invoice->total-$invoice->pamnt.' TL'); ?></td>

                                    <td style="width: 210px">

                                            <a class="btn btn-primary" href="<?php echo e(route('Cu.Invoice.View',['id'=>$invoice->id])); ?>"><?php echo e(__('lang.View')); ?></a>

                                            <a class="btn btn-success" href="<?php echo e(route('Cu.Invoice.Download',['id'=>$invoice->id,'type' => 'd'])); ?>"><?php echo e(__('lang.Download')); ?></a>

                                        <a class="btn btn-warning" href="<?php echo e(route('Cu.Invoice.Download',['id'=>$invoice->id,'type' => 'I'])); ?>"><?php echo e(__('lang.Print')); ?></a>
                                    </td>






                            </tr>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <!-- /.table-responsive -->
                <script>
                    $(document).ready(function() {
                        $('#dataTables-example').DataTable({
                            responsive: true
                        });

                    });
                    function del($url) {
                        var $ret_val=confirm( 'Yes Or No' );
                        if($ret_val==true)
                        {
                            window.location.href=$url;
                        }

                    }
                </script>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('subject'); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.Web_app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* H:\root\home\eritqaaacademy-001\www\crm\CRMV3\crmlaraveltest\resources\views/Customer/Invoice/index_view.blade.php */ ?>