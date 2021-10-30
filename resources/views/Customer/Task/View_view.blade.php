@extends("layouts.Web_app")
@section('title')
    {{__('lang.Task_Update') }}
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
        @endif
    </style>
    <form method="post">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="flash-message">
                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                    @if(Session::has('alert-' . $msg))

                        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                    @endif
                @endforeach
            </div>
            <div class="panel-heading">
                {{__('lang.Task_Update') }}
            </div>
            <div class="panel-body" >
                <div class="form-group">
                    {{csrf_field()}}
                    <label>{{__('lang.Name') }}</label>
                    <input type="text"  readonly class="form-control"   value="{{ $Task->name}}"  >
                </div>
                <div class="form-group">

                    <label>{{__('lang.TaskType') }}</label>
                    <input type="text" readonly class="form-control"   value="{{is_null( $Task->TaskType)?'':$Task->TaskType->name}}"  >
                </div>


                <div class="form-group">
                    <label>{{__('lang.Employee') }}</label>
                    <input type="text" readonly class="form-control"   value="{{is_null( $Task->User->name)?'':$Task->User->name}}"  >
                </div>

                <div class="form-group">
                    <label>{{__('lang.Customer') }}</label>
                    <input type="text" readonly class="form-control"   value="{{is_null($Task->Customer)?'':$Task->Customer->name}}"  >
                </div>

                <div class="form-group">
                    <label>{{__('lang.State') }}</label>
                    <input type="text"  readonly class="form-control"   value="{{is_null( $Task->State)?'':$Task->State->name}}"  >
                    <div class="progress progress-striped active">
                        <div class="progress-bar {{\App\Http\Controllers\Style_cont::progress(is_null($Task->State)?'':$Task->State->percent)}}" role="progressbar" aria-valuenow="{{is_null($Task->State)?'':$Task->State->percent}}" aria-valuemin="0" aria-valuemax="100" style="width:{{$Task->State->percent}}%">
                            <span class="sr-only">{{is_null($Task->State)?'':$Task->State->percent}} % Complete (warning)</span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>{{__('lang.Chang_State_to') }}</label>
                    <input type="text" readonly class="form-control"   value="{{is_null($Task->State->name)?'':$Task->State->name}}">
                </div>
                <div class="form-group">
                    <label>{{__('lang.Duration') }}</label>
                    <input type="text"  readonly class="form-control"   value="{{ $Task->duration}}"  >
                </div>

                <div class="form-group">
                    <label>{{__('lang.Description') }}</label>
                    <input type="text"  readonly class="form-control"   value="{{ $Task->description}}"  >
                </div>

                <div class="form-group">
                    <label>{{__('lang.Memo_User') }}</label>
                    <input type="text"  readonly name ="memouser"  class="form-control"   value="{{ $Task->memo_user}}"  >
                </div>

                <div class="form-group">
                    <label>{{__('lang.Memo_Customer') }}</label>
                    <input type="text" name ="memo_customer"  class="form-control"   value="{{ $Task->memo_customer}}" required >
                </div>



            </div>
            <div class="panel-footer">
               <input type="submit" class="btn btn-primary" value="Save">
            </div>
        </div>
    </div>
    </form>
<script>
    var slider = $('#progress');
    var textn = $('#prog');
    textn.text(slider.val() + '%');
    $(document).on('change', slider, function (e) {
        e.preventDefault();
        textn.text($('#progress').val() + '%');

    });
</script>
@endsection
@section('subject')
    Subject !!!!!!!!!!!
@endsection