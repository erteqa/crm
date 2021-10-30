@extends("layouts.Admin_app")
@section('title')
    {{__('lang.Update_Group') }}
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
                        <input type="text" name="name" placeholder="{{__('Name') }}"
                               class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                               value="{{ $group->name}}" required>
                    </div>
                    <div class="form-group">
                        <label>{{__('Depatment Name') }}</label>
                        <select class="js-example-basic-single form-control" name="department_id">
                            {{--<option value="">Empty</option>--}}
                            @if(!is_null($Divisions))
                                @foreach($Divisions as $Division)
                                    @if(\App\Http\Controllers\Admin\Division_cont::permision($Division,'View'))
                                    @if(!is_null($group->Division))
                                        <option {{$Division->id==$group->Division->id?'selected="selected"':''}}  value="{{$Division->id}}">{{$Division->name}}</option>
                                    @else
                                        <option value="{{$Division->id}}">{{$Division->name}}</option>
                                    @endif
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
            $(document).ready(function () {
                $('.js-example-basic-single').select2();
            });
        </script>
    </form>
@endsection
@section('subject')
    Subject !!!!!!!!!!!
@endsection