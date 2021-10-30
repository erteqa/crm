
<?php $__env->startSection('title'); ?>
    Dashboard
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div>
    <style>
        .st-paid, .st-due, .st-partial, .st-canceled,.st-rejected,.st-pending,.st-accepted,.st-Recurring,.st-Stopped
        {
            text-transform: capitalize;
            color: #fff;
            padding: 4px;
            border-radius: 11px;
            font-size: 12px;
        }
        .st-paid,.st-accepted
        {
            background-color: #5ed45e;
        }
        .st-due,.st-Stopped
        {
            background-color: #ff6262;
        }
        .st-partial,.st-pending,.st-Recurring
        {
            background-color: #5da6fb;
        }
        .st-canceled,.st-rejected
        {
            background-color: #848030;
        }
    </style>
    <!-- /.row -->
    <?php if(Auth::user()->hasAnyRole(['Admin'])): ?>
    <div class="row">
        <div class="col-lg-2 col-md-4">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-turkish-lira fa-1x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php echo e($D_Expenses); ?></div>
                            <div><?php echo e(__('lang.D_Expenses')); ?></div>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left"><?php echo e(__('lang.View_Details')); ?></span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-2 col-md-4">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-turkish-lira fa-1x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php echo e($M_Expenses); ?></div>
                            <div><?php echo e(__('lang.M_Expenses')); ?></div>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left"><?php echo e(__('lang.View_Details')); ?></span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-lg-2 col-md-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-turkish-lira fa-1x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php echo e($D_Payment); ?></div>
                            <div><?php echo e(__('lang.D_Payment')); ?></div>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left"><?php echo e(__('lang.View_Details')); ?></span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-2 col-md-4">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-turkish-lira fa-1x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php echo e($M_Payment); ?></div>
                            <div><?php echo e(__('lang.M_Payment')); ?></div>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left"><?php echo e(__('lang.View_Details')); ?></span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-lg-2 col-md-4">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-turkish-lira fa-1x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php echo e($D_Income); ?></div>
                            <div><?php echo e(__('lang.Income_day')); ?></div>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left"><?php echo e(__('lang.View_Details')); ?></span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-2 col-md-4">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-2">
                            <i class="fa fa-turkish-lira fa-1x"></i>
                        </div>
                        <div class="col-xs-10 text-left">
                            <div class="huge"><?php echo e($M_Income); ?></div>
                            <div><?php echo e(__('lang.Income_month')); ?></div>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left"><?php echo e(__('lang.View_Details')); ?></span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <!-- /.row -->
    <div class="row">

        <div class="col-md-6 col-sm-12 col-xs-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    Latest tasks <span class="badge"> <?php echo e($countTasks); ?></span></button>
                    <span style="float: right">Completed: <?php echo e($completedTasks); ?> | Uncompleted: <?php echo e($uncompletedTasks); ?></span>
                </div>
                <div class="panel-body">
                    <div class="list-group">
                        <?php if(count($dataWithAllTasks) > 0): ?>
                            <?php $__currentLoopData = $dataWithAllTasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a href="<?php echo e(route('Task.View',['id'=>$result->id])); ?>" class="list-group-item">
                                    <span class="badge badge" style="background-color: #428bca !important;"><?php echo e($result['created_at']->diffForHumans()); ?></span>
                                    <span class="badge badge" style="background-color: #ca4e6e !important;">Duration: <?php echo e($result['duration'] . ' days'); ?></span>
                                    <i class="fa fa-fw fa-comment"></i> <?php echo e($result['name']); ?>

                                </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            There is no tasks.
                        <?php endif; ?>
                    </div>
                    <div class="text-right">
                        <a href="<?php echo e(route('Task.Index',['type' => 'P'])); ?>">More Tasks <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>


                <div class="card">

                    <div class="card-body">

                        <div class="table-responsive">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th><?php echo e(__('lang.Name')); ?></th>
                                    <th><?php echo e(__('lang.Phone')); ?></th>
                                    <?php if(auth()->user()->pattern==1 ): ?>
                                        <th><?php echo e(__('lang.company')); ?></th>
                                    <?php else: ?>
                                        <th><?php echo e(__('lang.Degreestudy')); ?></th>
                                    <?php endif; ?>

                                    <th><?php echo e(__('lang.Add_By')); ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 1;?>
                                <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <?php if(\App\Http\Controllers\Admin\Customer_cont::permision($customer,'View')): ?>

                                            <tr class="odd gradeX">

                                                <td><?php echo e($i++); ?></td>
                                                <td style="font-size: 12px;width: 12px"><?php echo e($customer['name']); ?></td>
                                                <td ><?php echo e($customer['phone']); ?></td>
                                                <td style="font-size: 12px;width: 12px"><a href="<?php echo e(route('Customer.View',['id'=>$customer->id])); ?>"><?php echo e($customer->company); ?></a></td>
                                                <td style="font-size: 12px;width: 12px"><?php echo e($customer->User['name']); ?></td>
                                            </tr>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>

        </div>
<?php if(Auth::user()->hasAnyRole(['Admin'])): ?>
<div class="col-xl-4 col-lg-6">


        <div class="panel-body">
                <div class="dashboard-sales-breakdown-chart" id="dashboard-sales-breakdown-chart"></div>
        </div>

</div>
<?php endif; ?>
<div class="col-md-6 col-sm-12 col-xs-12">

    <div class="card">
        <div class="card-header">
            <h4 class="card-title"><?php echo e(__('lang.recent_invoices')); ?>

                <a
                        href="<?php echo e(route('Add.Invoice')); ?>"
                        class="btn btn-primary btn-sm rounded"><?php echo e(__('lang.Add_Invoice')); ?></a>
                <a
                        href="<?php echo e(route('Index.Invoice',['type'=>'UN'])); ?>"
                        class="btn btn-success btn-sm rounded"><?php echo e(__('lang.Manage_Invoices')); ?></a>
            </h4>
            <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
            <div class="heading-elements">
                <ul class="list-inline mb-0">
                    <li><a data-action="reload"><i class="icon-reload"></i></a></li>
                    <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                </ul>
            </div>
        </div>

        <div class="card-body">

            <div class="table-responsive">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example1">
                    <thead>
                    <tr>
                        <th><?php echo e(__('lang.Invoices')); ?>#</th>
                        <th><?php echo e(__('lang.Customer')); ?></th>
                        <th><?php echo e(__('lang.Status')); ?></th>
                        <th><?php echo e(__('lang.Date')); ?></th>
                        <th><?php echo e(__('lang.Amount')); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(count($Invoices)>0): ?>
                    <?php $__currentLoopData = $Invoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if( \App\Http\Controllers\Accounting\Invoice_cont::invpermision($Invoice->Customer,'View')): ?>
                        <tr>
                        <td class="text-truncate"><a href="<?php echo e(route('Invoice.View',['id'=>$Invoice->id])); ?>">#<?php echo e($Invoice['tid']); ?></a></td>
                        <td class="text-truncate" style="font-size: 12px;width: 12px"> <?php echo e($Invoice->Customer['name']); ?></td>
                        <td class="text-truncate"><span class="tag tag-default st-<?php echo e($Invoice['status']); ?>"><?php echo e(__('lang.'.$Invoice['status'])); ?></span></td>
                        <td class="text-truncate"><?php echo e($Invoice['invoicedate']); ?></td>
                        <td class="text-truncate"><?php echo e($Invoice['total']); ?></td>
                    </tr>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
</div>
<script>
$(document).ready(function () {
    $('#dataTables-example').DataTable({
        responsive: true,
        stateSave: true
    });

});
$(document).ready(function () {
    $('#dataTables-example1').DataTable({
        responsive: true,
        stateSave: true
    });

});
</script>
</div>



<script>
$('#dashboard-sales-breakdown-chart').empty();

Morris.Donut({
    element: 'dashboard-sales-breakdown-chart',
    data: [{label: "<?php echo e(__('lang.Income')); ?>", value: '<?php echo e($Income); ?>' },
        {label: "<?php echo e(__('lang.Expenses')); ?>", value: '<?php echo e($Expenses); ?>' },
        {label: "<?php echo e(__('lang.Payment')); ?>", value:'<?php echo e($Payment); ?>' },
    ],
    resize: true,
    colors: ['#34cea7', '#ff6e40','#f63273'],
    gridTextSize: 6,
    gridTextWeight: 400
});
</script>




    
    

    
    
        
        
            
            
            
            
        
    

    
    


<?php $__env->stopSection(); ?>
<?php $__env->startSection('subject'); ?>
Subject For  Post
<?php $__env->stopSection(); ?>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>


<?php echo $__env->make("layouts.Admin_app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* /home/eritqaaa/public_html/crmold.eritqaa.com.tr/resources/views/dashboard_view.blade.php */ ?>