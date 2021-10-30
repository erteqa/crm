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
<li>
    <a href="#"><i class="fa fa-wrench fa-fw"></i> <?php echo e(__('lang.Articles')); ?> <span class="fa arrow"></span></a>
    <ul class="nav nav-second-level">

        <li>
            <a href="<?php echo e(route('Article.Add')); ?>"><?php echo e(__('lang.Article.Add')); ?></a>
        </li>
        <li>
            <a href="<?php echo e(route('Article.Index',['type'=>'UN'])); ?>"><?php echo e(__('lang.Article_Index')); ?></a>
        </li>
        <li class="divider"></li>
        <li>
            <a href="<?php echo e(route('Category.Index')); ?>"><?php echo e(__('lang.Category.Index')); ?></a>
        </li>


    </ul>
</li>
<?php if(!Auth::user()->hasAnyRole(['Admin'])): ?>
<?php if(Auth::user()->Department->id==3 or Auth::user()->Department->id==6): ?>
<li>
    <a href="#"><i class="fa fa-wrench fa-fw"></i> <?php echo e(__('lang.Convert_degree')); ?> <span class="fa arrow"></span></a>
    <ul class="nav nav-second-level">

        <li>
            <a href="<?php echo e(route('Convert')); ?>"><?php echo e(__('lang.Convert_degree')); ?></a>
        </li>


    </ul>
</li>
    <?php endif; ?>
    <?php endif; ?>
<?php if(Auth::user()->hasAnyRole(['Admin']) ||
Auth::user()->hasAnyPermission(['Courses']) ): ?>
    <li>
        <a href="<?php echo e(route('Course.Index')); ?>"><i class="fa fa-wrench fa-fw"></i> <?php echo e(__('lang.Courses')); ?> <span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">

            <li>
                <a href="<?php echo e(route('Course.Index')); ?>"><?php echo e(__('lang.Course_Index')); ?></a>
            </li>
            <li>
                <a href="<?php echo e(route('Course.Add')); ?>"><?php echo e(__('lang.Course_Add')); ?></a>
            </li>


        </ul>
    </li>
<?php endif; ?>
<?php /* H:\root\home\eritqaaacademy-001\www\crm\CRMV3\crmlaraveltest\resources\views/layouts/Configure_app.blade.php */ ?>