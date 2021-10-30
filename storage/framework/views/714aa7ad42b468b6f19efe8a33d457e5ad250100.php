<?php $__env->startSection('content'); ?>
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <?php echo e(__('lang.State_Editor')); ?>

            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <a class="btn btn-primary" style="margin-bottom: 10px"
                   href="<?php echo e(route('State.Add')); ?>"><?php echo e(__('lang.Add_State')); ?></a>
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr>
                        <th><?php echo e(__('lang.Name')); ?></th>
                        <th><?php echo e(__('lang.Percent')); ?></th>
                        <th><?php echo e(__('lang.Action')); ?></th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $States; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $State): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($State->trashed()): ?>
                            <tr class="danger" class="odd gradeX">
                        <?php else: ?>
                            <tr class="odd gradeX">
                                <?php endif; ?>

                                <td><?php echo e($State->name); ?></td>
                                <td><?php echo e($State->percent); ?></td>
                                
                                <?php if($State->trashed()): ?>
                                    <td>
                                        <a class="btn btn-danger"
                                           onclick="del('<?php echo e(route('State.ForceDelete',['id'=>$State->id])); ?>')"><?php echo e(__('lang.Force Delete')); ?></a>
                                        <a class="btn btn-danger"
                                           onclick="del('<?php echo e(route('State.Restor',['id'=>$State->id])); ?>')"><?php echo e(__('lang.Restor')); ?></a>
                                    </td>
                                <?php else: ?>
                                    <td>
                                        <a class="btn btn-danger"
                                           onclick="del('<?php echo e(route('State.Delete',['id'=>$State->id])); ?>')"><?php echo e(__('lang.Delete')); ?></a>
                                        <a class="btn btn-warning"
                                           href="<?php echo e(route('State.Update',['id'=>$State->id])); ?>"><?php echo e(__('lang.Update')); ?></a>
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
<?php /* C:\dd\crmlaraveltest\resources\views/Crm/State/Index_view.blade.php */ ?>