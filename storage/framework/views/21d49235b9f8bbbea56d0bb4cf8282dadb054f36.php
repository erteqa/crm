<div class="col-lg-12">
    <div class="panel panel-primary">
        <!-- /.panel-heading -->
        <div class="panel-body">
            <table width="100%" class="table table-striped table-bordered table-hover" >
                <thead>
                <tr>
                    <th>#</th>
                    <th><?php echo e(__('lang.addby')); ?></th>
                    <th><?php echo e(__('lang.customername')); ?></th>
                    <th><?php echo e(__('lang.content')); ?></th>
                    <th><?php echo e(__('lang.created_at')); ?></th>
                    <th><?php echo e(__('lang.Action')); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php $i = 1;?>

                <?php $__currentLoopData = $customer->Not; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $not): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($i++); ?></td>
                        <td><?php echo e($not->User->name); ?></td>
                        <td><?php echo e($not->Customer->name); ?></td>
                        <td><?php echo e($not->content); ?></td>
                        <td><?php echo e($not->created_at); ?></td>
                        <td style="width: 23%">
                            <?php if(auth()->user()->id===$not->user_id): ?>
                                <a class="btn btn-danger"
                                   onclick="del('<?php echo e(route('Notes.Delete',['id'=>$not->id])); ?>')"><?php echo e(__('lang.Delete')); ?></a>

                                <button class="btn btn-success"
                                        onclick="open1dialogupdate(<?php echo e("'".$not->content."',".$not->id); ?>)"><?php echo e(__('lang.Update')); ?></button>
                            <?php endif; ?>
                        </td>
                    </tr>
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

<?php /* H:\root\home\eritqaaacademy-001\www\crm\CRMV3\crmlaraveltest\resources\views/info/cunots.blade.php */ ?>