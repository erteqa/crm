
<!doctype html>
<html  lang="<?php echo e(app()->getLocale()); ?>" >

<head>
    <title><?php echo e(__('lang.AcademyForm')); ?></title>
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
<div style="color: green;font-size: larger" class="flash-message">
    <?php $__currentLoopData = ['danger', 'warning', 'success', 'info']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if(Session::has('alert-' . $msg)): ?>

            <p class="alert alert-<?php echo e($msg); ?>"><?php echo e(Session::get('alert-' . $msg)); ?> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<div class="content-agileits">

    <a href="<?php echo e(route('lang', ['lang' => 'ar'])); ?>">
        <img title="العربية" src="<?php echo e(asset('Images/'.'ar.jpg')); ?>"
             alt="ar"   style="width: 50px; height: 50px" ></a>

    <a href="<?php echo e(route('lang', ['lang' => 'tr'])); ?>">
        <img title="Turkish" src="<?php echo e(asset('Images/'.'tr.jpg')); ?>"
             alt="ar"   style="width: 50px; height: 50px" ></a>

    <a href="<?php echo e(route('lang', ['lang' => 'en'])); ?>">
        <img title="English " src="<?php echo e(asset('Images/'.'en.jpg')); ?>"
             alt="ar"   style="width: 50px; height: 50px" ></a>
    <h1 class="title"><?php echo e(__('lang.AcademyForm')); ?></h1>


    <div class="left">
        <form  method="post" enctype="multipart/form-data" data-toggle="validator">
            <?php echo e(csrf_field()); ?>



            <div class="form-group">
                <label for="firstname" class="control-label"><?php echo e(__('lang.firstname')); ?></label>
                <input type="text" class="form-control" id="firstname" placeholder="<?php echo e(__('lang.firstname')); ?>" name="firstname" required>
                <div class="help-block with-errors"></div>
            </div>

            <div class="form-group">
                <label for="fathername" class="control-label"><?php echo e(__('lang.fathername')); ?></label>
                <input type="text" class="form-control" id="fathername" placeholder="<?php echo e(__('lang.fathername')); ?>" name="fathername" required>
                <div class="help-block with-errors"></div>
            </div>


            <div class="form-group">
                <label for="nekedname" class="control-label"><?php echo e(__('lang.nekedname')); ?></label>
                <input type="text" class="form-control" id="nekedname" placeholder="<?php echo e(__('lang.nekedname')); ?>" name="nekedname" required>
                <div class="help-block with-errors"></div>
            </div>

            <div class="form-group">
                <label for="email" class="control-label"><?php echo e(__('lang.email')); ?></label>
                <input type="email" class="form-control" id="email" name="email" placeholder="<?php echo e(__('lang.email')); ?>"  required>
                <div class="help-block with-errors"></div>
            </div>

            <div class="form-group">
                <label for="phone" class="control-label"><?php echo e(__('lang.phone')); ?></label>
                <input type="tel" class="form-control" id="phone" placeholder="<?php echo e(__('lang.phone')); ?>" name="phone" required>
                <div class="help-block with-errors"></div>
            </div>



            <div class="form-group">
                <label for="Objective" class="control-label"><span style="color: red;"><?php echo e(__('lang.chiocefiled')); ?> </span><?php echo e(__('lang.Objective')); ?></label>
                <input type="text" class="form-control" id="Objective" placeholder="<?php echo e(__('lang.Objective')); ?>" name="taxid" >
                <div class="help-block with-errors"></div>
            </div>

            <div class="form-group">
                <label for="Previous_experience" class="control-label"><span style="color: red;"><?php echo e(__('lang.chiocefiled')); ?> </span><?php echo e(__('lang.Previous_experience')); ?></label>
                <input type="text" class="form-control" id="Previous_experience" placeholder="<?php echo e(__('lang.Previous_experience')); ?>" name="company_taxid" >
                <div class="help-block with-errors"></div>
            </div>



            <div class="form-group">
                <label for="personal" class="control-label"><span style="color: red;"><?php echo e(__('lang.chiocefiled')); ?> </span><?php echo e(__('lang.personal')); ?></label>
                <input placeholder="<?php echo e(__('lang.personal')); ?>" multiple="multiple" type="file" name="personal" value="upload"  >
            </div>
            <hr/>
            <div class="form-group">
                <label for="Previous_certificates" class="control-label"><span style="color: red;"><?php echo e(__('lang.chiocefiled')); ?> </span><?php echo e(__('lang.Previous_certificates')); ?></label>
                <input placeholder="<?php echo e(__('lang.Previous_certificates')); ?>" multiple="multiple" type="file" name="Previous_certificates[]" value="upload" >
            </div>




            <div class="form-group">
                <button type="submit" class="btn btn-lg"><?php echo e(__('lang.rejester')); ?></button>
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
>
<!-- /js files -->
</body>

</html>
<?php /* H:\root\home\eritqaaacademy-001\www\crm\CRMV3\crmlaraveltest\resources\views/Academy/ReForm/uni.blade.php */ ?>