<?php $__env->startSection('content'); ?>
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <?php echo e(__('lang.Departments_Editor')); ?>

            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <a class="btn btn-primary" style="margin-bottom: 10px" href="<?php echo e(route('Department.Add')); ?>"><?php echo e(__('lang.Add_Department')); ?></a>
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr>
                        <th><?php echo e(__('lang.Name')); ?></th>
                        <th><?php echo e(__('lang.Action')); ?></th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(\App\Http\Controllers\Admin\Department_cont::permision($department,'View')): ?>
                        <?php if($department->trashed()): ?>
                            <tr class="danger" class="odd gradeX">
                        <?php else: ?>
                            <tr class="odd gradeX">
                                <?php endif; ?>

                        <td><?php echo e($department->name); ?></td>

                        
                            <?php if($department->trashed()): ?>
                                    <td style="width: 210px">
                                        <?php if($department->name!='Default'): ?>
                                        <a class="btn btn-danger"
                                           onclick="del('<?php echo e(route('Department.ForceDelete',['id'=>$department->id])); ?>')"><?php echo e(__('lang.Force Delete')); ?></a>
                                        <a class="btn btn-danger"
                                           onclick="del('<?php echo e(route('Department.Restor',['id'=>$department->id])); ?>')"><?php echo e(__('lang.Restor')); ?></a>
                                  <?php endif; ?>
                                    </td >
                            <?php else: ?>
                                        <td style="width: 210px">
                                            <?php if(\App\Http\Controllers\Admin\Department_cont::permision($department,'ForceDelete')): ?>
                                            <?php if($department->name!='Default'): ?>
                                            <a class="btn btn-danger" onclick="del('<?php echo e(route('Department.Delete',['id'=>$department->id])); ?>')"><?php echo e(__('lang.Delete')); ?></a>
                                            
                                        
                                            <?php endif; ?>
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
<?php echo $__env->make("layouts.Admin_app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* H:\root\home\eritqaaacademy-001\www\crm\CRMV3\crmlaraveltest\resources\views/Crm/Department/Index_view.blade.php */ ?>