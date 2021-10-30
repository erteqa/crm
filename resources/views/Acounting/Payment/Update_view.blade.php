@extends("layouts.Admin_app")
@section('title')
    {{__('Payment Update') }}
@endsection
@section('content')
    <div>
        <form method="post">
            {{csrf_field()}}
            <div class="col-lg-10">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        {{__('Add Payment') }}
                    </div>
                    <div class="flash-message">
                        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                            @if(Session::has('alert-' . $msg))

                                <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                            @endif
                        @endforeach
                    </div>
                    <div class="panel-body container">
                        <div class="row">
                            <div class="input-group col-sm-8">
                                <label
                                        for="amount">{{__('lang.Date') }}</label><br>

                                <input type="text" class="form-control required" id="paydate"
                                       placeholder="Billing Date" name="date" value="{{$payment->date}}"
                                       data-provide="datepicker" required>

                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-3">
                                <label
                                        for="amount">{{__('lang.Amount') }}</label><br>
                                <div class="">
                                    <input  type="number" placeholder="{{__('lang.Enter_amount')}}"
                                            class="form-control" value="{{$payment->amount}}" name="amount"  required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-8">
                                <label>{{ __('lang.Custmer') }}</label>
                                <select class="js-example-basic-single form-control" id="customer_id"
                                        name="customer_id" required>
                                    <option value="">{{__('lang.Payment')}}</option>
                                    @if(!is_null($customers))
                                        @foreach($customers as $customer)
                                            @if(!is_null($customer))
                                                <option {{$payment->Customer->id==$customer->id?'selected="selected"':''}} value="{{$customer->id}}">{{$customer->name}}</option>
                                            @endif
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-8">
                            <label>{{ __('lang.Invoice_Number') }}</label>

                            <div id="customer-box-result">
                                <select class="js-example-basic-single form-control" id="tid" name="invoice_id">
                                    <option value="{{$payment->Invoice->id}}">{{$payment->Invoice->tid}}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 mb-1"><label
                                    for="shortnote">{{__('lang.Note') }}</label>
                            <input  type="text" class="form-control"
                                    name="note" value="{{$payment->note}}" placeholder="Short note" id="not"
                            ></div>
                    </div>

                    <div class="panel-footer">
                        <input type="submit" class="btn btn-primary" value="Save">
                    </div>
                </div>
            </div>
            <script type="text/javascript">
                $(document).ready(function () {
                    $.fn.datepicker.defaults.format = "yyyy/mm/dd";
                    $('.datepicker').datepicker({
                        startDate: '-3d'
                    });
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $("#customer").change(function () {

                        var id = $(this).val();
                        //  alert(id);
                        $.ajax({
                            type: "post",
                            url: '{{route('GetTid')}}',
                            data: {_token: '{{csrf_token()}}', id:id},
                            success: function (data) {
                                // alert(data);
                                $("#customer-box-result").show();
                                $("#customer-box-result").html(data);


                            }, error: function (xhr, ajaxOptions, thrownError) {
                                alert(xhr.status);
                                alert(thrownError);
                            }
                        });
                    });

                });
            </script>
        </form>
    </div>
@endsection
@section('subject')
    Subject !!!!!!!!!!!
@endsection