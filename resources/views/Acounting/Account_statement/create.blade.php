@extends("layouts.Admin_app")
@section('title')
    {{__('lang.Customer_Summery')}}
@endsection
@section('content')
    <article class="content">
        <div class="card card-block">
            <div id="notify" class="alert alert-success" style="display:none;">
                <a href="#" class="close" data-dismiss="alert">&times;</a>

                <div class="message"></div>
            </div>
            <div class="grid_3 grid_4">
                <h6>{{__('lang.Customer') . __('Account Statement') }}</h6>
                <hr>

                <div class="row sameheight-container">
                    <div class="col-md-6">
                        <div class="card card-block sameheight-item">

                            <form  method="post" >
                                @csrf
                                <div class="form-group">
                                    <label>{{__('lang.Customers_Name') }}</label>
                                    <select class="js-example-basic-single form-control" required name="customer_id">
                                        <option value="">Empty</option>

                                        @if(!is_null($customers))
                                            @foreach($customers as $customer)
                                                @if(\App\Http\Controllers\Admin\Customer_cont::permision($customer,'View'))
                                                    @if(!is_null($customer))
                                                        <option  value="{{$customer->id}}" >{{$customer->name}}</option>
                                                    @endif
                                                @endif
                                            @endforeach

                                        @endif
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"
                                           for="pay_cat">{{__('lang.Type') }}</label>

                                    <div class="col-sm-9">
                                        <select name="trans_type" class="form-control">
                                            <option value='All'>{{__('lang.All_Transactions') }}</option>
                                            <option value='Deposit'>{{__('lang.Deposit') }}</option>
                                            <option value='Income'>{{__('lang.Payment') }}</option>
                                        </select>


                                    </div>
                                </div>
                                <div class="form-group row">

                                    <label class="col-sm-3 control-label"
                                           for="sdate">{{__('lang.From_Date') }}</label>

                                    <div class="col-sm-4">
                                        <input type="text" class="form-control required"
                                               placeholder="Start Date" value="{{date('Y/m/d',strtotime("-1 months"))}}" name="sdate" id="sdate"
                                               data-provide="datepicker" autocomplete="false">
                                    </div>
                                </div>
                                <div class="form-group row">

                                    <label class="col-sm-3 control-label"
                                           for="edate">{{__('lang.To_Date') }}</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control required"
                                               placeholder="End Date" name="edate" value="{{date('Y/m/d')}}"
                                               data-provide="datepicker" autocomplete="false">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="pay_cat"></label>

                                    <div class="col-sm-4">
                                        <input type="submit" class="btn btn-primary btn-md" value="View">
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </article>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>
    <script>
        $.fn.datepicker.defaults.format = "yyyy/mm/dd";
        $('.datepicker').datepicker({
            startDate: '-3d'
        });
    </script>
@endsection
@section('subject')


@endsection