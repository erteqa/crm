@extends("layouts.Web_app")
@section('title')
    {{__('lang.Customer_Update') }}
@endsection
@section('content')
    <div>
        <form method="post">
            <div class="col-lg-4">
                <div class="flash-message">
                    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                        @if(Session::has('alert-' . $msg))

                            <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                        @endif
                    @endforeach
                </div>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        {{__('lang.Customer_Update') }}
                    </div>
                    <div class="panel-body">

                        <div class="form-group">
                            {{csrf_field()}}
                            <label>{{__('lang.Name') }}</label>
                            <input type="text" name="name" placeholder="{{__('lang.Name') }}"
                                   class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                   value="{{ $customer->name}}" readonly required>
                        </div>
                        <div class="form-group">
                            <label>{{__('lang.Phone') }}</label>
                            <input type="tel" name="phone"
                                   class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}"
                                   value="{{ $customer->phone}}"readonly placeholder="{{__('lang.Phone') }}">
                        </div>
                        <div class="form-group">
                            <label>{{__('lang.Email') }}</label>
                            <input type="tel" name="email"
                                   class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                   value="{{ $customer->email}}"readonly placeholder="{{__('lang.Email') }}">
                        </div>
                        <div class="form-group">
                            <label>{{__('lang.Address') }}</label>
                            <input type="text" name="address"
                                   class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}"
                                   value="{{ $customer->address}}"readonly placeholder="{{__('lang.Address') }}">
                        </div>
                        @if($customer->Group->id!=2)
                        <div class="form-group">
                            <label>{{__('lang.Company') }}</label>
                            <input type="text" name="company"
                                   class="form-control{{ $errors->has('company') ? ' is-invalid' : '' }}"
                                   value="{{ $customer->company}}"readonly placeholder="{{__('lang.Company') }}">
                        </div>
                        <div class="form-group">
                            <label>{{__('lang.Taxid') }}</label>
                            <input type="text" name="taxid"
                                   class="form-control{{ $errors->has('taxid') ? ' is-invalid' : '' }}"
                                   value="{{ $customer->taxid}}"readonly placeholder="{{__('lang.Taxid') }}">
                        </div>
                        <div class="form-group">
                            <label>{{__('lang.Company_Taxid') }}</label>
                            <input type="text" name="company_taxid"
                                   class="form-control{{ $errors->has('company_taxid') ? ' is-invalid' : '' }}"
                                   value="{{ $customer->company_taxid}}"readonly placeholder="{{__('lang.Company_Taxid') }}">
                        </div>
                        <div class="form-group">
                            <label>{{__('lang.Group_Name') }}</label>
                            <input type="text" name="company_taxid"
                                   class="form-control{{ $errors->has('company_taxid') ? ' is-invalid' : '' }}"
                                   value="{{ $customer->Group->name}}"readonly placeholder="{{__('lang.Group_Name') }}">

                        </div>
                        @endif
                        <div class="form-group">
                            <label>{{__('lang.Nationality') }}</label>
                            <input type="text" name="nationality"
                                   class="form-control{{ $errors->has('nationality') ? ' is-invalid' : '' }}"
                                   class="form-control" value="{{ $customer->nationality}}"
                                  readonly placeholder="{{__('lang.Nationality') }}">
                        </div>

                        <div class="form-group">
                            <label>{{__('lang.Passport_Number') }}</label>
                            <input type="text" name="passport_number"
                                   class="form-control{{ $errors->has('passport_number') ? ' is-invalid' : '' }}"
                                   class="form-control" value="{{ $customer->passport_number}}"
                                  readonly placeholder="{{__('lang.Passport_Number') }}">
                        </div>
                        <div class="form-group">
                            <label>{{__('lang.Tc') }}</label>
                            <input type="text" name="Tc"
                                   class="form-control{{ $errors->has('Tc') ? ' is-invalid' : '' }}"
                                   class="form-control" value="{{ $customer->Tc}}"
                                   readonly placeholder="{{__('lang.Tc') }}">
                        </div>
                        @if($customer->Group->id!=2)
                        <div class="form-group">
                            <label>{{__('lang.Record_Number') }}</label>
                            <input type="text" name="record_number"
                                   class="form-control{{ $errors->has('record_number') ? ' is-invalid' : '' }}"
                                   class="form-control" value="{{ $customer->record_number}}"
                                  readonly placeholder="{{__('lang.Record_Number') }}">
                        </div>
                        <div class="form-group">
                            <label>{{__('lang.Mersis_Number') }}</label>
                            <input type="text" name="mersis_number"
                                   class="form-control{{ $errors->has('mersis_number') ? ' is-invalid' : '' }}"
                                   class="form-control" value="{{ $customer->mersis_number}}"
                                  readonly placeholder="{{__('lang.Mersis_Number') }}">
                        </div>

                        <hr>
                        {{--@if(\App\Http\Controllers\Accounting\Invoice_cont::permision('vergi_view'))--}}
                            <div class="form-group">
                                <label>{{__('lang.vergi_username') }}</label>
                                <input type="text" name="vergi_username"
                                       class="form-control{{ $errors->has('vergi_username') ? ' is-invalid' : '' }}"
                                       class="form-control" value="{{ $customer->vergi_username}}"
                                      readonly placeholder="{{__('lang.vergi_username') }}">
                            </div>
                            <div class="form-group">
                                <label>{{__('lang.vergi_password') }}</label>
                                <input type="text" name="vergi_password"
                                       class="form-control{{ $errors->has('vergi_password') ? ' is-invalid' : '' }}"
                                       class="form-control" value="{{ $customer->vergi_password}}"
                                      readonly placeholder="{{__('lang.vergi_password') }}">
                            </div>
                            <hr>
                            <div class="form-group">
                                <label>{{__('lang.sgk_username') }}</label>
                                <input type="text" name="sgk_username"
                                       class="form-control{{ $errors->has('sgk_username') ? ' is-invalid' : '' }}"
                                       class="form-control" value="{{ $customer->sgk_username}}"
                                      readonly placeholder="{{__('lang.sgk_username') }}">
                            </div>
                            <div class="form-group">
                                <label>{{__('lang.sgk_password') }}</label>
                                <input type="text" name="sgk_password"
                                       class="form-control{{ $errors->has('sgk_password') ? ' is-invalid' : '' }}"
                                       class="form-control" value="{{ $customer->sgk_password}}"
                                      readonly placeholder="{{__('lang.sgk_password') }}">
                            </div>
                            <hr>
                            <div class="form-group">
                                <label>{{__('lang.eimza_username') }}</label>
                                <input type="text" name="eimza_username"
                                       class="form-control{{ $errors->has('eimza_username') ? ' is-invalid' : '' }}"
                                       class="form-control" value="{{ $customer->eimza_username}}"
                                      readonly placeholder="{{__('lang.eimza_username') }}">
                            </div>
                            <div class="form-group">
                                <label>{{__('lang.eimza_password') }}</label>
                                <input type="text" name="eimza_password"
                                       class="form-control{{ $errors->has('eimza_password') ? ' is-invalid' : '' }}"
                                       class="form-control" value="{{ $customer->eimza_password}}"
                                      readonly placeholder="{{__('lang.eimza_password') }}">
                            </div>
                            <hr>
                            <div class="form-group">
                                <label>{{__('lang.edevlet_username') }}</label>
                                <input type="text" name="edevlet_username"
                                       class="form-control{{ $errors->has('edevlet_username') ? ' is-invalid' : '' }}"
                                       class="form-control" value="{{ $customer->edevlet_username}}"
                                      readonly placeholder="{{__('lang.edevlet_username') }}">
                            </div>
                            <div class="form-group">
                                <label>{{__('lang.edevlet_password') }}</label>
                                <input type="text" name="edevlet_password"
                                       class="form-control{{ $errors->has('edevlet_password') ? ' is-invalid' : '' }}"
                                       class="form-control" value="{{ $customer->edevlet_password}}"
                                      readonly placeholder="{{__('lang.edevlet_password') }}">
                            </div>
                            <hr>


                        @endif


                    </div>
                </div>
                <div class="panel-footer">
                    {{--<input type="submit" class="btn btn-primary" value="Save">--}}
                </div>
            </div>
            <script>
                $(document).ready(function () {
                    $('.js-example-basic-single').select2();
                });
            </script>
        </form>
        <form method="post" action="{{route('Uploadfile',['id'=>$customer->id])}}" enctype="multipart/form-data">
            <div class="col-lg-8">

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Customer Files
                    </div>
                    <div class="panel-body">
                        {{csrf_field()}}
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>
                                <th>{{__('lang.Name_file') }}</th>
                                <th>{{__('lang.file') }}</th>
                                <th>{{__('lang.Action') }}</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($files as $file)


                                @if(strpos($file->name, '.pdf'))
                                    <tr class="odd gradeX">
                                        <td>{{$file->name}}</td>
                                        <td>
                                            {{--<embed src="{{public_path().'/Files/'.$file->name}}"  type="application/pdf"--}}
                                            {{--height="300px" width="100%" class="responsive">--}}
                                            {{--<embed class="col-lg-10" src="{{ asset(public_path().'/Files/'.$file->name) }}" width="600" height="500" alt="pdf" />--}}
                                            {{----}}
                                            <a href="{{asset('Files/'.$file->path)}}">
                                                <img src="{{ asset('Images/'.'pdf image.jpg') }}"

                                                     alt="pdf"   style="width: 100px; height: 100px" ></a>


                                        </td>
                                        <td>
                                            <a href="{{route('Downloads',['file'=>$file->path])}}"> download</a>
                                        </td>
                                    </tr>
                                @elseif(strpos($file->name, '.docx') or strpos($file->name, '.doc'))
                                    <tr class="odd gradeX">
                                        <td>{{$file->name}}</td>
                                        <td>

                                            <a href="{{asset('Files/'.$file->path)}}">
                                                <img src="{{ asset('Images/'.'word.jpg') }}"

                                                     alt="word"   style="width: 100px; height: 100px" ></a>


                                        </td>
                                        <td>
                                            <a href="{{route('Downloads',['file'=>$file->path])}}"> download</a>
                                        </td>
                                    </tr>
                                @else
                                    <tr class="odd gradeX">
                                        <td>{{$file->name}}</td>
                                        <td>
                                            <a href="{{asset('Files/'.$file->path)}}">
                                                <img src="{{asset('Files/'.$file->path)}}"
                                                     alt="Image" style="width: 100px; height: 100px"></a>
                                        </td>
                                        <td>
                                            <a href="{{route('Downloads',['file'=>$file->path])}}"> download</a>
                                        </td>
                                    </tr>
                                @endif


                            @endforeach

                            </tbody>
                        </table>
                        <script>
                            $(document).ready(function () {
                                $('#dataTables-example').DataTable({
                                    responsive: true
                                });

                            });

                            function del($url) {
                                var $ret_val = confirm('Yes Or No');
                                if ($ret_val == true) {
                                    window.location.href = $url;
                                }

                            }
                        </script>
                        <div class="form-group">
                            <input class="btn btn-primary" multiple="multiple" type="file" name="files[]" value="upload">
                        </div>

                    </div>
                    <div class="panel-footer">
                        <input type="submit" class="btn btn-primary" value="Save">
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('subject')
    Subject !!!!!!!!!!!
@endsection