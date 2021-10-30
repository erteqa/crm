<?php $__env->startSection('content'); ?>
    <div class="col-lg-7">
        <video id="my_video" controlsList="nodownload" oncontextmenu="return false;"  width="600" controls>
            <source src="mov_bbb.mp4" type="video/mp4">
            <source src="mov_bbb.ogg" type="video/ogg">
            Your browser does not support HTML5 video.
        </video>

    </div>
    <div class="col-lg-5">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <?php echo e(__('lang.Part_Editor')); ?>

            </div>
            <!-- /.panel-heading -->
            <div class="">
                <a class="btn btn-primary" style="margin: 10px"
                   href="<?php echo e(route('Part.Add',['id'=>$Lessonid])); ?>"><?php echo e(__('lang.Part_Add')); ?></a>
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thed>
                    <tr>
                        <th>#</th>
                        <th><?php echo e(__('lang.title')); ?></th>

                        <th><?php echo e(__('lang.time')); ?></th>

                        <th><?php echo e(__('lang.link')); ?></th>
                        <th><?php echo e(__('lang.Add_By')); ?></th>
                        <th><?php echo e(__('lang.date')); ?></th>
                        <th><?php echo e(__('lang.Action')); ?></th>
                    </tr>
                    </thed>
                    <tbody>
                    <?php $i=1;?>
                    <?php $__currentLoopData = $Parts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Part): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="odd gradeX">
                            <td><?php echo e($i); ?></td>
                            <td><?php echo e($Part->name); ?></td>
                            <td><?php echo e($Part->time); ?></td>
                                <td width="200%">
                                    <button id="<?php echo e($Part->link); ?>" onclick="myFun(this.id);"> Click me </button>

                          </td>
                            <td><?php echo e(\App\User::find($Part->addby)->name); ?></td>
                            <td><?php echo e($Part->date); ?></td>
                                    <td style="width: 210px">
                                            <a class="btn btn-danger" onclick="del('<?php echo e(route('Part.Delete',['id'=>$Part->id])); ?>')"><?php echo e(__('lang.Delete')); ?></a>
                                            <a class="btn btn-warning" href="<?php echo e(route('Part.Update',['id'=>$Part->id])); ?>"><?php echo e(__('lang.Update')); ?></a>
                                     </td>
                        </tr>
                        <?php $i++;?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <script>


                    function myFun(x) {
                        //alert("link="+x);
                        $.ajax({
                            type:'GET',
                            url: '/Crm/UserFile/crdeurl',
                            //  (or whatever your url is)
                            data: { source: x },
                            success: function (responsedata) {
                                // process on data
                              //  alert("got response as " + "'" + responsedata + "'");
                                document.getElementById('my_video').src= responsedata ;
                            }
                        });

                    }


                    function del($url) {
                        var $ret_val = confirm('Yes Or No');
                        if ($ret_val == true) {
                            window.location.href = $url;
                        }

                    }
                </script>

            </div>
            <!-- /.panel-body -->
        </div>
        <script>
            function playme() {
                document.getElementById("video1").src = 'http://www.w3schools.com/tags/mov_bbb.mp4';
            }
        </script>
        <!-- /.panel -->
    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('subject'); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.Admin_app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* H:\root\home\eritqaaacademy-001\www\crm\CRMV3\crmlaraveltest\resources\views/Academy/Part/Index_view.blade.php */ ?>