
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
<?php $total=0; $payment=0;$remaining=0;?>
<table class="center">
    <tr class="center">
        <td class="center" >
            <img alt="Paris" class="center" style="max-width:260px;" src="<?php echo e(public_path() . '/Images/logo.png'); ?>">
        </td>
    </tr>
</table>
<div class="panel panel-primary">

    <div class="panel-heading">
        <div  style="text-align: center;font-weight:bold;"><span >  <?php echo e(__('lang.Customer_Summary')); ?></span></div>

    </div>

    <table class="gridtable">
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
    <div  style="text-align: center;font-weight:bold;"><span ><?php echo e(__('lang.Inovices')); ?></span></div>
    <div class="panel-body">
        <table width="100%" class="gridtable table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
            <tr>
                <th>#</th>
                <th><?php echo e(__('lang.Invoice_Number')); ?></th>
                <th><?php echo e(__('lang.Employee')); ?></th>
                <th><?php echo e(__('lang.invoicedate')); ?></th>
                <th><?php echo e(__('lang.status')); ?></th>
                <th><?php echo e(__('lang.Remaining_amount')); ?></th>
            </tr>
            </thead>
            <tbody>
            <?php $i = 1;?>
            <?php $__currentLoopData = $invoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="odd gradeX">
                    <td><?php echo e($i++); ?></td>
                    <td><?php echo e($invoice->tid); ?></td>

                    <td><?php echo e($invoice->User->name); ?></td>
                    <td><?php echo e($invoice->invoicedate); ?></td>

                    <td><span class="tag tag-default st-<?php echo e($invoice['status']); ?>"><?php echo e(__('lang.'.$invoice['status'])); ?></span></td>
                    <td><?php echo e($invoice->total - $invoice->pamnt.' TL'); ?></td>
                <?php $total+=$invoice->total;$payment+=$invoice->pamnt?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>

    </div>
    <div  style="text-align: center;font-weight:bold;"><span ><?php echo e(__('lang.transaction')); ?></span></div>
    <div class="panel-body">
        <table width="100%" class="gridtable table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
            <tr>
                <th>#</th>
                <th><?php echo e(__('lang.Add_By')); ?></th>
                <th><?php echo e(__('lang.Amount')); ?></th>
                <th><?php echo e(__('lang.type')); ?></th>
                <th><?php echo e(__('lang.method')); ?></th>
                <th><?php echo e(__('lang.remaining')); ?></th>
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
                    <td><?php echo e(__('lang.'.$Transaction->type)); ?></td>
                    <td><?php echo e($Transaction->method ==null?'':__('lang.'.$Transaction->method)); ?></td>
                    <td><?php echo e($Transaction->remaining); ?></td>
                    <td><?php echo e($Transaction->note); ?></td>
                    <td><?php echo e($Transaction->date); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>

    </div>
    <!-- /.panel-body -->
    <div style="margin: 5px">

    </div>
    <!-- /.col-lg-6 -->
    <div class="col-lg-8 col-lg-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">

                <div  style="text-align: center;font-weight:bold;"><span > <?php echo e(__('lang.result')); ?></span></div>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive table-bordered">
                    <table class="gridtable table">
                        <thead>
                        <tr>

                            <th><?php echo e(__('lang.suminvoice')); ?></th>
                            <th><?php echo e(__('lang.allpayment')); ?></th>
                            <th><?php echo e(__('lang.tlremaining')); ?></th>
                            <th><?php echo e(__('lang.oldbalance')); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><?php echo e($total.' TL'); ?></td>
                            <td><?php echo e($payment.' TL'); ?></td>
                            <td><?php echo e($total-$payment.' TL'); ?></td>
                            <td><?php echo e($customer->balance.' TL'); ?></td>
                        </tr>

                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-6 -->
</div>
<?php /* /home/eritqaaa/public_html/crmold.eritqaa.com.tr/resources/views/Acounting/Account_statement/download.blade.php */ ?>