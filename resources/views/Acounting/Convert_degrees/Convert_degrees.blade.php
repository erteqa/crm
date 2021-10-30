@extends("layouts.Admin_app")
@section('title')

@endsection
@section('content')
    <style>
        @if(app()->getLocale()=='ar')
        form{
            text-align: right;
        }
        input{
            text-align: right;
        }
        .koko{
            float: right;
        }
        @endif
    </style>
    <form method="post">
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="flash-message">
                    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                        @if(Session::has('alert-' . $msg))

                            <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                        @endif
                    @endforeach
                </div>
                <div class="panel-heading">
                    {{__('lang.Convert_degree') }}
                </div>
                <div class="panel-body" >




                    {{--//Result//--}}
                    <div  class="col-lg-8 koko" >
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <label>{{__('lang.Anwar') }}</label>
                            </div>

                            <div class="panel-body">
                                <tr class="sub_c" style="display: table-row;">
                                    <td colspan="6" align="right">
                                        <strong>{{__('lang.max_degree') }}</strong></td>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <td align="left" colspan="2"><span
                                                class="currenty lightMode"></span>
                                        <input id="drgree"  name="drgree"
                                               onkeypress="return isNumber(event)"
                                               onkeyup="resultco()"
                                               autocomplete="off"
                                               ></td>
                                </tr>
<span style="width: 10px"></span>

                                <tr class="sub_c" style="display: table-row;">
                                    <td colspan="6" align="right">
                                        <strong>{{__('lang.drgree') }}</strong></td>
                                    <td align="left" colspan="2"><span
                                                class="currenty lightMode"></span>
                                        <input id="max_degree" name="max_degree"
                                               onkeypress="return isNumber(event)"
                                               onkeyup="resultco()"
                                               autocomplete="off"
                                               ></td>
                                </tr>

                                <hr>
                                <tr class="sub_c" style="display: table-row;">
                                    <td colspan="6" align="right">
                                        <strong>{{__('lang.convert_to') }}</strong></td>
                                    <td align="left" colspan="2"><span
                                                class="currenty lightMode"></span>
                                        <input id="convert_to"  name="convert_to"
                                               onkeypress="return isNumber(event)"
                                               onkeyup="resultco()"
                                               autocomplete="off"
                                               ></td>
                                </tr>

                                <hr>
                                <tr class="sub_c" style="display: table-row;">
                                    <td colspan="6" align="right">
                                        <strong>{{__('lang.result') }}</strong></td>
                                    <td align="left" colspan="2"><span
                                                class="currenty lightMode"></span>
                                        <input id="result" readonly="" name="result"
                                               class="lightMode"></td>
                                </tr>
                            </div>
                            <div class="panel-footer">
                                Panel Footer
                            </div>
                        </div>
                    </div>
                    <hr>

                </div>
                <div class="panel-footer">
                    {{--<input type="submit" class="btn btn-primary" value="Save">--}}
                </div>
            </div>
        </div>
    </form>
    <script>
        $(document).ready(function() {
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
        var resultco = function (nm) {
          //  alert('kkk');
            drgree = parseFloat($("#drgree").val());

            if(drgree==""){
                drgree=0;
            }
            max_degree = parseFloat($("#max_degree").val());

            if(max_degree==""){
                max_degree=0;
            }
            convert_to = parseFloat($("#convert_to").val());

            if(convert_to==""){
                convert_to =0;
            }
            var Result= (drgree * convert_to)/max_degree;

            $("#result").val(Result);

        }

    </script>
@endsection
@section('subject')
    Subject !!!!!!!!!!!
@endsection