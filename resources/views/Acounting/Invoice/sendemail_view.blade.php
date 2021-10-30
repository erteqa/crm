
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
                    <h4 class="modal-title">{{__('lang.Email')}}</h4>
                </div>

                <div class="modal-body"  id="emailbody" >
                    <form id="sendbill" method="post"  enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="input-group">
                                    <div class="input-group-addon"><span class="icon-envelope-o"
                                                                         aria-hidden="true"></span></div>
                                    <input type="text" class="form-control" placeholder="Email" name="mailtoc"
                                           value="{{$invoice->Customer->email}} ">
                                </div>

                            </div>

                        </div>
                        <div class="row">
                            <div class="col-xs-12 mb-1"><label
                                        for="shortnote">{{__('lang.Customer_Name')}}</label>
                                <input type="text" class="form-control"
                                       name="customername" value="{{$invoice->Customer->name}} "></div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 mb-1"><label
                                        for="shortnote">{{__('lang.Subject')}}</label>
                                <input type="text" class="form-control"
                                       name="subject" value="{{__('lang.'.$Subject)}}" id="subject">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 mb-1"><label
                                        for="shortnote">{{__('lang.Message')}}</label><br>
                                <textarea name="message" rows="4"   class="summernote form-control ckeditor" id="contents" title="Contents">{{__('lang.'.$Message)}}</textarea></div>
                        </div>

                        <div class="form-group">
                            <input class="btn btn-primary" multiple="multiple" type="file" name="files[]" value="upload">
                        </div>
                        <div class="modal-footer">
                            <div class="panel-footer">
                                <input type="submit" class="btn btn-primary" value="{{__('lang.Send')}}">
                            </div>


                        </div>

                    </form>
                </div>



@endsection
@section('subject')
    Subject !!!!!!!!!!!
@endsection
<script src="//cdn.ckeditor.com/4.11.3/full/ckeditor.js"></script>