@extends("layouts.Admin_app")

@section('content')
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
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                {{__('lang.Invoice_Editor') }}

                <div class="flash-message">
                    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                        @if(Session::has('alert-' . $msg))

                            <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                        @endif
                    @endforeach
                </div>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                @if( \App\Http\Controllers\Accounting\Invoice_cont::permision('Invoice_Add'))
                <a class="btn btn-primary" style="margin-bottom: 10px" href="{{route('Add.Invoice')}}">{{__('lang.Add_Invoice') }}</a>
                @endif
                <a class="btn btn-danger" style="margin-bottom: 10px;margin-left: 10px"
                   href="{{route('Index.Invoice',['type'=>'Del'])}}">{{__('lang.Deleted_Invoice') }}</a>
                <a class="btn btn-success" style="margin-bottom: 10px;margin-left: 10px"
                   href="{{route('Index.Invoice',['type'=>'UN'])}}">{{__('lang.Existed_Invoice') }}</a>
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr>
                        <th>#</th>


                        <th>{{__('lang.Invoice_Number') }}</th>
                        <th>{{__('lang.Customer') }}</th>
                        <th>{{__('lang.Employee') }}</th>
                        <th>{{__('lang.invoicedate') }}</th>
                        <th>{{__('lang.Company') }}</th>
                        <th>{{__('lang.status') }}</th>
                        <th>{{__('lang.Remaining_amount') }}</th>
                        <th>{{__('lang.Action') }}</th>

                    </tr>
                    </thead>
                    <?php $i=1?>
                    <tbody>
                    @foreach($invoices as $invoice)
                        @if( \App\Http\Controllers\Accounting\Invoice_cont::invpermision($invoice->Customer,'View'))
                        @if($invoice->trashed())
                            <tr class="danger" class="odd gradeX">
                        @else
                            <tr class="odd gradeX">
                                @endif

                                <td>{{$i++}}</td>
                                <td>{{$invoice->tid}}</td>

                                <td>{{is_null($invoice->Customer)?'':$invoice->Customer->name}}</td>
                                <td>{{$invoice->User->name}}</td>
                                <td>{{$invoice->invoicedate}}</td>
                                <td>{{$invoice->Customer['company']}}</td>
                                <td><span class="tag tag-default st-{{$invoice['status']}}">{{__('lang.'.$invoice['status']) }}</span></td>
                                <td>{{$invoice->total-$invoice->pamnt.' TL'}}</td>


                                @if($invoice->trashed())

                                    <td style="width: 210px">
                                        @if( \App\Http\Controllers\Accounting\Invoice_cont::permision('Invoice_ForceDelete'))
                                            <a class="btn btn-danger"
                                               onclick="del('{{route('Invoice.ForceDelete',['id'=>$invoice->id])}}')">{{__('lang.Force_Delete') }}</a>

                                            <a class="btn btn-danger"
                                               onclick="del('{{route('Invoice.Restor',['id'=>$invoice->id])}}')">{{__('lang.Restor') }}</a>
                                        @endif
                                    </td >
                                @else
                                    <td style="width: 210px">

                                        @if( \App\Http\Controllers\Accounting\Invoice_cont::permision('Invoice_Delete'))
                                            <a class="btn btn-danger" onclick="del('{{route('Invoice.Delete',['id'=>$invoice->id])}}')">{{__('lang.Delete') }}</a>
                                        @endif

                                            @if( \App\Http\Controllers\Accounting\Invoice_cont::permision('Invoice_Update'))
                                            <a class="btn btn-warning" href="{{route('Invoice.Update',['id'=>$invoice->id])}}">{{__('lang.Update') }}</a>
                                            @endif

                                            <a class="btn btn-warning" href="{{route('Invoice.View',['id'=>$invoice->id])}}">{{__('lang.View') }}</a>

                                            <a class="btn btn-warning" href="{{route('Invoice.Download',['id'=>$invoice->id,'type' => 'd'])}}">{{__('lang.Download') }}</a>


                                    </td>
                                @endif





                            </tr>
                        @endif
                            @endforeach
                    </tbody>
                </table>
                <!-- /.table-responsive -->
                <script>
                    $(document).ready(function() {
                        $('#dataTables-example').DataTable({
                            responsive: true,
                            stateSave: true
                        });

                    });
                    function del($url) {
                        var $ret_val=confirm( 'Yes Or No' );
                        if($ret_val==true)
                        {
                            window.location.href=$url;
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