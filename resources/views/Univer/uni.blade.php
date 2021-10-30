<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<!doctype html>
<html  lang="{{app()->getLocale()}}" >
<head>
    <title>{{__('lang.estemara')}}</title>

    <meta property="og:image" content="https://i.ytimg.com/vi/p1DjrPzK7dE/maxresdefault.jpg">
    <meta property="og:image:url" content="https://i.ytimg.com/vi/p1DjrPzK7dE/maxresdefault.jpg"/>
    <meta property="og:image:secure_url" content="https://i.ytimg.com/vi/p1DjrPzK7dE/maxresdefault.jpg"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="فورم التسجيل في الجامعات الخاصة والحكومية التركية, شركة ارتقاء القانونية التجارية">
    <meta name="distribution" content="https:/eritqaa.com.tr">




    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <style>
        .progress { position:relative; width:100%; border: 1px solid #7F98B2; padding: 1px; border-radius: 3px; }
        .bar { background-color: #B4F5B4; width:0%; height:25px; border-radius: 3px; }
        .percent { position:absolute; display:inline-block; top:3px; left:48%; color: #7F98B2;}
    </style>

    {{--<script>--}}
        {{--addEventListener("load", function () {--}}
            {{--setTimeout(hideURLbar, 0);--}}
        {{--}, false);--}}

        {{--function hideURLbar() {--}}
            {{--window.scrollTo(0, 1);--}}
        {{--}--}}
    {{--</script>--}}
    <!-- fonts -->
    <link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i" rel="stylesheet">
    <!-- /fonts -->
    <!-- css -->


    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.css') }}" />

    <style>
        @if(app()->getLocale()=='ar')
        form{
            text-align: right;


        }
        input{
            text-align: right;
        }
        .dd{
            border: thin black solid;

        }
        @endif
    </style>
    <!-- /css -->
</head>

<body>

<div class="content-agileits">
    <div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if(Session::has('alert-' . $msg))

                <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
            @endif
        @endforeach
    </div>
    <a href="{{route('lang', ['lang' => 'ar'])}}">
        <img title="العربية" src="{{ asset('Images/'.'ar.jpg') }}"
             alt="ar"   style="width: 50px; height: 50px" ></a>

    <a href="{{route('lang', ['lang' => 'tr'])}}">
        <img title="Turkish" src="{{ asset('Images/'.'tr.jpg') }}"
             alt="ar"   style="width: 50px; height: 50px" ></a>

    <a href="{{route('lang', ['lang' => 'en'])}}">
        <img title="English " src="{{ asset('Images/'.'en.jpg') }}"
             alt="ar"   style="width: 50px; height: 50px" ></a>
    <h1 class="title">{{__('lang.estemara')}}</h1>


    <div class="left">
        <form  method="post" enctype="multipart/form-data" data-toggle="validator" >
            {{csrf_field()}}
            <div class="form-group">
                <label for="passportnumber" class="control-label">{{__('lang.passportnumber')}}</label>
                <input type="text" class="form-control" id="passport" placeholder="{{__('lang.passportnumber')}}" name="passport" required>
                <div class="help-block with-errors"></div>
            </div>

            <div class="form-group">
                <label for="firstname" class="control-label">{{__('lang.firstname')}}</label>
                <input type="text" class="form-control" id="firstname" placeholder="{{__('lang.firstname')}}" name="firstname" required>
                <div class="help-block with-errors"></div>
            </div>

            <div class="form-group">
                <label for="fathername" class="control-label">{{__('lang.fathername')}}</label>
                <input type="text" class="form-control" id="fathername" placeholder="{{__('lang.fathername')}}" name="fathername" required>
                <div class="help-block with-errors"></div>
            </div>

            <div class="form-group">
                <label for="mothername" class="control-label">{{__('lang.mothername')}}</label>
                <input type="text" class="form-control" id="mothername" placeholder="{{__('lang.mothername')}}" name="mothername" required>
                <div class="help-block with-errors"></div>
            </div>

            <div class="form-group">
                <label for="nekedname" class="control-label">{{__('lang.nekedname')}}</label>
                <input type="text" class="form-control" id="nekedname" placeholder="{{__('lang.nekedname')}}" name="nekedname" required>
                <div class="help-block with-errors"></div>
            </div>

            <div class="form-group">
                <label for="email" class="control-label">{{__('lang.email')}}</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="{{__('lang.email')}}"  required>
                <div class="help-block with-errors"></div>
            </div>


            <div class="form-group">
                <label for="nathnality" class="control-label">{{__('lang.nathnality')}}</label>
                <input type="text" class="form-control" id="nathnality" placeholder="{{__('lang.nathnality')}}" name="nathnality" required>
                <div class="help-block with-errors"></div>
            </div>

            <div class="form-group">
                <label for="borndate" class="control-label">{{__('lang.borndate')}}</label>
                <input type="text" class="form-control" id="borndate" placeholder="{{__('lang.borndate')}}" name="borndate" required>
                <div class="help-block with-errors"></div>
            </div>

            <div class="form-group">
                <label for="address" class="control-label">{{__('lang.address')}}</label>
                <input type="text" class="form-control" id="address" placeholder="{{__('lang.address')}}" name="address" required>
                <div class="help-block with-errors"></div>
            </div>

            <div class="form-group">
                <label for="phone" class="control-label">{{__('lang.phone')}}</label>
                <input type="text" class="form-control" id="phone" placeholder="{{__('lang.phone')}}" name="phone" required>
                <div class="help-block with-errors"></div>
            </div>

            <div class="form-group">
                <label for="avarage" class="control-label">{{__('lang.avarage')}}</label>
                <input type="text" class="form-control" id="avarage" placeholder="{{__('lang.avarage')}}" name="avarage" required>
                <div class="help-block with-errors"></div>
            </div>

            <div class="form-group">
                <label for="depart" class="control-label">{{__('lang.depart')}}</label>
                <input type="text" class="form-control" id="depart" placeholder="{{__('lang.depart')}}" name="depart" required>
                <div class="help-block with-errors"></div>
            </div>


            <div class="form-group">
                <label for="school" class="control-label">{{__('lang.school')}}</label>
                <input type="text" class="form-control" id="school" placeholder="{{__('lang.school')}}" name="school" required>
                <div class="help-block with-errors"></div>
            </div>


            <div class="form-group">
                <label for="sp0" class="control-label">{{__('lang.spac')}}</label>
                <input type="text" class="form-control" id="sp0" placeholder="{{__('lang.sp0')}}" name="sp[]" required>
                <input type="text" class="form-control" id="sp1" placeholder="{{__('lang.sp1')}}" name="sp[]">
                <input type="text" class="form-control" id="sp2" placeholder="{{__('lang.sp2')}}" name="sp[]">
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group">
                <label for="drgree" class="control-label">{{__('lang.drgree')}}</label>
                <select class="form-control" name="drgree">
                    <span > <option style="font-weight: bold;font-size: large" value="{{__('lang.unv')}}">{{__('lang.unv')}}</option></span>
                    <span > <option style="font-weight: bold;font-size: large" value="{{__('lang.mas')}}">{{__('lang.mas')}}</option></span>
                    <span > <option style="font-weight: bold;font-size: large" value="{{__('lang.doct')}}">{{__('lang.doct')}}</option></span>
                </select>
                <div class="help-block with-errors"></div>
            </div>


            {{--<div class="form-group">--}}
                {{--<label for="inputPassword" class="control-label">Password:</label>--}}
                {{--<div class="form-inline row">--}}
                    {{--<div class="form-group col-sm-6 agileits-w3layouts">--}}
                        {{--<input type="password" data-minlength="6" class="form-control" id="inputPassword" placeholder="Password" required>--}}
                        {{--<div class="help-block">Minimum of 6 characters</div>--}}
                    {{--</div>--}}
                    {{--<div class="form-group col-sm-6 w3-agile">--}}
                        {{--<input type="password" class="form-control" id="inputPasswordConfirm" data-match="#inputPassword" data-match-error="Whoops, these don't match"--}}
                               {{--placeholder="Confirm Password" required>--}}
                        {{--<div class="help-block with-errors"></div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            <div class="form-group w3ls-opt">
                <label for="Phone" class="control-label">{{__('lang.Gender')}}</label>

                <label class="w3layouts">
                    <input type="radio" name="gender" id="hire" value="male" checked>{{__('lang.male')}}
                </label>
                <label class="w3layouts label2">
                    <input type="radio" name="gender" id="work" value="female">{{__('lang.Female')}}
                </label>
            </div>
            <hr/>
            <div class="form-group">
                <label for="passpor" class="control-label">{{__('lang.passpor')}}</label>
                <input placeholder="{{__('lang.passpor')}}" id="poster" multiple="multiple" type="file" name="passpor" value="upload"  required>
                {{--<div class="progress">--}}
                    {{--<div class="bar"></div >--}}
                    {{--<div class="percent">0%</div >--}}
                {{--</div>--}}

            </div>
            <hr/>
            <div class="form-group">
                <label for="personal" class="control-label">{{__('lang.personal')}}</label>
                <input placeholder="{{__('lang.personal')}}" multiple="multiple" type="file" name="personal" value="upload"  required>
                {{--<div class="progress">--}}
                    {{--<div class="bar0"></div >--}}
                    {{--<div class="percent0">0%</div >--}}
                {{--</div>--}}
            </div>
            <hr/>
            <div class="form-group">
                <label for="cirtifcate" class="control-label"><span style="color: red;">{{__('lang.chiocefiled')}} </span>{{__('lang.cirtifcate')}}</label>
                <input placeholder="{{__('lang.cirtifcate')}}" multiple="multiple" type="file" name="cirtifcate" value="upload" >

            </div>
            <hr/>
            <div class="form-group">
                <label for="YOS" class="control-label"><span style="color: red;">{{__('lang.chiocefiled')}} </span>{{__('lang.YOS')}}</label>
                <input placeholder="{{__('lang.YOS')}}" multiple="multiple" type="file" name="YOS" value="upload" >

            </div>
            <hr/>
            <div class="form-group">
                <label for="SAT" class="control-label"><span style="color: red;">{{__('lang.chiocefiled')}} </span>{{__('lang.SAT')}}</label>
                <input placeholder="{{__('lang.SAT')}}" multiple="multiple" type="file" name="SAT" value="upload" >

            </div>
            <hr/>
            <div class="form-group">
                <label for="sconcir" class="control-label">{{__('lang.sconcir')}}</label>
                <input placeholder="{{__('lang.sconcir')}}" multiple="multiple" type="file" name="sconcir" value="upload"  required>

            </div>
            <div class="form-group">
                <label for="cirstart" class="control-label">{{__('lang.cirstart')}}</label>
                <input type="text" class="form-control" id="cirstart" placeholder="{{__('lang.cirstart')}}" name="cirstart" required>
                <div class="help-block with-errors"></div>
            </div>
            <hr>
            <div class="flash-message">
                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                    @if(Session::has('alert-' . $msg))

                        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                    @endif
                @endforeach
            </div>

            <div class="form-group">
                <input type="submit" id="submitNew" onclick="submitForm(this)" class="form-control btn btn-success" style="color:black;font-size: 22px;text-align: center" value="{{__('lang.rejester')}}">
            </div>
        </form>
    </div>
    <div class="right">

    </div>
    <div class="clear"></div>
</div>

<p class="copyright-w3ls">© 2019 Student Registration Form. All Rights Reserved | Design by
    <a href="https:/eritqaa.com.tr/" target="_blank">ERITQAA</a>
</p>
<!-- js -->
<script type="text/javascript" src="{{ URL::asset('js/jquery-2.1.4.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/validator.min.js') }}"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script>
<script src="http://malsup.github.com/jquery.form.js"></script>
<script>
    function submitForm(btn) {

        if ($('.disabled').length == 1)
            alert('{{__('lang.you_must_fill')}}');
        else{
           // alert($('.disabled').length);
            btn.disabled = true;
            // submit the form
            btn.form.submit();
        }

    }
    </script>
<script type="text/javascript">
    // function validate(formData, jqForm, options) {
    //     var form = jqForm[0];
    //     if (!form.file.value) {
    //         alert('File not found');
    //         return false;
    //     }
    // }



    //
    // (function() {
    //
    //     var bar = $('.bar');
    //     var percent = $('.percent');
    //   //  var status = $('#status');
    //
    //     $('form').ajaxForm({
    //         beforeSubmit: validate,
    //         beforeSend: function() {
    //             status.empty();
    //             var percentVal = '0%';
    //             var posterValue = $('input[name=passpor]').fieldValue();
    //             bar.width(percentVal)
    //             percent.html(percentVal);
    //         },
    //         uploadProgress: function(event, position, total, percentComplete) {
    //             var percentVal = percentComplete + '%';
    //             bar.width(percentVal)
    //             percent.html(percentVal);
    //         },
    //         success: function() {
    //             var percentVal = 'Wait, Saving';
    //             bar.width(percentVal)
    //             percent.html(percentVal);
    //         },
    //         complete: function(xhr) {
    //             //status.html(xhr.responseText);
    //             alert('Uploaded Successfully');
    //             //window.location.href = "/file-upload";
    //         }
    //     });
    // })();

</script>

<!-- /js files -->
</body>

</html>
