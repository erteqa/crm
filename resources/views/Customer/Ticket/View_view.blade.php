@extends("layouts.Web_app")
@section('title')
    {{__('lang.Ticket_View') }}
@endsection
@section('content')
    <style>
        @if(app()->getLocale()=='ar')
        form{
            text-align: right;
        }
        input{
            text-align: right;
        }
        textarea{
            text-align: right;
        }
        label{
            float: right;
        }
        .lang{
            text-align: right;
        }
        @endif
        fieldset {
            border: 1px solid #ea2612;
        }

    </style>
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading lang">
                {{__('lang.Ticket_View') }}
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <div class="col-lg-12 lang">
                        <div class="panel panel-primary ">
                            <div class="panel-heading">
                                {{__('lang.subject') }}
                            </div>
                            <div class="panel-body">
                                <p>{!! str_replace(array("\n"),"<br>",$Ticket->subject) !!}</p>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-12 lang">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                {{__('lang.reply') }}
                            </div>
                            <div class="panel-body">
                                <p>{!!  str_replace(array("\n"),"<br>",$Ticket->reply)!!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-footer ">
                <a class="btn btn-danger"
                   @if(!is_null($Ticket))
                   onclick="del('{{route('Cu.Ticket.ForceDelete',['id'=>$Ticket->id])}}')">{{__('Delete') }}</a>
                @endif
            </div>
        </div>
    </div>
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
@endsection
@section('subject')
    Subject !!!!!!!!!!!
@endsection