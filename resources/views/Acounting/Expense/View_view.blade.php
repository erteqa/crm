@extends("layouts.Admin_app")
@section('title')
    {{__('Payment view') }}
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
                                       placeholder="Billing Date" name="date" value="{{$Expense->date}}"
                                       data-provide="datepicker"  readonly required>

                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-3">
                                <label
                                        for="amount">{{__('lang.Amount') }}</label><br>
                                <div class="">
                                    <input  type="number" placeholder="{{__('lang.Enter_amount')}}"
                                            class="form-control" value="{{$Expense->amount}}" name="amount" readonly required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-8">
                                <label>{{ __('lang.Custmer') }}</label>
                                    <div class="">
                                        <input  type="text" placeholder="{{__('lang.Enter_amount')}}"
                                                class="form-control" value="{{$Expense->User->name}}"  readonly required>
                                    </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 mb-1"><label
                                    for="shortnote">{{__('lang.Note') }}</label>
                            <input  type="text" class="form-control"
                                    name="note" value="{{$Expense->note}}" placeholder="Short note" readonly id="not"
                            ></div>
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