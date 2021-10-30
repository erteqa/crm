<?php $__env->startSection('title'); ?>
    <?php echo e(__('Task Update')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <?php echo e(__('Customer Update')); ?>

            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label><?php echo e(__('name')); ?></label>
                    <input type="text"  readonly class="form-control"   value="<?php echo e(!is_null($Alert)?$Alert->name:''); ?>" required >
                </div>
                <div class="form-group">

                    <label><?php echo e(__('description')); ?></label>
                    <input type="text" readonly class="form-control"   value="<?php echo e(!is_null($Alert)?$Alert->description:''); ?>" required >
                </div>
            </div>
            <div class="panel-footer ">
                <a class="btn btn-danger"
                   <?php if(!is_null($Alert)): ?>
                   onclick="del('<?php echo e(route('Alert.Delete',['id'=>$Alert->id,'type'=>'A'])); ?>')"><?php echo e(__('Delete')); ?></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('subject'); ?>
    Subject !!!!!!!!!!!
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.Admin_app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* C:\dd\crmlaraveltest\resources\views/Crm/Alert/View_view.blade.php */ ?>