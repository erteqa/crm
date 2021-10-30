@extends("layouts.Admin_app")
@section('title')
    <?php __('lang.Ticket_View') ?>
@endsection
@section('content')
    <style>
        @if(app()->getLocale()=='ar')
        .ddf{
            text-align: right;
        }

        @endif
        fieldset {
            border: 1px solid #ea2612;
        }

    </style>
    <div class="col-lg-12">
        <div class="ddf form-group">
            <label class="ddf">{{ $Article['title'] }}</label>
            <div  class="ddf row">
                <div class="col-xs-12 mb-1"><br>
                   {!! $Article->content !!}</div>
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