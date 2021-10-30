<?php $__env->startSection('content'); ?>
    <style>

    </style>
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <?php echo e(__('lang.Course_joint')); ?>

            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">

                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thed>
                    <tr>
                        <th>#</th>
                        <th><?php echo e(__('lang.title')); ?></th>
                        <th><?php echo e(__('lang.teacher')); ?></th>
                        <th><?php echo e(__('lang.category')); ?></th>
                        <th><?php echo e(__('lang.difficulty')); ?></th>
                        <th><?php echo e(__('lang.link')); ?></th>
                        <th><?php echo e(__('lang.date')); ?></th>
                    </tr>
                    </thed>
                    <tbody>
                    <?php $i=1;?>
                    <?php if(count($Courses)>0): ?>
                    <?php $__currentLoopData = $Courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(auth()->guard('customer')->user()->hasAnyPermission([$Course->title])): ?>
                            <tr class="odd gradeX">
                            <td><?php echo e($i); ?></td>
                            <td><?php echo e($Course->title); ?></td>
                            <td><?php echo e($Course->teacher); ?></td>
                            <td><?php echo e($Course->category); ?></td>
                            <td><?php echo e($Course->difficulty); ?></td>
                            <td><a href="<?php echo e(route('Cu.Lesson.Index',['id'=>$Course->id])); ?>" target="_blank"><?php echo e(__('lang.linkopen')); ?></a></td>
                            <td><?php echo e($Course->date); ?></td>
                        </tr>
                        <?php $i++;?>
                            <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                    </tbody>
                </table>
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
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <?php echo e(__('lang.Course_Notjoint')); ?>

            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">

                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thed>
                        <tr>
                            <th>#</th>
                            <th><?php echo e(__('lang.title')); ?></th>
                            <th><?php echo e(__('lang.teacher')); ?></th>
                            <th><?php echo e(__('lang.category')); ?></th>
                            <th><?php echo e(__('lang.difficulty')); ?></th>
                            <th><?php echo e(__('lang.date')); ?></th>

                        </tr>
                    </thed>
                    <tbody>
                    <?php $i=1;?>
                    <?php $__currentLoopData = $Other; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <tr class="odd gradeX">
                                <td><?php echo e($i); ?></td>
                                <td><?php echo e($Course->title); ?></td>
                                <td><?php echo e($Course->teacher); ?></td>
                                <td><?php echo e($Course->category); ?></td>
                                <td><?php echo e($Course->difficulty); ?></td>

                                <td><?php echo e($Course->date); ?></td>
                            </tr>
                            <?php $i++;?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
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
<?php echo $__env->make("layouts.Web_app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* H:\root\home\eritqaaacademy-001\www\crm\CRMV3\crmlaraveltest\resources\views/Customer/Course/Index_view.blade.php */ ?>