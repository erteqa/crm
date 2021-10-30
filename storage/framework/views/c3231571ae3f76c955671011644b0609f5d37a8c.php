<?php $__env->startSection('content'); ?>
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <?php echo e(__('Customer Editor')); ?>

            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <a class="btn btn-primary" style="margin-bottom: 10px" href="<?php echo e(route('Group.Add')); ?>"><?php echo e(__('Add Group')); ?></a>
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr>
                        <th><?php echo e(__('Name')); ?></th>
                        <th><?php echo e(__('Action')); ?></th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="odd gradeX">

                        <td><?php echo e($group->name); ?></td>

                        
                        <td>
                            <a class="btn btn-danger" onclick="del('<?php echo e(route('Group.Delete',['id'=>$group->id])); ?>')"><?php echo e(__('Delete')); ?></a>
                            <a class="btn btn-warning" href="<?php echo e(route('Group.Update',['id'=>$group->id])); ?>"><?php echo e(__('Update')); ?></a>
                        </td>




                    </tr>
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
<?php /* C:\xampp\htdocs\crmlaravel\resources\views/Crm/Group/IndexB_view.blade.php */ ?>