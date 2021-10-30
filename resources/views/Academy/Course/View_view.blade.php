@extends("layouts.Admin_app")
@section('title')
    {{__('lang.Add_Course') }}
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
            <div class="panel panel-primary">
                <div class="panel-heading">
                    {{__('lang.Add_Course') }}
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
                        <label>{{__('lang.title') }}</label>
                        <input type="text" name="title" placeholder="{{__('lang.title') }}" class="form-control{{ $errors->has('tilte') ? ' is-invalid' : '' }}"   value="{{ $Course->title }}" required >
                    </div>

                    <div class="form-group">
                        <label>{{__('lang.teacher') }}</label>
                        <input type="text" name="teacher" placeholder="{{__('lang.teacher') }}" class="form-control{{ $errors->has('tilte') ? ' is-invalid' : '' }}"   value="{{ $Course->teacher }}" required >
                    </div>

                    <div class="form-group">
                        <label>{{__('lang.writer') }}</label>
                        <input type="text" name="writer" placeholder="{{__('lang.writer') }}" class="form-control{{ $errors->has('tilte') ? ' is-invalid' : '' }}"   value="{{ $Course->writer }}" readonly >
                    </div>


                    <div class="form-group">
                        <label>{{__('lang.category') }}</label>
                        <input type="text" name="category" placeholder="{{__('lang.category') }}" class="form-control{{ $errors->has('tilte') ? ' is-invalid' : '' }}"   value="{{ $Course->category }}"   readonly >
                    </div>


                    <div class="form-group">
                        <label>{{__('lang.difficulty') }}</label>
                        <input type="text" name="difficulty" placeholder="{{__('lang.difficulty') }}" class="form-control{{ $errors->has('tilte') ? ' is-invalid' : '' }}"   value="{{ $Course->difficulty }}" readonly >
                    </div>


                    <div class="form-group">
                        <label>{{__('lang.hashtag') }}</label>
                        <input type="text" name="hashtag" placeholder="{{__('lang.hashtag') }}" class="form-control{{ $errors->has('tilte') ? ' is-invalid' : '' }}"   value="{{ $Course->hashtag }}"  readonly>
                    </div>


                    <div class="form-group">
                        <label>{{__('lang.link') }}</label>
                        <input type="text" name="link" placeholder="{{__('lang.link') }}" class="form-control{{ $errors->has('tilte') ? ' is-invalid' : '' }}"   value="{{ $Course->link }}"  readonly>
                    </div>


                    <div class="form-group">
                        <label>{{__('lang.date') }}</label>
                        <input type="date" name="date" placeholder="{{__('lang.date') }}" class="form-control{{ $errors->has('tilte') ? ' is-invalid' : '' }}"   value="{{ $Course->date }}"  readonly>
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