@extends("layouts.Admin_app")
@section('title')
    {{__('lang.Add_State') }}
@endsection
@section('content')
    <form method="post">
    <div class="col-lg-10">
        <div class="panel panel-primary">
            <div class="panel-heading">
                {{__('lang.Add_State') }}
            </div>
            <div class="flash-message">
                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                    @if(Session::has('alert-' . $msg))

                        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                    @endif
                @endforeach
            </div>
            <div class="panel-body">

               <div class="form-group">
                   {{csrf_field()}}
                   <label>{{__('lang.Name') }}</label>
                   <input type="text" name="name" placeholder="{{__('lang.Name') }}" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"   value="{{ old('name') }}" required >
               </div>
                <div class="form-group">

                    <label>{{__('lang.Percent') }}</label>
                    <input type="number" name="percent" min="1" max="100" placeholder="{{__('lang.Percent') }}" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"   value="{{ old('name') }}" required >
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
    {{__('lang.Subject') }}}}
@endsection