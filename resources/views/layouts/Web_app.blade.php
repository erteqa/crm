
<!DOCTYPE html>


<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <style>
        .compcolor{
            background-color: rgba(1, 165, 156, 0.6);;
        }
    </style>
    @yield('style')
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    @auth('customer')


        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>@yield("title")</title>

        {!! Html::script("Admin/vendor/jquery/jquery.min.js") !!}

        <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">



        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
    {!! Html::style("Admin/vendor/bootstrap/css/bootstrap.min.css") !!}
    {!! Html::style("Admin/vendor/metisMenu/metisMenu.min.css") !!}
    {!! Html::style("Admin/dist/css/sb-admin-2.css") !!}
    {!! Html::style("Admin/vendor/font-awesome/css/font-awesome.min.css") !!}

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
        {{--@if (!Auth::check())--}}
    {{--{{redirect()->route('dashboard');}}--}}
    {{--@endif--}}
    <?php
    $Tasks=\App\Http\Controllers\Customer\Dashboard_cont::gettask();
    $Tickets=\App\Http\Controllers\Customer\Ticket_cont::getticket();
    ?>
    {{$Tickets}}
    </span>
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="{{asset('/Images/logo.png')}}">
                <img  style="max-width:180px;max-height: 120px;" src="{{ asset( '/Images/logo.png')}}"></a>
        </div>
        <!-- /.navbar-header -->


        &nbsp;&nbsp;&nbsp;&nbsp;{{app()->getLocale()}}
        &nbsp;&nbsp;&nbsp;&nbsp;
        <span class="tab"> {{auth()->guard('customer')->user()->name}}</span>
        <span class="tab"> </span>

        <span id="localclock" class="clock"></span>

        <ul class="nav navbar-top-links navbar-right">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-language"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="{{ route('cu.lang', ['lang' => 'ar']) }}">Arabic</a></li>
                    <li><a href="{{ route('cu.lang', ['lang' => 'en']) }}">English</a></li>
                    <li><a href="{{ route('cu.lang', ['lang' => 'tr']) }}">Turcky</a></li>
                </ul>
            </li>

            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>@if(count($Tickets)>0)<span class="btn btn-danger btn-circle">{{count($Tickets)}}</span>@endif</i>
                </a>
                <ul class="dropdown-menu dropdown-messages">
                    @foreach($Tickets as $Ticket)
                    <li>
                        <a href="{{route('Cu.Ticket.View',['id'=>$Ticket->id])}}">
                            <div>
                                <strong>{{$Ticket->User->name}}</strong>
                                <span class="pull-right text-muted">
                                        <em>{{$Ticket->updated_at->diffForHumans()}}</em>
                                    </span>
                            </div>
                            <div>{!!  $Ticket->reply !!}</div>
                        </a>
                    </li>
                    <li class="divider"></li>
                  @endforeach
                    <li>
                        <a class="text-center" href="{{route('Cu.Ticket.Index')}}">
                            <strong>Read All Messages</strong>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </li>
                </ul>
                <!-- /.dropdown-messages -->
            </li>
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-tasks fa-fw"></i> <i class="fa fa-caret-down"></i>@if(count($Tasks)>0)<span class="btn btn-danger btn-circle">{{count($Tasks)}}</span>@endif
                </a>
                <ul class="dropdown-menu dropdown-tasks">
                    @foreach($Tasks as $Task)
                        <li>
                            <a href="{{route('Cu.Task.View',['id'=>$Task->id])}}">
                                <div>
                                    <p>
                                        <strong>{{$Task->name==''?'':$Task->name}}</strong>
                                        <strong>{{is_null($Task->TaskType)?'':$Task->TaskType->name}}</strong>
                                        <span class="pull-right text-muted">{{$Task->State->percent}} % {{$Task->State->name}}</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar {{\App\Http\Controllers\Style_cont::progress($Task->State->percent)}}"
                                             role="progressbar"
                                             aria-valuenow="{{$Task->State->percent}}" aria-valuemin="0"
                                             aria-valuemax="100"
                                             style="width: {{$Task->State->percent}}%">
                                            <span class="sr-only">{{$Task->State->percent}}% {{$Task->State->name}} (success)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                    @endforeach
                    <li>
                        <a class="text-center" href="{{route('Cu.Task.Index')}}">
                            <strong>See All Tasks</strong>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </li>
                </ul>
                <!-- /.dropdown-tasks -->
            </li>

            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="{{route('Cu.Customer.View')}}"><i class="fa fa-user fa-fw"></i> User Profile</a>
                    </li>
                    <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                    </li>
                    <li class="divider"></li>
                        <div >
                            <a  href="{{ route('Cu.logout') }}"
                                onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                                {{ __('lang.Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('Cu.logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                </ul>
                <!-- /.dropdown-user -->
            </li>
        </ul>
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">

                    <li>
                        <a href={{route('Cu.Dashboard.Index')}}><i class="fa fa-dashboard fa-fw"></i> {{__('lang.Dashboard')}}</a>
                    </li>
                    @if(auth()->guard('customer')->user()->hasAnyPermission(['Invoices_View']) )
                    <li>
                        <a href="#"><i class="fa fa-wrench fa-fw"></i> {{__('lang.Invoices')}} <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{route('Cu.Invoice.Index')}}">{{__('lang.Invoice')}}</a>
                            </li>

                        </ul>
                    </li>
@endif
                    <li>
                        <a href="#"><i class="fa fa-wrench fa-fw"></i> {{__('lang.Ticket')}} <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{route('Cu.Ticket.Add')}}">{{__('lang.Add_Ticket')}}</a>
                            </li>
                            <li>
                                <a href="{{route('Cu.Ticket.Index')}}">{{__('lang.Ticket_Mange')}}</a>
                            </li>


                        </ul>
                    </li>

                    @if(auth()->guard('customer')->user()->hasAnyPermission(['Accounting_View']))
                    <li>
                        <a href="#"><i class="fa fa-wrench fa-fw"></i> {{__('lang.Accounting')}} <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{route('Cu.Accounting.Add')}}">{{__('lang.Make_Account')}}</a>
                            </li>
                        </ul>
                    </li>
                    @endif

                    @if(auth()->guard('customer')->user()->hasAnyPermission(['courses_view']))
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> {{__('lang.Courses')}} <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{route('Cu.Course.Index')}}">{{__('lang.Courses_view')}}</a>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
    </nav>
@yield("head")
<!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">@yield('title')</h1>
                </div>

                @yield("content")
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
    @yield('script')
    @else
        <li>
            <a href="{{route('Customer.login')}}">{{ __('lang.login') }}
                <span class="btn btn-success btn-flickr"></span></a>
        </li>
    @endauth

</div>


<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
{!! Html::script("Admin/vendor/datatables/js/jquery.dataTables.min.js") !!}
{!! Html::script("Admin/vendor/datatables-plugins/dataTables.bootstrap.min.js") !!}
{!! Html::script("Admin/vendor/datatables-responsive/dataTables.responsive.js") !!}
{!! Html::script("Admin/vendor/bootstrap/js/bootstrap.min.js") !!}
{!! Html::script("Admin/vendor/metisMenu/metisMenu.min.js") !!}
{!! Html::script("Admin/dist/js/sb-admin-2.js") !!}
</body>

</html>
