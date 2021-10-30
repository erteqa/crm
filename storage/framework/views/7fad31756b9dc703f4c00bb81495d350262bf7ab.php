

<?php $__env->startSection('content'); ?>
    <style>

    </style>
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <?php echo e(__('lang.Article_Editor')); ?>

            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <a class="btn btn-primary" style="margin-bottom: 10px"
                   href="<?php echo e(route('Article.Add')); ?>"><?php echo e(__('lang.Add_Article')); ?></a>
                <a class="btn btn-danger" style="margin-bottom: 10px;margin-left: 10px"
                   href="<?php echo e(route('Article.Index',['type'=>'Del'])); ?>"><?php echo e(__('lang.Deleted_Article')); ?></a>
                <a class="btn btn-success" style="margin-bottom: 10px;margin-left: 10px"
                   href="<?php echo e(route('Article.Index',['type'=>'UN'])); ?>"><?php echo e(__('lang.Existed_Article')); ?></a>
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th><?php echo e(__('lang.title')); ?></th>
                        <th><?php echo e(__('lang.content')); ?></th>
                        <th><?php echo e(__('lang.Catrgory')); ?></th>
                        <th><?php echo e(__('lang.Add_By')); ?></th>
                        <th><?php echo e(__('lang.Creat_at')); ?></th>
                        <th><?php echo e(__('lang.Action')); ?></th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=1;?>
                    <?php $__currentLoopData = $Articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($Article->trashed()): ?>
                            <tr class="danger" class="odd gradeX">
                        <?php else: ?>
                            <tr class="odd gradeX">
                                <?php endif; ?>
                            <td><?php echo e($i); ?></td>
                            <td><?php echo e($Article->title); ?></td>
                            
                            <td width="200px"> <div style="text-align: right;padding: 6px; max-height:200px;max-width:400px; overflow:auto"><?php echo $Article->content; ?></div></td>
                            <td><?php echo e(!is_null($Article->Category)?$Article->Category->name:''); ?></td>
                            <td><?php echo e($Article->User->name); ?></td>
                            <td><?php echo e($Article->created_at); ?></td>

                                <?php if($Article->trashed()): ?>

                                    <td style="width: 210px">
                                            <a class="btn btn-danger"
                                               onclick="del('<?php echo e(route('Article.ForceDelete',['id'=>$Article->id])); ?>')"><?php echo e(__('lang.Force_Delete')); ?></a>

                                            <a class="btn btn-danger"
                                               onclick="del('<?php echo e(route('Article.Restor',['id'=>$Article->id])); ?>')"><?php echo e(__('lang.Restor')); ?></a>
                                    </td >
                                <?php else: ?>
                                    <td style="width: 210px">
                                            <a class="btn btn-danger" onclick="del('<?php echo e(route('Article.Delete',['id'=>$Article->id])); ?>')"><?php echo e(__('lang.Delete')); ?></a>
                                            <a class="btn btn-warning" href="<?php echo e(route('Article.Update',['id'=>$Article->id])); ?>"><?php echo e(__('lang.Update')); ?></a>
                                            <a class="btn btn-warning" href="<?php echo e(route('Article.View',['id'=>$Article->id])); ?>"><?php echo e(__('lang.View')); ?></a>
                                            <a class="btn btn-warning" href="<?php echo e(route('Article.ExView',['id'=>$Article->id])); ?>"><?php echo e(__('lang.Ex_View')); ?></a>
                                    </td>
                                <?php endif; ?>

                        </tr>
                        <?php $i++;?>
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
<?php /* /home/eritqaaa/public_html/crmold.eritqaa.com.tr/resources/views/Crm/Article/Index_view.blade.php */ ?>