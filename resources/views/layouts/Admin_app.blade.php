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
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    {{--<script src="{{ asset('/js/Crm.js') }}"></script>--}}
    {{--<link href="{{ asset('/css/app.css') }}" rel="stylesheet">--}}
    {{--<script src="{{ asset('/js/app.js') }}"></script>--}}
    @Auth


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>@yield("title")</title>
    {{--{!! Html::script("Admin/vendor/jquery/jquery.min.js") !!}--}}
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    {{--<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>--}}
   {{----}}
    {{--<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>--}}

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
{!! Html::style("Admin/vendor/bootstrap/css/bootstrap.min.css") !!}
{!! Html::style("Admin/vendor/metisMenu/metisMenu.min.css") !!}
{!! Html::style("Admin/dist/css/sb-admin-2.css") !!}
{!! Html::style("Admin/vendor/font-awesome/css/font-awesome.min.css") !!}

<!-- Bootstrap Core CSS -->

    @yield("style")
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

            <a href="{{asset('/Images/logo.png')}}">
                <img  style="max-width:180px;max-height: 120px;" src="{{ asset( '/Images/logo.png')}}"></a>

            {{--<a class="navbar-brand" href="index.html">Crm v3.0</a>--}}
        </div>
        <!-- /.navbar-header -->

{{app()->getLocale()}}
       <span id="app"></span>
        {{--<script src="{{ asset('/js/app.js') }}"></script>--}}
        <span id="user_name" class="tab"> {{auth()->user()->name}}</span>


        <span id="localclock" class="clock"></span>

        <ul class="nav navbar-top-links navbar-right ">


            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa  fa-qq"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="{{ route('pattern', ['pattern' => 1]) }}">pattern1</a></li>
                    <li><a href="{{ route('pattern', ['pattern' => 2]) }}">pattern2</a></li>
                </ul>
            </li>

            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-language"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="{{ route('lang', ['lang' => 'ar']) }}">Arabic</a></li>
                    <li><a href="{{ route('lang', ['lang' => 'en']) }}">English</a></li>
                    <li><a href="{{ route('lang', ['lang' => 'tr']) }}">Turcky</a></li>
                </ul>
            </li>


            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-bell fa-fw"></i>
                    {{--@if(count(auth()->user()->unreadNotifications)>0)--}}
                        <span  style="color: white;" class="{{count(auth()->user()->unreadNotifications)>0 ?'btn btn-danger btn-circle':'desnone'}} "   id='GFG_Span'>
                            {{count(auth()->user()->unreadNotifications)}}</span>
                    {{--@else<span  style="color: white;display: none"   id='GFG_Span'>0</span>--}}
                    {{--@endif --}}
                    <i class="fa fa-caret-down"></i>
                </a>
                <ul  id="notapp" class="dropdown-menu scrollable-menu  dropdown-alerts" role="menu">

            @foreach(auth()->user()->notifications as $not)
                    <li id="{{$not->id}}" class="{{!is_null($not->read_at)?'':'noti'}}">
                        <a href="{{route('Index.Note',['id'=>$not->id])}}" target="_blank">
                            <span class="icon black"><i class="fa {{$not->data['icon']}} fa-fw"></i></span>
                            <span>{!! $not->data['data'] !!}</span>
                            <span   class="pull-right text-muted small">{{$not['created_at']->diffForHumans() }}</span>
                        </a>
                        <span class="btn btn-link"  onclick="deletnote('{{$not->id}}',event)"><i   class="fa fa-trash  fa-fw"></i> </span>
                        <span class="btn btn-link"   onclick="makeread('{{$not->id}}',event)"><i   class="fa {{!is_null($not->read_at)?'fa-envelope-o':'fa-envelope'}}   fa-fw"></i> </span>
                       {{--<i   class="fa fa-trash  fa-fw"> <a href="javascript:deletnote($this.id)" id="{{$not->id}}" ></a></i>--}}
                        {{--<div id="{{$not->id}}" onclick="deletnote($this.id)"> <i    class="fa fa-trash  fa-fw"></i></div>--}}
                    </li>
                    <li class="divider"></li>
             @endforeach
                <li>
                    <a   class="btn btn-danger" onclick="delallnotification('{{route('Note.Deleteall')}}')">
                        <strong>{{__('lang.DeleteALL') }}</strong>
                        <i class="fa fa-trash  fa-fw"></i>
                    </a>
                </li>
                </ul>


                <!-- /.dropdown-alerts -->
            </li>
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>@if(count($Tickets)>0)<span class="btn btn-danger btn-circle">{{count($Tickets)}}</span>@endif</i>
                </a>
                <ul class="dropdown-menu dropdown-messages">
                    @foreach($Tickets as $Ticket)
                        <li>
                            <a href="{{route('Ticket.View',['id'=>$Ticket->id])}}">
                                <div>
                                    <strong>{{$Ticket->Customer->name}}</strong>
                                    <span class="pull-right text-muted">
                                        <em>{{$Ticket->created_at->diffForHumans()}}</em>
                                    </span>
                                </div>
                                <div>{!! $Ticket->subject!!}</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                    @endforeach
                    <li>
                        <a class="text-center" href="{{route('Ticket.Index')}}">
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
                    @if(count($alerts)>0)<span class="btn btn-danger btn-circle">{{count($alerts)}}</span>@endif
                </a>
                <ul class="dropdown-menu dropdown-alerts">
                    @foreach($alerts as $alert)
                        <li>
                            <a href="{{route('Alert.View',['id'=>$alert->id ,'type' => 'A'])}}">
                                @if(!is_null($alert))
                                    <div>
                                        <strong>{{$alert->name}}</strong>
                                        <span class="pull-right text-muted">
                                        <em>{{$alert->created_at}}</em>
                                    </span>
                                    </div>
                                    <div>{{$alert->description }}</div>
                                @endif
                            </a>
                        </li>
                        <li class="divider"></li>
                    @endforeach

                    <li>
                        <a class="text-center" href="{{route('Alert.Index',['type' => 'A'])}}">
                            <strong>See All Alerts</strong>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </li>
                </ul>
                <!-- /.dropdown-alerts -->
            </li>
            <!-- /.dropdown -->
            {{--<li class="dropdown">--}}
                {{--<a class="dropdown-toggle" data-toggle="dropdown" href="#">--}}
                    {{--<i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>--}}
                {{--</a>--}}
                {{--<ul class="dropdown-menu dropdown-messages">--}}
                    {{--<li>--}}
                        {{--<a href="#">--}}
                            {{--<div>--}}
                                {{--<strong>John Smith</strong>--}}
                                {{--<span class="pull-right text-muted">--}}
                                        {{--<em>Yesterday</em>--}}
                                    {{--</span>--}}
                            {{--</div>--}}
                            {{--<div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li class="divider"></li>--}}
                    {{--<li>--}}
                        {{--<a href="#">--}}
                            {{--<div>--}}
                                {{--<strong>John Smith</strong>--}}
                                {{--<span class="pull-right text-muted">--}}
                                        {{--<em>Yesterday</em>--}}
                                    {{--</span>--}}
                            {{--</div>--}}
                            {{--<div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li class="divider"></li>--}}
                    {{--<li>--}}
                        {{--<a href="#">--}}
                            {{--<div>--}}
                                {{--<strong>John Smith</strong>--}}
                                {{--<span class="pull-right text-muted">--}}
                                        {{--<em>Yesterday</em>--}}
                                    {{--</span>--}}
                            {{--</div>--}}
                            {{--<div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li class="divider"></li>--}}
                    {{--<li>--}}
                        {{--<a class="text-center" href="#">--}}
                            {{--<strong>Read All Messages</strong>--}}
                            {{--<i class="fa fa-angle-right"></i>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                {{--</ul>--}}
                {{--<!-- /.dropdown-messages -->--}}
            {{--</li>--}}
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-tasks fa-fw"></i> <i class="fa fa-caret-down"></i>@if(count($Tasks)>0)<span class="btn btn-danger btn-circle">{{count($Tasks)}}</span>@endif
                </a>
                <ul class="dropdown-menu dropdown-tasks">
                    @foreach($Tasks as $Task)
                        <li>
                            <a href="{{route('Task.View',['id'=>$Task->id])}}">
                                <div>
                                    <p>
                                       <span><strong>{{is_null($Task->TaskType)?'':$Task->TaskType->name}}</strong><br>
                                           <i>{{$Task->name==''?'':$Task->name}}</i>
                                        </span>
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
                        <a class="text-center" href="{{route('Task.Index',['type'=>'O'])}}">
                            <strong>See All Tasks</strong>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </li>
                </ul>
                <!-- /.dropdown-tasks -->
            </li>
            <!-- /.dropdown -->

            {{--<li class="dropdown">--}}
                {{--<a class="dropdown-toggle" data-toggle="dropdown" href="#">--}}
                    {{--<i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>--}}
                {{--</a>--}}
                {{--<ul class="dropdown-menu dropdown-alerts">--}}
                    {{--<li>--}}
                        {{--<a href="#">--}}
                            {{--<div>--}}
                                {{--<i class="fa fa-comment fa-fw"></i> New Comment--}}
                                {{--<span class="pull-right text-muted small">4 minutes ago</span>--}}
                            {{--</div>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li class="divider"></li>--}}
                    {{--<li>--}}
                        {{--<a href="#">--}}
                            {{--<div>--}}
                                {{--<i class="fa fa-twitter fa-fw"></i> 3 New Followers--}}
                                {{--<span class="pull-right text-muted small">12 minutes ago</span>--}}
                            {{--</div>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li class="divider"></li>--}}
                    {{--<li>--}}
                        {{--<a href="#">--}}
                            {{--<div>--}}
                                {{--<i class="fa fa-envelope fa-fw"></i> Message Sent--}}
                                {{--<span class="pull-right text-muted small">4 minutes ago</span>--}}
                            {{--</div>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li class="divider"></li>--}}
                    {{--<li>--}}
                        {{--<a href="#">--}}
                            {{--<div>--}}
                                {{--<i class="fa fa-tasks fa-fw"></i> New Task--}}
                                {{--<span class="pull-right text-muted small">4 minutes ago</span>--}}
                            {{--</div>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li class="divider"></li>--}}
                    {{--<li>--}}
                        {{--<a href="#">--}}
                            {{--<div>--}}
                                {{--<i class="fa fa-upload fa-fw"></i> Server Rebooted--}}
                                {{--<span class="pull-right text-muted small">4 minutes ago</span>--}}
                            {{--</div>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li class="divider"></li>--}}
                    {{--<li>--}}
                        {{--<a class="text-center" href="{{route('Task.Index',['type' => 'O'])}}">--}}
                            {{--<strong>See All Alerts</strong>--}}
                            {{--<i class="fa fa-angle-right"></i>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                {{--</ul>--}}
                {{--<!-- /.dropdown-alerts -->--}}
            {{--</li>--}}
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="{{route('UploadProfile',['id'=>\Illuminate\Support\Facades\Auth::user()->id])}}"><i class="fa fa-user fa-fw"></i> User Profile</a>
                    </li>
                    <li><a href="{{route('UserFile.Update',['id'=>\Illuminate\Support\Facades\Auth::user()->id])}}"><i class="fa fa-gear fa-fw"></i> Settings</a>
                    </li>
                    <li class="divider"></li>

                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('lang.Login') }}</a>
                            </li>
                            {{--@if (Route::has('register'))--}}
                                {{--<li class="nav-item">--}}
                                    {{--<a class="nav-link" href="{{ route('register') }}">{{ __('lang.Register') }}</a>--}}
                                {{--</li>--}}
                            {{--@endif--}}
                        @else



                                <div >
                                    <a  href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('lang.Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>

                        @endguest



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
                        <a href={{route('Dashboard')}}><i class="fa fa-dashboard fa-fw"></i> {{__('lang.Dashboard')}}</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-sitemap fa-fw"></i> CRM <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <!-- /.Start Customer -->
                            @if(Auth::user()->hasAnyRole(['Admin']) ||
                                                               Auth::user()->hasAnyPermission(['Customer_Add',
                                                                                               'Customer_Mangment',
                                                                                               ]) )
                                <li>
                                    <a href="#"><i class="fa fa-sitemap fa-fw"></i> {{ __('lang.Customers') }} <span
                                                class="fa arrow"></span></a>
                                    <ul class="nav nav-one-level">
                                        @if(Auth::user()->hasAnyRole(['Admin']) ||
                                                 Auth::user()->hasAnyPermission([
                                                 'Customer_Add',
                                                 ]) )
                                            <li>
                                                <a href="{{route('Customer.Add')}}">{{ __('lang.New_Customer') }} </a>
                                            </li>
                                        @endif
                                        @if(Auth::user()->hasAnyRole(['Admin']) ||
                                        Auth::user()->hasAnyPermission([
                                                                        'Customer_Mangment',
                                                                        ]) )
                                            <li>
                                                <a href="{{route('Customer.Index',['type'=>'UN'])}}">{{ __('lang.Customers_Mangment') }}
                                                    @if(Auth::user()->hasAnyRole(['Admin']))
                                                    <span class="btn btn-success btn-flickr">{{\App\Model\Customer::all()->count()}}</span>
                                                    @endif
                                                </a>

                                            </li>

                                        @endif
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                            @endif
                        <!-- /.End Customer  -->
                            <!-- /.Start Employee  -->
                            @if(Auth::user()->hasAnyRole(['Admin']) ||
                                                             Auth::user()->hasAnyPermission(['Employee_Add',
                                                                                             'Employee_Mangment',
                                                                                           ]) )
                                <li>
                                    <a href="#"><i class="fa fa-sitemap fa-fw"></i> {{ __('lang.Employees') }} <span
                                                class="fa arrow"></span></a>
                                    <ul class="nav nav-one-level">
                                        @if(Auth::user()->hasAnyRole(['Admin']) ||
                                                Auth::user()->hasAnyPermission([
                                                'Employee_Add',
                                                ]) )
                                            <li>
                                                <a href="{{route('Employee.Add')}}">{{ __('lang.Add_Employee') }} </a>
                                            </li>
                                        @endif
                                        @if(Auth::user()->hasAnyRole(['Admin']) ||
                                        Auth::user()->hasAnyPermission([
                                                                        'Employee_Mangment',
                                                                    ]) )
                                            <li>
                                                <a href="{{route('Employee.Index')}}">{{ __('lang.Employees_Mangment') }}
                                                    @if(Auth::user()->hasAnyRole(['Admin']))
                                                    <span class="btn btn-info btn-flickr">{{\App\User::all()->count()}}</span>
                                          @endif
                                                </a>
                                            </li>
                                        @endif
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                            @endif
                        <!-- /.End Employee  -->
                            <!-- /.Start Department  -->
                            @if(Auth::user()->hasAnyRole(['Admin']) ||
                                                                 Auth::user()->hasAnyPermission(['Department_Add',
                                                                                                 'Department_Mangment',
                                                                                                ]) )
                                <li>
                                    <a href="#"><i class="fa fa-sitemap fa-fw"></i> {{ __('lang.Depatments') }} <span
                                                class="fa arrow"></span></a>
                                    <ul class="nav nav-one-level">
                                        @if(Auth::user()->hasAnyRole(['Admin']) ||
                                                                   Auth::user()->hasAnyPermission(['Department_Add',
                                                                                                   ]) )
                                            <li>
                                                <a href="{{route('Department.Add')}}">{{ __('lang.New_Department') }} </a>
                                            </li>
                                        @endif
                                        @if(Auth::user()->hasAnyRole(['Admin']) ||
                                                                   Auth::user()->hasAnyPermission([
                                                                                                   'Department_Mangment',
                                                                                                 ]) )
                                            <li>
                                                <a href="{{route('Department.Index')}}">{{ __('lang.Department_Mangment') }}
                                                    @if(Auth::user()->hasAnyRole(['Admin']))
                                                    <span class="btn btn-default btn-flickr">{{\App\Model\Department::all()->count()}}</span>
                                           @endif
                                                </a>
                                            </li>
                                        @endif
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                            @endif
                        <!-- /.End Department -->
                            <!-- /.Start Group -->
                            @if(Auth::user()->hasAnyRole(['Admin']) ||
                                                          Auth::user()->hasAnyPermission(['Group_Add',
                                                                                          'Group_Mangment',
                                                                                         ]) )
                                <li>
                                    <a href="#"><i class="fa fa-sitemap fa-fw"></i> {{ __('lang.Groups') }} <span
                                                class="fa arrow"></span></a>
                                    <ul class="nav nav-one-level">
                                        @if(Auth::user()->hasAnyRole(['Admin']) ||
                                                           Auth::user()->hasAnyPermission(['Group_Add',
                                                                                         ]) )
                                            <li>
                                                <a href="{{route('Group.Add')}}">{{ __('lang.New_Groups') }} </a>
                                            </li>
                                        @endif
                                        @if(Auth::user()->hasAnyRole(['Admin']) ||
                                                           Auth::user()->hasAnyPermission([
                                                                                           'Group_Mangment',
                                                                                          ]) )
                                            <li>
                                                <a href="{{route('Group.Index')}}">{{ __('lang.Groups_Mangment') }}
                                                    @if(Auth::user()->hasAnyRole(['Admin']))
                                                    <span class="btn btn-danger btn-flickr">{{\App\Model\Group::all()->count()}}</span>
                                           @endif
                                                </a>
                                            </li>
                                        @endif
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                            @endif
                        <!-- /.End Group -->
                            @if(Auth::user()->hasAnyRole(['Admin']) ||
                                                          Auth::user()->hasAnyPermission(['Division_Add',
                                                                                          'Division_Mangment',
                                                                                         ]) )
                                <li>
                                    <a href="#"><i class="fa fa-sitemap fa-fw"></i> {{ __('lang.Divisions') }} <span
                                                class="fa arrow"></span></a>
                                    <ul class="nav nav-one-level">
                                        @if(Auth::user()->hasAnyRole(['Admin']) ||
                                                             Auth::user()->hasAnyPermission(['Division_Add',
                                                                                             ]) )
                                            <li>
                                                <a href="{{route('Division.Add')}}">{{ __('lang.New_Division') }} </a>
                                            </li>
                                        @endif
                                        @if(Auth::user()->hasAnyRole(['Admin']) ||
                                                             Auth::user()->hasAnyPermission([
                                                                                             'Division_Mangment',
                                                                                       ]) )

                                            <li>
                                                <a href="{{route('Division.Index')}}">{{ __('lang.Divisions_Mangment') }}
                                                    @if(Auth::user()->hasAnyRole(['Admin']))
                                                    <span class="btn btn-warning btn-flickr">{{\App\Model\Division::all()->count()}}</span>
                                            @endif
                                                </a>
                                            </li>
                                        @endif
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                            @endif

                            @if(Auth::user()->hasAnyRole(['Admin']))
                                <li>
                                    <a href="#"><i class="fa fa-sitemap fa-fw"></i> {{ __('lang.TaskType') }} <span
                                                class="fa arrow"></span></a>
                                    <ul class="nav nav-one-level">

                                        <li>
                                            <a href="{{route('TaskType.Add')}}">{{ __('lang.New_TaskType') }} </a>
                                        </li>
                                        <li>
                                            <a href="{{route('TaskType.Index')}}">{{ __('lang.TaskType_Mangment') }}
                                                @if(Auth::user()->hasAnyRole(['Admin']))
                                                <span class="btn btn-light btn-flickr ">{{\App\Model\TaskType::all()->count()}}</span>
                                       @endif
                                            </a>
                                        </li>
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                            @endif
                            @if(Auth::user()->hasAnyRole(['Admin']))
                                <li>
                                    <a href="#"><i class="fa fa-sitemap fa-fw"></i> {{ __('lang.Status') }} <span
                                                class="fa arrow"></span></a>
                                    <ul class="nav nav-one-level">
                                        <li>
                                            <a href="{{route('State.Add')}}">{{ __('lang.New_Status') }} </a>
                                        </li>
                                        <li>
                                            <a href="{{route('State.Index')}}">{{ __('lang.Status_Mangment') }}
                                                @if(Auth::user()->hasAnyRole(['Admin']))
                                                <span class="btn btn-primary btn-flickr">{{\App\Model\State::all()->count()}}</span>
                                     @endif
                                            </a>
                                        </li>
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                            @endif

                                <li>
                                    <a href="#"><i class="fa fa-sitemap fa-fw"></i> {{ __('lang.Tasks') }} <span
                                                class="fa arrow"></span></a>
                                    <ul class="nav nav-one-level">

                                            <li>
                                                <a href="{{route('Task.Add')}}">{{ __('lang.New_Tasks') }} </a>
                                            </li>


                                            <li>
                                                <a href="{{route('Task.Index',['type' => 'P'])}}">{{ __('lang.Tasks_Mangment') }}
                                                    @if(Auth::user()->hasAnyRole(['Admin']))
                                                    <span class="btn btn-success btn-flickr">{{\App\Model\Task::all()->count()}}</span>
                                                    @endif
                                                </a>
                                            </li>

                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>


                                <li>
                                    <a href="#"><i class="fa fa-sitemap fa-fw"></i> {{ __('lang.Alerts') }} <span
                                                class="fa arrow"></span></a>
                                    <ul class="nav nav-one-level">

                                            <li>
                                                <a href="{{route('Alert.Add')}}">{{ __('lang.New_Alerts') }} </a>
                                            </li>


                                            <li>
                                                <a href="{{route('Alert.Index',['type' => 'B'])}}">{{ __('lang.Alerts_Mangment') }}
                                                    @if(Auth::user()->hasAnyRole(['Admin']))
                                                    <span class="btn btn-success btn-flickr">{{\App\Model\Msgbefore::all()->count()}}</span>
                                         @endif
                                                </a>
                                            </li>

                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>

                            <li>
                                <a href="#"><i class="fa fa-sitemap fa-fw"></i> {{ __('lang.Nots') }} <span
                                            class="fa arrow"></span></a>
                                <ul class="nav nav-one-level">

                                    {{--<li>--}}
                                        {{--<a href="{{route('Note.Add')}}">{{ __('lang.New_Note') }} </a>--}}
                                    {{--</li>--}}

                                    <li>
                                        <a href="{{route('Note.Index')}}">{{ __('lang.Notes_Mangment') }}
                                        </a>
                                    </li>

                                </ul>
                                <!-- /.nav-third-level -->
                            </li>

                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    @if(Auth::user()->hasAnyRole(['Admin']) )
                    {{--<li>--}}
                        {{--<a href="#"><i class="fa fa-sitemap fa-fw"></i> {{ __('lang.Permissions') }} <span--}}
                                    {{--class="fa arrow"></span></a>--}}
                        {{--<ul class="nav nav-one-level">--}}
                            {{--<li>--}}
                                {{--<a href="{{route('Permissions.Add')}}">{{ __('lang.New Permissions') }} </a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a href="{{route('Permissions.Index')}}">{{ __('lang.Permissions  Mangment') }}--}}
                                    {{--<span class="btn btn-success btn-flickr">{{\Spatie\Permission\Models\Permission::all()->count()}}</span></a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                    <li>
                        <a href="#"><i class="fa fa-sitemap fa-fw"></i> {{ __('lang.RoleE') }} <span class="fa arrow"></span></a>
                        <ul class="nav nav-one-level">
                            <li>
                                <a href="{{route('Role.Add',['type'=>'U'])}}">{{ __('lang.New_Role') }} </a>
                            </li>
                            <li>
                                <a href="{{route('Role.Index',['type'=>'U'])}}">{{ __('lang.Role_Mangment') }}
                                    <span class="btn btn-success btn-flickr">{{\Spatie\Permission\Models\Role::where('guard_name','web')->get()->count()}}</span></a>
                            </li>
                        </ul>
                    </li>
                        <li>
                            <a href="#"><i class="fa fa-sitemap fa-fw"></i> {{ __('lang.RoleC') }} <span class="fa arrow"></span></a>
                            <ul class="nav nav-one-level">
                                <li>
                                    <a href="{{route('Role.Add',['type'=>'CU'])}}">{{ __('lang.New_Role') }} </a>
                                </li>
                                <li>
                                    <a href="{{route('Role.Index',['type'=>'CU'])}}">{{ __('lang.Role_Mangment') }}
                                        <span class="btn btn-success btn-flickr">{{\Spatie\Permission\Models\Role::where('guard_name','customer')->get()->count()}}</span></a>
                                </li>
                            </ul>
                        </li>
                    @endif
                    <li>
                        {{--@auth--}}
                        {{--@if(Auth::user()->role=='admin')--}}
                        {{--<a href="{{route('Section.index')}}"><i class="fa fa-table fa-fw"></i> Section</a>--}}
                        {{--<a href="{{route('User.index')}}"><i class="fa fa-user fa-fw"></i> Users</a>--}}
                        {{--@endif--}}
                        {{--<a href="{{route('Image.index')}}"><i class="fa fa-table fa-fw"></i> Images</a>--}}
                        {{--<a href="{{route('Post.index')}}"><i class="fa fa-table fa-fw"></i> Posts</a>--}}
                        {{--<a href="{{route('Msg.index',['type'=>'all'])}}"><i class="fa fa-table fa-fw"></i>Nofitication <span class="btn btn-danger btn-circle " onclick="{{route('Msg.index',['type'=>'unread'])}}">{{auth()->user()->unreadNotifications()->count()}}</span></a>--}}

                        {{--@endauth--}}

                    </li>
                    @include('layouts.Configure_app')
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
@yield("head")
<!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">@yield('title')</h1>
                </div>
                <!-- /.col-lg-12 -->
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
            <a href="{{route('login')}}">{{ __('lang.login') }}
                <span class="btn btn-success btn-flickr"></span></a>
        </li>
    @endauth

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




<script src="{{ asset('js/app.js') }}"></script>

{{--{!! Html::script("/js/app.js") !!}--}}

{!! Html::script("Admin/vendor/bootstrap/js/bootstrap.min.js") !!}
{!! Html::script("Admin/vendor/metisMenu/metisMenu.min.js") !!}
{!! Html::script("Admin/dist/js/sb-admin-2.js") !!}

{!! Html::script("Admin/vendor/datatables/js/jquery.dataTables.min.js") !!}
{!! Html::script("Admin/vendor/datatables-plugins/dataTables.bootstrap.min.js") !!}
{!! Html::script("Admin/vendor/datatables-responsive/dataTables.responsive.js") !!}



<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>



</body>

</html>
