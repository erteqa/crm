@extends("layouts.Web_app")

@section('content')
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                {{__('Ticket Editor') }}
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <a class="btn btn-primary" style="margin-bottom: 10px"
                   href="{{route('Cu.Ticket.Add')}}">{{__('lang.Add_Ticket') }}</a>
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr>
                        <th>{{__('lang.Customer') }}</th>
                        <th>{{__('lang.Subject') }}</th>
                        <th>{{__('lang.reply') }}</th>
                        <th>{{__('lang.Creat_at') }}</th>
                        <th>{{__('lang.Action') }}</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($Tickets as $Ticket)
                        <tr class="odd gradeX">
                            <td>{{$Ticket->Customer->name}}</td>
                            <td>{!! $Ticket->subject !!}</td>
                            <td>{!! $Ticket->reply !!}</td>
                            <td>{{$Ticket->created_at}}</td>
                            <td>
                                <a class="btn btn-danger"
                                   onclick="del('{{route('Cu.Ticket.Delete',['id'=>$Ticket->id,'type'=>'A'])}}')">{{__('Delete') }}</a>
                                <a class="btn btn-warning"
                                   href="{{route('Cu.Ticket.View',['id'=>$Ticket->id,'type'=>'A'])}}">{{__('View') }}</a>
                            </td>
                        </tr>
                    @endforeach
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