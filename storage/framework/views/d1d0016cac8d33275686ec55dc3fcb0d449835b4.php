<?php $__env->startSection('content'); ?>
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <?php echo e(__('Ticket Editor')); ?>

            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <a class="btn btn-primary" style="margin-bottom: 10px"
                   href="#"></a>
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr>
                        <th><?php echo e(__('lang.Customer')); ?></th>
                        <th><?php echo e(__('lang.Department')); ?></th>
                        <th><?php echo e(__('lang.Groups')); ?></th>
                        <th><?php echo e(__('lang.Subject')); ?></th>
                        <th><?php echo e(__('lang.reply')); ?></th>
                        <th><?php echo e(__('lang.Creat_at')); ?></th>
                        <th><?php echo e(__('lang.Action')); ?></th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $Tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="odd gradeX">
                            <td><?php echo e($Ticket->Customer->name); ?></td>
                            <td><?php echo e($Ticket->Department->name); ?></td>
                            <td><?php echo e($Ticket->Customer->Group->name); ?></td>
                            <td><?php echo $Ticket->subject; ?></td>
                            <td><?php echo $Ticket->reply; ?></td>
                            <td><?php echo e($Ticket->created_at); ?></td>
                            <td>
                                <a class="btn btn-warning"
                                   href="<?php echo e(route('Ticket.View',['id'=>$Ticket->id,'type'=>'A'])); ?>"><?php echo e(__('View')); ?></a>
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
<?php /* H:\root\home\eritqaaacademy-001\www\crm\CRMV3\crmlaraveltest\resources\views/Crm/Ticket/Index_view.blade.php */ ?>