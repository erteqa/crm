<?php $__env->startSection('content'); ?>
    <style>

    </style>
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <?php echo e(__('lang.Course_Editor')); ?>

            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <a class="btn btn-primary" style="margin-bottom: 10px"
                   href="<?php echo e(route('Course.Add')); ?>"><?php echo e(__('lang.Course_Add')); ?></a>
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thed>
                    <tr>
                        <th>#</th>
                        <th><?php echo e(__('lang.title')); ?></th>
                        <th><?php echo e(__('lang.teacher')); ?></th>
                        <th><?php echo e(__('lang.writer')); ?></th>
                        <th><?php echo e(__('lang.category')); ?></th>
                        <th><?php echo e(__('lang.difficulty')); ?></th>
                        <th><?php echo e(__('lang.hashtag')); ?></th>
                        <th><?php echo e(__('lang.link')); ?></th>
                        <th><?php echo e(__('lang.Add_By')); ?></th>
                        <th><?php echo e(__('lang.date')); ?></th>
                        <th><?php echo e(__('lang.Action')); ?></th>
                    </tr>
                    </thed>
                    <tbody>
                    <?php $i=1;?>
                    <?php $__currentLoopData = $Courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <tr class="odd gradeX">

                            <td><?php echo e($i); ?></td>
                            <td><?php echo e($Course->title); ?></td>
                            <td><?php echo e($Course->teacher); ?></td>
                            <td><?php echo e($Course->writer); ?></td>
                            <td><?php echo e($Course->category); ?></td>
                            <td><?php echo e($Course->difficulty); ?></td>
                            <td><?php echo e($Course->hashtag); ?></td>
                            <td><a href="<?php echo e($Course->link); ?>" target="_blank"><?php echo e(__('lang.linkopen')); ?></a></td>
                            <td><?php echo e(\App\User::find($Course->addby)->name); ?></td>
                            <td><?php echo e($Course->date); ?></td>
                                    <td style="width: 210px">
                                            <a class="btn btn-danger" onclick="del('<?php echo e(route('Course.Delete',['id'=>$Course->id])); ?>')"><?php echo e(__('lang.Delete')); ?></a>
                                            <a class="btn btn-warning" href="<?php echo e(route('Course.Update',['id'=>$Course->id])); ?>"><?php echo e(__('lang.Update')); ?></a>
                                            <a class="btn btn-warning" href="<?php echo e(route('Lesson.Index',['id'=>$Course->id])); ?>"><?php echo e(__('lang.View')); ?></a>
                                     </td>
                        </tr>
                        <?php $i++;?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <script>


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
<?php /* H:\root\home\eritqaaacademy-001\www\crm\CRMV3\crmlaraveltest\resources\views/Academy/Course/Index_view.blade.php */ ?>