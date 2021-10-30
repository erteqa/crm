@extends("layouts.Admin_app")
@section('title')
    {{__('lang.Payment_Editor') }}
@endsection
@section('content')
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                {{__('lang.Payment_Editor') }}
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <a class="btn btn-primary" style="margin-bottom: 10px"
                   {{--@if(\App\Http\Controllers\Accounting\Payment_cont::permision($payment,'Add'))--}}
                   href="{{route('Payment.Add')}}">{{__('lang.Add_Payment') }}</a>
                {{--@endif--}}
                <a class="btn btn-danger" style="margin-bottom: 10px;margin-left: 10px"
                   {{--@if(\App\Http\Controllers\Accounting\Payment_cont::permision($payment,'ForceDelete'))--}}
                   href="{{route('Payment.Index',['type'=>'Del'])}}">{{__('lang.Deleted_Payments') }}</a>
                {{--@endif--}}
                <a class="btn btn-success" style="margin-bottom: 10px;margin-left: 10px"
                   href="{{route('Payment.Index',['type'=>'UN'])}}">{{__('lang.Existed_Payments') }}</a>
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>{{__('lang.Employee') }}</th>
                        <th>{{__('lang.Invoice') }}</th>
                        <th>{{__('lang.Customer') }}</th>
                        <th>{{__('lang.Amount') }}</th>
                        <th>{{__('lang.Note') }}</th>
                        <th>{{__('lang.Date') }}</th>
                        <th>{{__('lang.Action') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1;?>
                    @if(!is_null($payments))
                    @foreach($payments as $payment)
                        @if(!is_null($payment))
                        @if(\App\Http\Controllers\Accounting\Payment_cont::permision('View'))
                            @if($payment->trashed())
                                <tr class="danger" class="odd gradeX">
                            @else
                                <tr class="odd gradeX">
                            @endif
                                    <td>{{$i++}}</td>
                                    <td>{{$payment->User->name}}</td>
                                    <td>{{$payment->Invoice->tid}}</td>
                                    <td>{{$payment->Customer->name}}</td>
                                    <td>{{$payment->amount}}</td>
                                    <td>{{$payment->note}}</td>
                                    <td>{{$payment->date}}</td>
                                    {{--<td><a href="{{route('update.item',['id'=>$item->id])}}">update</a>--}}
                                    @if($payment->trashed())
                                        <td style="width: 23%">
                                            @if(\App\Http\Controllers\Accounting\Payment_cont::permision('ForceDelete'))
                                                <a class="btn btn-danger"
                                                   onclick="del('{{route('Payment.ForceDelete',['id'=>$payment->id])}}')">{{__('lang.Force_Delete') }}</a>
                                                <a class="btn btn-danger"
                                                   onclick="del('{{route('Payment.Restor',['id'=>$payment->id])}}')">{{__('lang.Restor') }}</a>
                                            @endif
                                        </td>
                                    @else
                                        <td style="width: 23%">
                                            @if(\App\Http\Controllers\Accounting\Payment_cont::permision('Delete'))
                                                <a class="btn btn-danger"
                                                   onclick="del('{{route('Payment.Delete',['id'=>$payment->id])}}')">{{__('lang.Delete') }}</a>
                                            @endif
                                            {{--@if(\App\Http\Controllers\Accounting\Payment_cont::permision('Update'))--}}
                                                {{--<a class="btn btn-warning"--}}
                                                   {{--href="{{route('Payment.Update',['id'=>$payment->id])}}">{{__('lang.Update') }}</a>--}}
                                            {{--@endif--}}
                                            <a class="btn btn-warning"
                                               href="{{route('Payment.View',['id'=>$payment->id])}}">{{__('lang.View') }}</a>
                                        </td>
                                    @endif
                                </tr>
                        @endif
                        @endif
                    @endforeach
                        @endif
                    </tbody>
                </table>
                <!-- /.table-responsive -->
                <script>
                    $(document).ready(function () {
                        $('#dataTables-example').DataTable({
                            responsive: true
                        });

                    });

                    function del($url) {
                        var $ret_val = confirm('Yes Or No');
                        if ($ret_val == true) {
                            window.location.href = $url;
                        }

                    }
                </script>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
@endsection
@section('subject')


@endsection