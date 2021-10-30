@extends("layouts.Admin_app")
@section('title')
    {{__('Task Update') }}
@endsection
@section('content')

    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                {{__('Customer Update') }}
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label>{{__('name') }}</label>
                    <input type="text"  readonly class="form-control"   value="{{ !is_null($Alert)?$Alert->name:''}}" required >
                </div>
                <div class="form-group">

                    <label>{{__('description') }}</label>
                    <input type="text" readonly class="form-control"   value="{{ !is_null($Alert)?$Alert->description:''}}" required >
                </div>
            </div>
            <div class="panel-footer ">
                <a class="btn btn-danger"
                   @if(!is_null($Alert))
                   onclick="del('{{route('Alert.Delete',['id'=>$Alert->id,'type'=>'A'])}}')">{{__('Delete') }}</a>
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