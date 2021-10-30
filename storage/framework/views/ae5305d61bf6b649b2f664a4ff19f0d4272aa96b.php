<!doctype html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo e(__('lang.Ticket_View')); ?></title>
    <style>
        <?php if(app()->getLocale()=='ar'): ?>
        .ddf{
            text-align: right;
        }

        <?php endif; ?>

    </style>
</head>
<body>
<div class="col-lg-12">
    <div class="ddf form-group">
        <label style="margin-right: 50px;margin-left: 50px" class="ddf"><?php echo e($Article['title']); ?></label>
        <div  class="ddf row">
            <div style="margin-right: 50px;margin-left: 50px" class="col-xs-12 mb-1">
                <?php echo $Article->content; ?></div>
        </div>

    </div>
</div>
</body>
</html>
<?php /* H:\root\home\eritqaaacademy-001\www\crm\CRMV3\crmlaraveltest\resources\views/Crm/Article/Ex_View_view.blade.php */ ?>