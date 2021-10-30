

<?php $__env->startSection('content'); ?>
    <style>

    </style>
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <?php echo e(__('lang.Category_Editor')); ?>

                <a href="<?php echo e(route('Article.Index',['type'=>'UN'])); ?>"><?php echo e(__('lang.Article_Index')); ?></a>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th><?php echo e(__('lang.name')); ?></th>
                        <th><?php echo e(__('lang.Action')); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=1;?>
                    <?php $__currentLoopData = $Cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <tr class="odd gradeX">

                            <td><?php echo e($i); ?></td>
                            <td><?php echo e($cat->name); ?></td>
                                    <td style="width: 210px">
                                            <a class="btn btn-danger" onclick="del('<?php echo e(route('Category.Delete',['id'=>$cat->id])); ?>')"><?php echo e(__('lang.Delete')); ?></a>
                                    </td>


                        </tr>
                        <?php $i++;?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <!-- /.table-responsive -->
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
<?php /* /home/eritqaaa/public_html/crmold.eritqaa.com.tr/resources/views/Crm/Category/Index_view.blade.php */ ?>