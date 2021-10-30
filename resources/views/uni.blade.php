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
       .dd{
          border: thin black solid;

       }
    </style>
</head>

<body>
<div id="wrapper">
    <div style="color: green;font-size: larger" class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if(Session::has('alert-' . $msg))

                <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
            @endif
        @endforeach
    </div>
    <h1>استمارة تسجيل جامعي</h1>

    <form method="post" enctype="multipart/form-data">
{{csrf_field()}}

            <div style="margin-right: 25%;border: thin black solid;padding-right: 20%" class="col-2">
                <label>
                    <span style="font-weight: bold;font-size: large">{{__('رقم الباسبور')}}</span>
                    <input  type="text" placeholder="ادخل  رقم الباسبور" id="passport" name="passport" tabindex="1" required>
                </label>
            </div>

<br>



        <div style="border-top: thin black solid" class="col-4">
            <label>
                 <span style="font-weight: bold;font-size: large">{{__('الاسم الاول')}}</span>
                <input placeholder="الاسم الاول" id="firstname"  type="text" name="firstname" tabindex="3" required>
            </label>
        </div>
        <div  class="col-4">
            <label>
                 <span style="font-weight: bold;font-size: large">{{__('اسم الاب')}}</span>
                <input placeholder="الاسم الاب" id="fathername" name="fathername" tabindex="4" required>
            </label>
        </div>
        <div  class="col-4">
            <label>
                 <span style="font-weight: bold;font-size: large">{{__('اسم الام')}}</span>
                <input placeholder="الاسم الام" id="mothername" name="mothername" tabindex="4" required>
            </label>
        </div>

        <div  style="border-top: thin black solid" class="col-4">
            <label>
                 <span style="font-weight: bold;font-size: large;">{{__('الكنية')}}</span>
                <input placeholder="الكنية" id="nekedname" name="nekedname" tabindex="6" required>
            </label>
        </div>



        <div  class="col-3">
            <label>
                 <span style="font-weight: bold;font-size: large">{{__('البريد الإلكتروني')}}</span>
                <input placeholder="البريد الإلكتروني" type="email" id="email" name="email" tabindex="4" required>
            </label>
        </div>
        <div  class="col-3">
            <label>
                 <span style="font-weight: bold;font-size: large">{{__('الجنسية')}}</span>
                <input placeholder="الجنسية" id="nathnality" name="nathnality" tabindex="4" required>
            </label>
        </div>
        <div  class="col-3">
            <label>
                 <span style="font-weight: bold;font-size: large">{{__('تاريخ الولادة')}}</span>
                <input placeholder="تاريخ الولادة"  type="date" id="borndate" name="borndate" tabindex="6" required>
            </label>
        </div>
        <div  class="col-2">
            <label>
                 <span style="font-weight: bold;font-size: large">{{__('العنوان')}}</span>
                <input placeholder="العنوان"  type="text" id="address" name="address" tabindex="6" required>
            </label>
        </div>
        <div  class="col-2">
            <label>
                 <span style="font-weight: bold;font-size: large">{{__('رقم الهاتف')}}</span>
                <input placeholder="رقم الهاتف"  type="text" id="phone" name="phone" tabindex="6" required>
            </label>
        </div>


        <div  class="col-3">
            <label>
                 <span style="font-weight: bold;font-size: large">{{__('المعدل')}}</span>
                <input placeholder="المعدل" id="avarage" name="avarage" tabindex="4" required>
            </label>
        </div>
        <div  class="col-3">
            <label>
                 <span style="font-weight: bold;font-size: large">{{__('الفرع')}}</span>
                <input placeholder="الفرع" id="depart" name="depart" tabindex="4" required>
            </label>
        </div>

        <div  class="col-3">
            <label>
                 <span style="font-weight: bold;font-size: large">{{__('المدرسة')}}</span>
                <input placeholder="المدرسة" id="school" name="school" tabindex="6" required>
            </label>
        </div>

        <div  class="col-2">
            <label >
                <span style="font-weight: bold;font-size: larger">{{__('التخصصات المطلوبة')}}</span>
                <input  placeholder="التخصص الاول" id="sp" name="sp[]" tabindex="6">
                <input placeholder="التخصص الثاني" id="sp" name="sp[]" tabindex="6">
                <input placeholder="التخصص الثالث" id="sp" name="sp[]" tabindex="6">


            </label>
        </div>

        <div class="col-2">
            <label>
                <span style="font-weight: bold;font-size: large ">{{__('التسجيل في')}}</span>
                <select name="drgree">
                   <span > <option style="font-weight: bold;font-size: large" value="جامعي">جامعي</option></span>
                   <span > <option style="font-weight: bold;font-size: large" value="ماجستير">ماجستير</option></span>
                   <span > <option style="font-weight: bold;font-size: large" value="دكتوراه">دكتوراه</option></span>
                </select>

            </label>
        </div>


        <div  class="col-3">
            <label>
                 <span style="font-weight: bold;font-size: large">{{__('صورة الكملك او جواز السفر')}}</span>
                <input placeholder="الصورة" multiple="multiple" type="file" name="passpor" value="upload"required>

            </label>
        </div>
        <hr>
        <div  class="col-3">
            <label>
                 <span style="font-weight: bold;font-size: large">{{__('صورة شخصية')}}</span>
                <input placeholder="الصورة" multiple="multiple" type="file" name="personal" value="upload" required>

            </label>
        </div>

        <div  class="col-3">
            <label>
                <span style="color: red;">حقل اختياري </span> <span style="font-weight: bold;font-size: large">{{__(' صورة كشف علامات الثانوية')}}</span>
                <input placeholder="الصورة" multiple="multiple" type="file" name="cirtifcate" value="upload" >

            </label>
        </div>


        <div class="col-submit">
            <button class="submitbtn">تسجيل</button>
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