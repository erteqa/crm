<?php $__env->startSection('title'); ?>
    <?php echo e(__('lang.Edit_Group')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <?php echo e(__('lang.Edit_Group')); ?>

            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <a class="btn btn-primary" style="margin-bottom: 10px"
                   href="<?php echo e(route('Group.Add')); ?>"><?php echo e(__('lang.Add_Group')); ?></a>
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr>
<th>#</th>
                        <th><?php echo e(__('lang.Name')); ?></th>
                        <th><?php echo e(__('lang.Division')); ?></th>
                        <th><?php echo e(__('lang.Department')); ?></th>
                        <th><?php echo e(__('lang.Action')); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1;?>
                    <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       <?php if(\App\Http\Controllers\Admin\Group_cont::permision($group,'View')): ?>
                        <?php if($group->trashed()): ?>
                            <tr class="danger" class="odd gradeX">
                                <td><?php echo e($i++); ?></td>
                                <td><?php echo e($group->name); ?></td>
                                <td><?php echo e($group->Division->name); ?></td>
                                <td><?php echo e($group->Division->Department->name); ?></td>

                                
                                <td>
                                    <?php if(\App\Http\Controllers\Admin\Group_cont::permision($group,'ForceDelete')): ?>
                                    <a class="btn btn-danger"
                                       onclick="del('<?php echo e(route('Group.ForceDelete',['id'=>$group->id])); ?>')"><?php echo e(__('lang.Force_Delete')); ?></a>
                                    <a class="btn btn-danger"
                                       onclick="del('<?php echo e(route('Group.Restor',['id'=>$group->id])); ?>')"><?php echo e(__('lang.Restor')); ?></a>
                                <?php endif; ?>
                                </td>
                            </tr>
                        <?php else: ?>
                            <tr class="odd gradeX">
                                <td><?php echo e($i++); ?></td>
                                <td><?php echo e($group->name); ?></td>
                                <td><?php echo e($group->Division->name); ?></td>
                                <td><?php echo e($group->Division->Department->name); ?></td>
                                
                                <td>
                                    <?php if($group->id>1): ?>
                                        <?php if(\App\Http\Controllers\Admin\Group_cont::permision($group,'Update')): ?>
                                        <a class="btn btn-warning"
                                           href="<?php echo e(route('Group.Update',['id'=>$group->id])); ?>"><?php echo e(__('lang.Update')); ?></a>
                                        <?php endif; ?>
                                            <?php if(\App\Http\Controllers\Admin\Group_cont::permision($group,'Delete')): ?>
                                        <a class="btn btn-danger"
                                           onclick="del('<?php echo e(route('Group.Delete',['id'=>$group->id])); ?>')"><?php echo e(__('lang.Delete')); ?></a>
                                                <?php endif; ?>
                                    <?php endif; ?>
                                        <a class="btn btn-danger"
                                           href="<?php echo e(route('Group.View',['id'=>$group->id])); ?>"><?php echo e(__('lang.View')); ?></a>

                                        <a class="btn btn-danger"
                                           href="<?php echo e(route('Info.call',['id'=>$group->id])); ?>" target="_blank"><?php echo e(__('lang.Mang')); ?></a>

                                </td>
                            </tr>
                        <?php endif; ?>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <!-- /.table-responsive -->

                <script>
                    $(document).ready(function () {
                        $('#dataTables-example').DataTable({
                            responsive: true,
                            stateSave: true
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
<?php /* H:\root\home\eritqaaacademy-001\www\crm\CRMV3\crmlaraveltest\resources\views/Crm/Group/Index_view.blade.php */ ?>