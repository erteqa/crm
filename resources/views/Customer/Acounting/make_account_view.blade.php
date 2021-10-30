@extends("layouts.Web_app")
@section('title')
    {{__('lang.Make_Account') }}
@endsection
@section('content')
    <style>
        @if(app()->getLocale()=='ar')
        form {
            text-align: left;
        }

        input {
            text-align: left;
        }

        .koko {
            float: left;
        }

        panel-footer {
            float: left;
        }

        .rmpad {
            padding-right: -15px;
            padding-left: -15px;
        }
        @endif
    </style>
    <form method="post">

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


        {{--///////////////////////////////sales////////////////////////////////////////////////////////////--}}
        <hr>
        <div>
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <label>{{__('lang.sales') }}</label>
                </div>
                    <div id="saman-row_sales">
                        <table class="table-responsive tfr my_stripe">
                            <thead>
                            <tr class="item_header">
                                <th width="10%" class="text-center"> {{__('lang.Invoice') }} </th>
                                <th width="7%" class="text-center"> {{__('lang.Tax(%)') }} </th>
                                <th width="15%" class="text-center">{{__('lang.Tax') }}</th>
                                <th width="15%" class="text-center"> {{__('lang.Amount') }} </th>
                                <th width="10%" class="text-center"> {{__('lang.Action') }} </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>

                                <td><input type="text" class="form-control req amnt_sales" name="product_price[]"
                                           id="price_sales-0"
                                           onkeypress="return isNumber(event)"
                                           onkeyup="rowTotal_sales('0')"
                                           autocomplete="off"></td>

                                <td><input type="text" class="form-control vat " name="product_tax[]"
                                           id="vat_sales-0"
                                           value="18"
                                           onkeypress="return isNumber(event)"
                                           onkeyup="rowTotal_sales('0')"
                                           autocomplete="off"></td>

                                <td class="text-center">
                                    <span id="texttaxa_sales-0">0</span></td>

                                <td class="text-center">
                                    <strong><span class='ttlText_' id="result_sales-0">0</span></strong>
                                </td>

                                <td class="text-center">

                                </td>

                            </tr>


                            <tr class="last-item-row_sales sub_c">
                                <td class="add-row">
                                    <button type="button" class="btn btn-success" aria-label="Left Align"
                                            data-toggle="tooltip"
                                            data-placement="top" title="Add product row" id="addproduct_sales">
                                        <i class="icon-plus-square"></i> {{__('lang.Add_Row') }}
                                    </button>
                                </td>
                                <td colspan="7"></td>
                            </tr>


                            </tbody>
                            <div class="panel-footer">
                                <tr class="sub_c" style="display: table-row;">
                                    <td colspan="1"><input type="hidden" value="0" id="subttlform"
                                                           name="subtotal"><strong>{{__('lang.Total_Tax') }}</strong>
                                    </td>
                                    <td colspan="2"><span
                                                class="currenty lightMode"></span>
                                        <input id="taxr_sales" name="Totltax" readonly="" value='0' class="lightMode">
                                    </td>
                                </tr>

                                <tr class="sub_c" style="display: table-row;">
                                    <td colspan="1">
                                        <strong>{{__('lang.Total_Invoice') }}</strong></td>
                                    <td colspan="2"><span
                                                class="currenty lightMode"></span>
                                        <input id="Tinvo_sales" readonly="" name="TotlInvoice" vlaue='0'
                                               class="lightMode"></td>
                                </tr>

                                <tr class="sub_c" style="display: table-row;">

                                    <td colspan="1"><strong>{{__('lang.Grand_Total')}}
                                            <span
                                                    class="currenty lightMode"></span></strong>
                                    </td>
                                    <td colspan="4"><input type="text" name="total"
                                                           class="form-control"
                                                           id="invoiceyoghtml_sales" readonly="">

                                    </td>
                                </tr>

                                <input type="hidden" value="0" name="counter" id="ganak">
                                <input type="hidden" value="0" name="counter" id="ganak_sales">
                                <input type="hidden" value="0" name="counter" id="ganak">
                            </div>
                        </table>
                    </div>
            </div>
        </div>

        {{--//////////////Purchases/////////--}}
        <hr>
        <div >
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <label>{{__('lang.Purchases') }}</label>
                </div>
                <div >

                            <div id="saman-row_Purchases">
                                <table class="table-responsive tfr my_stripe">

                                    <thead>
                                    <tr class="item_header">
                                        <th width="10%" class="text-center"> {{__('lang.Invoice') }} </th>
                                        <th width="7%" class="text-center"> {{__('lang.Tax(%)') }} </th>
                                        <th width="15%" class="text-center">{{__('lang.Tax') }}</th>
                                        <th width="15%" class="text-center"> {{__('lang.Amount') }} </th>
                                        <th width="10%" class="text-center"> {{__('lang.Action') }} </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>

                                        <td><input type="text" class="form-control req amnt_Purchases"
                                                   name="product_price[]"
                                                   id="price_Purchases-0"
                                                   onkeypress="return isNumber(event)"
                                                   onkeyup="rowTotal_Purchases('0')"
                                                   autocomplete="off"></td>

                                        <td><input type="text" class="form-control vat " name="product_tax[]"
                                                   id="vat_Purchases-0"
                                                   value="18"
                                                   onkeypress="return isNumber(event)"
                                                   onkeyup="rowTotal_Purchases('0')"
                                                   autocomplete="off"></td>

                                        <td class="text-center">
                                            <span id="texttaxa_Purchases-0">0</span></td>

                                        <td class="text-center">
                                            <strong><span class='ttlText_' id="result_Purchases-0">0</span></strong>
                                        </td>

                                        <td class="text-center">

                                        </td>

                                    </tr>


                                    <tr class="last-item-row_Purchases sub_c">
                                        <td class="add-row">
                                            <button type="button" class="btn btn-success" aria-label="Left Align"
                                                    data-toggle="tooltip"
                                                    data-placement="top" title="Add product row"
                                                    id="addproduct_Purchases">
                                                <i class="icon-plus-square"></i> {{__('lang.Add_Row') }}
                                            </button>
                                        </td>
                                        <td colspan="7"></td>
                                    </tr>



                                    </tbody>
                                    <div class="panel-footer">
                                        <tr class="sub_c" style="display: table-row;">
                                            <td colspan="1" ><input type="hidden" value="0" id="subttlform"
                                                                                 name="subtotal"><strong>{{__('lang.Total_Tax') }}</strong>
                                            </td>
                                            <td colspan="2"><span
                                                        class="currenty lightMode"></span>
                                                <input id="taxr_Purchases" name="Totltax" readonly="" value='0'
                                                       class="lightMode">
                                            </td>
                                        </tr>

                                        <tr class="sub_c" style="display: table-row;">
                                            <td colspan="1" >
                                                <strong>{{__('lang.Total_Invoice') }}</strong></td>
                                            <td colspan="2"><span
                                                        class="currenty lightMode"></span>
                                                <input id="Tinvo_Purchases" readonly="" name="TotlInvoice" vlaue='0'
                                                       class="lightMode"></td>
                                        </tr>

                                        <tr class="sub_c" style="display: table-row;">

                                            <td colspan="1" ><strong>{{__('lang.Grand_Total')}}
                                                    <span
                                                            class="currenty lightMode"></span></strong>
                                            </td>
                                            <td  colspan="4"><input type="text" name="total"
                                                                                class="form-control"
                                                                                id="invoiceyoghtml_Purchases" readonly="">

                                            </td>
                                        </tr>

                                        <input type="hidden" value="0" name="counter" id="ganak">
                                        <input type="hidden" value="0" name="counter" id="ganak_Purchases">
                                        <input type="hidden" value="0" name="counter" id="ganak">
                                    </div>
                                </table>
                            </div>
                        </div>

            </div>
        </div>
        <hr>
        {{--//Result//--}}

        <div>
            <div class="panel panel-red">
                <div class="panel-heading">
                    <label>{{__('lang.result') }}</label>
                </div>
                <div class="panel-body">
                    <tr class="sub_c" style="display: table-row;">
                        <td colspan="6" align="right">
                            <strong>{{__('lang.Tax') }}</strong></td>
                        <td align="left" colspan="2"><span
                                    class="currenty lightMode"></span>
                            <input id="Tax" readonly="" name="Tax" vlaue='0'
                                   class="lightMode"></td>
                    </tr>

                    <hr>
                    <tr class="sub_c" style="display: table-row;">
                        <td colspan="6" align="right">
                            <strong>{{__('lang.Annual_profits') }}</strong></td>
                        <td align="left" colspan="2"><span
                                    class="currenty lightMode"></span>
                            <input id="Annual_profits" readonly="" name="Annual_profits" vlaue='0'
                                   class="lightMode"></td>
                    </tr>
                </div>
                <div class="panel-footer">
                    Panel Footer
                </div>
            </div>
        </div>
        <hr>
        {{--//Expenses/--}}
        <div >
            <div class="panel panel-green">
                <div class="panel-heading">
                    <label>{{__('lang.Expenses') }}</label>
                </div>
                <div >


                            <div id="saman-row">
                                <table class="table-responsive tfr my_stripe">

                                    <thead>
                                    <tr class="item_header">
                                        <th width="10%" class="text-center"> {{__('lang.Invoice') }} </th>
                                        <th width="7%" class="text-center"> {{__('lang.Tax(%)') }} </th>
                                        <th width="15%" class="text-center">{{__('lang.Tax') }}</th>
                                        <th width="15%" class="text-center"> {{__('lang.Amount') }} </th>
                                        <th width="10%" class="text-center"> {{__('lang.Action') }} </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>

                                        <td><input type="text" class="form-control req amnt" name="product_price[]"
                                                   id="price-0"
                                                   onkeypress="return isNumber(event)"
                                                   onkeyup="rowTotal('0')"
                                                   autocomplete="off"></td>

                                        <td><input type="text" class="form-control vat " name="product_tax[]"
                                                   id="vat-0"

                                                   onkeypress="return isNumber(event)"
                                                   onkeyup="rowTotal('0')"
                                                   autocomplete="off"></td>

                                        <td class="text-center">
                                            <span id="texttaxa-0">0</span></td>

                                        <td class="text-center">
                                            <strong><span class='ttlText' id="result-0">0</span></strong>
                                        </td>

                                        <td class="text-center">

                                        </td>

                                    </tr>


                                    <tr class="last-item-row sub_c">
                                        <td class="add-row">
                                            <button type="button" class="btn btn-success" aria-label="Left Align"
                                                    data-toggle="tooltip"
                                                    data-placement="top" title="Add product row" id="addproduct">
                                                <i class="icon-plus-square"></i> {{__('lang.Add_Row') }}
                                            </button>
                                        </td>
                                        <td colspan="7"></td>
                                    </tr>


                                    </tbody>
                                    <div class="panel-footer">
                                        <tr class="sub_c" style="display: table-row;">
                                            <td colspan="1" ><input type="hidden" value="0" id="subttlform"
                                                                                 name="subtotal"><strong>{{__('lang.Total_Tax') }}</strong>
                                            </td>
                                            <td  colspan="2"><span
                                                        class="currenty lightMode"></span>
                                                <input id="taxr" name="Totltax" readonly="" value='0' class="lightMode">
                                            </td>
                                        </tr>
                                        <tr class="sub_c" style="display: table-row;">
                                            <td colspan="1" >
                                                <strong>{{__('lang.Total_Invoice') }}</strong></td>
                                            <td align="left" colspan="2"><span
                                                        class="currenty lightMode"></span>
                                                <input id="Tinvo" readonly="" name="TotlInvoice" vlaue='0'
                                                       class="lightMode"></td>
                                        </tr>

                                        <tr class="sub_c" style="display: table-row;">

                                            <td colspan="1" ><strong>{{__('lang.Grand_Total')}}
                                                    <span
                                                            class="currenty lightMode"></span></strong>
                                            </td>
                                            <td  colspan="4"><input type="text" name="total"
                                                                                class="form-control"
                                                                                id="invoiceyoghtml" readonly="">

                                            </td>
                                        </tr>

                                        <input type="hidden" value="0" name="counter" id="ganak">
                                    </div>
                                </table>
                            </div>
                        </div>


            </div>
        </div>
        <hr>
        {{--//last result//--}}
        <div class="col-lg-8 koko">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <label>{{__('lang.last_result') }}</label>
                </div>
                <div class="panel-body">

                    <tr class="sub_c" style="display: table-row;">
                        <td colspan="6" align="right">
                            <strong>{{__('lang.Tax_last') }}</strong></td>
                        <td align="left" colspan="2"><span
                                    class="currenty lightMode"></span>
                            <input id="Tax_last" readonly="" name="Tax_last" vlaue='0'
                                   class="lightMode"></td>
                    </tr>

                    <hr>
                    <tr class="sub_c" style="display: table-row;">
                        <td colspan="6" align="right">
                            <strong>{{__('lang.Annual_profits_last') }}</strong></td>
                        <td align="left" colspan="2"><span
                                    class="currenty lightMode"></span>
                            <input id="Annual_profits_last" readonly="" name="Annual_profits_last" vlaue='0'
                                   class="lightMode"></td>
                    </tr>
                </div>
                <div class="panel-footer">
                    Panel Footer
                </div>
            </div>
        </div>
        </div>

    </form>
    <script>
        $(document).ready(function () {
            $('.js-example-basic-single').select2();
        });

        function isNumber(evt) {

            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 46 || charCode > 57)) {
                return false;
            }
            return true;
        }

        function Annual_profits() {
            tax_Purchases = parseFloat($("#taxr_Purchases").val());
            sum_Purchases = parseFloat($("#Tinvo_Purchases").val());
            if (sum_Purchases == "") {
                sum_Purchases = 0;
            }
            tax_sales = parseFloat($("#taxr_sales").val());
            sum_sales = parseFloat($("#Tinvo_sales").val());
            if (sum_sales == "") {
                sum_sales = 0;
            }
            var Restax_sales = tax_Purchases - tax_sales;
            var Resum_Purchases = sum_Purchases - sum_sales;
            $("#Annual_profits").val(Resum_Purchases);
            $("#Tax").val(Restax_sales);
        }

        function last_Annual_profits() {
            Annual_profit = parseFloat($("#Annual_profits").val());
            Tax = parseFloat($("#Tax").val());
            if (Annual_profit == "") {
                Annual_profit = 0;
            }

            if (Tax == "") {
                Tax = 0;
            }
            tax_Expenses = parseFloat($("#taxr").val());
            sum_Expenses = parseFloat($("#Tinvo").val());
            if (sum_Expenses == "") {
                sum_Expenses = 0;
            }

            if (tax_Expenses == "") {
                tax_Expenses = 0;
            }
            var Tax_last = Tax - tax_Expenses;
            var Annual_profits_last = Annual_profit - sum_Expenses;
            $("#Annual_profits_last").val(Annual_profits_last);
            $("#Tax_last").val(Tax_last);
        }

        var billUpyog = function () {
            // alert('Tamam')
        };

        var deciFormat = function (minput) {
            return parseFloat(minput).toFixed(2);
        };
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
        var precentCalc = function (total, percentageVal) {
            return (total / 100) * percentageVal;
        };
        //fsdfsdf///
        $('#addproduct').on('click', function () {

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


                '<td><input type="text" class="form-control req prc" name="product_price[]" id="price-' + cvalue + '" onkeypress="return isNumber(event)" onkeyup="rowTotal(' + functionNum + '), billUpyog()" autocomplete="off"></td>' +
                '<td> <input type="text" class="form-control vat" name="product_tax[]" id="vat-' + cvalue + '" onkeypress="return isNumber(event)" onkeyup="rowTotal(' + functionNum + '), billUpyog()" autocomplete="off"></td> ' +
                '<td id="texttaxa-' + cvalue + '" class="text-center">0</td> ' +

                ' <td class="text-center"><span class="currenty"></span> <strong><span class=\'ttlText\' id="result-' + cvalue + '">0</span></strong></td> <td class="text-center"><button type="button" data-rowid="' + cvalue + '" class="btn btn-danger removeProd" title="Remove" > <i class="icon-minus-square"></i> </button> </td>' +
                '<input type="hidden" name="taxa[]" id="taxa-' + cvalue + '" value="0"><input type="hidden" name="disca[]" id="disca-' + cvalue + '" value="0"><input type="hidden" class="ttInput" name="product_subtotal[]" id="total-' + cvalue + '" value="0"> <input type="hidden" class="pdIn" name="pid[]" id="pid-' + cvalue + '" value="0"> </tr>' +
                '<br>';

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
//alert('111111111');
            $(this).closest('tr').remove();
            $('#d' + $(this).closest('tr').find('.pdIn').attr('id')).closest('tr').remove();
            // alert('2222');
            $('.amnt').each(function (index) {
                //   alert("index"+index);
                rowTotal(index);
                //  alert('333333');
                billUpyog();
            });

            return false;
        });
        var samanYog = function () {
            var ganak = parseInt($("#ganak").val());
            //alert('indexc---' + ganak);
            var taxc = 0, invoc = 0, sum = 0;
            for (var z = ganak; z > -1; z--) {
                //  alert("z="+z);
                if (parseFloat($("#texttaxa-" + z).html()) > 0) {
                    taxc += parseFloat($("#texttaxa-" + z).html());
                    //  alert("taxc="+taxc);
                }
                if (parseFloat($("#price-" + z).val()) > 0) {
                    invoc += parseFloat($("#price-" + z).val());

                }

                //alert("#result-" + z+"="+$("#result-" + z).html());
                if (parseFloat($("#result-" + z).html()) > 0) {
                    sum += parseFloat($("#result-" + z).html());

                }

                //   alert("z="+z);
                // alert(sum);
                // alert('tax--' + taxc);
                //  alert('invoc--' + invoc);
            }
            invoc = deciFormat(invoc);
            taxc = deciFormat(taxc);
            sum = deciFormat(sum);
            $("#invoiceyoghtml").val(sum);
            $("#Tinvo").val(invoc);
            $("#taxr").val(taxc);

            return sum;

        };
        var rowTotal = function (numb) {
            //most res

            var result;
            var totalValue;

            // var amountVal = formInputGet("#amount", numb);

            var priceVal = formInputGet("#price", numb);

            // var discountVal = formInputGet("#discount", numb);
            //  if (discountVal == '') {
            //      $("#discount-" + numb).val(0);
            //      discountVal = 0;
            //  }
            var vatVal = formInputGet("#vat", numb);
            //alert(vatVal);
            if (vatVal == '') {
                $("#vat-" + numb).val(0);
                vatVal = 0;
            } else {
                var Inpercentage = precentCalc(priceVal, $("#vat-" + numb).val());
                // alert(numb);
                $("#texttaxa-" + numb).html(Inpercentage);
            }
            //   alert(priceVal);
            // var Inpercentage = precentCalc(result, vatVal);
            // var result = parseFloat(result) + Inpercentage;
            // taxr = parseFloat(taxr) + parseFloat(Inpercentage);
            // $("#texttaxa-" + i).html(deciFormat(Inpercentage));
            // $("#taxa-" + i).val(deciFormat(Inpercentage));
            var taxo = 0;
            var disco = 0;

            var totalPrice = priceVal;
            // alert($("#result-0").html());


            var xx = $("#texttaxa-" + numb).html()
            // alert('xx='+xx);

            totalPrice = parseFloat(xx) + parseFloat(totalPrice);
            //alert('totalPrice='+totalPrice);
            $("#result-" + numb).html(totalPrice);
            //alert('111');
            //$("#taxa-" + numb).val(taxo);
            //   $("#texttaxa-" + numb).text(taxo);
            // alert('2222');
            //$("#disca-" + numb).val(disco);
            var totalID = "#total-" + numb;
            $(totalID).val(deciFormat(totalValue));
            // alert('44444444');
            samanYog();
            last_Annual_profits();
            Annual_profits();
            // alert('55555555555');
        };
        /////Purchases/////////////
        $('#addproduct_Purchases').on('click', function () {

            var ganakChun = $('#ganak_Purchases');
            // alert("ganakChun="+ganakChun.val());
            var ganak = ganakChun.val();
            // alert(ganak);
            var cvalue = parseInt(ganak) + 1;
            var functionNum = "'" + cvalue + "'";
            count = $('#saman-row_Purchases div').length;
            var disp = '';
            var taxp = '';

//product row
            var data = '<tr>' +


                '<td><input type="text" class="form-control req prc" name="product_price[]" id="price_Purchases-' + cvalue + '" onkeypress="return isNumber(event)" onkeyup="rowTotal_Purchases(' + functionNum + '), billUpyog()" autocomplete="off"></td>' +
                '<td> <input type="text" class="form-control vat" name="product_tax[]" value="18" id="vat_Purchases-' + cvalue + '" onkeypress="return isNumber(event)" onkeyup="rowTotal_Purchases(' + functionNum + '), billUpyog()" autocomplete="off"></td> ' +
                '<td id="texttaxa_Purchases-' + cvalue + '" class="text-center">0</td> ' +

                ' <td class="text-center"><span class="currenty"></span> <strong><span class=\'ttlText\' id="result_Purchases-' + cvalue + '">0</span></strong></td> <td class="text-center"><button type="button" data-rowid="' + cvalue + '" class="btn btn-danger removeProd_Purchases" title="Remove" > <i class="icon-minus-square"></i> </button> </td>' +
                '<input type="hidden" name="taxa[]" id="taxa_Purchases-' + cvalue + '" value="0"><input type="hidden" class="ttInput" name="product_subtotal[]" id="total_Purchases-' + cvalue + '" value="0"> <input type="hidden" class="pdIn" name="pid[]" id="pid_Purchases-' + cvalue + '" value="0"> </tr>' +
                '<br>';

            $('tr.last-item-row_Purchases').before(data);

            row = cvalue;


            ganakChun.val(cvalue);
            var samanKullYog = samanYog_Purchases();

            var totalBillVal = deciFormat(samanKullYog);
            $("#invoiceyoghtml_Purchases").val(totalBillVal);
            $("#totalBill_Purchases").html(totalBillVal);
            var sideh2 = document.getElementById('rough').scrollHeight;
            var opx3 = sideh2 + 50;
            document.getElementById('rough_Purchases').style.height = opx3 + "px";
        });
        $('#saman-row_Purchases').on('click', '.removeProd_Purchases', function () {
            var ganakChun = $('#ganak_Purchases');
            // alert("ganakChun="+ganakChun.val());
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
                // alert("index"+index);
                rowTotal_Purchases(index);
                //  billUpyog();
            });

            return false;
        });
        var samanYog_Purchases = function () {
            var ganak = parseInt($("#ganak_Purchases").val());
            //alert('indexc---' + ganak);
            var taxc = 0, invoc = 0, sum = 0;
            for (var z = ganak; z > -1; z--) {
                //  alert("z="+z);
                if (parseFloat($("#texttaxa_Purchases-" + z).html()) > 0) {
                    taxc += parseFloat($("#texttaxa_Purchases-" + z).html());
                    //  alert("taxc="+taxc);
                }
                if (parseFloat($("#price_Purchases-" + z).val()) > 0) {
                    invoc += parseFloat($("#price_Purchases-" + z).val());

                }

                //alert("#result-" + z+"="+$("#result-" + z).html());
                if (parseFloat($("#result_Purchases-" + z).html()) > 0) {
                    sum += parseFloat($("#result_Purchases-" + z).html());

                }
                //   alert("z="+z);
                // alert(sum);
                // alert('tax--' + taxc);
                //  alert('invoc--' + invoc);
            }
            invoc = deciFormat(invoc);
            taxc = deciFormat(taxc);
            sum = deciFormat(sum);
            $("#invoiceyoghtml_Purchases").val(sum);
            $("#Tinvo_Purchases").val(invoc);
            $("#taxr_Purchases").val(taxc);

            return sum;

        };
        var rowTotal_Purchases = function (numb) {
            //most res

            var result;
            var totalValue;

            // var amountVal = formInputGet("#amount", numb);

            var priceVal = formInputGet("#price_Purchases", numb);

            // var discountVal = formInputGet("#discount", numb);
            //  if (discountVal == '') {
            //      $("#discount-" + numb).val(0);
            //      discountVal = 0;
            //  }
            var vatVal = formInputGet("#vat_Purchases", numb);
            //alert(vatVal);
            if (vatVal == '') {
                $("#vat_Purchases-" + numb).val(0);
                vatVal = 0;
            } else {
                var Inpercentage = precentCalc(priceVal, $("#vat_Purchases-" + numb).val());
                // alert(numb);
                $("#texttaxa_Purchases-" + numb).html(Inpercentage);
            }
            //   alert(priceVal);
            // var Inpercentage = precentCalc(result, vatVal);
            // var result = parseFloat(result) + Inpercentage;
            // taxr = parseFloat(taxr) + parseFloat(Inpercentage);
            // $("#texttaxa_Purchases-" + i).html(deciFormat(Inpercentage));
            // $("#taxa-" + i).val(deciFormat(Inpercentage));
            var taxo = 0;
            var disco = 0;

            var totalPrice = priceVal;
            // alert($("#result_Purchases-0").html());


            var xx = $("#texttaxa_Purchases-" + numb).html()
            // alert('xx='+xx);

            totalPrice = parseFloat(xx) + parseFloat(totalPrice);
            //alert('totalPrice='+totalPrice);
            $("#result_Purchases-" + numb).html(totalPrice);
            //alert('111');
            //$("#taxa-" + numb).val(taxo);
            //   $("#texttaxa_Purchases-" + numb).text(taxo);
            // alert('2222');
            //$("#disca-" + numb).val(disco);
            var totalID = "#total_Purchases-" + numb;
            $(totalID).val(deciFormat(totalValue));
            // alert('44444444');
            samanYog_Purchases();
            Annual_profits();
            last_Annual_profits();
            // alert('55555555555');
        };
        ////sales///////
        $('#addproduct_sales').on('click', function () {

            var ganakChun = $('#ganak_sales');
            // alert("ganakChun="+ganakChun.val());
            var ganak = ganakChun.val();
            // alert(ganak);
            var cvalue = parseInt(ganak) + 1;
            var functionNum = "'" + cvalue + "'";
            count = $('#saman-row_sales div').length;
            var disp = '';
            var taxp = '';

//product row
            var data = '<tr>' +


                '<td><input type="text" class="form-control req prc" name="product_price[]" id="price_sales-' + cvalue + '" onkeypress="return isNumber(event)" onkeyup="rowTotal_sales(' + functionNum + '), billUpyog()" autocomplete="off"></td>' +
                '<td> <input type="text" class="form-control vat" name="product_tax[]" value="18" id="vat_sales-' + cvalue + '" onkeypress="return isNumber(event)" onkeyup="rowTotal_sales(' + functionNum + '), billUpyog()" autocomplete="off"></td> ' +
                '<td id="texttaxa_sales-' + cvalue + '" class="text-center">0</td> ' +

                ' <td class="text-center"><span class="currenty"></span> <strong><span class=\'ttlText\' id="result_sales-' + cvalue + '">0</span></strong></td> <td class="text-center"><button type="button" data-rowid="' + cvalue + '" class="btn btn-danger removeProd_sales" title="Remove" > <i class="icon-minus-square"></i> </button> </td>' +
                '<input type="hidden" name="taxa[]" id="taxa_sales-' + cvalue + '" value="0"><input type="hidden" class="ttInput" name="product_subtotal[]" id="total_sales-' + cvalue + '" value="0"> <input type="hidden" class="pdIn" name="pid[]" id="pid_sales-' + cvalue + '" value="0"> </tr>' +
                '<br>';

            $('tr.last-item-row_sales').before(data);

            row = cvalue;


            ganakChun.val(cvalue);
            var samanKullYog = samanYog_sales();

            var totalBillVal = deciFormat(samanKullYog);
            $("#invoiceyoghtml_sales").val(totalBillVal);
            $("#totalBill_sales").html(totalBillVal);
            var sideh2 = document.getElementById('rough').scrollHeight;
            var opx3 = sideh2 + 50;
            document.getElementById('rough_sales').style.height = opx3 + "px";
        });
        $('#saman-row_sales').on('click', '.removeProd_sales', function () {
            var ganakChun = $('#ganak_sales');
            // alert("ganakChun="+ganakChun.val());
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
                rowTotal_sales(index);
                billUpyog();
            });

            return false;
        });
        var samanYog_sales = function () {
            var ganak = parseInt($("#ganak_sales").val());
            //alert('indexc---' + ganak);
            var taxc = 0, invoc = 0, sum = 0;
            for (var z = ganak; z > -1; z--) {
                //  alert("z="+z);
                if (parseFloat($("#texttaxa_sales-" + z).html()) > 0) {
                    taxc += parseFloat($("#texttaxa_sales-" + z).html());
                    //  alert("taxc="+taxc);
                }
                if (parseFloat($("#price_sales-" + z).val()) > 0) {
                    invoc += parseFloat($("#price_sales-" + z).val());

                }

                //alert("#result-" + z+"="+$("#result-" + z).html());
                if (parseFloat($("#result_sales-" + z).html()) > 0) {
                    sum += parseFloat($("#result_sales-" + z).html());

                }
                //   alert("z="+z);
                // alert(sum);
                // alert('tax--' + taxc);
                //  alert('invoc--' + invoc);
            }
            invoc = deciFormat(invoc);
            taxc = deciFormat(taxc);
            sum = deciFormat(sum);
            $("#invoiceyoghtml_sales").val(sum);
            $("#Tinvo_sales").val(invoc);
            $("#taxr_sales").val(taxc);

            return sum;

        };
        var rowTotal_sales = function (numb) {
            //most res

            var result;
            var totalValue;

            // var amountVal = formInputGet("#amount", numb);

            var priceVal = formInputGet("#price_sales", numb);

            // var discountVal = formInputGet("#discount", numb);
            //  if (discountVal == '') {
            //      $("#discount-" + numb).val(0);
            //      discountVal = 0;
            //  }
            var vatVal = formInputGet("#vat_sales", numb);
            //alert(vatVal);
            if (vatVal == '') {
                $("#vat_sales-" + numb).val(0);
                vatVal = 0;
            } else {
                var Inpercentage = precentCalc(priceVal, $("#vat_sales-" + numb).val());
                // alert(numb);
                $("#texttaxa_sales-" + numb).html(Inpercentage);
            }
            //   alert(priceVal);
            // var Inpercentage = precentCalc(result, vatVal);
            // var result = parseFloat(result) + Inpercentage;
            // taxr = parseFloat(taxr) + parseFloat(Inpercentage);
            // $("#texttaxa_sales-" + i).html(deciFormat(Inpercentage));
            // $("#taxa-" + i).val(deciFormat(Inpercentage));
            var taxo = 0;
            var disco = 0;

            var totalPrice = priceVal;
            // alert($("#result_sales-0").html());


            var xx = $("#texttaxa_sales-" + numb).html()
            // alert('xx='+xx);

            totalPrice = parseFloat(xx) + parseFloat(totalPrice);
            //alert('totalPrice='+totalPrice);
            $("#result_sales-" + numb).html(totalPrice);
            //alert('111');
            //$("#taxa-" + numb).val(taxo);
            //   $("#texttaxa_sales-" + numb).text(taxo);
            // alert('2222');
            //$("#disca-" + numb).val(disco);
            var totalID = "#total_sales-" + numb;
            $(totalID).val(deciFormat(totalValue));
            // alert('44444444');
            samanYog_sales();
            Annual_profits();
            last_Annual_profits();
            // alert('55555555555');
        };
    </script>
@endsection
@section('subject')
    Subject !!!!!!!!!!!
@endsection