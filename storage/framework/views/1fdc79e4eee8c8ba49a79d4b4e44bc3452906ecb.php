<?php $__env->startSection('content'); ?>

    <div class="col-lg-12">
        <form method="post" action="<?php echo e(route('Summery.Download')); ?>">
            <?php echo csrf_field(); ?>
            <input type="hidden" value="<?php echo e($customer->id); ?>" name="customer_id" >
            <input type="hidden" value="<?php echo e($trans_type); ?>" name="trans_type">
            <input type="hidden" value="<?php echo e($sdate); ?>" name="sdate">
            <input type="hidden" value="<?php echo e($edate); ?>" name="edate">
            <div class="col-sm-4">
                <input type="submit" class="btn btn-success btn-md" value="<?php echo e(__('Download')); ?>">
            </div>
        </form>
        <div class="panel panel-primary">

            <div class="panel-heading">
                <?php echo e(__('lang.Customer_Summary')); ?>


            </div>
            <table class="party">
                <thead>
                <tr class="heading">
                    <th> <?php echo e(__('lang.Our_Info')); ?>:</th>
                    <th>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                    <th><?php echo e(__('lang.Customer')); ?>:</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        <strong><?php echo e($company['name']); ?></strong>
                        <?php echo e($company['company']?$company['company']:''); ?><br>
                        <?php echo e($company['address']); ?> <br><?php echo e($company['city']); ?> ,
                        <?php echo e($company['region']); ?> <br> <?php echo e($company['country']); ?>

                        <?php echo e($company['postbox']); ?> <br><?php echo e(__('lang.Phone')); ?>:
                        <?php echo e($company['phone']); ?> <br><?php echo e(__('lang.Email')); ?>  :  <?php echo e($company['email']); ?>

                    </td>
                    <td>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td>
                        <strong><?php echo e($customer['name']); ?></strong><br>
                        <?php echo e($customer['company']?$customer['company']:''); ?><br>
                        <?php echo e($customer['address']); ?> <br><?php echo e($customer['company']); ?> ,
                        <?php echo e($customer['passport_number']); ?> <br><?php echo e(__('lang.Phone')); ?>:
                        <?php echo e($customer['phone']); ?> <br><?php echo e(__('lang.Email')); ?>  :  <?php echo e($customer['email']); ?>

                    </td>
                </tr>
                </tbody>
            </table>
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th><?php echo e(__('lang.Add_By')); ?></th>
                        <th><?php echo e(__('lang.Amount')); ?></th>
                        <th><?php echo e(__('lang.type')); ?></th>
                        <th><?php echo e(__('lang.Note')); ?></th>
                        <th><?php echo e(__('lang.Date')); ?></th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1;?>
                    <?php $__currentLoopData = $Transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="odd gradeX">
                            <td><?php echo e($i++); ?></td>
                            <td><?php echo e($Transaction->User->name); ?></td>
                            <td><?php echo e($Transaction->amount); ?></td>
                            <td><?php echo e($Transaction->type); ?></td>
                            <td><?php echo e($Transaction->note); ?></td>
                            <td><?php echo e($Transaction->date); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>

            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('subject'); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.Admin_app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* C:\dd\crmlaraveltest\resources\views/Acounting/Account_statement/Account_statement.blade.php */ ?>