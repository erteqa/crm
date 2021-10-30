@extends("layouts.Admin_app")
@section('title')
    {{__('lang.Add_Part') }}
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
        @endif
    </style>
    <form method="post">
        {{csrf_field()}}
    <div class="col-lg-10">
        <a class="btn btn-primary" style="margin-bottom: 10px"
           href="{{route('Part.Index',['id'=>$lessonid])}}">{{__('lang.Parts_View') }}</a>
        <div class="panel panel-primary">
            <div class="panel-heading">
                {{__('lang.Add_Part') }}
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
                    <label>{{__('lang.num') }}</label>
                    <input type="number" name="num" placeholder="{{__('lang.num') }}" class="form-control{{ $errors->has('num') ? ' is-invalid' : '' }}"   value="{{ old('num') }}" required >
                </div>

                <div class="form-group">
                    <label>{{__('lang.name') }}</label>
                    <input type="text" name="name" placeholder="{{__('lang.name') }}" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"   value="{{ old('name') }}"  >
                </div>

                <div class="form-group">
                    <label>{{__('lang.time') }}</label>
                    <input type="text" name="time" placeholder="{{__('lang.time') }}" class="form-control{{ $errors->has('time') ? ' is-invalid' : '' }}"   value="{{ old('time') }}"  >
                </div>

                <div class="form-group">
                    <label>{{__('lang.link') }}</label>
                    <input type="text" name="link" placeholder="{{__('lang.link') }}" class="form-control{{ $errors->has('link') ? ' is-invalid' : '' }}"   value="{{ old('link') }}"  required>
                </div>

                <div class="form-group">
                    <label>{{__('lang.date') }}</label>
                    <input type="date" name="date" placeholder="{{__('lang.date') }}" class="form-control{{ $errors->has('date') ? ' is-invalid' : '' }}"   value="{{ date('Y-m-d') }}" required >
                </div>

            </div>
            <div class="panel-footer">
               <input type="submit" class="btn btn-primary" value="{{__('lang.Save')}}">
            </div>
        </div>
    </div>
    </form>
@endsection
@section('subject')
    {{__('lang.Subject') }}
@endsection
<script src="//cdn.ckeditor.com/4.11.3/full/ckeditor.js"></script>