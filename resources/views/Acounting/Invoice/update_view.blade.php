@extends("layouts.Admin_app")
@section('title')

@endsection
@section('content')
    <article class="content">
        <div class="card card-block">
            <div id="notify" class="alert alert-success" style="display:none;">
                <a href="#" class="close" data-dismiss="alert">&times;</a>

                <div class="flash-message">
                    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                        @if(Session::has('alert-' . $msg))

                            <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#"
                                                                                                     class="close"
                                                                                                     data-dismiss="alert"
                                                                                                     aria-label="close">&times;</a>
                            </p>
                        @endif
                    @endforeach
                </div>
            </div>
            <form method="post" id="data_form">

                {{csrf_field()}}
                <div class="row">

                    <div class="col-sm-4">

                    </div>

                    <div class="col-sm-3"></div>

                    <div class="col-sm-2"></div>

                    <div class="col-sm-3">

                    </div>

                </div>

                <div class="row">


                    <div class="col-sm-6 cmp-pnl">
                        <div id="customerpanel" class="inner-cmp-pnl">

                            <div class="form-group">
                                <label>{{__('TaskType Name') }}</label>
                                <select class="js-example-basic-single form-control" id="customer-box"
                                        name="task_type_id">

                                    @if(!is_null($customers))
                                        @foreach($customers as $customer)
                                            @if(!is_null($customer))
                                                <option value="{{$customer->id}}">{{$customer->name}}</option>
                                            @endif
                                        @endforeach
                                    @endif
                                </select>
                                <div id="customer-box-result"></div>
                            </div>
                            <div id="customer">
                                <div class="clientinfo">
                                    {{ _('Client Details') }}
                                    <hr>
                                    <input type="hidden" name="customer_id" id="customer_id"
                                           value="{{$invoice->customer_id}}">
                                    <div id="customer_name"><strong>{{$invoice->Customer->name }}</strong></div>
                                </div>
                                <div class="clientinfo">

                                    <div id="customer_address1"><strong>{{$invoice->Customer->address}}
                                        </strong></div>
                                </div>

                                <div class="clientinfo">

                                    <div type="text" id="customer_phone">Phone:
                                        <strong>{{$invoice->Customer->phone}}  </strong><br>Email:
                                        <strong>{{ $invoice->Customer->email}} </strong></div>
                                </div>
                                <hr>

                            </div>


                        </div>
                    </div>
                    <div class="col-sm-6 cmp-pnl">
                        <div class="inner-cmp-pnl">


                            <div class="form-group row">

                                <div class="col-sm-12"><h3
                                            class="title">{{ _('Invoice Properties') }}</h3>
                                </div>

                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6"><label for="invocieno"
                                                             class="caption">{{ _('Invoice Number') }}</label>

                                    <div class="input-group">
                                        <div class="input-group-addon"><span class="icon-file-text-o"
                                                                             aria-hidden="true"></span></div>
                                        <input type="text" class="form-control" placeholder="Invoice #" name="invocieno"
                                               value="{{ $invoice->tid}}" readonly>
                                    </div>
                                </div>

                            </div>
                            <div class="form-group row">

                                <div class="col-sm-6"><label for="invociedate"
                                                             class="caption">{{ _('Invoice Date')}}</label>

                                    <div class="input-group">
                                        <div class="input-group-addon"><span class="icon-calendar4"
                                                                             aria-hidden="true"></span></div>
                                        <input type="text" class="form-control required editdate"
                                               placeholder="Billing Date" name="invoicedate" autocomplete="false"
                                               value="{{ $invoice->invoicedate}}">
                                    </div>
                                </div>
                                <div class="col-sm-6"><label for="invocieduedate"
                                                             class="caption">{{ _('Invoice Due Date') }}</label>

                                    <div class="input-group">
                                        <div class="input-group-addon"><span class="icon-calendar-o"
                                                                             aria-hidden="true"></span></div>
                                        <input type="text" class="form-control required editdate" name="invocieduedate"
                                               placeholder="Due Date" autocomplete="false"
                                               value="{{ $invoice->invoiceduedate }}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label for="taxformat"
                                           class="caption">{{ _('Tax') }}</label>
                                    <select class="form-control" name="taxformat" onchange="changeTaxFormat(this.value)"
                                            id="taxformat">

                                        <option {{$invoice->taxstatus == 'yes'?'selected="selected"':''}} value="on">{{ _('On') }}</option>
                                        <option {{$invoice->taxstatus == 'no'?'selected="selected"':''}} value="off">{{ _('Off') }}</option>

                                    </select>
                                </div>
                                <div class="col-sm-6">

                                    <div class="form-group">
                                        <label for="discountFormat"
                                               class="caption">{{ _('Discount') }}</label>
                                        <select class="form-control" onchange="changeDiscountFormat(this.value)"
                                                id="discountFormat">

                                            <option {{$invoice->format_discount == '%'?'selected="selected"':''}} value="%">{{ _('% Discount') . ' ' . _('After TAX') }} </option>
                                            <option {{$invoice->format_discount == 'flat'?'selected="selected"':''}} value="flat">{{ _('Flat Discount') . ' ' . _('After TAX') }}</option>
                                            <option {{$invoice->format_discount == 'b_p'?'selected="selected"':''}} value="b_p">{{ _('% Discount') . ' ' . _('Before TAX') }}</option>
                                            <option {{$invoice->format_discount == 'bflat'?'selected="selected"':''}} value="bflat">{{ _('Flat Discount') . ' ' . _('Before TAX') }}</option>
                                            <!-- <option value="0">Off</option> -->
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label for="toAddInfo"
                                           class="caption">{{ _('Invoice Note') }}</label>
                                    <textarea class="form-control" name="notes"
                                              rows="2">{{ $invoice->notes }}</textarea></div>
                            </div>

                        </div>
                    </div>

                </div>


                <div id="saman-row">
                    <table class="table-responsive tfr my_stripe">
                        <thead>

                        <tr class="item_header">
                            <th width="30%" class="text-center">{{ _('Item Name') }}</th>
                            <th width="8%" class="text-center">{{ _('Quantity') }}</th>
                            <th width="10%" class="text-center">{{ _('Rate') }}</th>
                            <th width="10%" class="text-center">{{ _('Tax(%)') }}</th>
                            <th width="10%" class="text-center">{{ _('Tax') }}</th>
                            <th width="7%" class="text-center">{{ _('Discount') }}</th>
                            <th width="5%" class="text-center">{{ _('Action') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i = 0?>
                        @foreach ($products as $row)
                            <tr>
                                <td><input type="text" class="form-control text-center" name="product_name[]"
                                           value=" {{$row['product']}} ">
                                </td>
                                <td><input type="text" class="form-control req amnt" name="product_qty[]"
                                           id="amount-{{$i}}"
                                           onkeypress="return isNumber(event)"
                                           onkeyup="rowTotal({{$i}}), billUpyog()"
                                           autocomplete="off" value=" {{$row['qty']}}"><input type="hidden"
                                                                                              class="old_amnt"
                                                                                              name="old_product_qty[]"
                                                                                              value=" {{$row['qty']}} ">
                                </td>
                                <td><input type="text" class="form-control req prc" name="product_price[]"
                                           id="price-{{$i}}"
                                           onkeypress="return isNumber(event)"
                                           onkeyup="rowTotal({{$i}}), billUpyog()"
                                           autocomplete="off" value=" {{$row['price']}}"></td>
                                <td><input type="text" class="form-control vat" name="product_tax[]" id="vat-{{$i}}"
                                           onkeypress="return isNumber(event)"
                                           onkeyup="rowTotal({{$i}} ), billUpyog()"
                                           autocomplete="off" value=" {{$row['tax']}} "></td>
                                <td class="text-center" id="texttaxa-{{$i}}">{{$row['totaltax'] }}</td>
                                <td><input type="text" class="form-control discount" name="product_discount[]"
                                           onkeypress="return isNumber(event)" id="discount-{{$i}}"
                                           onkeyup="rowTotal({{$i}}), billUpyog()" autocomplete="off"
                                           value="{{$row['discount']}}  "></td>
                                <td><span class="currenty">{{ _('TL')}}</span>
                                    <strong><span class="ttlText"
                                                  id="result-{{$i}}"> {{$row['subtotal']}}</span></strong>
                                </td>
                                <td class="text-center">
                                    <button type="button" data-rowid="{{$i}}" class="btn btn-danger removeProd"
                                            title="Remove"><i class="icon-minus-square"></i></button>
                                </td>
                                <input type="hidden" name="taxa[]" id="taxa-{{$i}}"
                                       value=" {{$row['totaltax']}} ">
                                <input type="hidden" name="disca[]" id="disca-{{$i}}"
                                       value="{{$row['totaldiscount']}} ">
                                <input type="hidden" class="ttInput" name="product_subtotal[]" id="total-{{$i}}"
                                       value="{{$row['subtotal']}} ">
                                <input type="hidden" class="pdIn" name="pid[]" id="pid-{{$i}}"
                                       value=" {{$row['pid']}}">
                            </tr>
                            <tr class="desc_p">
                                <td colspan="8"><textarea id="dpid-{{$i}}" class="form-control"
                                                          name="product_description[]"
                                                          placeholder=" {{_('Enter Product description') }}"
                                                          autocomplete="off">{{$row['product_des']}}  </textarea><br>
                                </td>
                            </tr>
                            <?php $i++?>
                        @endforeach
                        <tr class="last-item-row sub_c">
                            <td class="add-row">
                                <button type="button" class="btn btn-success" aria-label="Left Align"
                                        data-toggle="tooltip"
                                        data-placement="top" title="Add product row" id="addproduct">
                                    <i class="icon-plus-square"></i> {{ _('Add Row') }}
                                </button>
                            </td>
                            <td colspan="7"></td>
                        </tr>

                        <tr class="sub_c" style="display: table-row">
                            <td colspan="6" align="right"><input type="hidden"
                                                                 value="{{ $invoice['subtotal'] }}"
                                                                 id="subttlform"
                                                                 name="subtotal"><strong>{{ _('Total Tax') }}</strong>
                            </td>
                            <td align="left" colspan="2">
                                <input id="taxr" name="Totltax" value="{{ $invoice['tax'] }}" readonly="" class="lightMode"></td>
                        </tr>
                        <tr class="sub_c" style="display: table-row">
                            <td colspan="6" align="right">
                                <strong>{{ _('Total Discount') }}</strong></td>
                            <td align="left" colspan="2">
                                <input id="discs" value="{{$invoice['discount']}}"  name="Totldiscount" readonly="" class="lightMode"></td>
                        </tr>

                        <td colspan="4" align="right"><strong><{{_('Grand Total')}}
                            </strong>
                        </td>
                        <td align="left" colspan="2"><input type="text" name="total" class="form-control"
                                                            id="invoiceyoghtml"
                                                            value="{{$invoice['total']}}" readonly="">

                        </td>
                        <tr>
                            <td align="right" colspan="6"><input type="submit" class="btn btn-success sub-btn"
                                                                 value="{{_('Update')}}"
                                                                 id="submit-data" data-loading-text="Updating...">
                            </td>
                        </tr>


                        </tbody>
                    </table>
                </div>

                <input type="hidden" value="invoices/editaction" id="action-url">
                <input type="hidden" value="search" id="billtype">
                <input type="hidden" value="{{ $i - 1}}" name="counter" id="ganak">

                <input type="hidden" value="%" name="taxformat" id="tax_format">
                <input type="hidden" value="{{$invoice->format_discount}}" name="discountFormat" id="discount_format">
                <input type="hidden" value="yes" name="tax_handle" id="tax_status">
                <input type="hidden" value="yes" name="applyDiscount" id="discount_handle">


            </form>
        </div>

    </article>

    <script>

        var samanYog = function () {

            var itempriceList = [];
            var r = 0;
            $('.ttInput').each(function () {
                var vv = $(this).val();

                if (vv === '') {
                    vv = 0;
                }

                itempriceList.push(vv);
                r++;
            });
            var sum = 0;
            var taxc = 0;
            var discs = 0;
            var ganak = parseInt($("#ganak").val()) + 1;
            console.log('indexc---' + ganak);
            for (var z = ganak; z > -1; z--) {
                if (parseFloat(itempriceList[z]) > 0) {
                    sum += parseFloat(itempriceList[z]);
                }
                if (parseFloat($("#taxa-" + z).val()) > 0) {
                    taxc += parseFloat($("#taxa-" + z).val());
                }
                if (parseFloat($("#disca-" + z).val()) > 0) {
                    discs += parseFloat($("#disca-" + z).val());
                }
                console.log(sum);
                console.log('tax--' + taxc);
                console.log('z--' + z);
            }
            discs = deciFormat(discs);
            taxc = deciFormat(taxc);
            sum = deciFormat(sum);
            $("#discs").val(discs);
            $("#taxr").val(taxc);
            return sum;

        };
        var deleteRow = function (num) {

            var prodTotalID;
            var prodttl;
            var subttl;
            var totalSubVal;
            var totalBillVal;
            var totalSelector = $("#subttlform");
            prodTotalID = "#total-" + num;
            prodttl = $(prodTotalID).val();
            subttl = totalSelector.val();
            totalSubVal = deciFormat(subttl - prodttl);
            totalSelector.val(totalSubVal);
            $("#subttlid").html(totalSubVal);
            totalBillVal = totalSubVal;
            //final total
            $("#mahayog").html(deciFormat(totalBillVal));
            $("#invoiceyoghtml").val(deciFormat(totalBillVal));
        };
        var deciFormat = function (minput) {
            return parseFloat(minput).toFixed(2);
        };

        $('#saman-row').on('click', '.removeProd', function () {

            var pidd = $(this).closest('tr').find('.pdIn').val();
            var pqty = $(this).closest('tr').find('.amnt').val();
            var old_amnt = $(this).closest('tr').find('.old_amnt').val();
            if (old_amnt) {
                pqty = pidd + '-' + pqty;
                $('<input>').attr({
                    type: 'hidden',
                    name: 'restock[]',
                    value: pqty
                }).appendTo('form');
            }

            $(this).closest('tr').remove();
            $('#d' + $(this).closest('tr').find('.pdIn').attr('id')).closest('tr').remove();
            $('.amnt').each(function (index) {
                rowTotal(index);
                billUpyog();
            });

            return false;
        });
        var updateTotal = function () {

            var totalBillVal = deciFormat(parseFloat(samanYog()));
            //refresh value
            $("#invoiceyoghtml").val(totalBillVal);
            $("#mahayog").html(totalBillVal);
            return totalBillVal;
        };
        var shipTot = function () {
            if ($('.shipVal').val() == '') {
                $('.shipVal').val(0);
                return 0;
            } else {
                return deciFormat($('.shipVal').val());
            }
        };
        var billUpyog = function () {

            $("#subttlform").val(samanYog());
            $("#invoiceyoghtml").val(updateTotal());
        };

        function formatRest(taxFormat, disFormat) {

            var amntArray = [];
            $('.amnt').each(function () {
                var v = deciFormat($(this).val());

                amntArray.push(v);
            });
            var prcArray = [];
            $('.prc').each(function () {
                var v = deciFormat($(this).val());
                prcArray.push(v);
            });
            var vatArray = [];
            $('.vat').each(function () {
                var v = deciFormat($(this).val());
                vatArray.push(v);
            });

            var discountArray = [];
            $('.discount').each(function () {
                var v = deciFormat($(this).val());
                discountArray.push(v);
            });

            var taxr = 0;
            var discsr = 0;

            for (var i = 0; i < amntArray.length; i++) {

                amtVal = amntArray[i];
                prcVal = prcArray[i];
                vatVal = vatArray[i];
                discountVal = discountArray[i];
                var result = amtVal * prcVal;
                if (vatVal == '') {
                    vatVal = 0;
                }
                if (discountVal == '') {
                    discountVal = 0;
                }

                if (disFormat == '%' || disFormat == 'flat') {
                    if (taxFormat == 'yes') {
                        var Inpercentage = precentCalc(result, vatVal);
                        var result = parseFloat(result) + Inpercentage;
                        taxr = parseFloat(taxr) + parseFloat(Inpercentage);
                        $("#texttaxa-" + i).html(deciFormat(Inpercentage));
                        $("#taxa-" + i).val(deciFormat(Inpercentage));
                    } else {
                        var result = parseFloat($("#amount-" + i).val()) * parseFloat($("#price-" + i).val());
                        $("#texttaxa-" + i).html('Off');
                        $("#taxa-" + i).val(0);
                        taxr += 0;
                    }
                    if (disFormat == '%') {
                        var Inpercentage = precentCalc(result, discountVal);
                        var result = parseFloat(result) - parseFloat(Inpercentage);
                        $("#disca-" + i).val(deciFormat(Inpercentage));
                        discsr = parseFloat(discsr) + parseFloat(Inpercentage);
                    } else {
                        var result = parseFloat(result) - parseFloat(discountVal);
                        $("#disca-" + i).val(deciFormat(discountVal));
                        discsr += parseFloat(discountVal);
                    }
                } else {
                    if (disFormat == 'b_p') {
                        var Inpercentage = precentCalc(result, discountVal);
                        var result = parseFloat(result) - parseFloat(Inpercentage);
                        $("#disca-" + i).val(deciFormat(Inpercentage));
                        discsr = parseFloat(discsr) + parseFloat(Inpercentage);
                    } else {
                        var result = parseFloat(result) - parseFloat(discountVal);
                        $("#disca-" + i).val(deciFormat(discountVal));
                        discsr += parseFloat(discountVal);
                    }
                    if (taxFormat == 'yes') {
                        var Inpercentage = precentCalc(result, vatVal);
                        var result = parseFloat(result) + Inpercentage;
                        taxr = parseFloat(taxr) + parseFloat(Inpercentage);
                        $("#texttaxa-" + i).html(deciFormat(Inpercentage));
                        $("#taxa-" + i).val(deciFormat(Inpercentage));
                    } else {
                        var result = parseFloat($("#amount-" + i).val()) * parseFloat($("#price-" + i).val());
                        $("#texttaxa-" + i).html('Off');
                        $("#taxa-" + i).val(0);
                        taxr += 0;
                    }
                }

                $("#total-" + i).val(deciFormat(result));

                $("#result-" + i).html(deciFormat(result));
                // alert('1');
                var sum = deciFormat(samanYog());
                // alert('2');
                var totl = deciFormat(sum);
                // alert('3');
                $("#subttlform").val(sum);
                $("#subttlid").html(sum);
                $("#mahayog").html(totl);
                // alert('4');
                $("#taxr").val(deciFormat(taxr));
                $("#discs").val(deciFormat(discsr));
                $("#invoiceyoghtml").val(totl);
                // alert('kuuhkuhl');
            }
        }

        var changeTaxFormat = function (getSelectv) {

            if (getSelectv == 'on') {
                $(".tax_col").show();
                $("#tax_status").val('yes');
                $("#tax_format").val('%');
            } else {
                $("#tax_status").val('no');
                $("#tax_format").val('off');
                $(".tax_col").hide();
            }
            var discount_handle = $("#discount_format").val();
            var tax_handle = $("#tax_status").val();
            formatRest(tax_handle, discount_handle);
        }
        var precentCalc = function (total, percentageVal) {
            return (total / 100) * percentageVal;
        };

        var changeDiscountFormat = function (getSelectv) {
            if (getSelectv != '0') {
                $(".disCol").show();
                $("#discount_handle").val('yes');
                $("#discount_format").val(getSelectv);
            } else {
                $("#discount_format").val(getSelectv);
                $(".disCol").hide();
                $("#discount_handle").val('no');
            }
            var tax_status = $("#tax_status").val();
            formatRest(tax_status, getSelectv);
        }
        var formInputGet = function (iname, inumber) {
            var inputId;
            inputId = iname + "-" + inumber;
            var inputValue = $(inputId).val();

            if (inputValue == '') {

                return 0;
            } else {
                return inputValue;
            }
        };
        var rowTotal = function (numb) {
            //most res

            var result;
            var totalValue;

            var amountVal = formInputGet("#amount", numb);

            var priceVal = formInputGet("#price", numb);

            var discountVal = formInputGet("#discount", numb);
            if (discountVal == '') {
                $("#discount-" + numb).val(0);
                discountVal = 0;
            }
            var vatVal = formInputGet("#vat", numb);
            if (vatVal == '') {
                $("#vat-" + numb).val(0);
                vatVal = 0;
            }
            var taxo = 0;
            var disco = 0;

            var totalPrice = parseInt(amountVal) * priceVal;

            var tax_status = $("#tax_status").val();
            var disFormat = $("#discount_format").val();

            if (disFormat == '%' || disFormat == 'flat') {
                if (tax_status == 'yes') {
                    var Inpercentage = precentCalc(totalPrice, vatVal);
                    totalValue = parseFloat(totalPrice) + parseFloat(Inpercentage);
                    taxo = deciFormat(Inpercentage);
                    console.log('percetn' + Inpercentage);
                    console.log('ttl' + totalValue);
                    console.log('price' + totalPrice);
                    // alert('percetn'+Inpercentage);alert('price'+totalPrice);alert('ttl'+totalValue);
                } else {
                    totalValue = deciFormat(totalPrice);
                }
                if (disFormat == 'flat') {
                    disco = deciFormat(discountVal);
                    totalValue = parseFloat(totalValue) - parseFloat(discountVal);
                } else if (disFormat == '%') {
                    var discount = precentCalc(totalValue, discountVal);
                    totalValue = parseFloat(totalValue) - parseFloat(discount);
                    disco = deciFormat(discount);
                } else {
                    totalValue = deciFormat(totalValue);
                }
            } else {
//before tax
                if (disFormat == 'bflat') {
                    disco = deciFormat(discountVal);
                    totalValue = parseFloat(totalPrice) - parseFloat(discountVal);
                } else if (disFormat == 'b_p') {
                    var discount = precentCalc(totalPrice, discountVal);
                    totalValue = parseFloat(totalPrice) - parseFloat(discount);
                    disco = deciFormat(discount);
                } else {
                    totalValue = deciFormat(totalPrice);
                }
                if (tax_status == 'yes') {
                    var Inpercentage = precentCalc(totalValue, vatVal);
                    totalValue = parseFloat(totalValue) + parseFloat(Inpercentage);
                    taxo = deciFormat(Inpercentage);
                } else {
                    totalValue = deciFormat(totalValue);
                }

            }
            $("#result-" + numb).html(deciFormat(totalValue));
            $("#taxa-" + numb).val(taxo);
            $("#texttaxa-" + numb).text(taxo);
            $("#disca-" + numb).val(disco);
            var totalID = "#total-" + numb;
            $(totalID).val(deciFormat(totalValue));

            samanYog();
        };
        $('#addproduct').on('click', function () {
            var taxOn = $('#tax_status').val();
            var disOn = $('#discount_handle').val();
            var ganakChun = $('#ganak');

            var ganak = ganakChun.val();
            // alert(ganak);
            var cvalue = parseInt(ganak) + 1;
            var functionNum = "'" + cvalue + "'";
            count = $('#saman-row div').length;
            var disp = '';
            var taxp = '';

//product row
            var data = '<tr>' +
                '<td>' +
                '<input type="text" class="form-control text-center" name="product_name[]" placeholder="Enter Product name or Code" id="productname-' + cvalue + '">' +
                '</td>' +
                '<td><input type="text" class="form-control req amnt" name="product_qty[]" id="amount-' + cvalue + '" onkeypress="return isNumber(event)" onkeyup="rowTotal(' + functionNum + '), billUpyog()" autocomplete="off" value="1" ></td> ' +
                '<td><input type="text" class="form-control req prc" name="product_price[]" id="price-' + cvalue + '" onkeypress="return isNumber(event)" onkeyup="rowTotal(' + functionNum + '), billUpyog()" autocomplete="off"></td>' +
                '<td> <input type="text" class="form-control vat" name="product_tax[]" id="vat-' + cvalue + '" onkeypress="return isNumber(event)" onkeyup="rowTotal(' + functionNum + '), billUpyog()" autocomplete="off"></td> ' +
                '<td id="texttaxa-' + cvalue + '" class="text-center">0</td> ' +
                '<td><input type="text" class="form-control discount" name="product_discount[]" onkeypress="return isNumber(event)" id="discount-' + cvalue + '" onkeyup="rowTotal(' + functionNum + '), billUpyog()" autocomplete="off"></td>' +
                ' <td><span class="currenty"></span> <strong><span class=\'ttlText\' id="result-' + cvalue + '">0</span></strong></td> <td class="text-center"><button type="button" data-rowid="' + cvalue + '" class="btn btn-danger removeProd" title="Remove" > <i class="icon-minus-square"></i> </button> </td>' +
                '<input type="hidden" name="taxa[]" id="taxa-' + cvalue + '" value="0"><input type="hidden" name="disca[]" id="disca-' + cvalue + '" value="0"><input type="hidden" class="ttInput" name="product_subtotal[]" id="total-' + cvalue + '" value="0"> <input type="hidden" class="pdIn" name="pid[]" id="pid-' + cvalue + '" value="0"> </tr>' +
                '<tr><td colspan="8"><textarea class="form-control"  id="dpid-' + cvalue + '" name="product_description[]" placeholder="Enter Product description" autocomplete="off"></textarea><br></td></tr>';

            $('tr.last-item-row').before(data);

            row = cvalue;


            ganakChun.val(cvalue);
            var samanKullYog = samanYog();

            var totalBillVal = deciFormat(samanKullYog);
            $("#invoiceyoghtml").val(totalBillVal);
            $("#totalBill").html(totalBillVal);
            var sideh2 = document.getElementById('rough').scrollHeight;
            var opx3 = sideh2 + 50;
            document.getElementById('rough').style.height = opx3 + "px";
        });

        function isNumber(evt) {

            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 46 || charCode > 57)) {
                return false;
            }
            return true;
        }

        $.fn.datepicker.defaults.format = "yyyy/mm/dd";
        $('.datepicker').datepicker({
            startDate: '-3d'
        });
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $("#customer-box").change(function () {
                var id = $(this).val();
                $.ajax({
                    type: "post",
                    url: '{{route('GetCustomer')}}',
                    data: {_token: '{{csrf_token()}}', id: id},
                    success: function (data) {

                        $("#customer").html('');
                        $("#customer-box-result").show();
                        $("#customer-box-result").html(data);


                    }
                });
            });

        });
    </script>
@endsection
@section('subject')
    {{__('Subject') }}
@endsection