<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<!doctype html>
<html  lang="<?php echo e(app()->getLocale()); ?>" >
<head>
    <title><?php echo e(__('lang.estemaraPUN')); ?></title>

    <meta property="og:image" content="https://i.ytimg.com/vi/p1DjrPzK7dE/maxresdefault.jpg">
    <meta property="og:image:url" content="https://i.ytimg.com/vi/p1DjrPzK7dE/maxresdefault.jpg"/>
    <meta property="og:image:secure_url" content="https://i.ytimg.com/vi/p1DjrPzK7dE/maxresdefault.jpg"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="فورم التسجيل في الجامعات الخاصة التركية شركة ارتقاء القانونية التجارية">
    <meta name="distribution" content="https:/eritqaa.com.tr">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <style>
        .progress { position:relative; width:100%; border: 1px solid #7F98B2; padding: 1px; border-radius: 3px; }
        .bar { background-color: #B4F5B4; width:0%; height:25px; border-radius: 3px; }
        .percent { position:absolute; display:inline-block; top:3px; left:48%; color: #7F98B2;}
    </style>










<!-- fonts -->
    <link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i" rel="stylesheet">
    <!-- /fonts -->
    <!-- css -->


    <link rel="stylesheet" href="<?php echo e(URL::asset('css/style.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(URL::asset('css/bootstrap.css')); ?>" />

    <style>
        <?php if(app()->getLocale()=='ar'): ?>
        form{
            text-align: right;


        }
        input{
            text-align: right;
        }
        .dd{
            border: thin black solid;

        }
        <?php endif; ?>
    </style>
    <!-- /css -->
</head>

<body>

<div class="content-agileits">
    <div class="flash-message">
        <?php $__currentLoopData = ['danger', 'warning', 'success', 'info']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(Session::has('alert-' . $msg)): ?>

                <p class="alert alert-<?php echo e($msg); ?>"><?php echo e(Session::get('alert-' . $msg)); ?> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <a href="<?php echo e(route('lang', ['lang' => 'ar'])); ?>">
        <img title="العربية" src="<?php echo e(asset('Images/'.'ar.jpg')); ?>"
             alt="ar"   style="width: 50px; height: 50px" ></a>

    <a href="<?php echo e(route('lang', ['lang' => 'tr'])); ?>">
        <img title="Turkish" src="<?php echo e(asset('Images/'.'tr.jpg')); ?>"
             alt="ar"   style="width: 50px; height: 50px" ></a>

    <a href="<?php echo e(route('lang', ['lang' => 'en'])); ?>">
        <img title="English " src="<?php echo e(asset('Images/'.'en.jpg')); ?>"
             alt="ar"   style="width: 50px; height: 50px" ></a>
    <h1 class="title"><?php echo e(__('lang.estemaraPUN')); ?></h1>
    <div class="left">
        <form  method="post" enctype="multipart/form-data" data-toggle="validator" >
            <?php echo e(csrf_field()); ?>

            <div class="form-group">
                <label for="firstname" class="control-label"><?php echo e(__('lang.firstname')); ?></label>
                <input type="text" class="form-control" id="firstname" placeholder="<?php echo e(__('lang.firstname')); ?>" name="firstname" required>
                <div class="help-block with-errors"></div>
            </div>

            <div class="form-group">
                <label for="nekedname" class="control-label"><?php echo e(__('lang.nekedname')); ?></label>
                <input type="text" class="form-control" id="nekedname" placeholder="<?php echo e(__('lang.nekedname')); ?>" name="nekedname" required>
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group">
                <label for="phone" class="control-label"><?php echo e(__('lang.phone')); ?></label>
                <input type="text" class="form-control" id="phone" placeholder="<?php echo e(__('lang.phone')); ?>" name="phone" required>
                <div class="help-block with-errors"></div>
            </div>

            <div class="form-group">
                <label for="email" class="control-label"><?php echo e(__('lang.email')); ?></label>
                <input type="email" class="form-control" id="email" name="email" placeholder="<?php echo e(__('lang.email')); ?>"  required>
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group">
                <label for="sp0" class="control-label"><?php echo e(__('lang.spac')); ?></label>
                <input type="text" class="form-control" id="sp0" placeholder="<?php echo e(__('lang.sp0')); ?>" name="sp[]" required>
                <input type="text" class="form-control" id="sp1" placeholder="<?php echo e(__('lang.sp1')); ?>" name="sp[]">
                <input type="text" class="form-control" id="sp2" placeholder="<?php echo e(__('lang.sp2')); ?>" name="sp[]">
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group">
                <input type="submit" id="submitNew" class="form-control btn btn-success" style="color:black;font-size: 22px;text-align: center" value="<?php echo e(__('lang.rejester')); ?>">
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
<script type="text/javascript" src="<?php echo e(URL::asset('js/jquery-2.1.4.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(URL::asset('js/bootstrap.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(URL::asset('js/validator.min.js')); ?>"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script>
<script src="http://malsup.github.com/jquery.form.js"></script>
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

</body>

</html>
<?php /* H:\root\home\eritqaaacademy-001\www\crm\CRMV3\crmlaraveltest\resources\views/Univer/puniv.blade.php */ ?>