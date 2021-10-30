@extends("layouts.Admin_app")
@section('title')
    {{__('Customer Update') }}
    <style>

        body {
            color: #2B2000;
            font-family: 'Helvetica';

        }

        .invoice-box {
            width: 210mm;
            height: 297mm;
            margin: auto;
            padding-right: 4mm;
            padding-left: 4mm;
            padding-bottom: 4mm;
            padding-top: 0mm;
            border: 0;
            font-size: 16pt;
            line-height: 0pt;
            color: #000;
        }

        table {
            width: 100%;
            line-height: 16pt;
            text-align: right;
            border-collapse: collapse;
        }

        .plist tr td {
            line-height: 12pt;
        }

        .subtotal tr td {
            line-height: 10pt;
            padding: 6pt;


        }

        .subtotal tr td {

            border: 1px solid #ddd;

        }

        .sign {
            text-align: right;
            font-size: 10pt;
            margin-right: 110pt;
        }

        .sign1 {
            text-align: right;
            font-size: 10pt;
            margin-right: 90pt;
        }

        .sign2 {
            text-align: right;
            font-size: 10pt;
            margin-right: 115pt;
        }

        .sign3 {
            text-align: right;
            font-size: 10pt;
            margin-right: 115pt;
        }

        .terms {
            font-size: 9pt;
            line-height: 16pt;
            margin-right: 20pt;
        }

        .invoice-box table td {
            padding: 10pt 4pt 8pt 4pt;
            vertical-align: top;

        }

        .invoice-box table.top_sum td {
            padding: 0;
            font-size: 12pt;
        }

        .party tr td:nth-child(3) {
            text-align: center;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20pt;

        }

        table tr.top table td.title {
            font-size: 45pt;
            line-height: 45pt;
            color: #555;
        }

        table tr.information table td {
            padding-bottom: 20pt;
        }

        table tr.heading td {
            background: #515151;
            color: #FFF;
            padding: 6pt;

        }

        table tr.details td {
            padding-bottom: 20pt;
        }

        table tr.item td {
            border: 1px solid #ddd;
        }

        table tr.b_class td {
            border-bottom: 1px solid #ddd;
        }

        table tr.b_class.last td {
            border-bottom: none;
        }

        table tr.total td:nth-child(4) {
            border-top: 2px solid #fff;
            font-weight: bold;
        }

        .myco {
            width: 400pt;
        }

        .myco2 {
            width: 300pt;
        }

        .myw {
            width: 240pt;
            font-size: 14pt;
            line-height: 14pt;

        }

        .mfill {
            background-color: #eee;
        }

        .descr {
            font-size: 10pt;
            color: #515151;
        }

        .tax {
            font-size: 10px;
            color: #515151;
        }

        .t_center {
            text-align: right;

        }

        .party {
            border: #ccc 1px solid;
        }


    </style>

@endsection
@section('content')
    <div class="row wrapper white-bg page-heading">

        <div class="col-lg-12">
            <!--            --><?php
            //            $validtoken = hash_hmac('ripemd160', $invoice['tid'], '2131321441244124424');
            //            $link = base_url('billing/view?id=' . $invoice['tid'] . '&token=' . $validtoken);?>

            @if ($invoice['status'] != 'canceled')

                <div class="title-action">

                    <a class="btn btn-warning mb-1" href="{{route('Invoice.Update',['id'=>$invoice->id])}}"><i
                                class="fa-edit"></i>{{__('lang.Update') }} </a>
                    @if(\App\Http\Controllers\Accounting\Invoice_cont::permision('Payment_Add'))
                    <a href="#part_payment" data-toggle="modal" data-remote="false" data-type="reminder"
                       class="btn btn-large btn-success mb-1" title="Partial Payment"
                    ><span class="fa-money"></span> {{__('lang.Make_Payment') }} </a>
                    @endif
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle mb-1"
                                data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                            <span
                                    class="icon-envelope-o"></span> Email
                        </button>
                        <div class="dropdown-menu">
                            <a href="{{route('Invoice.SendEmail',['id'=>$invoice->id,'type'=>1])}}" data-toggle="modal"
                               data-remote="false" class="btn btn-primary form-control dropdown-item sendbill"
                               data-type="notification">{{__('lang.Invoice_Notification') }}</a>
                            <div class="dropdown-divider"></div>
                            <a href="{{route('Invoice.SendEmail',['id'=>$invoice->id,'type'=>2])}}" data-toggle="modal" data-remote="false"
                               class="btn btn-primary form-control dropdown-item  sendbill"
                               data-type="reminder">{{__('lang.Payment_Reminder') }}</a>
                            <a
                                    href="{{route('Invoice.SendEmail',['id'=>$invoice->id,'type'=>3])}}" data-toggle="modal" data-remote="false"
                                    class="btn btn-primary form-control dropdown-item sendbill"
                                    data-type="received">{{__('lang.Payment_Received') }}</a>
                            <div class="dropdown-divider"></div>
                            <a href="{{route('Invoice.SendEmail',['id'=>$invoice->id,'type'=>4])}}" data-toggle="modal" data-remote="false"
                               class="btn btn-primary form-control dropdown-item sendbill" href="#"
                               data-type="overdue">{{__('lang.Payment_Overdue') }}</a>


                        </div>

                    </div>

                    <!-- SMS -->
                    <div class="btn-group">
                        <button type="button" class="btn btn-blue dropdown-toggle mb-1"
                                data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                            <span
                                    class="icon-envelope-o"></span> SMS
                        </button>
                        <div class="dropdown-menu"><a href="{{route('Invoice.SendSms',['id'=>$invoice->id,'type'=>1])}}" data-toggle="modal"
                                                      data-remote="false" class="dropdown-item btn btn-primary form-control sendsms"
                                                      data-type="notification">{{__('lang.Invoice_Notification') }}</a>
                            <div class="dropdown-divider"></div>

                            <a href="{{route('Invoice.SendSms',['id'=>$invoice->id,'type'=>2])}}" data-toggle="modal"
                               data-remote="false"
                               class="dropdown-item btn btn-primary form-control sendsms"
                               data-type="reminder">{{__('lang.Payment_Reminder') }}</a>

                            <a
                                    href="{{route('Invoice.SendSms',['id'=>$invoice->id,'type'=>3])}}"
                                    data-toggle="modal" data-remote="false"
                                    class="dropdown-item btn btn-primary form-control sendsms"
                                    data-type="received">{{__('lang.Payment_Received') }}</a>

                            <div class="dropdown-divider"></div>
                            <a href="{{route('Invoice.SendSms',['id'=>$invoice->id,'type'=>4])}}" data-toggle="modal"
                               data-remote="false"
                               class="dropdown-item btn btn-primary form-control sendsms"
                               data-type="overdue">{{__('lang.Payment_Overdue') }}</a>


                        </div>

                    </div>

                    <div class="btn-group ">
                        <button type="button" class="btn btn-success mb-1 btn-min-width dropdown-toggle"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                    class="icon-print"></i> {{__('lang.Print') }}
                        </button>
                        <div class="dropdown-menu">
                            <a class="btn btn-primary form-control dropdown-item"
                               href="{{route('Invoice.Download',['id'=>$invoice->id,'type' => 'I'])}}">{{__('lang.Print') }}</a>

                            <div class="dropdown-divider"></div>
                            <a class="btn btn-primary form-control dropdown-item"
                               href="{{route('Invoice.Download',['id'=>$invoice->id,'type' => 'd'])}}">{{__('lang.Download') }}</a>

                        </div>
                    </div>

                    <a href="{{route('Invoice.Download',['id'=>$invoice->id,'type' => 'I'])}}" class="btn btn-info"><i
                                class="icon-earth"></i> {{__('lang.Preview') }}
                    </a>



                    <a href="#cancel-bill" class="btn btn-danger mb-1" id="cancel-bill"><i
                                class="icon-minus-circle"> </i> {{__('lang.Cancel1') }}
                    </a>



                </div>
            @else
                <h2 class="btn btn-oval btn-danger">{{_('Cancelled')}}</h2>;
            @endif
        </div>
    </div>

    <div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if(Session::has('alert-' . $msg))

                <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close"
                                                                                         data-dismiss="alert"
                                                                                         aria-label="close">&times;</a>
                </p>
            @endif
        @endforeach
    </div>

    <br>
    <br>
    <br>

    <table class="plist" cellpadding="0" cellspacing="0">


        <tr class="heading">
            <td>
                {{__('lang.Description')}}
            </td>

            <td>
                {{__('lang.Price') }}
            </td>
            <td>
                {{__('lang.Qty') }}
            </td>

            <?php if ($invoice['tax'] > 0) echo '<td>' . __('lang.Tax') . '</td>';

            if ($invoice['discount'] > 0) echo '<td>' . __('lang.Discount') . '</td>'; ?>
            <td class="t_center">
                <?php echo __('lang.SubTotal') ?>
            </td>
        </tr>

        <?php $i = 1;
        $fill = true;
        $sub_t = 0;
        foreach ($products as $row) {
            $sub_t += $row['price'] * $row['qty'];
            $cols = 3;
            $border = '';
            $border2 = '';
            if ($fill == true) {
                $flag = ' mfill';
                $border = 'b_class';
                if ($row['product_des']) {
                    $border = '';
                    $border2 = 'b_class';
                }
            } else {
                $flag = '';
            }
            echo '<tr class="item' . $flag . ' ' . $border . '">
                            <td>' . $row['product'] . '</td>
							<td style="width:12%;">' . $row['price'] . '</td>
                            <td style="width:12%;" >' . $row['qty'] . '</td>   ';
            if ($invoice['tax'] > 0) {
                $cols++;
                echo '<td style="width:16%;">' . $row['totaltax'] . ' <span class="tax">(' . $row['tax'] . '%)</span></td>';
            }
            if ($invoice['discount'] > 0) {
                $cols++;
                echo ' <td style="width:16%;">' . $row['totaldiscount'] . '</td>';
            }
            echo '<td class="t_center">' . $row['subtotal'] . '</td>
                        </tr>';
            if ($row['product_des']) {
                $cc = $cols + 1;
                echo '<tr class="item' . $flag . ' ' . $border2 . ' descr">
                            <td colspan="' . $cc . '">' . $row['product_des'] . '<br>&nbsp;</td>

                        </tr>';
            }
            $fill = !$fill;
            $i++;
        }



        ?>


    </table>
    <table class="subtotal">


        <tr>
            <td class="myco2" rowspan="<?php echo $cols ?>"><br><br><br>
                <p><?php echo '<strong>' . __('lang.' . ucwords($invoice['status'])) . '</strong> :' . __('lang.Status') . '</p><br><p>' . (floatval($invoice['total']) - floatval($invoice['pamnt'])) . ' :' . __('lang.Total_Amount') . '</p><br><p> ' . $invoice['pamnt'] . ' :' . __('lang.Paid_Amount'); ?></p>
            </td>
            <td><strong><?php echo __('lang.Summary') ?>:</strong></td>
            <td></td>


        </tr>
        <tr class="f_summary">
            <td><?php echo __('lang.SubTotal') ?>:</td>
            <td><?php echo $invoice['subtotal'] ?></td>
        </tr>
        <?php if ($invoice['tax'] > 0) {
            echo '<tr>

            <td> ' . __('lang.Total_Tax') . ' :</td>

            <td>' . $invoice['tax'] . '</td>
        </tr>';
        }
        if ($invoice['discount'] > 0) {
            echo '<tr>
            <td>' . __('lang.Total_Discount') . ':</td>
            <td>' . $invoice['discount'] . '</td>
        </tr>';

        }
        ?>
        <tr>
            <td><?php echo __('lang.Balance_Rmain') ?>:</td>
            <td><?php echo $invoice->Customer->balance ?></td>
        </tr>
    </table>

    <script !src="">

    </script>
    <!-- Modal HTML Payment-->
    <div id="part_payment" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">{{__('lang.Payment_Confirmation') }}</h4>
                </div>

                <div class="modal-body">
                    <form class="payment" method="get" action="{{route('Invoice.Payment',['id'=>$invoice->id])}}">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-xs-6">
                                <div class="input-group">
                                    <div class="input-group-addon">{{__('TL') }}</div>
                                    <input type="text" id="amount" class="form-control" placeholder="Total Amount"
                                           name="amount"
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
                                <select name="pmethod" id="pmethod" class="form-control mb-1">
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
                                           name="shortnote" placeholder="Short note" id="not"
                                           value="Payment for invoice #{{ $invoice['tid'] }}"></div>
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" class="form-control required"
                                       name="tid" id="invoiceid" value="{{ $invoice['tid'] }}">
                                <button type="button" class="btn btn-default"
                                        data-dismiss="modal">{{__('lang.Close')}}</button>
                                <input type="hidden" name="cid" value="{{ $invoice['customer_id'] }}">
                                <input type="hidden" name="eid" value="{{ $invoice['user_id'] }}">
                                <input type="hidden" id="invoiceid" name="invoiceid" value="{{ $invoice->id }}">
                                <button type="submit" class="btn btn-primary"
                                        id="submitpayment">{{('Make Payment')}}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal HTML sms-->
    <div id="sendSMS" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">{{__('lang.Send') }} SMS</h4>
                </div>
                <div id="request_sms">
                    <div id="ballsWaveG1">
                        <div id="ballsWaveG_1" class="ballsWaveG"></div>
                        <div id="ballsWaveG_2" class="ballsWaveG"></div>
                        <div id="ballsWaveG_3" class="ballsWaveG"></div>
                        <div id="ballsWaveG_4" class="ballsWaveG"></div>
                        <div id="ballsWaveG_5" class="ballsWaveG"></div>
                        <div id="ballsWaveG_6" class="ballsWaveG"></div>
                        <div id="ballsWaveG_7" class="ballsWaveG"></div>
                        <div id="ballsWaveG_8" class="ballsWaveG"></div>
                    </div>
                </div>
                <div class="modal-body" id="smsbody" style="display: none;">
                    <form id="sendsms">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="input-group">
                                    <div class="input-group-addon"><span class="icon-envelope-o"
                                                                         aria-hidden="true"></span></div>
                                    <input type="text" class="form-control" placeholder="SMS" name="mobile"
                                           value="{{$invoice['phone'] }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 mb-1">
                            <label
                                        for="shortnote">{{__('lang.Customer Name') }}</label>
                                <input type="text" class="form-control"
                                       value="{{ $invoice['name'] }}"></div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12 mb-1"><label
                                        for="shortnote">{{__('lang.Message') }}</label>
                                <textarea class="form-control" name="text_message" id="sms_tem" title="Contents"
                                          rows="3"></textarea></div>
                        </div>


                        <input type="hidden" class="form-control"
                               id="smstype" value="">


                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default"
                            data-dismiss="modal">{{__('lang.Close') }}</button>
                    <button type="button" class="btn btn-primary"
                            id="submitSMS">{{__('lang.Send') }}</button>
                </div>
            </div>
        </div>
    </div>
    <!-- cancel -->
    <div id="cancel_bill" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">{{__('lang.Cancel_Invoice')}}</h4>
                </div>
                <div class="modal-body">
                    <form class="cancelbill" action="{{route('Invoice.Cancel',['id'=>$invoice->id] )}}">
                        <div class="row">
                            <div class="col-xs-12">
                                {{__('lang.You_can_not_revert')}}

                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" class="form-control"
                                   name="tid" id="id" value="{{$invoice->id}}">
                            <button type="button" class="btn btn-default"
                                    data-dismiss="modal">{{__('lang.Close')}}</button>
                            <button type="submit" class="btn btn-primary"
                                    id="send">{{__('lang.Cancel_Invoice')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).on('click', "#cancel-bill", function (e) {
            e.preventDefault();

            $('#cancel_bill').modal({backdrop: 'static', keyboard: false}).one('click', '#send', function () {
             {{--var  id= $("#id").val();--}}
                {{--var acturl='{{route('Invoice.Cancel',['id'=>id])}}';--}}
                {{--cancelBill(acturl);--}}
            });
        });
        $.fn.datepicker.defaults.format = "yyyy/mm/dd";
        $('.datepicker').datepicker({
            startDate: '-3d'
        });

    </script>
@endsection
@section('subject')
    Subject !!!!!!!!!!!
@endsection