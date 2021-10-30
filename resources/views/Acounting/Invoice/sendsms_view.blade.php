
@extends("layouts.Admin_app")

@section('content')

    <div class="modal-header">
        <div class="flash-message">
            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                @if(Session::has('alert-' . $msg))

                    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                @endif
            @endforeach
        </div>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">{{__('lang.Send') }} SMS</h4>
                </div>

                <div class="modal-body" id="smsbody" >
                    <form id="sendsms"  method="post" action="">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="input-group">
                                    <div class="input-group-addon"><span class="icon-envelope-o"
                                                                         aria-hidden="true"></span></div>
                                    <input type="text" class="form-control" placeholder="SMS" name="mobile"
                                           value="{{$invoice->Customer->phone}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 mb-1">
                                <label
                                        for="shortnote">{{__('lang.Customer') }}</label>
                                <input type="text" class="form-control"
                                       value="{{ $invoice->Customer->name }}"></div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12 mb-1"><label
                                        for="shortnote">{{__('lang.Message') }}</label>
                                <textarea class="form-control " name="text_message" id="sms_tem" title="Contents"
                                          rows="3">{{__('lang.'.$Message)}}</textarea></div>
                        </div>


                        <input type="hidden" class="form-control"
                               id="smstype" value="">

                        <button type="submit" class="btn btn-primary"
                                id="submitSMS">{{__('lang.Send') }}</button>
                    </form>
                </div>


                </div>
            </div>
        </div>




@endsection
@section('subject')
    Subject !!!!!!!!!!!
@endsection
<script src="//cdn.ckeditor.com/4.11.3/full/ckeditor.js"></script>