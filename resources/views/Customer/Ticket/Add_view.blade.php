@extends("layouts.Web_app")
@section('title')
    {{__('lang.Add_Ticket') }}
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
                {{__('lang.Add_Ticket') }}
            </div>
            <div class="flash-message">
                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                    @if(Session::has('alert-' . $msg))
                        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                    @endif
                @endforeach
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12 mb-1"><label
                                for="shortnote">{{__('lang.subject')}}</label><br>
                        <textarea required name="subject" rows="4"   class="summernote form-control ckeditor" id="contents" title="Contents"></textarea></div>
                </div>
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