<?php $__env->startSection('content'); ?>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h1><?php echo e(__('lang.import_Export_to_Excel_and_CSV')); ?> </h1>
            </div>
            <form method="post" action="<?php echo e(route('DownloadExcel')); ?>">
            <?php echo e(csrf_field()); ?>

            <div class="panel-body">
                <div class="form-group">
                    <label><?php echo e(__('lang.Group_Name')); ?></label>
                    <select class="js-example-basic-single form-control"  name="group_id">
                      <option value=""><?php echo e(__('lang.All_Customers')); ?></option>
                        <?php if(!is_null($groups)): ?>
                            <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(\App\Http\Controllers\Admin\Group_cont::permision($group,'View')|| $group->name =='Default'): ?>

                                        <option  value="<?php echo e($group->id); ?>"><?php echo e($group->name); ?></option>

                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label><?php echo e(__('lang.Type')); ?></label>
                    <select class="js-example-basic-single form-control" name="type">


                                    <option  value="xls">xls</option>
                                    <option  value="xlsx">xlsx</option>

                    </select>
                </div>
                <div class="panel-footer">
                    <input type="submit" class="btn btn-primary" value="Save">
                </div>
                   <table class="table table-striped">
                    <thead>
                    <tr>
                        <th><?php echo e(__('lang.FileName')); ?></th>
                        <th><?php echo e(__('lang.Delete')); ?></th>
                        <th><?php echo e(__('lang.Download')); ?></th>




                    </tr>
                    </thead>
                    <tbody id="activity">
                    <?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td> <a href="<?php echo e($file); ?>"><?php echo e($file); ?></a></td>
                            <td>
                                <a href="<?php echo e(route('Deletefilebackup',['file'=>$file])); ?>"><?php echo e(__('lang.Delete')); ?></a>
                            </td>
                            <td>
                                <a href="<?php echo e(route('Downloadsbackup',['file'=>$file])); ?>"> <?php echo e(__('lang.Download')); ?></a>
                            </td>


                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </tbody>
                </table>


            </div>

            </form>
        </div>
<script>
    $(document).ready(function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $("#customer-box").change(function () {

            var id = $(this).val();
            $.ajax({
                type: "post",
                url: '<?php echo e(route('GetCustomer')); ?>',
                data: {_token: '<?php echo e(csrf_token()); ?>', id: id},
                success: function (data) {

                    $("#customer-box-result").show();
                    $("#customer-box-result").html(data);


                }
            });
        });

    });
</script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('subject'); ?>
    Subject !!!!!!!!!!!
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.Admin_app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* H:\root\home\eritqaaacademy-001\www\crm\CRMV3\crmlaraveltest\resources\views/Backup/importExport.blade.php */ ?>