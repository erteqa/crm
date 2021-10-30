

<?php $__env->startSection('content'); ?>
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <?php echo e(__('lang.Alert_Editor')); ?>

            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <a class="btn btn-primary" style="margin-bottom: 10px"
                   href="<?php echo e(route('Alert.Add')); ?>"><?php echo e(__('lang.Add_Alert')); ?></a>
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr>
                        <th><?php echo e(__('lang.Name')); ?></th>
                        <th><?php echo e(__('lang.Description')); ?></th>
                        <th><?php echo e(__('lang.Creat_at')); ?></th>
                        <th><?php echo e(__('lang.Action')); ?></th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $Alerts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Alert): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="odd gradeX">
                            <td><?php echo e($Alert->name); ?></td>
                            <td><?php echo e($Alert->description); ?></td>
                            <td><?php echo e($Alert->created_at); ?></td>
                            <td>
                                <a class="btn btn-danger"
                                   onclick="del('<?php echo e(route('Alert.Delete',['id'=>$Alert->id,'type'=>'B'])); ?>')"><?php echo e(__('lang.Delete')); ?></a>
                                <a class="btn btn-warning"
                                   href="<?php echo e(route('Alert.View',['id'=>$Alert->id,'type'=>'B'])); ?>"><?php echo e(__('lang.View')); ?></a>
                            </td>
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
<?php /* /home/eritqaaa/public_html/crmold.eritqaa.com.tr/resources/views/Crm/Alert/IndexB_view.blade.php */ ?>