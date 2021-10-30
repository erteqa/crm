@extends("layouts.Admin_app")
@section('title')
    {{__('Customer Update') }}
@endsection
@section('content')
    <form method="post">
    <div class="col-lg-4">
        <div class="panel panel-primary">
            <div class="panel-heading">
                {{__('Customer Update') }}
            </div>
            <div class="panel-body">

                <div class="form-group">
                    {{csrf_field()}}
                    <label>{{__('Name') }}</label>
                    <input type="text" name="name" placeholder="{{__('User Name') }}" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"   value="{{ $TaskType->name}}" required >
                </div>


            </div>
            <div class="panel-footer">
               <input type="submit" class="btn btn-primary" value="Save">
            </div>
        </div>
    </div>
        <script>
            $(document).ready(function() {
                $('.js-example-basic-single').select2();
            });
        </script>
    </form>
@endsection
@section('subject')
    Subject !!!!!!!!!!!
@endsection