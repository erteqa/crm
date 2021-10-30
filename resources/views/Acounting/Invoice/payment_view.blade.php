
@extends("layouts.Admin_app")

@section('content')

    <div id="part_payment" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">{{__('lang.Payment_Confirmation') }}</h4>
                </div>

                <div class="flash-message">
                    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                        @if(Session::has('alert-' . $msg))

                            <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                        @endif
                    @endforeach
                </div>
                <div class="modal-body">
                    <form class="payment" method="post" action="">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-xs-6">
                                <div class="input-group">
                                    <div class="input-group-addon">{{__('TL') }}</div>
                                    <input type="text" id="amount" class="form-control" placeholder="Total Amount" name="amount"
                                           {!! $rming = $invoice['total'] - $invoice['pamnt'] !!}

                                           id="rmpay" value="{{  $rming<0?0:$rming }}">
                                </div>

                            </div>
                            <div class="col-xs-6">
                                <div class="input-group">
                                    <div class="input-group-addon"><span class="icon-calendar4"
                                                                         aria-hidden="true"></span></div>
                                    <input type="text" class="form-control required" id="paydate"
                                           placeholder="Billing Date" name="paydate" value="{{date('Y-m-d')}}"
                                           data-provide="datepicker">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12 mb-1"><label
                                        for="pmethod">{{__('lang.Payment_Method') }}</label>
                                <select name="pmethod"  id="pmethod" class="form-control mb-1">
                                    <option value="Cash">{{__('lang.Cash') }}</option>
                                    <option value="Card">{{__('lang.Card') }}</option>
                                    <option value="Balance">{{__('lang.Client_Balance') }}</option>
                                    <option value="Bank">{{__('lang.Bank') }}</option>
                                </select>


                            </div>

                            <div class="row">
                                <div class="col-xs-12 mb-1"><label
                                            for="shortnote">{{__('lang.Note') }}</label>
                                    <input type="text" class="form-control"
                                           name="note" placeholder="Short note" id="not"
                                           value="Payment for invoice #{{ $invoice['tid'] }}"></div>
                            </div>

                            <div class="modal-footer">
                                <input type="hidden" class="form-control required"
                                       name="tid" id="invoiceid" value="{{ $invoice['tid'] }}">
                                <button type="button" class="btn btn-default"
                                        data-dismiss="modal">{{__('lang.Close')}}</button>
                                <input type="hidden" name="cid" value="{{ $invoice['customer_id'] }}">
                                <input type="hidden" name="eid" value="{{ $invoice['user_id'] }}">
                                <button type="button" class="btn btn-primary"
                                        id="submitpayment">{{('Make Payment')}}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('subject')
    Subject !!!!!!!!!!!
@endsection