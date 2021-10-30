<!DOCTYPE html>
<!-- saved from url=(0115)https://www.templatemonster.com/blog/demos/responsive-css3-horizontal-application-style-form-fields/demo/index.html -->
<html lang="en-US"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta http-equiv="Content-Type" content="text/html">
    <title>Horizontal Application Form - Template Monster Demo</title>
    <meta name="author" content="Jake Rocheleau">
    <link rel="shortcut icon" href="http://static.tmimgcdn.com/img/favicon.ico">
    <link rel="icon" href="http://static.tmimgcdn.com/img/favicon.ico">
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo e(URL::asset('js/styles.css')); ?>">
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo e(URL::asset('js/switchery.min.css')); ?>">
    <script type="text/javascript" src="<?php echo e(URL::asset('js/switchery.min.js.download')); ?>"></script>
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
        <?php $__currentLoopData = ['danger', 'warning', 'success', 'info']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(Session::has('alert-' . $msg)): ?>

                <p class="alert alert-<?php echo e($msg); ?>"><?php echo e(Session::get('alert-' . $msg)); ?> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <h1>استمارة قبول جامعي</h1>

    <form method="post" enctype="multipart/form-data">
<?php echo e(csrf_field()); ?>


            <div class="col-2">
                <label>
                    <span style="font-weight: bold;font-size: large"><?php echo e(__('رقم الباسبور')); ?></span>
                    <input  type="text" placeholder="ادخل  رقم الباسبور" id="passport" value="<?php echo e($un['passport']); ?>" tabindex="1" readonly>
                </label>
            </div>
<br>
        <div class="col-4">
            <label>
                 <span style="font-weight: bold;font-size: large"><?php echo e(__('الاسم الاول')); ?></span>
                <input placeholder="الاسم الاول" id="firstname"  type="text" value="<?php echo e($un['firstname']); ?>" tabindex="3" readonly>
            </label>
        </div>
        <div class="col-4">
            <label>
                 <span style="font-weight: bold;font-size: large"><?php echo e(__('اسم الاب')); ?></span>
                <input placeholder="الاسم الاب" id="fathername" value="<?php echo e($un['fathername']); ?>" tabindex="4" readonly>
            </label>
        </div>
        <div class="col-4">
            <label>
                 <span style="font-weight: bold;font-size: large"><?php echo e(__('اسم الام')); ?></span>
                <input placeholder="الاسم الام" id="mothername" value="<?php echo e($un['mothername']); ?>" tabindex="4" readonly>
            </label>
        </div>

        <div class="col-4">
            <label>
                 <span style="font-weight: bold;font-size: large"><?php echo e(__('الكنية')); ?></span>
                <input placeholder="الكنية" id="nekedname" value="<?php echo e($un['nekedname']); ?>" tabindex="6" readonly>
            </label>
        </div>



        <div class="col-3">
            <label>
                 <span style="font-weight: bold;font-size: large"><?php echo e(__('البريد الإلكتروني')); ?></span>
                <input placeholder="البريد الإلكتروني" type="email" id="email" value="<?php echo e($un['email']); ?>" tabindex="4" readonly>
            </label>
        </div>
        <div class="col-3">
            <label>
                 <span style="font-weight: bold;font-size: large"><?php echo e(__('الجنسية')); ?></span>
                <input placeholder="الجنسية" id="nathnality" value="<?php echo e($un['nathnality']); ?>" tabindex="4" readonly>
            </label>
        </div>
        <div class="col-3">
            <label>
                 <span style="font-weight: bold;font-size: large"><?php echo e(__('تاريخ الولادة')); ?></span>
                <input placeholder="تاريخ الولادة"  type="date" id="borndate" value="<?php echo e($un['borndate']); ?>" tabindex="6" readonly>
            </label>
        </div>
        <div class="col-2">
            <label>
                 <span style="font-weight: bold;font-size: large"><?php echo e(__('العنوان')); ?></span>
                <input placeholder="العنوان"  type="text" id="address" value="<?php echo e($un['address']); ?>" tabindex="6" readonly>
            </label>
        </div>
        <div class="col-2">
            <label>
                 <span style="font-weight: bold;font-size: large"><?php echo e(__('رقم الهاتف')); ?></span>
                <input placeholder="رقم الهاتف"  type="text" id="phone" value="<?php echo e($un['phone']); ?>" tabindex="6" readonly>
            </label>
        </div>


        <div class="col-3">
            <label>
                 <span style="font-weight: bold;font-size: large"><?php echo e(__('المعدل')); ?></span>
                <input placeholder="المعدل" id="avarage" value="<?php echo e($un['avarage']); ?>" tabindex="4" readonly>
            </label>
        </div>
        <div class="col-3">
            <label>
                 <span style="font-weight: bold;font-size: large"><?php echo e(__('الفرع')); ?></span>
                <input placeholder="الفرع" id="depart" value="<?php echo e($un['depart']); ?>" tabindex="4" readonly>
            </label>
        </div>

        <div class="col-3">
            <label>
                 <span style="font-weight: bold;font-size: large"><?php echo e(__('المدرسة')); ?></span>
                <input placeholder="المدرسة" id="school" value="<?php echo e($un['school']); ?>" tabindex="6" readonly>
            </label>
        </div>

        <div class="col-2">
            <label>
                <span style="font-weight: bold;font-size: large"><?php echo e(__('التخصصات المطلوبة')); ?></span>
                <input placeholder="التخصص الاول" id="sp" value="<?php echo e($un['sp'][0]); ?>" tabindex="6">
                <input placeholder="التخصص الثاني" id="sp" value="<?php echo e($un['sp'][1]); ?>" tabindex="6">
                <input placeholder="التخصص الثالث" id="sp" value="<?php echo e($un['sp'][2]); ?>" tabindex="6">


            </label>
        </div>

        <div class="col-2">
            <label>
                <span style="font-weight: bold;font-size: large "><?php echo e(__('التسجيل في')); ?></span>

                <input  id="school" value="<?php echo e($un['drgree']); ?>" tabindex="6" readonly>
            </label>
        </div>
        <div class="col-2">
            <label>
                <span style="font-weight: bold;font-size: large "><?php echo e(__('الجنس')); ?></span>

                <input  id="school" value="<?php echo e(__('lang.'.$un['gender'])); ?>" tabindex="6" readonly>
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
<?php /* H:\root\home\eritqaaacademy-001\www\crm\CRMV3\crmlaraveltest\resources\views/uni1.blade.php */ ?>