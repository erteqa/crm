<?php $__env->startSection('title'); ?>
    <?php echo e(__('lang.Divisions_Editor')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <?php echo e(__('lang.Divisions_Editor')); ?>

            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <a class="btn btn-primary" style="margin-bottom: 10px"
                   href="<?php echo e(route('Group.Add')); ?>"><?php echo e(__('lang.Add_Group')); ?></a>
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr>
                        <?php $i = 1;?>
                        <th>#</th>
                        <th><?php echo e(__('lang.Name')); ?></th>
                        <th><?php echo e(__('lang.Departments')); ?></th>
                        <th><?php echo e(__('lang.Action')); ?></th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $Divisions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Division): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(\App\Http\Controllers\Admin\Division_cont::permision($Division,'View')): ?>
                            <?php if($Division->trashed()): ?>
                                <tr class="danger" class="odd gradeX">
                            <?php else: ?>
                                <tr class="odd gradeX">
                                    <?php endif; ?>
                                    <td><?php echo e($i++); ?></td>
                                    <td><?php echo e($Division->name); ?></td>
                                    <td><?php echo e($Division->Department->name); ?></td>
                                    

                                    <?php if($Division->trashed()): ?>
                                        <td style="width: 23%">
                                            <?php if( \App\Http\Controllers\Admin\Division_cont::permision($Division,'ForceDelete')): ?>
                                                <?php if($Division->name!='Default'): ?>
                                                    <a class="btn btn-danger"
                                                       onclick="del('<?php echo e(route('Division.ForceDelete',['id'=>$Division->id])); ?>')"><?php echo e(__('lang.Force_Delete')); ?></a>
                                                    <a class="btn btn-danger"
                                                       onclick="del('<?php echo e(route('Division.Restor',['id'=>$Division->id])); ?>')"><?php echo e(__('lang.Restor')); ?></a>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </td>
                                    <?php else: ?>
                                        <td style="width: 23%">
                                            <?php if($Division->name!='Default'): ?>
                                                <?php if( \App\Http\Controllers\Admin\Division_cont::permision($Division,'Delete')): ?>
                                                    <a class="btn btn-danger"
                                                       onclick="del('<?php echo e(route('Division.Delete',['id'=>$Division->id])); ?>')"><?php echo e(__('lang.Delete')); ?></a>
                                                <?php endif; ?>
                                                <?php if( \App\Http\Controllers\Admin\Division_cont::permision($Division,'Update')): ?>
                                                    <a class="btn btn-warning"
                                                       href="<?php echo e(route('Division.Update',['id'=>$Division->id])); ?>"><?php echo e(__('lang.Update')); ?></a>

                                                <?php endif; ?>
                                            <?php endif; ?>
                                            <a class="btn btn-warning"
                                               href="<?php echo e(route('Division.View',['id'=>$Division->id])); ?>"><?php echo e(__('lang.View')); ?></a>
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
<?php /* H:\root\home\eritqaaacademy-001\www\crm\CRMV3\crmlaraveltest\resources\views/Crm/Division/Index_view.blade.php */ ?>