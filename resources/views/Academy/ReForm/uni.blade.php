
<!doctype html>
<html  lang="{{app()->getLocale()}}" >

<head>
    <title>{{__('lang.AcademyForm')}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="فورم التسجيل في اكايمية ارتقاء, شركة ارتقاء القانونية التجارية">
    <meta name="distribution" content="https:/eritqaa.com.tr">
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
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
<div style="color: green;font-size: larger" class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if(Session::has('alert-' . $msg))

            <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
        @endif
    @endforeach
</div>
<div class="content-agileits">

    <a href="{{route('lang', ['lang' => 'ar'])}}">
        <img title="العربية" src="{{ asset('Images/'.'ar.jpg') }}"
             alt="ar"   style="width: 50px; height: 50px" ></a>

    <a href="{{route('lang', ['lang' => 'tr'])}}">
        <img title="Turkish" src="{{ asset('Images/'.'tr.jpg') }}"
             alt="ar"   style="width: 50px; height: 50px" ></a>

    <a href="{{route('lang', ['lang' => 'en'])}}">
        <img title="English " src="{{ asset('Images/'.'en.jpg') }}"
             alt="ar"   style="width: 50px; height: 50px" ></a>
    <h1 class="title">{{__('lang.AcademyForm')}}</h1>


    <div class="left">
        <form  method="post" enctype="multipart/form-data" data-toggle="validator">
            {{csrf_field()}}


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
                <label for="phone" class="control-label">{{__('lang.phone')}}</label>
                <input type="tel" class="form-control" id="phone" placeholder="{{__('lang.phone')}}" name="phone" required>
                <div class="help-block with-errors"></div>
            </div>



            <div class="form-group">
                <label for="Objective" class="control-label"><span style="color: red;">{{__('lang.chiocefiled')}} </span>{{__('lang.Objective')}}</label>
                <input type="text" class="form-control" id="Objective" placeholder="{{__('lang.Objective')}}" name="taxid" >
                <div class="help-block with-errors"></div>
            </div>

            <div class="form-group">
                <label for="Previous_experience" class="control-label"><span style="color: red;">{{__('lang.chiocefiled')}} </span>{{__('lang.Previous_experience')}}</label>
                <input type="text" class="form-control" id="Previous_experience" placeholder="{{__('lang.Previous_experience')}}" name="company_taxid" >
                <div class="help-block with-errors"></div>
            </div>



            <div class="form-group">
                <label for="personal" class="control-label"><span style="color: red;">{{__('lang.chiocefiled')}} </span>{{__('lang.personal')}}</label>
                <input placeholder="{{__('lang.personal')}}" multiple="multiple" type="file" name="personal" value="upload"  >
            </div>
            <hr/>
            <div class="form-group">
                <label for="Previous_certificates" class="control-label"><span style="color: red;">{{__('lang.chiocefiled')}} </span>{{__('lang.Previous_certificates')}}</label>
                <input placeholder="{{__('lang.Previous_certificates')}}" multiple="multiple" type="file" name="Previous_certificates[]" value="upload" >
            </div>




            <div class="form-group">
                <button type="submit" class="btn btn-lg">{{__('lang.rejester')}}</button>
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
>
<!-- /js files -->
</body>

</html>