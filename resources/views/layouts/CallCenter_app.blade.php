
<!DOCTYPE html>


<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <style>
        .myBox {
            border: none;
            font: 14px/24px sans-serif;
            height: 530px;
            overflow-y: scroll;
        }
        .medri {
            color:black;
        }
        .noti{
            background-color: #aed0d4;
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
    @Auth

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
        {{--<script src="{{ asset('js/Crm.js') }}"></script>--}}
    <title>{{$gname}}</title>
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
        &nbsp;&nbsp;&nbsp;&nbsp;
        <span class="tab">{{auth()->user()->name}}</span>

        <span id="localclock" class="clock"></span>

        <ul class="nav navbar-top-links navbar-right ">

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
            <li id="app" class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-bell fa-fw"></i>@if(count(auth()->user()->unreadNotifications)>0)<span  style="color: white"  class="btn btn-danger btn-circle" id='GFG_Span'>{{count(auth()->user()->unreadNotifications)}}</span>@endif <i class="fa fa-caret-down"></i>
                </a>
                <ul  class=" dropdown-menu scrollable-menu  dropdown-alerts " role="menu">
            @foreach(auth()->user()->notifications as $not)
                    <li id="{{$not->id}}" class="{{!is_null($not->read_at)?'':'noti'}}">
                        <a href="{{route('Index.Note',['id'=>$not->id])}}">
                            <span class="icon black"><i class="fa {{$not->data['icon']}} fa-fw"></i></span>
                            <span>{!! $not->data['data'] !!}</span>
                            <span   class="pull-right text-muted small">{{$not['created_at']->diffForHumans()}}</span>
                        </a>
                        <span class="btn btn-link"  onclick="deletnote('{{$not->id}}',event)"><i   class="fa fa-trash  fa-fw"></i> </span>
                        <span class="btn btn-link"   onclick="makeread('{{$not->id}}',event)"><i   class="fa {{!is_null($not->read_at)?'fa-envelope-o':'fa-envelope'}} fa-envelope-o  fa-fw"></i> </span>
                       {{--<i   class="fa fa-trash  fa-fw"> <a href="javascript:deletnote($this.id)" id="{{$not->id}}" ></a></i>--}}
                        {{--<div id="{{$not->id}}" onclick="deletnote($this.id)"> <i    class="fa fa-trash  fa-fw"></i></div>--}}
                    </li>
                    <li class="divider"></li>
             @endforeach

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


        <!-- /.navbar-static-side -->
    </nav>

    <div style="margin-left: 15px;margin-right: 15px">
        <div class="row">
            <div class="col-md-3" style="padding-left: 0px;padding-right: 0px;direction: rtl;">
                <li style="direction:ltr;" class="sidebar-search">
                    <div class="input-group custom-search-form">
                         <input id="inputString" type="text" class="form-control" placeholder="Search..">
                        <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                    </div>
                    <!-- /input-group -->
                </li>
                <div class="sidebar-nav-fixed" style="text-align: left">
                    <div class="myBox well soso" >

                        <ul  class="medri nav" style="padding: 0px;">

                            @foreach($Customers as $customer)

                                <li>

                                    <a href="#" onclick="make({{$customer->id}})">
                                        <div>
                                            <strong>{{$customer->name}}</strong>
                                            <span class="pull-right text-muted">
                                        <em>{{$customer->created_at->diffForHumans()}}</em>
                                    </span>
                                        </div>
                                        <div ></div>
                                    </a>
                                </li>
                                <li class="divider"><hr></li>
                            @endforeach
                        </ul>

                    </div>
                    <!--/.well -->
                </div>
                <!--/sidebar-nav-fixed -->
            </div>
            <!--/span-->
            <div id="information"></div>

        </div>
        <!--/row-->

        <footer>
            <p>© Company 2012</p>
        </footer>
    </div>
    <!--/.fluid-container-->
<script>
    function make(cuid) {
     //alert(cuid);
        var id = cuid;
        $.ajax({
            type: "get",
            url: '{{route('Info.Customer')}}',
            data: {_token: '{{csrf_token()}}', id: id},
            success: function (data) {
            //    alert(data);
                // $("#customer").html('');
                // $("#customer").hide();
                // $("#customer-box-result").show();
                $("#information").html(data);
            }, error: function(jqXHR,error, errorThrown) {
                if(jqXHR.status&&jqXHR.status==400){
                    alert(jqXHR.responseText);
                }else{
                    alert(jqXHR);
                }}
        });
    }
    jQuery("#inputString").keyup(function () {
        var filter = jQuery(this).val();
        jQuery(".soso ul li").each(function () {
            if (jQuery(this).text().search(new RegExp(filter, "i")) < 0) {
                jQuery(this).hide();
            } else {
                jQuery(this).show()
            }
        });
    });

</script>

    @else
        <li>
            <a href="{{route('login')}}">{{ __('lang.login') }}
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
