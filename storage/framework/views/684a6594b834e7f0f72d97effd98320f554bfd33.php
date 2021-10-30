
<!DOCTYPE html>


<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <?php if(auth()->guard()->check()): ?>


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $__env->yieldContent("title"); ?></title>
    <?php echo Html::script("Admin/vendor/jquery/jquery.min.js"); ?>


    <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">



    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
<?php echo Html::style("Admin/vendor/bootstrap/css/bootstrap.min.css"); ?>

<?php echo Html::style("Admin/vendor/metisMenu/metisMenu.min.css"); ?>

<?php echo Html::style("Admin/dist/css/sb-admin-2.css"); ?>

<?php echo Html::style("Admin/vendor/font-awesome/css/font-awesome.min.css"); ?>


<!-- Bootstrap Core CSS -->


    <!-- MetisMenu CSS -->


    <!-- Custom CSS -->


    <!-- Custom Fonts -->

    <script src="//cdn.ckeditor.com/4.11.3/full/ckeditor.js"></script>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>


    <![endif]-->

</head>

<body>

<div id="wrapper">
    <span class="hidden">
        
        
        

        <?php echo e(\App\Http\Controllers\Admin\Dashboard_cont::refersh()); ?>

        <?php echo e($alerts=\App\Http\Controllers\Admin\Dashboard_cont::getalert()); ?>

        <?php echo e($Tasks=\App\Http\Controllers\Admin\Dashboard_cont::gettask()); ?>

    </span>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html">Crm v3.0</a>
        </div>
        <!-- /.navbar-header -->

<?php echo e(app()->getLocale()); ?>

        &nbsp;&nbsp;&nbsp;&nbsp;
        <span class="tab"> <?php echo e(auth()->user()->name); ?></span>


        <ul class="nav navbar-top-links navbar-right">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo e(route('lang', ['lang' => 'ar'])); ?>">Arabic</a></li>
                    <li><a href="<?php echo e(route('lang', ['lang' => 'en'])); ?>">English</a></li>
                    <li><a href="<?php echo e(route('lang', ['lang' => 'tr'])); ?>">Turcky</a></li>
                </ul>
            </li>
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
                    <?php if(count($alerts)>0): ?><span class="btn btn-danger btn-circle"><?php echo e(count($alerts)); ?></span><?php endif; ?>
                </a>
                <ul class="dropdown-menu dropdown-alerts">
                    <?php $__currentLoopData = $alerts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $alert): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>
                            <a href="<?php echo e(route('Alert.View',['id'=>$alert->id ,'type' => 'A'])); ?>">
                                <?php if(!is_null($alert)): ?>
                                    <div>
                                        <strong><?php echo e($alert->name); ?></strong>
                                        <span class="pull-right text-muted">
                                        <em><?php echo e($alert->created_at); ?></em>
                                    </span>
                                    </div>
                                    <div><?php echo e($alert->description); ?></div>
                                <?php endif; ?>
                            </a>
                        </li>
                        <li class="divider"></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <li>
                        <a class="text-center" href="<?php echo e(route('Alert.Index',['type' => 'A'])); ?>">
                            <strong>See All Alerts</strong>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </li>
                </ul>
                <!-- /.dropdown-alerts -->
            </li>
            <!-- /.dropdown -->
            
                
                    
                
                
                    
                        
                            
                                
                                
                                        
                                    
                            
                            
                        
                    
                    
                    
                        
                            
                                
                                
                                        
                                    
                            
                            
                        
                    
                    
                    
                        
                            
                                
                                
                                        
                                    
                            
                            
                        
                    
                    
                    
                        
                            
                            
                        
                    
                
                
            
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-tasks fa-fw"></i> <i class="fa fa-caret-down"></i><?php if(count($Tasks)>0): ?><span class="btn btn-danger btn-circle"><?php echo e(count($Tasks)); ?></span><?php endif; ?>
                </a>
                <ul class="dropdown-menu dropdown-tasks">
                    <?php $__currentLoopData = $Tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>
                            <a href="<?php echo e(route('Task.View',['id'=>$Task->id])); ?>">
                                <div>
                                    <p>
                                        <strong><?php echo e($Task->name==''?'':$Task->name); ?></strong>
                                        <strong><?php echo e(is_null($Task->TaskType)?'':$Task->TaskType->name); ?></strong>
                                        <span class="pull-right text-muted"><?php echo e($Task->State->percent); ?> % <?php echo e($Task->State->name); ?></span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar <?php echo e(\App\Http\Controllers\Style_cont::progress($Task->State->percent)); ?>"
                                             role="progressbar"
                                             aria-valuenow="<?php echo e($Task->State->percent); ?>" aria-valuemin="0"
                                             aria-valuemax="100"
                                             style="width: <?php echo e($Task->State->percent); ?>%">
                                            <span class="sr-only"><?php echo e($Task->State->percent); ?>% <?php echo e($Task->State->name); ?> (success)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <a class="text-center" href="<?php echo e(route('Task.Index',['type'=>'O'])); ?>">
                            <strong>See All Tasks</strong>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </li>
                </ul>
                <!-- /.dropdown-tasks -->
            </li>
            <!-- /.dropdown -->

            
                
                    
                
                
                    
                        
                            
                                
                                
                            
                        
                    
                    
                    
                        
                            
                                
                                
                            
                        
                    
                    
                    
                        
                            
                                
                                
                            
                        
                    
                    
                    
                        
                            
                                
                                
                            
                        
                    
                    
                    
                        
                            
                                
                                
                            
                        
                    
                    
                    
                        
                            
                            
                        
                    
                
                
            
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="<?php echo e(route('UploadProfile',['id'=>\Illuminate\Support\Facades\Auth::user()->id])); ?>"><i class="fa fa-user fa-fw"></i> User Profile</a>
                    </li>
                    <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                    </li>
                    <li class="divider"></li>

                        <!-- Authentication Links -->
                        <?php if(auth()->guard()->guest()): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('lang.Login')); ?></a>
                            </li>
                            
                                
                                    
                                
                            
                        <?php else: ?>



                                <div >
                                    <a  href="<?php echo e(route('logout')); ?>"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <?php echo e(__('lang.Logout')); ?>

                                    </a>

                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                        <?php echo csrf_field(); ?>
                                    </form>
                                </div>

                        <?php endif; ?>



                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>
        <!-- /.navbar-top-links -->

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li>
                        <a href=<?php echo e(route('Dashboard')); ?>><i class="fa fa-dashboard fa-fw"></i> <?php echo e(__('lang.Dashboard')); ?></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-sitemap fa-fw"></i> CRM <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <!-- /.Start Customer -->
                            <?php if(Auth::user()->hasAnyRole(['Admin']) ||
                                                               Auth::user()->hasAnyPermission(['Customer_Add',
                                                                                               'Customer_Mangment',
                                                                                               ]) ): ?>
                                <li>
                                    <a href="#"><i class="fa fa-sitemap fa-fw"></i> <?php echo e(__('lang.Customers')); ?> <span
                                                class="fa arrow"></span></a>
                                    <ul class="nav nav-one-level">
                                        <?php if(Auth::user()->hasAnyRole(['Admin']) ||
                                                 Auth::user()->hasAnyPermission([
                                                 'Customer_Add',
                                                 ]) ): ?>
                                            <li>
                                                <a href="<?php echo e(route('Customer.Add')); ?>"><?php echo e(__('lang.New_Customer')); ?> </a>
                                            </li>
                                        <?php endif; ?>
                                        <?php if(Auth::user()->hasAnyRole(['Admin']) ||
                                        Auth::user()->hasAnyPermission([
                                                                        'Customer_Mangment',
                                                                        ]) ): ?>
                                            <li>
                                                <a href="<?php echo e(route('Customer.Index',['type'=>'UN'])); ?>"><?php echo e(__('lang.Customers_Mangment')); ?>

                                                    <?php if(Auth::user()->hasAnyRole(['Admin'])): ?>
                                                    <span class="btn btn-success btn-flickr"><?php echo e(\App\Model\Customer::all()->count()); ?></span>
                                                    <?php endif; ?>
                                                </a>

                                            </li>

                                        <?php endif; ?>
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                            <?php endif; ?>
                        <!-- /.End Customer  -->
                            <!-- /.Start Employee  -->
                            <?php if(Auth::user()->hasAnyRole(['Admin']) ||
                                                             Auth::user()->hasAnyPermission(['Employee_Add',
                                                                                             'Employee_Mangment',
                                                                                           ]) ): ?>
                                <li>
                                    <a href="#"><i class="fa fa-sitemap fa-fw"></i> <?php echo e(__('lang.Employees')); ?> <span
                                                class="fa arrow"></span></a>
                                    <ul class="nav nav-one-level">
                                        <?php if(Auth::user()->hasAnyRole(['Admin']) ||
                                                Auth::user()->hasAnyPermission([
                                                'Employee_Add',
                                                ]) ): ?>


                                            <li>
                                                <a href="<?php echo e(route('Employee.Add')); ?>"><?php echo e(__('lang.Add_Employee')); ?> </a>
                                            </li>
                                        <?php endif; ?>
                                        <?php if(Auth::user()->hasAnyRole(['Admin']) ||
                                        Auth::user()->hasAnyPermission([
                                                                        'Employee_Mangment',
                                                                    ]) ): ?>
                                            <li>
                                                <a href="<?php echo e(route('Employee.Index')); ?>"><?php echo e(__('lang.Employees_Mangment')); ?>

                                                    <?php if(Auth::user()->hasAnyRole(['Admin'])): ?>
                                                    <span class="btn btn-info btn-flickr"><?php echo e(\App\User::all()->count()); ?></span>
                                          <?php endif; ?>
                                                </a>
                                            </li>
                                        <?php endif; ?>
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                            <?php endif; ?>
                        <!-- /.End Employee  -->
                            <!-- /.Start Department  -->
                            <?php if(Auth::user()->hasAnyRole(['Admin']) ||
                                                                 Auth::user()->hasAnyPermission(['Department_Add',
                                                                                                 'Department_Mangment',
                                                                                                ]) ): ?>
                                <li>
                                    <a href="#"><i class="fa fa-sitemap fa-fw"></i> <?php echo e(__('lang.Depatments')); ?> <span
                                                class="fa arrow"></span></a>
                                    <ul class="nav nav-one-level">
                                        <?php if(Auth::user()->hasAnyRole(['Admin']) ||
                                                                   Auth::user()->hasAnyPermission(['Department_Add',
                                                                                                   ]) ): ?>
                                            <li>
                                                <a href="<?php echo e(route('Department.Add')); ?>"><?php echo e(__('lang.New_Department')); ?> </a>
                                            </li>
                                        <?php endif; ?>
                                        <?php if(Auth::user()->hasAnyRole(['Admin']) ||
                                                                   Auth::user()->hasAnyPermission([
                                                                                                   'Department_Mangment',
                                                                                                 ]) ): ?>
                                            <li>
                                                <a href="<?php echo e(route('Department.Index')); ?>"><?php echo e(__('lang.Department_Mangment')); ?>

                                                    <?php if(Auth::user()->hasAnyRole(['Admin'])): ?>
                                                    <span class="btn btn-default btn-flickr"><?php echo e(\App\Model\Department::all()->count()); ?></span>
                                           <?php endif; ?>
                                                </a>
                                            </li>
                                        <?php endif; ?>
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                            <?php endif; ?>
                        <!-- /.End Department -->
                            <!-- /.Start Group -->
                            <?php if(Auth::user()->hasAnyRole(['Admin']) ||
                                                          Auth::user()->hasAnyPermission(['Group_Add',
                                                                                          'Group_Mangment',
                                                                                         ]) ): ?>
                                <li>
                                    <a href="#"><i class="fa fa-sitemap fa-fw"></i> <?php echo e(__('lang.Groups')); ?> <span
                                                class="fa arrow"></span></a>
                                    <ul class="nav nav-one-level">
                                        <?php if(Auth::user()->hasAnyRole(['Admin']) ||
                                                           Auth::user()->hasAnyPermission(['Group_Add',
                                                                                         ]) ): ?>
                                            <li>
                                                <a href="<?php echo e(route('Group.Add')); ?>"><?php echo e(__('lang.New_Groups')); ?> </a>
                                            </li>
                                        <?php endif; ?>
                                        <?php if(Auth::user()->hasAnyRole(['Admin']) ||
                                                           Auth::user()->hasAnyPermission([
                                                                                           'Group_Mangment',
                                                                                          ]) ): ?>
                                            <li>
                                                <a href="<?php echo e(route('Group.Index')); ?>"><?php echo e(__('lang.Groups_Mangment')); ?>

                                                    <?php if(Auth::user()->hasAnyRole(['Admin'])): ?>
                                                    <span class="btn btn-danger btn-flickr"><?php echo e(\App\Model\Group::all()->count()); ?></span>
                                           <?php endif; ?>
                                                </a>
                                            </li>
                                        <?php endif; ?>
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                            <?php endif; ?>
                        <!-- /.End Group -->
                            <?php if(Auth::user()->hasAnyRole(['Admin']) ||
                                                          Auth::user()->hasAnyPermission(['Division_Add',
                                                                                          'Division_Mangment',
                                                                                         ]) ): ?>
                                <li>
                                    <a href="#"><i class="fa fa-sitemap fa-fw"></i> <?php echo e(__('lang.Divisions')); ?> <span
                                                class="fa arrow"></span></a>
                                    <ul class="nav nav-one-level">
                                        <?php if(Auth::user()->hasAnyRole(['Admin']) ||
                                                             Auth::user()->hasAnyPermission(['Division_Add',
                                                                                             ]) ): ?>
                                            <li>
                                                <a href="<?php echo e(route('Division.Add')); ?>"><?php echo e(__('lang.New_Division')); ?> </a>
                                            </li>
                                        <?php endif; ?>
                                        <?php if(Auth::user()->hasAnyRole(['Admin']) ||
                                                             Auth::user()->hasAnyPermission([
                                                                                             'Division_Mangment',
                                                                                       ]) ): ?>

                                            <li>
                                                <a href="<?php echo e(route('Division.Index')); ?>"><?php echo e(__('lang.Divisions_Mangment')); ?>

                                                    <?php if(Auth::user()->hasAnyRole(['Admin'])): ?>
                                                    <span class="btn btn-warning btn-flickr"><?php echo e(\App\Model\Division::all()->count()); ?></span>
                                            <?php endif; ?>
                                                </a>
                                            </li>
                                        <?php endif; ?>
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                            <?php endif; ?>
                            <?php if(Auth::user()->hasAnyRole(['Admin'])): ?>
                                <li>
                                    <a href="#"><i class="fa fa-sitemap fa-fw"></i> <?php echo e(__('lang.TaskType')); ?> <span
                                                class="fa arrow"></span></a>
                                    <ul class="nav nav-one-level">

                                        <li>
                                            <a href="<?php echo e(route('TaskType.Add')); ?>"><?php echo e(__('lang.New_TaskType')); ?> </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo e(route('TaskType.Index')); ?>"><?php echo e(__('lang.TaskType_Mangment')); ?>

                                                <?php if(Auth::user()->hasAnyRole(['Admin'])): ?>
                                                <span class="btn btn-light btn-flickr "><?php echo e(\App\Model\TaskType::all()->count()); ?></span>
                                       <?php endif; ?>
                                            </a>
                                        </li>
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                            <?php endif; ?>
                            <?php if(Auth::user()->hasAnyRole(['Admin'])): ?>
                                <li>
                                    <a href="#"><i class="fa fa-sitemap fa-fw"></i> <?php echo e(__('lang.Status')); ?> <span
                                                class="fa arrow"></span></a>
                                    <ul class="nav nav-one-level">
                                        <li>
                                            <a href="<?php echo e(route('State.Add')); ?>"><?php echo e(__('lang.New_Status')); ?> </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo e(route('State.Index')); ?>"><?php echo e(__('lang.Status_Mangment')); ?>

                                                <?php if(Auth::user()->hasAnyRole(['Admin'])): ?>
                                                <span class="btn btn-primary btn-flickr"><?php echo e(\App\Model\State::all()->count()); ?></span>
                                     <?php endif; ?>
                                            </a>
                                        </li>
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                            <?php endif; ?>

                                <li>
                                    <a href="#"><i class="fa fa-sitemap fa-fw"></i> <?php echo e(__('lang.Tasks')); ?> <span
                                                class="fa arrow"></span></a>
                                    <ul class="nav nav-one-level">

                                            <li>
                                                <a href="<?php echo e(route('Task.Add')); ?>"><?php echo e(__('lang.New_Tasks')); ?> </a>
                                            </li>


                                            <li>
                                                <a href="<?php echo e(route('Task.Index',['type' => 'P'])); ?>"><?php echo e(__('lang.Tasks_Mangment')); ?>

                                                    <?php if(Auth::user()->hasAnyRole(['Admin'])): ?>
                                                    <span class="btn btn-success btn-flickr"><?php echo e(\App\Model\Task::all()->count()); ?></span>
                                                    <?php endif; ?>
                                                </a>
                                            </li>

                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>


                                <li>
                                    <a href="#"><i class="fa fa-sitemap fa-fw"></i> <?php echo e(__('lang.Alerts')); ?> <span
                                                class="fa arrow"></span></a>
                                    <ul class="nav nav-one-level">

                                            <li>
                                                <a href="<?php echo e(route('Alert.Add')); ?>"><?php echo e(__('lang.New_Alerts')); ?> </a>
                                            </li>


                                            <li>
                                                <a href="<?php echo e(route('Alert.Index',['type' => 'B'])); ?>"><?php echo e(__('lang.Alerts_Mangment')); ?>

                                                    <?php if(Auth::user()->hasAnyRole(['Admin'])): ?>
                                                    <span class="btn btn-success btn-flickr"><?php echo e(\App\Model\Msgbefore::all()->count()); ?></span>
                                         <?php endif; ?>
                                                </a>
                                            </li>

                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>

                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <?php if(Auth::user()->hasAnyRole(['Admin']) ): ?>
                    
                        
                                    
                        
                            
                                
                            
                            
                                
                                    
                            
                        
                    
                    <li>
                        <a href="#"><i class="fa fa-sitemap fa-fw"></i> <?php echo e(__('lang.Role')); ?> <span class="fa arrow"></span></a>
                        <ul class="nav nav-one-level">
                            <li>
                                <a href="<?php echo e(route('Role.Add')); ?>"><?php echo e(__('lang.New_Role')); ?> </a>
                            </li>
                            <li>
                                <a href="<?php echo e(route('Role.Index')); ?>"><?php echo e(__('lang.Role_Mangment')); ?>

                                    <span class="btn btn-success btn-flickr"><?php echo e(\Spatie\Permission\Models\Role::all()->count()); ?></span></a>
                            </li>
                        </ul>
                    </li>
                    <?php endif; ?>
                    <li>
                        
                        
                        
                        
                        
                        
                        
                        

                        

                    </li>
                    <?php echo $__env->make('layouts.Configure_app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>
<?php echo $__env->yieldContent("head"); ?>
<!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?php echo $__env->yieldContent('title'); ?></h1>
                </div>
                <!-- /.col-lg-12 -->
                <?php echo $__env->yieldContent("content"); ?>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
<?php echo $__env->yieldContent('script'); ?>
    <?php else: ?>
        <li>
            <a href="<?php echo e(route('login')); ?>"><?php echo e(__('lang.login')); ?>

                <span class="btn btn-success btn-flickr"></span></a>
        </li>
    <?php endif; ?>
</div>


<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<?php echo Html::script("Admin/vendor/datatables/js/jquery.dataTables.min.js"); ?>

<?php echo Html::script("Admin/vendor/datatables-plugins/dataTables.bootstrap.min.js"); ?>

<?php echo Html::script("Admin/vendor/datatables-responsive/dataTables.responsive.js"); ?>







<?php echo Html::script("Admin/vendor/bootstrap/js/bootstrap.min.js"); ?>

<?php echo Html::script("Admin/vendor/metisMenu/metisMenu.min.js"); ?>

<?php echo Html::script("Admin/dist/js/sb-admin-2.js"); ?>







</body>

</html>

<?php /* C:\dd\crmlaraveltest\resources\views/layouts/Admin_app.blade.php */ ?>