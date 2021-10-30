<?php $__env->startSection('title'); ?>
    <?php echo e(__('lang.Expense_Editor')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <?php echo e(__('lang.Expense_Editor')); ?>

            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <a class="btn btn-primary" style="margin-bottom: 10px"
                   
                   href="<?php echo e(route('Expense.Add')); ?>"><?php echo e(__('lang.Add_Expense')); ?></a>
                
                <a class="btn btn-danger" style="margin-bottom: 10px;margin-left: 10px"
                   
                   href="<?php echo e(route('Expense.Index',['type'=>'Del'])); ?>"><?php echo e(__('lang.Deleted_Expenses')); ?></a>
                
                <a class="btn btn-success" style="margin-bottom: 10px;margin-left: 10px"
                   href="<?php echo e(route('Expense.Index',['type'=>'UN'])); ?>"><?php echo e(__('lang.Existed_Expenses')); ?></a>
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th><?php echo e(__('lang.Add_By')); ?></th>
                        <th><?php echo e(__('lang.Amount')); ?></th>
                        <th><?php echo e(__('lang.Note')); ?></th>
                        <th><?php echo e(__('lang.Date')); ?></th>
                        <th><?php echo e(__('lang.Action')); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1;?>
                    <?php $__currentLoopData = $Expenses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Expense): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <?php if(\App\Http\Controllers\Accounting\Expense_cont::permision('View')): ?>
                            <?php if($Expense->trashed()): ?>
                                <tr class="danger" class="odd gradeX">
                            <?php else: ?>
                                <tr class="odd gradeX">
                            <?php endif; ?>

                                    <td><?php echo e($i++); ?></td>
                                    <td><?php echo e($Expense->User->name); ?></td>

                                    <td><?php echo e($Expense->amount); ?></td>
                                    <td><?php echo e($Expense->note); ?></td>
                                    <td><?php echo e($Expense->date); ?></td>
                                    
                                    <?php if($Expense->trashed()): ?>
                                        <td style="width: 23%">
                                            <?php if(\App\Http\Controllers\Accounting\Expense_cont::permision('ForceDelete')): ?>
                                                <a class="btn btn-danger"
                                                   onclick="del('<?php echo e(route('Expense.ForceDelete',['id'=>$Expense->id])); ?>')"><?php echo e(__('lang.Force Delete')); ?></a>
                                                <a class="btn btn-danger"
                                                   onclick="del('<?php echo e(route('Expense.Restor',['id'=>$Expense->id])); ?>')"><?php echo e(__('lang.Restor')); ?></a>
                                            <?php endif; ?>

                                        </td>
                                    <?php else: ?>
                                        <td style="width: 23%">
                                            <?php if(\App\Http\Controllers\Accounting\Expense_cont::permision('Delete')): ?>
                                                <a class="btn btn-danger"
                                                   onclick="del('<?php echo e(route('Expense.Delete',['id'=>$Expense->id])); ?>')"><?php echo e(__('lang.Delete')); ?></a>
                                            <?php endif; ?>
                                            
                                                
                                                   
                                            
                                            <a class="btn btn-warning"
                                               href="<?php echo e(route('Expense.View',['id'=>$Expense->id])); ?>"><?php echo e(__('lang.View')); ?></a>
                                        </td>
                                    <?php endif; ?>


                                </tr>

                        <?php endif; ?>
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
<?php /* H:\root\home\eritqaaacademy-001\www\crm\CRMV3\crmlaraveltest\resources\views/Acounting/Expense/Index_view.blade.php */ ?>