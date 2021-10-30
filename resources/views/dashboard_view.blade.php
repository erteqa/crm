@extends("layouts.Admin_app")
@section('title')
    Dashboard
@endsection
@section('content')
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
    @if(Auth::user()->hasAnyRole(['Admin']))
    <div class="row">
        <div class="col-lg-2 col-md-4">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-turkish-lira fa-1x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{$D_Expenses}}</div>
                            <div>{{__('lang.D_Expenses')}}</div>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left">{{__('lang.View_Details')}}</span>
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
                            <div class="huge">{{$M_Expenses}}</div>
                            <div>{{__('lang.M_Expenses')}}</div>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left">{{__('lang.View_Details')}}</span>
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
                            <div class="huge">{{$D_Payment}}</div>
                            <div>{{__('lang.D_Payment')}}</div>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left">{{__('lang.View_Details')}}</span>
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
                            <div class="huge">{{$M_Payment}}</div>
                            <div>{{__('lang.M_Payment')}}</div>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left">{{__('lang.View_Details')}}</span>
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
                            <div class="huge">{{$D_Income}}</div>
                            <div>{{__('lang.Income_day')}}</div>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left">{{__('lang.View_Details')}}</span>
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
                            <div class="huge">{{$M_Income}}</div>
                            <div>{{__('lang.Income_month')}}</div>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left">{{__('lang.View_Details')}}</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    @endif
    <!-- /.row -->
    <div class="row">

        <div class="col-md-6 col-sm-12 col-xs-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    Latest tasks <span class="badge"> {{ $countTasks }}</span></button>
                    <span style="float: right">Completed: {{ $completedTasks }} | Uncompleted: {{ $uncompletedTasks }}</span>
                </div>
                <div class="panel-body">
                    <div class="list-group">
                        @if(count($dataWithAllTasks) > 0)
                            @foreach ($dataWithAllTasks as $result)
                                <a href="{{ route('Task.View',['id'=>$result->id]) }}" class="list-group-item">
                                    <span class="badge badge" style="background-color: #428bca !important;">{{ $result['created_at']->diffForHumans() }}</span>
                                    <span class="badge badge" style="background-color: #ca4e6e !important;">Duration: {{ $result['duration'] . ' days' }}</span>
                                    <i class="fa fa-fw fa-comment"></i> {{ $result['name'] }}
                                </a>
                            @endforeach
                        @else
                            There is no tasks.
                        @endif
                    </div>
                    <div class="text-right">
                        <a href="{{ route('Task.Index',['type' => 'P']) }}">More Tasks <i class="fa fa-arrow-circle-right"></i></a>
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
                                    <th>{{__('lang.Name') }}</th>
                                    <th>{{__('lang.Phone') }}</th>
                                    @if(auth()->user()->pattern==1 )
                                        <th>{{__('lang.company') }}</th>
                                    @else
                                        <th>{{__('lang.Degreestudy')}}</th>
                                    @endif

                                    <th>{{__('lang.Add_By') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 1;?>
                                @foreach($customers as $customer)

                                    @if(\App\Http\Controllers\Admin\Customer_cont::permision($customer,'View'))

                                            <tr class="odd gradeX">

                                                <td>{{$i++}}</td>
                                                <td style="font-size: 12px;width: 12px">{{$customer['name']}}</td>
                                                <td >{{$customer['phone']}}</td>
                                                <td style="font-size: 12px;width: 12px"><a href="{{route('Customer.View',['id'=>$customer->id])}}">{{$customer->company}}</a></td>
                                                <td style="font-size: 12px;width: 12px">{{$customer->User['name']}}</td>
                                            </tr>
                                            @endif
                                        @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>

        </div>
@if(Auth::user()->hasAnyRole(['Admin']))
<div class="col-xl-4 col-lg-6">


        <div class="panel-body">
                <div class="dashboard-sales-breakdown-chart" id="dashboard-sales-breakdown-chart"></div>
        </div>

</div>
@endif
<div class="col-md-6 col-sm-12 col-xs-12">

    <div class="card">
        <div class="card-header">
            <h4 class="card-title">{{__('lang.recent_invoices') }}
                <a
                        href="{{route('Add.Invoice')}}"
                        class="btn btn-primary btn-sm rounded">{{__('lang.Add_Invoice') }}</a>
                <a
                        href="{{route('Index.Invoice',['type'=>'UN'])}}"
                        class="btn btn-success btn-sm rounded">{{__('lang.Manage_Invoices') }}</a>
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
                        <th>{{__('lang.Invoices') }}#</th>
                        <th>{{__('lang.Customer') }}</th>
                        <th>{{__('lang.Status') }}</th>
                        <th>{{__('lang.Date') }}</th>
                        <th>{{__('lang.Amount') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($Invoices)>0)
                    @foreach($Invoices as $Invoice)
                        @if( \App\Http\Controllers\Accounting\Invoice_cont::invpermision($Invoice->Customer,'View'))
                        <tr>
                        <td class="text-truncate"><a href="{{route('Invoice.View',['id'=>$Invoice->id])}}">#{{$Invoice['tid']}}</a></td>
                        <td class="text-truncate" style="font-size: 12px;width: 12px"> {{$Invoice->Customer['name']}}</td>
                        <td class="text-truncate"><span class="tag tag-default st-{{$Invoice['status']}}">{{__('lang.'.$Invoice['status']) }}</span></td>
                        <td class="text-truncate">{{$Invoice['invoicedate']}}</td>
                        <td class="text-truncate">{{$Invoice['total']}}</td>
                    </tr>
                        @endif
                    @endforeach
                    @endif
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
    data: [{label: "{{__('lang.Income') }}", value: '{{$Income}}' },
        {label: "{{__('lang.Expenses') }}", value: '{{$Expenses}}' },
        {label: "{{__('lang.Payment') }}", value:'{{$Payment}}' },
    ],
    resize: true,
    colors: ['#34cea7', '#ff6e40','#f63273'],
    gridTextSize: 6,
    gridTextWeight: 400
});
</script>
{{--<canvas id="myChart"></canvas>--}}
{{--<script>--}}
{{--var ctx = document.getElementById('myChart').getContext('2d');--}}
{{--var chart = new Chart(ctx, {--}}
    {{--// The type of chart we want to create--}}
    {{--type: 'line',--}}

    {{--// The data for our dataset--}}
    {{--data: {--}}
        {{--labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],--}}
        {{--datasets: [{--}}
            {{--label: 'My First dataset',--}}
            {{--backgroundColor: 'rgb(255, 99, 132)',--}}
            {{--borderColor: 'rgb(255, 99, 132)',--}}
            {{--data: [0, 10, 5, 2, 20, 30, 45]--}}
        {{--}]--}}
    {{--},--}}

    {{--// Configuration options go here--}}
    {{--options: {}--}}
{{--});--}}
{{--</script>--}}
@endsection
@section('subject')
Subject For  Post
@endsection
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

