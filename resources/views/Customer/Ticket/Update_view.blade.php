@extends("layouts.Web_app")
@section('title')
    {{__('Customer Update') }}
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
            text-align: right;
        }
        @endif
    </style>
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
                    <input type="text" name="name" placeholder="{{__('User Name') }}" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"   value="{{ $division->name}}" required >
                </div>
                <div class="form-group">
                    <label>{{__('Division Name') }}</label>
                    <select class="js-example-basic-single form-control" name="department_id">
                        {{--<option value="">Empty</option>--}}
                        @if(!is_null($departments))
                            @foreach($departments as $department)
                                @if(!is_null($division->Department))
                                <option {{$department->id==$division->Department->id?'selected="selected"':''}}   value="{{$department->id}}" >{{$department->name}}</option>
                              @else
                                    <option    value="{{$department->id}}" >{{$department->name}}</option>
                                @endif
                                    @endforeach
                        @endif
                    </select>
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