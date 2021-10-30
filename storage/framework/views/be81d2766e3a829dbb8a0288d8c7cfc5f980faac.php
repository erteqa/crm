<?php $__env->startSection('title'); ?>
    <?php echo e(__('lang.Update_ProfileImag')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>


    <form method="post" action="<?php echo e(route('UploadProfile',['id'=>$employee->id])); ?>" enctype="multipart/form-data">
        <div class="col-lg-8">
            <div class="panel panel-primary">
                <div class="panel-heading">
                  <?php echo e(__('lang.Update_ProfileImag')); ?>

                </div>
                <div class="panel-body">
                    <?php echo e(csrf_field()); ?>

                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>

                            <th><?php echo e(__('lang.Name')); ?></th>
                            <th><?php echo e(__('lang.Files')); ?></th>
                            <th><?php echo e(__('lang.Action')); ?></th>

                        </tr>
                        </thead>
                        <tbody>
                                <tr class="odd gradeX">
                                    <td><?php echo e(__('lang.profile_pic')); ?></td>
                                    <td>
                                        <a href="<?php echo e(utf8_encode(asset('Signature/'.$employee->profile_pic))); ?>">
                                            <img src="<?php echo e(utf8_encode(asset('Signature/'.$employee->profile_pic))); ?>"
                                                 alt="<?php echo e($employee->profile_pic); ?>" style="width: 100px; height: 100px"></a>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input class="btn btn-primary"  type="file" name="profile_pic" value="upload">
                                        </div>


                                    </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td><?php echo e(__('lang.Signature')); ?></td>
                                    <td>
                                        <a href="<?php echo e(urlencode(utf8_encode(asset('Signature/'.$employee->Signature)))); ?>">
                                            <img src="<?php echo e(utf8_encode(asset('Signature/'.$employee->Signature))); ?>"
                                                 alt="<?php echo e($employee->Signature); ?>" style="width: 100px; height: 100px"></a>

                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input class="btn btn-primary"  type="file" name="Signature" value="upload" >
                                        </div>


                                    </td>
                                </tr>
                        </tbody>
                    </table>
                    <script>
                        $(document).ready(function () {
                            $('#dataTables-example').DataTable({
                                responsive: true
                            });

                        });

                        function del($url) {
                            var $ret_val = confirm('Yes Or No');
                            if ($ret_val == true) {
                                window.location.href = $url;
                            }

                        }
                    </script>


                </div>
                <div class="panel-footer">
                    <input type="submit" class="btn btn-primary" value="Save">
                </div>
            </div>

        </div>
    </form>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('subject'); ?>
    Subject !!!!!!!!!!!
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.Admin_app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* H:\root\home\eritqaaacademy-001\www\crm\CRMV3\crmlaraveltest\resources\views/Crm/Employee/Update_profile_view.blade.php */ ?>