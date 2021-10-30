<?php $__env->startSection('title'); ?>
    <?php echo e(__('lang.View_Group')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <?php echo e(__('Customer Editor')); ?>

            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <a class="btn btn-primary" style="margin-bottom: 10px"
                   href="<?php echo e(route('Customer.Add')); ?>"><?php echo e(__('Add Customer')); ?></a>
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr>
                        <th><?php echo e(__('Name')); ?></th>
                        <th><?php echo e(__('Nationality')); ?></th>
                        <th><?php echo e(__('company')); ?></th>
                        <th><?php echo e(__('taxid')); ?></th>
                        <th><?php echo e(__('Add By')); ?></th>
                        <th><?php echo e(__('record_number')); ?></th>
                        <th><?php echo e(__('Status')); ?></th>
                        <th><?php echo e(__('Action')); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($customer->trashed()): ?>
                            <tr class="danger" class="odd gradeX">
                        <?php else: ?>
                            <tr class="odd gradeX">
                                <?php endif; ?>


                                <td><?php echo e($customer->name); ?></td>
                                <td><?php echo e($customer->nationality); ?></td>
                                <td><?php echo e($customer->company); ?></td>
                                <td><?php echo e($customer->taxid); ?></td>
                                <td><?php echo e($customer->User->name); ?></td>
                                <td><?php echo e($customer->record_number); ?></td>
                                <td class="text-center">
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
                                </td>
                                
                                <?php if($customer->trashed()): ?>
                                    <td style="width: 210px">
                                        <a class="btn btn-danger"
                                           onclick="del('<?php echo e(route('Customer.ForceDelete',['id'=>$customer->id])); ?>')"><?php echo e(__('Force Delete')); ?></a>
                                        <a class="btn btn-danger"
                                           onclick="del('<?php echo e(route('Customer.Restor',['id'=>$customer->id])); ?>')"><?php echo e(__('Restor')); ?></a>
                                    </td>
                                <?php else: ?>
                                    <td style="width: 210px">
                                        <a class="btn btn-danger"
                                           onclick="del('<?php echo e(route('Customer.Delete',['id'=>$customer->id])); ?>')"><?php echo e(__('Delete')); ?></a>
                                        <a class="btn btn-warning"
                                           href="<?php echo e(route('Customer.Update',['id'=>$customer->id])); ?>"><?php echo e(__('Update')); ?></a>
                                        <a class="btn btn-warning"
                                           href="<?php echo e(route('Customer.View',['id'=>$customer->id])); ?>"><?php echo e(__('View')); ?></a>
                                    </td>
                                <?php endif; ?>


                            </tr>
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
<?php /* C:\dd\crmlaraveltest\resources\views/Crm/Group/View_view.blade.php */ ?>