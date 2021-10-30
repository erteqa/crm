<div class="col-lg-6">
    <a class="btn btn-warning"
       href="{{route('Customer.SendEmail',['id'=>$Customers->id])}}"
       target="_blank">{{__('lang.SendEmail') }}</a>
    <a class="btn btn-primary"
       href="{{route('Customer.SendSms',['id'=>$Customers->id])}}"
       target="_blank">{{__('lang.SendSms') }}</a>
    @if(\App\Http\Controllers\Admin\Customer_cont::permision($Customers,'Update'))
        <a class="btn btn-success"
           href="{{route('Customer.Update',['id'=>$Customers->id])}}"
           target="_blank">{{__('lang.Update') }}</a>
    @endif
    <div class="panel panel-primary">

        <div class="panel-heading">
            {{__('lang.Customer_View') }}
        </div>
        <div class="panel-body">

            <div class="form-group">
                {{csrf_field()}}
                <label>{{__('lang.Name') }}</label>
                <input type="text" name="name" placeholder="{{__('lang.User_Name') }}"
                       class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                       value="{{ $Customers->name}}" readonly>
            </div>
            <div class="form-group">
                <label>{{__('lang.Phone') }}</label>
                <input type="tel" name="phone"
                       class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}"
                       value="{{ $Customers->phone}}"
                       placeholder="{{__('lang.Phone') }}" readonly>
            </div>
            <div class="form-group">
                <label>{{__('lang.email') }}</label>
                <input type="email" name="phone"
                       class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                       value="{{ $Customers->email}}"
                       placeholder="{{__('lang.email') }}" readonly>
            </div>
            <div class="form-group">
                <label>{{__('lang.Address') }}</label>
                <input type="text" name="address"
                       class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}"
                       value="{{ $Customers->address}}"
                       placeholder="{{__('lang.Address') }}" readonly>
            </div>
            <div class="form-group">
                @if(auth()->user()->department_id != 3 or auth()->user()->department_id != 6 )
                    <label>{{__('lang.Company')}}</label>
                @else
                    <label>{{__('lang.Degreestudy')}}</label>
                @endif

                <input type="text" name="company"
                       class="form-control{{ $errors->has('company') ? ' is-invalid' : '' }}"
                       value="{{ $Customers->company}}"
                       placeholder="{{__('lang.Company') }}" readonly>
            </div>
            <div class="form-group">
                @if(auth()->user()->department_id == 3 or auth()->user()->department_id == 6 or auth()->user()->department_id == 9  or auth()->user()->department_id == 8)
                    <label>{{__('lang.tax') }}</label>
                @else
                    <label>{{__('lang.Taxid') }}</label>
                @endif
                <input type="text" name="taxid"
                       class="form-control{{ $errors->has('taxid') ? ' is-invalid' : '' }}"
                       value="{{ $Customers->taxid}}"
                       placeholder="{{__('lang.Taxid') }}" readonly>
            </div>
            <div class="form-group">
                <label>{{__('lang.Company_Taxid') }}</label>
                <input type="text" name="company_taxid"
                       class="form-control{{ $errors->has('company_taxid') ? ' is-invalid' : '' }}"
                       value="{{ $Customers->company_taxid}}"
                       placeholder="{{__('lang.Company_Taxid') }}" readonly>
            </div>
            <div class="form-group">
                <label>{{__('lang.Group_Name') }}</label>
                <input type="text" name="company_taxid"
                       class="form-control{{ $errors->has('company_taxid') ? ' is-invalid' : '' }}"
                       value="{{ $Customers->Group->name}}"
                       placeholder="{{__('lang.Company_Taxid') }}" readonly>
            </div>
            <div class="form-group">
                <label>{{__('lang.Nationality') }}</label>
                <input type="text" name="nationality"
                       class="form-control{{ $errors->has('nationality') ? ' is-invalid' : '' }}"
                       class="form-control" value="{{ $Customers->nationality}}"
                       placeholder="{{__('lang.Nationality') }}">
            </div>

            <div class="form-group">
                <label>{{__('lang.Passport_Number') }}</label>
                <input type="text" name="passport_number"
                       class="form-control{{ $errors->has('passport_number') ? ' is-invalid' : '' }}"
                       class="form-control" value="{{ $Customers->passport_number}}"
                       placeholder="{{__('lang.Passport_Number') }}">
            </div>
            <div class="form-group">
                <label>{{__('lang.Record_Number') }}</label>
                <input type="text" name="record_number"
                       class="form-control{{ $errors->has('record_number') ? ' is-invalid' : '' }}"
                       class="form-control" value="{{ $Customers->record_number}}"
                       placeholder="{{__('lang.Record_Number') }}">
            </div>
            <div class="form-group">
                <label>{{__('lang.Mersis_Number') }}</label>
                <input type="text" name="mersis_number"
                       class="form-control{{ $errors->has('mersis_number') ? ' is-invalid' : '' }}"
                       class="form-control" value="{{ $Customers->mersis_number}}"
                       placeholder="{{__('lang.Mersis_Number') }}">
            </div>
            <hr>
            @if(\App\Http\Controllers\Accounting\Invoice_cont::permision('vergi_view'))
                <div class="form-group">
                    <label>{{__('lang.vergi_username') }}</label>
                    <input type="text" name="vergi_username"
                           class="form-control{{ $errors->has('vergi_username') ? ' is-invalid' : '' }}"
                           class="form-control" value="{{ $Customers->vergi_username}}"
                           placeholder="{{__('lang.vergi_username') }}">
                </div>
                <div class="form-group">
                    <label>{{__('lang.vergi_password') }}</label>
                    <input type="text" name="vergi_password"
                           class="form-control{{ $errors->has('vergi_password') ? ' is-invalid' : '' }}"
                           class="form-control" value="{{ $Customers->vergi_password}}"
                           placeholder="{{__('lang.vergi_password') }}">
                </div>
                <hr>
                <div class="form-group">
                    <label>{{__('lang.sgk_username') }}</label>
                    <input type="text" name="sgk_username"
                           class="form-control{{ $errors->has('sgk_username') ? ' is-invalid' : '' }}"
                           class="form-control" value="{{ $Customers->sgk_username}}"
                           placeholder="{{__('lang.sgk_username') }}">
                </div>
                <div class="form-group">
                    <label>{{__('lang.sgk_password') }}</label>
                    <input type="text" name="sgk_password"
                           class="form-control{{ $errors->has('sgk_password') ? ' is-invalid' : '' }}"
                           class="form-control" value="{{ $Customers->sgk_password}}"
                           placeholder="{{__('lang.sgk_password') }}">
                </div>
                <hr>
                <div class="form-group">
                    <label>{{__('lang.eimza_username') }}</label>
                    <input type="text" name="eimza_username"
                           class="form-control{{ $errors->has('eimza_username') ? ' is-invalid' : '' }}"
                           class="form-control" value="{{ $Customers->eimza_username}}"
                           placeholder="{{__('lang.eimza_username') }}">
                </div>
                <div class="form-group">
                    <label>{{__('lang.eimza_password') }}</label>
                    <input type="text" name="eimza_password"
                           class="form-control{{ $errors->has('eimza_password') ? ' is-invalid' : '' }}"
                           class="form-control" value="{{ $Customers->eimza_password}}"
                           placeholder="{{__('lang.eimza_password') }}">
                </div>
                <hr>
                <div class="form-group">
                    <label>{{__('lang.edevlet_username') }}</label>
                    <input type="text" name="edevlet_username"
                           class="form-control{{ $errors->has('edevlet_username') ? ' is-invalid' : '' }}"
                           class="form-control"
                           value="{{ $Customers->edevlet_username}}"
                           placeholder="{{__('lang.edevlet_username') }}">
                </div>
                <div class="form-group">
                    <label>{{__('lang.edevlet_password') }}</label>
                    <input type="text" name="edevlet_password"
                           class="form-control{{ $errors->has('edevlet_password') ? ' is-invalid' : '' }}"
                           class="form-control"
                           value="{{ $Customers->edevlet_password}}"
                           placeholder="{{__('lang.edevlet_password') }}">
                </div>
                <hr>
                <div class="form-group">
                    <label>{{__('lang.creat_comp') }}</label>
                    <input type="text" name="creat_comp"
                           class="form-control{{ $errors->has('creat_comp') ? ' is-invalid' : '' }}"
                           class="form-control" value="{{ $Customers->creat_comp}}"
                           placeholder="{{__('lang.creat_comp') }}">
                </div>
                <hr>

            @endif
            <div class="form-group">
                <label>{{__('lang.Tc') }}</label>
                <input type="text" name="Tc"
                       class="form-control{{ $errors->has('Tc') ? ' is-invalid' : '' }}"
                       class="form-control" value="{{ $Customers->Tc}}"
                       placeholder="{{__('lang.Tc') }}">
            </div>
        </div>
    </div>

</div>


<div class="col-lg-6">
    <div class="panel panel-primary">
        <div class="panel-heading">
            Customer Files
        </div>
        <div class="panel-body">
            {{csrf_field()}}
            <table width="100%" class="table table-striped table-bordered table-hover"
                  >
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
                                <a href="{{asset('Files/'.$file->path)}}" target="_blank">
                                    <img src="{{ asset('Images/'.'pdf image.jpg') }}"
                                         alt="pdf" style="width: 100px; height: 100px"></a>
                            </td>
                            <td>
                                <a href="{{route('Downloads',['file'=>$file->path])}}">
                                    download</a>
                            </td>
                        </tr>
                    @elseif(strpos($file->name, '.docx') or strpos($file->name, '.doc'))
                        <tr class="odd gradeX">
                            <td>{{$file->name}}</td>
                            <td>

                                <a href="{{asset('Files/'.$file->path)}}" target="_blank">
                                    <img src="{{ asset('Images/'.'word.jpg') }}"
                                         alt="word" style="width: 100px; height: 100px"></a>
                            </td>
                            <td>
                                <a href="{{route('Downloads',['file'=>$file->path])}}">
                                    download</a>
                            </td>
                        </tr>
                    @else
                        <tr class="odd gradeX">
                            <td>{{$file->name}}</td>
                            <td>
                                <a href="{{asset('Files/'.$file->path)}}" target="_blank">
                                    <img src="{{asset('Files/'.$file->path)}}"
                                         alt="Image"
                                         style="width: 100px; height: 100px" ></a>
                            </td>
                            <td>
                                <a href="{{route('Downloads',['file'=>$file->path])}}">
                                    download</a>
                            </td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
            <script>
                function del($url) {
                    var $ret_val = confirm('Yes Or No');
                    if ($ret_val == true) {
                        window.location.href = $url;
                    }
                }
            </script>
        </div>
        <div class="panel-footer">
        </div>
    </div>
</div>
