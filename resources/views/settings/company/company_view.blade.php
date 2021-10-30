@extends("layouts.Admin_app")

@section('content')
    <article class="content">
        <div class="">
            <div class="col-md-6">
                <div class="card card-block">
                    <div id="notify" class="alert alert-success" style="display:none;">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>

                        <div class="message"></div>
                    </div>

                    <form method="post" id="product_action" class="form-horizontal">
                        <div class="grid_3 grid_4">
                            {{csrf_field()}}
                            <h5>{{__('lang.Edit_Company_Details')}} </h5>
                            <hr>
                            <div class="form-group row">

                                <label class="col-sm-2 col-form-label"
                                       for="name">{{ __('lang.Company_Name') }}</label>

                                <div class="col-sm-10">
                                    <input type="text" placeholder="Name"
                                           class="form-control margin-bottom  required" name="name"
                                           value="{{ $company->name}}">
                                </div>
                            </div>


                            <div class="form-group row">

                                <label class="col-sm-2 col-form-label"
                                       for="address">{{__('lang.Address') }}</label>

                                <div class="col-sm-10">
                                    <input type="text" placeholder="address"
                                           class="form-control margin-bottom  required" name="address"
                                           value="{{ $company['address'] }}">
                                </div>
                            </div>
                            <div class="form-group row">

                                <label class="col-sm-2 col-form-label"
                                       for="city">{{__('lang.City') }}</label>

                                <div class="col-sm-10">
                                    <input type="text" placeholder="city"
                                           class="form-control margin-bottom  required" name="city"
                                           value="{{$company['city'] }}">
                                </div>
                            </div>
                            <div class="form-group row">

                                <label class="col-sm-2 col-form-label"
                                       for="city">{{__('lang.Region') }}</label>

                                <div class="col-sm-10">
                                    <input type="text" placeholder="city"
                                           class="form-control margin-bottom  required" name="region"
                                           value="{{ $company['region'] }}">
                                </div>
                            </div>
                            <div class="form-group row">

                                <label class="col-sm-2 col-form-label"
                                       for="country">{{__('lang.Country') }}</label>

                                <div class="col-sm-10">
                                    <input type="text" placeholder="Country"
                                           class="form-control margin-bottom  required" name="country"
                                           value="{{ $company['country'] }}">
                                </div>
                            </div>


                            <div class="form-group row">

                                <label class="col-sm-2 col-form-label"
                                       for="phone">{{__('lang.Phone') }}</label>

                                <div class="col-sm-10">
                                    <input type="text" placeholder="phone"
                                           class="form-control margin-bottom  required" name="phone"
                                           value="{{ $company->phone }}">
                                </div>
                            </div>
                            <div class="form-group row">

                                <label class="col-sm-2 col-form-label"
                                       for="email">{{__('lang.Email') }}</label>

                                <div class="col-sm-10">
                                    <input type="text" placeholder="email"
                                           class="form-control margin-bottom  required" name="email"
                                           value="{{ $company->email }}">
                                </div>
                            </div>
                            <div class="form-group row">

                                <label class="col-sm-2 col-form-label"
                                       for="email">{{__('lang.Tax') }} ID </label>

                                <div class="col-sm-10">
                                    <input type="text" placeholder="TAX ID"
                                           class="form-control margin-bottom" name="taxid"
                                           value="{{ $company->taxid }}">
                                </div>
                            </div>


                            <div class="form-group row">

                                <label class="col-sm-2 col-form-label"></label>

                                <div class="col-sm-4">
                                    <input type="submit" id="company_update" class="btn btn-success margin-bottom"
                                           value="{{__('lang.Update_Company') }}"
                                           data-loading-text="Updating...">
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card card-block">
                    <div id="notify" class="alert alert-success" style="display:none;">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>

                        <div class="message"></div>
                    </div>
                    <form method="post" action="{{route('Complogoupload',['id'=>$company->id])}}" enctype="multipart/form-data" class="form-horizontal">
                        <div class="grid_3 grid_4">
                            {{csrf_field()}}
                            <h5>{{__('lang.Company_Logo') }}</h5>
                            <hr>



                            <div class="ibox-content no-padding border-left-right">
                                <img alt="image" id="dpic" class="img-responsive"
                                     src="{{ asset('Images/'.$company->logo)}}">
                            </div>

                            <hr>
                            <p><label for="fileupload">{{__('lang.Change_Company_Logo') }}</label><input
                                        id="fileupload" type="file"
                                        name="files[]" required></p>
                            <pre>Recommended logo size is 500x200px.</pre>

                            <div class="panel-footer">
                                <input type="submit" class="btn btn-primary" value="Uplaod">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </article>

@endsection
