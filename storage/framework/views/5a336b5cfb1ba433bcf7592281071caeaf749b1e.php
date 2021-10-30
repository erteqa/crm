<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <style>
        .noti{
            background-color: #aed0d4;
        }
        .desnone{
            display: none;
        }
        .scrollable-menu {
            height: auto;
            max-height: 500px;
            overflow-x: hidden;
        }
    </style>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    
    
    
    <?php if(auth()->guard()->check()): ?>


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">


    <title><?php echo $__env->yieldContent("title"); ?></title>
    
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    
   
    

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
<?php echo Html::style("Admin/vendor/bootstrap/css/bootstrap.min.css"); ?>

<?php echo Html::style("Admin/vendor/metisMenu/metisMenu.min.css"); ?>

<?php echo Html::style("Admin/dist/css/sb-admin-2.css"); ?>

<?php echo Html::style("Admin/vendor/font-awesome/css/font-awesome.min.css"); ?>


<!-- Bootstrap Core CSS -->

    <?php echo $__env->yieldContent("style"); ?>
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
        
        
        
<?php
        \App\Http\Controllers\Admin\Dashboard_cont::refersh();
        $alerts=\App\Http\Controllers\Admin\Dashboard_cont::getalert();
        $Tasks=\App\Http\Controllers\Admin\Dashboard_cont::gettask();
        $Tickets=\App\Http\Controllers\Admin\Ticket_cont::getuserticket();
        $userid=auth()->user()->id;
        ?>
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

            <a href="<?php echo e(asset('/Images/logo.png')); ?>">
                <img  style="max-width:180px;max-height: 120px;" src="<?php echo e(asset( '/Images/logo.png')); ?>"></a>

            
        </div>
        <!-- /.navbar-header -->

<?php echo e(app()->getLocale()); ?>

       <span id="app"></span>
        
        <span id="user_name" class="tab"> <?php echo e(auth()->user()->name); ?></span>


        <span id="localclock" class="clock"></span>

        <ul class="nav navbar-top-links navbar-right ">


            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa  fa-qq"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo e(route('pattern', ['pattern' => 1])); ?>">pattern1</a></li>
                    <li><a href="<?php echo e(route('pattern', ['pattern' => 2])); ?>">pattern2</a></li>
                </ul>
            </li>

            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-language"></i> <i class="fa fa-caret-down"></i>
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
                    <i class="fa fa-bell fa-fw"></i>
                    
                        <span  style="color: white;" class="<?php echo e(count(auth()->user()->unreadNotifications)>0 ?'btn btn-danger btn-circle':'desnone'); ?> "   id='GFG_Span'>
                            <?php echo e(count(auth()->user()->unreadNotifications)); ?></span>
                    
                    
                    <i class="fa fa-caret-down"></i>
                </a>
                <ul  id="notapp" class="dropdown-menu scrollable-menu  dropdown-alerts" role="menu">

            <?php $__currentLoopData = auth()->user()->notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $not): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li id="<?php echo e($not->id); ?>" class="<?php echo e(!is_null($not->read_at)?'':'noti'); ?>">
                        <a href="<?php echo e(route('Index.Note',['id'=>$not->id])); ?>" target="_blank">
                            <span class="icon black"><i class="fa <?php echo e($not->data['icon']); ?> fa-fw"></i></span>
                            <span><?php echo $not->data['data']; ?></span>
                            <span   class="pull-right text-muted small"><?php echo e($not['created_at']->diffForHumans()); ?></span>
                        </a>
                        <span class="btn btn-link"  onclick="deletnote('<?php echo e($not->id); ?>',event)"><i   class="fa fa-trash  fa-fw"></i> </span>
                        <span class="btn btn-link"   onclick="makeread('<?php echo e($not->id); ?>',event)"><i   class="fa <?php echo e(!is_null($not->read_at)?'fa-envelope-o':'fa-envelope'); ?>   fa-fw"></i> </span>
                       
                        
                    </li>
                    <li class="divider"></li>
             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <li>
                    <a   class="btn btn-danger" onclick="delallnotification('<?php echo e(route('Note.Deleteall')); ?>')">
                        <strong><?php echo e(__('lang.DeleteALL')); ?></strong>
                        <i class="fa fa-trash  fa-fw"></i>
                    </a>
                </li>
                </ul>


                <!-- /.dropdown-alerts -->
            </li>
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i><?php if(count($Tickets)>0): ?><span class="btn btn-danger btn-circle"><?php echo e(count($Tickets)); ?></span><?php endif; ?></i>
                </a>
                <ul class="dropdown-menu dropdown-messages">
                    <?php $__currentLoopData = $Tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>
                            <a href="<?php echo e(route('Ticket.View',['id'=>$Ticket->id])); ?>">
                                <div>
                                    <strong><?php echo e($Ticket->Customer->name); ?></strong>
                                    <span class="pull-right text-muted">
                                        <em><?php echo e($Ticket->created_at->diffForHumans()); ?></em>
                                    </span>
                                </div>
                                <div><?php echo $Ticket->subject; ?></div>
                            </a>
                        </li>
                        <li class="divider"></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <a class="text-center" href="<?php echo e(route('Ticket.Index')); ?>">
                            <strong>Read All Messages</strong>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </li>
                </ul>
                <!-- /.dropdown-messages -->
            </li>
            <!-- /.dropdown -->
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
                                       <span><strong><?php echo e(is_null($Task->TaskType)?'':$Task->TaskType->name); ?></strong><br>
                                           <i><?php echo e($Task->name==''?'':$Task->name); ?></i>
                                        </span>
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
                    <li><a href="<?php echo e(route('UserFile.Update',['id'=>\Illuminate\Support\Facades\Auth::user()->id])); ?>"><i class="fa fa-gear fa-fw"></i> Settings</a>
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

                            <li>
                                <a href="#"><i class="fa fa-sitemap fa-fw"></i> <?php echo e(__('lang.Nots')); ?> <span
                                            class="fa arrow"></span></a>
                                <ul class="nav nav-one-level">

                                    
                                        
                                    

                                    <li>
                                        <a href="<?php echo e(route('Note.Index')); ?>"><?php echo e(__('lang.Notes_Mangment')); ?>

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
                        <a href="#"><i class="fa fa-sitemap fa-fw"></i> <?php echo e(__('lang.RoleE')); ?> <span class="fa arrow"></span></a>
                        <ul class="nav nav-one-level">
                            <li>
                                <a href="<?php echo e(route('Role.Add',['type'=>'U'])); ?>"><?php echo e(__('lang.New_Role')); ?> </a>
                            </li>
                            <li>
                                <a href="<?php echo e(route('Role.Index',['type'=>'U'])); ?>"><?php echo e(__('lang.Role_Mangment')); ?>

                                    <span class="btn btn-success btn-flickr"><?php echo e(\Spatie\Permission\Models\Role::where('guard_name','web')->get()->count()); ?></span></a>
                            </li>
                        </ul>
                    </li>
                        <li>
                            <a href="#"><i class="fa fa-sitemap fa-fw"></i> <?php echo e(__('lang.RoleC')); ?> <span class="fa arrow"></span></a>
                            <ul class="nav nav-one-level">
                                <li>
                                    <a href="<?php echo e(route('Role.Add',['type'=>'CU'])); ?>"><?php echo e(__('lang.New_Role')); ?> </a>
                                </li>
                                <li>
                                    <a href="<?php echo e(route('Role.Index',['type'=>'CU'])); ?>"><?php echo e(__('lang.Role_Mangment')); ?>

                                        <span class="btn btn-success btn-flickr"><?php echo e(\Spatie\Permission\Models\Role::where('guard_name','customer')->get()->count()); ?></span></a>
                                </li>
                            </ul>
                        </li>
                    <?php endif; ?>
                    <li>
                        
                        
                        
                        
                        
                        
                        
                        

                        

                    </li>
                    <?php echo $__env->make('layouts.Configure_app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </ul>
            </div>
            <script>
                // Echo.private('App.User.' + userId)
                //
                //     .notification((notification) => {
                //         console.log(notification.type);
                //     });
                function deletnote(id,event) {
                   // alert(id);
                   var not =document.getElementById(id);
                 //  var countnot =document.getElementById('GFG_Span');
                  // alert(countnot.innerText);
                //   not.addClass('hidden');
                 //   alert(id);
                    $.ajax({
                        type:'GET',
                        url: '/Note/delete',
                        //(or whate
                        data: { source: id },
                        success: function (responsedata) {
                            not.classList.add("hidden");
                            var myEle = document.getElementById("GFG_Span");
                            //alert(myEle);
                            if(myEle  != null){
                                var co=myEle.innerHTML;
                                if(co>0){
                                  //  alert(hasClass(not,'noti'));
                                    if(not.classList.contains('noti')){
                                        var num=(parseInt(co)-1);
                                        myEle.textContent = num;
                                        if(num==0){
                                            myEle.classList.add('desnone');
                                            myEle.classList.remove('btn');
                                            myEle.classList.remove('btn-danger');
                                            myEle.classList.remove('btn-circle');
                                        }
                                    }
                                }
                            }
                        }, error: function(xhr){
                            alert('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText);
                        }
                    });
                    if (event.stopPropagation)    event.stopPropagation();
                }
                function makeread(id,event) {
                    var not =document.getElementById(id);
                    $.ajax({
                        type:'GET',
                        url: '/Note/makeread',
                        //  (or whatever your url is)
                        data: { source: id },
                        success: function (responsedata) {

                            //alert('ger');
                            var myEle = document.getElementById("GFG_Span");
                            //alert(myEle);
                            if(myEle  != null){
                               var co=myEle.innerHTML;
                              if(co>0){
                               //   alert(not.classList.contains('noti'));
                                  if(not.classList.contains('noti')){
                                      not.classList.remove("noti");
                                      var num=(parseInt(co)-1);
                                      myEle.textContent = num;
                                      if(num==0){
                                          myEle.classList.add('desnone');
                                          myEle.classList.remove('btn');
                                          myEle.classList.remove('btn-danger');
                                          myEle.classList.remove('btn-circle');
                                      }
                                  }
                              }
                            }
                        }, error: function(xhr){
                            alert('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText);
                        }
                    });
                    if (event.stopPropagation)    event.stopPropagation();
                }
            </script>
            <script>


                function delallnotification($url) {
                    var $ret_val = confirm('Yes Or No');

                    if ($ret_val == true) {
                        $.ajax({
                            type:'GET',
                            url: $url,
                            //(or btn btn-danger btn-circle
                            data: { },
                            success: function (responsedata) {
                                $('#notapp').html('');
                                $('#GFG_Span').addClass('desnone');
                                $('#GFG_Span').removeClass('btn btn-danger btn-circle');
                                //   setTimeout(function(){alert("Thank you!")},6000);
                            }, error: function(xhr){
                                alert('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText);
                            }
                        });


                    }
                }

            </script>
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
<
<script src="https://js.pusher.com/3.1/pusher.min.js"></script>
<script>
    var userId='<?php echo $userid; ?>';
    //base_path('resource') a Pusher object with our Credential's key
//     var pusher = new Pusher('767291522ec47cdfcc61', {
//         cluster: 'eu',
//         authEndpoint: '/your_auth_endpoint',
//         encrypted: true
//
//     });
//
// //alert(userid);
//     //Subscribe to the channel we specified in our Laravel Event
//     var privateChannel = pusher.subscribe('chat_privet.'+userid);
//
//     //Bind a function to a Event (the full Laravel class)
//     privateChannel.bind('AddCustomer', addMessage);
//
//     function addMessage(data) {
//         // var listItem = $("<li class='list-group-item'></li>");
//         // listItem.html(data.message);
//         console.log(data.message);
//         $('#user_name').html(data.message);
//     }
</script>


<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>




<script src="<?php echo e(asset('js/app.js')); ?>"></script>



<?php echo Html::script("Admin/vendor/bootstrap/js/bootstrap.min.js"); ?>

<?php echo Html::script("Admin/vendor/metisMenu/metisMenu.min.js"); ?>

<?php echo Html::script("Admin/dist/js/sb-admin-2.js"); ?>


<?php echo Html::script("Admin/vendor/datatables/js/jquery.dataTables.min.js"); ?>

<?php echo Html::script("Admin/vendor/datatables-plugins/dataTables.bootstrap.min.js"); ?>

<?php echo Html::script("Admin/vendor/datatables-responsive/dataTables.responsive.js"); ?>




<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>



</body>

</html>

<?php /* /home/eritqaaa/public_html/crmold.eritqaa.com.tr/resources/views/layouts/Admin_app.blade.php */ ?>