
<?php $__env->startSection('title'); ?>
    <?php echo e(__('lang.Payment_Editor')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <?php echo e(__('lang.Payment_Editor')); ?>

            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <a class="btn btn-primary" style="margin-bottom: 10px"
                   
                   href="<?php echo e(route('Payment.Add')); ?>"><?php echo e(__('lang.Add_Payment')); ?></a>
                
                <a class="btn btn-danger" style="margin-bottom: 10px;margin-left: 10px"
                   
                   href="<?php echo e(route('Payment.Index',['type'=>'Del'])); ?>"><?php echo e(__('lang.Deleted_Payments')); ?></a>
                
                <a class="btn btn-success" style="margin-bottom: 10px;margin-left: 10px"
                   href="<?php echo e(route('Payment.Index',['type'=>'UN'])); ?>"><?php echo e(__('lang.Existed_Payments')); ?></a>
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th><?php echo e(__('lang.Employee')); ?></th>
                        <th><?php echo e(__('lang.Invoice')); ?></th>
                        <th><?php echo e(__('lang.Customer')); ?></th>
                        <th><?php echo e(__('lang.Amount')); ?></th>
                        <th><?php echo e(__('lang.Note')); ?></th>
                        <th><?php echo e(__('lang.Date')); ?></th>
                        <th><?php echo e(__('lang.Action')); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1;?>
                    <?php if(!is_null($payments)): ?>
                    <?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(!is_null($payment)): ?>
                        <?php if(\App\Http\Controllers\Accounting\Payment_cont::permision('View')): ?>
                            <?php if($payment->trashed()): ?>
                                <tr class="danger" class="odd gradeX">
                            <?php else: ?>
                                <tr class="odd gradeX">
                            <?php endif; ?>
                                    <td><?php echo e($i++); ?></td>
                                    <td><?php echo e($payment->User->name); ?></td>
                                    <td><?php echo e($payment->Invoice->tid); ?></td>
                                    <td><?php echo e($payment->Customer->name); ?></td>
                                    <td><?php echo e($payment->amount); ?></td>
                                    <td><?php echo e($payment->note); ?></td>
                                    <td><?php echo e($payment->date); ?></td>
                                    
                                    <?php if($payment->trashed()): ?>
                                        <td style="width: 23%">
                                            <?php if(\App\Http\Controllers\Accounting\Payment_cont::permision('ForceDelete')): ?>
                                                <a class="btn btn-danger"
                                                   onclick="del('<?php echo e(route('Payment.ForceDelete',['id'=>$payment->id])); ?>')"><?php echo e(__('lang.Force_Delete')); ?></a>
                                                <a class="btn btn-danger"
                                                   onclick="del('<?php echo e(route('Payment.Restor',['id'=>$payment->id])); ?>')"><?php echo e(__('lang.Restor')); ?></a>
                                            <?php endif; ?>
                                        </td>
                                    <?php else: ?>
                                        <td style="width: 23%">
                                            <?php if(\App\Http\Controllers\Accounting\Payment_cont::permision('Delete')): ?>
                                                <a class="btn btn-danger"
                                                   onclick="del('<?php echo e(route('Payment.Delete',['id'=>$payment->id])); ?>')"><?php echo e(__('lang.Delete')); ?></a>
                                            <?php endif; ?>
                                            
                                                
                                                   
                                            
                                            <a class="btn btn-warning"
                                               href="<?php echo e(route('Payment.View',['id'=>$payment->id])); ?>"><?php echo e(__('lang.View')); ?></a>
                                        </td>
                                    <?php endif; ?>
                                </tr>
                        <?php endif; ?>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </tbody>
                </table>
                <!-- /.table-responsive -->
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
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('subject'); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.Admin_app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* /home/eritqaaa/public_html/crmold.eritqaa.com.tr/resources/views/Acounting/Payment/Index_view.blade.php */ ?>