
<!-- CSS goes in the document HEAD or added to your external stylesheet -->
<style type="text/css">
    table{
        width: 100%;
    }
    table.gridtable {
        font-family: verdana,arial,sans-serif;
        font-size:11px;
        color:#333333;
        border-width: 1px;
        border-color: #666666;
        border-collapse: collapse;
    }
    table.gridtable th {
        border-width: 1px;
        padding: 8px;
        border-style: solid;
        border-color: #666666;
        background-color: #dedede;
    }
    table.gridtable td {
        border-width: 1px;
        padding: 8px;
        border-style: solid;
        border-color: #666666;
        background-color: #ffffff;
    }
</style>
<!-- Table goes in the document BODY -->
<table class="gridtable">

    <tr>
        <th><?php echo e(__('lang.Our_Info')); ?>:</th>

        <th><?php echo e(__('lang.Customer')); ?>:</th>
    </tr>
    <tr>
        <td>
            <strong><?php echo e($company['name']); ?></strong>
            <?php echo e($company['company']?$company['company']:''); ?><br>
            <?php echo e($company['address']); ?> <br><?php echo e($company['city']); ?> ,
            <?php echo e($company['region']); ?> <br> <?php echo e($company['country']); ?>

            <?php echo e($company['postbox']); ?> <br><?php echo e(__('lang.Phone')); ?>:
            <?php echo e($company['phone']); ?> <br><?php echo e(__('lang.Email')); ?>  :  <?php echo e($company['email']); ?>

        </td>

        <td>
            <strong><?php echo e($customer['name']); ?></strong><br>
            <?php echo e($customer['company']?$customer['company']:''); ?><br>
            <?php echo e($customer['address']); ?> <br><?php echo e($customer['company']); ?> ,
            <?php echo e($customer['passport_number']); ?> <br><?php echo e(__('lang.Phone')); ?>:
            <?php echo e($customer['phone']); ?> <br><?php echo e(__('lang.Email')); ?>  :  <?php echo e($customer['email']); ?>

        </td>
    </tr>
</table>
<table class="gridtable">

    <tr>
        <th>#</th>
        <th><?php echo e(__('lang.Add_By')); ?></th>
        <th><?php echo e(__('lang.Amount')); ?></th>
        <th><?php echo e(__('lang.type')); ?></th>
        <th><?php echo e(__('lang.Note')); ?></th>
        <th><?php echo e(__('lang.Date')); ?></th>
    </tr>

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

</table>
<?php /* C:\dd\crmlaraveltest\resources\views/Acounting/Account_statement/download.blade.php */ ?>