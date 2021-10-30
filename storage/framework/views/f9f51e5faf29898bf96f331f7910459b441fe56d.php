<?php $__env->startSection('content'); ?>
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <?php echo e(__('lang.Customer_Editor')); ?>

            </div>
            <div class="flash-message">
                <?php $__currentLoopData = ['danger', 'warning', 'success', 'info']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(Session::has('alert-' . $msg)): ?>

                        <p class="alert alert-<?php echo e($msg); ?>"><?php echo e(Session::get('alert-' . $msg)); ?> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="panel-body">
                <?php if(\App\Http\Controllers\Admin\Customer_cont::permision(null,'Customer_Add')): ?>
                <a class="btn btn-primary" style="margin-bottom: 10px"

                   href="<?php echo e(route('Customer.Add')); ?>"><?php echo e(__('lang.Add_Customer')); ?></a>
                <?php endif; ?>
                <?php if(\App\Http\Controllers\Admin\Customer_cont::permision(null,'ForceDelete')): ?>
                <a class="btn btn-danger" style="margin-bottom: 10px;margin-left: 10px"
                   href="<?php echo e(route('Customer.Index',['type'=>'Del'])); ?>"><?php echo e(__('lang.Deleted_Customers')); ?></a>
                <?php endif; ?>
                <a class="btn btn-success" style="margin-bottom: 10px;margin-left: 10px"
                   href="<?php echo e(route('Customer.Index',['type'=>'UN'])); ?>"><?php echo e(__('lang.Existed_Customers')); ?></a>
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th><?php echo e(__('lang.Name')); ?></th>
                        <th><?php echo e(__('lang.Phone')); ?></th>
                        <th><?php echo e(__('lang.company')); ?></th>
                        <th><?php echo e(__('lang.Email')); ?></th>
                        <th><?php echo e(__('lang.Add_By')); ?></th>
                        <th><?php echo e(__('lang.record_number')); ?></th>
                        <th><?php echo e(__('lang.Status')); ?></th>
                        <th><?php echo e(__('lang.Action')); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1;?>
                    <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <?php if(\App\Http\Controllers\Admin\Customer_cont::permision($customer,'View')): ?>
                            <?php if($customer->trashed()): ?>
                                <tr class="danger" class="odd gradeX">
                            <?php else: ?>
                                <tr class="odd gradeX">
                            <?php endif; ?>

                                    <td><?php echo e($i++); ?></td>
                                    <td><?php echo e($customer->name); ?></td>
                                    <td><?php echo e($customer->phone); ?></td>
                                    <td><?php echo e($customer->company); ?></td>
                                    <td><?php echo e($customer->email); ?></td>
                                    <td><?php echo e($customer->User->name); ?></td>
                                    <td><?php echo e($customer->record_number); ?></td>
                                    <td class="text-center">
                                        <?php if(\App\Http\Controllers\Admin\Customer_cont::permision($customer,'Update')): ?>
                                        <?php if($customer->isactive == 1): ?>
                                            <label class="switch">
                                                <input type="checkbox" data-toggle="toggle"
                                                       onchange='window.location.assign("<?php echo e(route('customerSetIsActive',['id'=>$customer->id,'value'=>0])); ?>")'
                                                       checked>
                                                <span class="sliders"></span>
                                            </label>
                                        <?php else: ?>
                                            <label class="switch">
                                                <input type="checkbox" data-toggle="toggle"
                                                       onchange='window.location.assign("<?php echo e(route('customerSetIsActive',['id'=>$customer->id,'value'=>1])); ?>")'>
                                                <span class="sliders"></span>
                                            </label>
                                        <?php endif; ?>
                                        <?php endif; ?>
                                    </td>
                                    
                                    <?php if($customer->trashed()): ?>
                                        <td style="width: 23%">
                                            <?php if(\App\Http\Controllers\Admin\Customer_cont::permision($customer,'ForceDelete')): ?>
                                                <a class="btn btn-danger"
                                                   onclick="del('<?php echo e(route('Customer.ForceDelete',['id'=>$customer->id])); ?>')"><?php echo e(__('lang.Force_Delete')); ?></a>
                                                <a class="btn btn-danger"
                                                   onclick="del('<?php echo e(route('Customer.Restor',['id'=>$customer->id])); ?>')"><?php echo e(__('lang.Restor')); ?></a>
                                            <?php endif; ?>

                                        </td>
                                    <?php else: ?>
                                        <td style="width: 23%">
                                            <?php if(\App\Http\Controllers\Admin\Customer_cont::permision($customer,'Delete')): ?>
                                                <a class="btn btn-danger"
                                                   onclick="del('<?php echo e(route('Customer.Delete',['id'=>$customer->id])); ?>')"><?php echo e(__('lang.Delete')); ?></a>
                                            <?php endif; ?>
                                            <?php if(\App\Http\Controllers\Admin\Customer_cont::permision($customer,'Update')): ?>
                                                <a class="btn btn-warning"
                                                   href="<?php echo e(route('Customer.Update',['id'=>$customer->id])); ?>"><?php echo e(__('lang.Update')); ?></a>
                                            <?php endif; ?>
                                            <a class="btn btn-warning"
                                               href="<?php echo e(route('Customer.View',['id'=>$customer->id])); ?>"><?php echo e(__('lang.View')); ?></a>
                                        </td>
                                    <?php endif; ?>


                                </tr>

                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php /* C:\dd\crmlaraveltest\resources\views/Crm/Customer/Index_view.blade.php */ ?>