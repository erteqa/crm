<?php if(Auth::user()->hasAnyRole(['Admin'])): ?>
<li>
    <a href="#"><i class="fa fa-wrench fa-fw"></i> <?php echo e(__('lang.Configure')); ?> <span class="fa arrow"></span></a>
    <ul class="nav nav-second-level">
        <li>
            <a href="<?php echo e(route('Company.Index')); ?>"><?php echo e(__('lang.Company')); ?></a>
        </li>
        <li>
            <a href="<?php echo e(route('Mail.Index')); ?>"><?php echo e(__('lang.Mail')); ?></a>
        </li>


    </ul>
</li>
<?php endif; ?>
<?php if(Auth::user()->hasAnyRole(['Admin']) ||
Auth::user()->hasAnyPermission(['Invoice_Add',
'Invoice_Update',
'Invoice_Delete',
'Invoice_ForceDelete',
'Invoice_View', ]) ): ?>
<li>
    <a href="#"><i class="fa fa-wrench fa-fw"></i> <?php echo e(__('lang.MangInvoices')); ?> <span class="fa arrow"></span></a>
    <ul class="nav nav-second-level">
        <?php if(Auth::user()->hasAnyRole(['Admin']) ||
        Auth::user()->hasAnyPermission(['Invoice_Add',
        ]) ): ?>
        <li>
            <a href="<?php echo e(route('Add.Invoice')); ?>"><?php echo e(__('lang.Add_Invoice')); ?></a>
        </li>
        <?php endif; ?>
            <?php if(Auth::user()->hasAnyRole(['Admin']) ||
    Auth::user()->hasAnyPermission([
    'Invoice_Update',
    'Invoice_Delete',
    'Invoice_ForceDelete',
    'Invoice_View', ]) ): ?>
        <li>
            <a href="<?php echo e(route('Index.Invoice',['type'=>'UN'])); ?>"><?php echo e(__('lang.Index_Invoice')); ?></a>
        </li>
<?php endif; ?>
    </ul>
</li>
<?php endif; ?>
   
<?php if(Auth::user()->hasAnyRole(['Admin']) ||
Auth::user()->hasAnyPermission(['Payment_Add','Payment_Delete','Payment_ForceDelete','Payment_View']) ): ?>

    <li>
        <a href="#"><i class="fa fa-wrench fa-fw"></i> <?php echo e(__('lang.Payments')); ?> <span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <?php if(Auth::user()->hasAnyRole(['Admin']) ||
            Auth::user()->hasAnyPermission(['Payment_Add']) ): ?>
            <li>
                <a href="<?php echo e(route('Payment.Add')); ?>"><?php echo e(__('lang.Add_Payments')); ?></a>
            </li>
<?php endif; ?>
                <?php if(Auth::user()->hasAnyRole(['Admin']) ||
    Auth::user()->hasAnyPermission(['Payment_Delete','Payment_ForceDelete','Payment_View']) ): ?>
            <li>
                <a href="<?php echo e(route('Payment.Index',['type'=>'UN'])); ?>"><?php echo e(__('lang.Payments_Mangment')); ?></a>
            </li>
                    <?php endif; ?>
        </ul>
    </li>

<?php endif; ?>
<?php if(Auth::user()->hasAnyRole(['Admin']) ||
Auth::user()->hasAnyPermission(['Expense_Add','Expense_Delete','Expense_ForceDelete','Expense_View']) ): ?>

    <li>
        <a href="#"><i class="fa fa-wrench fa-fw"></i> <?php echo e(__('lang.Expenses')); ?> <span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <?php if(Auth::user()->hasAnyRole(['Admin']) ||
            Auth::user()->hasAnyPermission(['Expense_Add']) ): ?>
                <li>
                    <a href="<?php echo e(route('Expense.Add')); ?>"><?php echo e(__('lang.Add_Expenses')); ?></a>
                </li>
            <?php endif; ?>
            <?php if(Auth::user()->hasAnyRole(['Admin']) ||
Auth::user()->hasAnyPermission(['Expense_Delete','Expense_ForceDelete','Expense_View']) ): ?>
                <li>
                    <a href="<?php echo e(route('Expense.Index',['type'=>'UN'])); ?>"><?php echo e(__('lang.Expenses_Mangment')); ?></a>
                </li>
            <?php endif; ?>
        </ul>
    </li>

<?php endif; ?>
<?php if(Auth::user()->hasAnyRole(['Admin']) ||
Auth::user()->hasAnyPermission(['ImportExport']) ): ?>
<li>
    <a href="#"><i class="fa fa-wrench fa-fw"></i> <?php echo e(__('lang.ImportExport')); ?> <span class="fa arrow"></span></a>
    <ul class="nav nav-second-level">

        <li>
            <a href="<?php echo e(route('ImportExport')); ?>"><?php echo e(__('lang.CustomerExport')); ?></a>
        </li>


    </ul>
</li>
<?php endif; ?>

    <li>
        <a href="#"><i class="fa fa-wrench fa-fw"></i> <?php echo e(__('lang.Summery')); ?> <span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">

            <li>
                <a href="<?php echo e(route('Summery.Create')); ?>"><?php echo e(__('lang.Customer_Summery')); ?></a>
            </li>


        </ul>
    </li>

<?php /* C:\dd\crmlaraveltest\resources\views/layouts/Configure_app.blade.php */ ?>