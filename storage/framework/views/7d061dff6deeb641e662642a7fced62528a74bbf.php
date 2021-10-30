
<?php $__env->startSection('title'); ?>
    <?php echo e(__('lang.Employee_Editor')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <?php echo e(__('lang.Employee_Editor')); ?>

            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <a class="btn btn-primary" style="margin-bottom: 10px"
                   href="<?php echo e(route('Employee.Add')); ?>"><?php echo e(__('lang.Add_Employee')); ?></a>
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th><?php echo e(__('lang.Name')); ?></th>
                        <th><?php echo e(__('lang.Phone')); ?></th>
                        <th><?php echo e(__('lang.Department')); ?></th>

                        <th><?php echo e(__('lang.Status')); ?></th>
                        <th><?php echo e(__('lang.Action')); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1;?>
                    <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <?php if(\App\Http\Controllers\Admin\Employee_cont::permision($employee,'View')): ?>

                            <?php if($employee->trashed()): ?>
                                <tr class="danger" class="odd gradeX">
                            <?php else: ?>
                                <tr class="odd gradeX">
                             <?php endif; ?>
                                    <td><?php echo e($i++); ?></td>
                                    <td><?php echo e($employee->name); ?></td>
                                    <td><?php echo e($employee->phone); ?></td>
                                    <td><?php echo e(is_null($employee->Division)?'':$employee->Division->Department->name); ?></td>

                                    <td class="text-center">
                                        <?php if(\App\Http\Controllers\Admin\Employee_cont::permision($employee,'Update')): ?>
                                            <?php if($employee->id!=1): ?>
                                                <?php if($employee->isactive == 1): ?>
                                                    <label class="switch">
                                                        <input type="checkbox" data-toggle="toggle"
                                                               onchange='window.location.assign("<?php echo e(route('processSetIsActive',['id'=>$employee->id,'value'=>0])); ?>")'
                                                               checked>
                                                        <span class="sliders"></span>
                                                    </label>
                                                <?php else: ?>
                                                    <label class="switch">
                                                        <input type="checkbox" data-toggle="toggle"
                                                               onchange='window.location.assign("<?php echo e(route('processSetIsActive',['id'=>$employee->id,'value'=>1])); ?>")'>
                                                        <span class="sliders"></span>
                                                    </label>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </td>
                                    
                                    <?php if($employee->trashed()): ?>
                                        <td style="width: 210px">
                                            <?php if($employee->id!=1): ?>
                                                <?php if(\App\Http\Controllers\Admin\Employee_cont::permision($employee,'ForceDelete')): ?>
                                                    <a class="btn btn-danger"
                                                       onclick="del('<?php echo e(route('Employee.ForceDelete',['id'=>$employee->id])); ?>')"><?php echo e(__('lang.Force_Delete')); ?></a>
                                                    <a class="btn btn-danger"
                                                       onclick="del('<?php echo e(route('Employee.Restor',['id'=>$employee->id])); ?>')"><?php echo e(__('lang.Restor')); ?></a>

                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </td>
                                    <?php else: ?>
                                        <td style="width: 210px">
                                            <?php if($employee->id!=1): ?>
                                                <?php if(\App\Http\Controllers\Admin\Employee_cont::permision($employee,'Delete')): ?>
                                                    <a class="btn btn-danger"
                                                       onclick="del('<?php echo e(route('Employee.Delete',['id'=>$employee->id])); ?>')"><?php echo e(__('lang.Delete')); ?></a>
                                                <?php endif; ?>
                                                <?php if(\App\Http\Controllers\Admin\Employee_cont::permision($employee,'Update')): ?>
                                                    <a class="btn btn-warning"
                                                       href="<?php echo e(route('Employee.Update',['id'=>$employee->id])); ?>"><?php echo e(__('lang.Update')); ?></a>
                                                <?php endif; ?>
                                                <a class="btn btn-warning"
                                                   href="<?php echo e(route('Employee.View',['id'=>$employee->id])); ?>"><?php echo e(__('lang.View')); ?></a>
                                                <a class="btn btn-success" class="form-control" style="width: 100%"
                                                   href="<?php echo e(route('Employee.viewcustomer',['type'=>'UN','id'=>$employee->id])); ?>"><?php echo e(__('lang.Customers_View')); ?></a>


                                            <?php endif; ?>
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
<?php /* /home/eritqaaa/public_html/crmold.eritqaa.com.tr/resources/views/Crm/Employee/Index_view.blade.php */ ?>