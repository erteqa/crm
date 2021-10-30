<li id="<?php echo e($not["id"]); ?>" class="noti" >
    <a href="<?php echo e(route('Index.Note',['id'=>$not["id"]])); ?>" target="_blank">
        <span class="icon black"><i class="fa <?php echo e($not["icon"]); ?> fa-fw"></i></span>
        <span><?php echo $not["data"]; ?></span>
        <span   class="pull-right text-muted small"><?php echo e(now()->diffForHumans()); ?></span>
    </a>
    <span class="btn btn-link"  onclick="deletnote('<?php echo e($not["id"]); ?>',event)"><i   class="fa fa-trash  fa-fw"></i> </span>
    <span class="btn btn-link"   onclick="makeread('<?php echo e($not["id"]); ?>',event)"><i   class="fa fa-envelope-o  fa-fw"></i> </span>
    
    
</li>
<li class="divider"></li>
<?php /* /home/eritqaaa/public_html/crmold.eritqaa.com.tr/resources/views/info/notification.blade.php */ ?>