

<?php $__env->startSection('content'); ?>
    <style>
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
                <?php if( \App\Http\Controllers\Accounting\Invoice_cont::permision('Invoice_Add')): ?>
                <a class="btn btn-primary" style="margin-bottom: 10px" href="<?php echo e(route('Add.Invoice')); ?>"><?php echo e(__('lang.Add_Invoice')); ?></a>
                <?php endif; ?>
                <a class="btn btn-danger" style="margin-bottom: 10px;margin-left: 10px"
                   href="<?php echo e(route('Index.Invoice',['type'=>'Del'])); ?>"><?php echo e(__('lang.Deleted_Invoice')); ?></a>
                <a class="btn btn-success" style="margin-bottom: 10px;margin-left: 10px"
                   href="<?php echo e(route('Index.Invoice',['type'=>'UN'])); ?>"><?php echo e(__('lang.Existed_Invoice')); ?></a>
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr>
                        <th>#</th>


                        <th><?php echo e(__('lang.Invoice_Number')); ?></th>
                        <th><?php echo e(__('lang.Customer')); ?></th>
                        <th><?php echo e(__('lang.Employee')); ?></th>
                        <th><?php echo e(__('lang.invoicedate')); ?></th>
                        <th><?php echo e(__('lang.Company')); ?></th>
                        <th><?php echo e(__('lang.status')); ?></th>
                        <th><?php echo e(__('lang.Remaining_amount')); ?></th>
                        <th><?php echo e(__('lang.Action')); ?></th>

                    </tr>
                    </thead>
                    <?php $i=1?>
                    <tbody>
                    <?php $__currentLoopData = $invoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if( \App\Http\Controllers\Accounting\Invoice_cont::invpermision($invoice->Customer,'View')): ?>
                        <?php if($invoice->trashed()): ?>
                            <tr class="danger" class="odd gradeX">
                        <?php else: ?>
                            <tr class="odd gradeX">
                                <?php endif; ?>

                                <td><?php echo e($i++); ?></td>
                                <td><?php echo e($invoice->tid); ?></td>

                                <td><?php echo e(is_null($invoice->Customer)?'':$invoice->Customer->name); ?></td>
                                <td><?php echo e($invoice->User->name); ?></td>
                                <td><?php echo e($invoice->invoicedate); ?></td>
                                <td><?php echo e($invoice->Customer['company']); ?></td>
                                <td><span class="tag tag-default st-<?php echo e($invoice['status']); ?>"><?php echo e(__('lang.'.$invoice['status'])); ?></span></td>
                                <td><?php echo e($invoice->total-$invoice->pamnt.' TL'); ?></td>


                                <?php if($invoice->trashed()): ?>

                                    <td style="width: 210px">
                                        <?php if( \App\Http\Controllers\Accounting\Invoice_cont::permision('Invoice_ForceDelete')): ?>
                                            <a class="btn btn-danger"
                                               onclick="del('<?php echo e(route('Invoice.ForceDelete',['id'=>$invoice->id])); ?>')"><?php echo e(__('lang.Force_Delete')); ?></a>

                                            <a class="btn btn-danger"
                                               onclick="del('<?php echo e(route('Invoice.Restor',['id'=>$invoice->id])); ?>')"><?php echo e(__('lang.Restor')); ?></a>
                                        <?php endif; ?>
                                    </td >
                                <?php else: ?>
                                    <td style="width: 210px">

                                        <?php if( \App\Http\Controllers\Accounting\Invoice_cont::permision('Invoice_Delete')): ?>
                                            <a class="btn btn-danger" onclick="del('<?php echo e(route('Invoice.Delete',['id'=>$invoice->id])); ?>')"><?php echo e(__('lang.Delete')); ?></a>
                                        <?php endif; ?>

                                            <?php if( \App\Http\Controllers\Accounting\Invoice_cont::permision('Invoice_Update')): ?>
                                            <a class="btn btn-warning" href="<?php echo e(route('Invoice.Update',['id'=>$invoice->id])); ?>"><?php echo e(__('lang.Update')); ?></a>
                                            <?php endif; ?>

                                            <a class="btn btn-warning" href="<?php echo e(route('Invoice.View',['id'=>$invoice->id])); ?>"><?php echo e(__('lang.View')); ?></a>

                                            <a class="btn btn-warning" href="<?php echo e(route('Invoice.Download',['id'=>$invoice->id,'type' => 'd'])); ?>"><?php echo e(__('lang.Download')); ?></a>


                                    </td>
                                <?php endif; ?>





                            </tr>
                        <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <!-- /.table-responsive -->
                <script>
                    $(document).ready(function() {
                        $('#dataTables-example').DataTable({
                            responsive: true,
                            stateSave: true
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
<?php echo $__env->make("layouts.Admin_app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* /home/eritqaaa/public_html/crmold.eritqaa.com.tr/resources/views/Acounting/Invoice/Index_view.blade.php */ ?>