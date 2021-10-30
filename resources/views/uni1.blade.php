<!DOCTYPE html>
<!-- saved from url=(0115)https://www.templatemonster.com/blog/demos/responsive-css3-horizontal-application-style-form-fields/demo/index.html -->
<html lang="en-US"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta http-equiv="Content-Type" content="text/html">
    <title>Horizontal Application Form - Template Monster Demo</title>
    <meta name="author" content="Jake Rocheleau">
    <link rel="shortcut icon" href="http://static.tmimgcdn.com/img/favicon.ico">
    <link rel="icon" href="http://static.tmimgcdn.com/img/favicon.ico">
    <link rel="stylesheet" type="text/css" media="all" href="{{ URL::asset('js/styles.css') }}">
    <link rel="stylesheet" type="text/css" media="all" href="{{ URL::asset('js/switchery.min.css') }}">
    <script type="text/javascript" src="{{ URL::asset('js/switchery.min.js.download') }}"></script>
    <style>
        form{
            text-align: right;
            float: right;
        }
        input{
            text-align: right;
        }
    </style>
</head>

<body>
<div id="wrapper">
    <div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if(Session::has('alert-' . $msg))

                <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
            @endif
        @endforeach
    </div>
    <h1>استمارة قبول جامعي</h1>

    <form method="post" enctype="multipart/form-data">
{{csrf_field()}}

            <div class="col-2">
                <label>
                    <span style="font-weight: bold;font-size: large">{{__('رقم الباسبور')}}</span>
                    <input  type="text" placeholder="ادخل  رقم الباسبور" id="passport" value="{{$un['passport']}}" tabindex="1" readonly>
                </label>
            </div>
<br>
        <div class="col-4">
            <label>
                 <span style="font-weight: bold;font-size: large">{{__('الاسم الاول')}}</span>
                <input placeholder="الاسم الاول" id="firstname"  type="text" value="{{$un['firstname']}}" tabindex="3" readonly>
            </label>
        </div>
        <div class="col-4">
            <label>
                 <span style="font-weight: bold;font-size: large">{{__('اسم الاب')}}</span>
                <input placeholder="الاسم الاب" id="fathername" value="{{$un['fathername']}}" tabindex="4" readonly>
            </label>
        </div>
        <div class="col-4">
            <label>
                 <span style="font-weight: bold;font-size: large">{{__('اسم الام')}}</span>
                <input placeholder="الاسم الام" id="mothername" value="{{$un['mothername']}}" tabindex="4" readonly>
            </label>
        </div>

        <div class="col-4">
            <label>
                 <span style="font-weight: bold;font-size: large">{{__('الكنية')}}</span>
                <input placeholder="الكنية" id="nekedname" value="{{$un['nekedname']}}" tabindex="6" readonly>
            </label>
        </div>



        <div class="col-3">
            <label>
                 <span style="font-weight: bold;font-size: large">{{__('البريد الإلكتروني')}}</span>
                <input placeholder="البريد الإلكتروني" type="email" id="email" value="{{$un['email']}}" tabindex="4" readonly>
            </label>
        </div>
        <div class="col-3">
            <label>
                 <span style="font-weight: bold;font-size: large">{{__('الجنسية')}}</span>
                <input placeholder="الجنسية" id="nathnality" value="{{$un['nathnality']}}" tabindex="4" readonly>
            </label>
        </div>
        <div class="col-3">
            <label>
                 <span style="font-weight: bold;font-size: large">{{__('تاريخ الولادة')}}</span>
                <input placeholder="تاريخ الولادة"  type="date" id="borndate" value="{{$un['borndate']}}" tabindex="6" readonly>
            </label>
        </div>
        <div class="col-2">
            <label>
                 <span style="font-weight: bold;font-size: large">{{__('العنوان')}}</span>
                <input placeholder="العنوان"  type="text" id="address" value="{{$un['address']}}" tabindex="6" readonly>
            </label>
        </div>
        <div class="col-2">
            <label>
                 <span style="font-weight: bold;font-size: large">{{__('رقم الهاتف')}}</span>
                <input placeholder="رقم الهاتف"  type="text" id="phone" value="{{$un['phone']}}" tabindex="6" readonly>
            </label>
        </div>


        <div class="col-3">
            <label>
                 <span style="font-weight: bold;font-size: large">{{__('المعدل')}}</span>
                <input placeholder="المعدل" id="avarage" value="{{$un['avarage']}}" tabindex="4" readonly>
            </label>
        </div>
        <div class="col-3">
            <label>
                 <span style="font-weight: bold;font-size: large">{{__('الفرع')}}</span>
                <input placeholder="الفرع" id="depart" value="{{$un['depart']}}" tabindex="4" readonly>
            </label>
        </div>

        <div class="col-3">
            <label>
                 <span style="font-weight: bold;font-size: large">{{__('المدرسة')}}</span>
                <input placeholder="المدرسة" id="school" value="{{$un['school']}}" tabindex="6" readonly>
            </label>
        </div>

        <div class="col-2">
            <label>
                <span style="font-weight: bold;font-size: large">{{__('التخصصات المطلوبة')}}</span>
                <input placeholder="التخصص الاول" id="sp" value="{{$un['sp'][0]}}" tabindex="6">
                <input placeholder="التخصص الثاني" id="sp" value="{{$un['sp'][1]}}" tabindex="6">
                <input placeholder="التخصص الثالث" id="sp" value="{{$un['sp'][2]}}" tabindex="6">


            </label>
        </div>

        <div class="col-2">
            <label>
                <span style="font-weight: bold;font-size: large ">{{__('التسجيل في')}}</span>

                <input  id="school" value="{{$un['drgree']}}" tabindex="6" readonly>
            </label>
        </div>
        <div class="col-2">
            <label>
                <span style="font-weight: bold;font-size: large ">{{__('الجنس')}}</span>

                <input  id="school" value="{{__('lang.'.$un['gender'])}}" tabindex="6" readonly>
            </label>
        </div>




    </form>
</div>
<script type="text/javascript">
    var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

    elems.forEach(function(html) {
        var switchery = new Switchery(html);
    });
</script>

</body></html>