<div class="col-lg-12">
    <div class="panel panel-primary">
        <div class="panel-body">
            <table width="100%" class="table table-striped table-bordered table-hover" >
                <thead>
                <tr>
                    <th>#</th>
                    <th><?php echo e(__('lang.Invoice_Number')); ?></th>
                    <th><?php echo e(__('lang.Customer')); ?></th>
                    <th><?php echo e(__('lang.Employee')); ?></th>
                    <th><?php echo e(__('lang.invoicedate')); ?></th>
                    <?php if(auth()->user()->department_id != 3 or auth()->user()->department_id != 6 ): ?>
                        <th><?php echo e(__('lang.Company')); ?></th>
                    <?php else: ?>
                        <th><?php echo e(__('lang.Degreestudy')); ?></th>
                    <?php endif; ?>

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
                                <td><?php echo e($invoice->Customer->company); ?></td>
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

        </div>
        <!-- /.panel-body -->
    </div>
    <!-- /.panel -->
</div>
<?php /* H:\root\home\eritqaaacademy-001\www\crm\CRMV3\crmlaraveltest\resources\views/info/invoiceinfo.blade.php */ ?>