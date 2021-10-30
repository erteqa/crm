@extends("layouts.Admin_app")
@section('title')
    {{__('lang.Add_Article') }}
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
                {{__('lang.Add_Article') }}
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
                    <input type="text" name="title" placeholder="{{__('lang.tilte') }}" class="form-control"   value="{{ $Article['title']}}" required >
                </div>
                <div class="form-group">
                    <label>{{__('lang.Catrgory') }}</label>
                    <select class="js-example-basic-single form-control" name="category_id">
                        {{--<option value="">Empty</option>--}}
                        @if(!is_null($Cats))
                            @foreach($Cats as $Cat)
                                <option {{$Article->category_id == $Cat->id?'selected="selected"':''}} value="{{$Cat->id}}">{{$Cat->name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="row">
                    <div class="col-xs-12 mb-1"><label
                                for="shortnote">{{__('lang.content')}}</label><br>
                        <textarea required name="content" rows="4"   class="summernote form-control ckeditor"  title="Contents">{!! $Article->content !!}</textarea></div>
                </div>
                <select class="js-example-basic-single form-control" name="status">

                    <option {{$Article->status == 'all'?'selected="selected"':''}} value="all">{{__('lang.all')}}</option>
                    <option {{$Article->status == 'Deprtment_me'?'selected="selected"':''}} value="Deprtment_me">{{__('lang.Deprtment_me')}}</option>
                    <option {{$Article->status == 'none'?'selected="selected"':''}} value="none">{{__('lang.none')}}</option>
                </select>
            </div>
            <div class="panel-footer">
               <input type="submit" class="btn btn-primary" value="{{__('lang.Send')}}">
            </div>
        </div>
    </div>
    </form>
@endsection
@section('subject')
    {{__('lang.Subject') }}}}
@endsection
<script src="//cdn.ckeditor.com/4.11.3/full/ckeditor.js"></script>