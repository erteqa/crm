<?php $__env->startSection('title'); ?>
    <?php echo e(__('Add Customer')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <form method="post">
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <?php echo e(__('Add Role')); ?>

                </div>
                <div class="flash-message">
                    <?php $__currentLoopData = ['danger', 'warning', 'success', 'info']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(Session::has('alert-' . $msg)): ?>

                            <p class="alert alert-<?php echo e($msg); ?>"><?php echo e(Session::get('alert-' . $msg)); ?> <a href="#"
                                                                                                     class="close"
                                                                                                     data-dismiss="alert"
                                                                                                     aria-label="close">&times;</a>
                            </p>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="panel-body">

                    <div class="form-group">
                        <?php echo e(csrf_field()); ?>

                        <label><?php echo e(__('Name')); ?></label>
                        <input type="text" name="name" placeholder="<?php echo e(__('Role Name')); ?>"
                               class="form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>"
                               value="<?php echo e($Role->name); ?>" required>
                    </div>
                    <div class="row">
                        <div class="panel-body">
                            <div class="col-lg-8" class=" table-responsive">
                                <table width="100%" class="table table-striped table-bordered table-hover"
                                       id="dataTables-example">
                                    <thead>
                                    <tr>

                                        <th>Permission Name</th>
                                        <th>Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $Permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($Permission->name); ?></td>
                                            <td><input type="checkbox" value="<?php echo e($Permission->id); ?>"
                                                       name="permission_id[]" <?php echo e($Role->hasPermissionTo($Permission->id)?'checked="checked"':''); ?>></td>

                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                            
                            
                            
                            
                            
                            
                            

                        </div>
                    </div>
                    <div class="panel-footer">
                        <input type="submit" class="btn btn-primary" value="Save">
                    </div>
                </div>
            </div>
            <script>
                $(document).ready(function() {
                    $('#dataTables-example').DataTable({
                        responsive: true,
                        "aLengthMenu": [500],
                    });

                });
                $(document).ready(function () {
                    $('.js-example-basic-single').select2();
                });
            </script>
        </div>
    </form>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('subject'); ?>
    <?php echo e(__('Subject')); ?>}}
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.Admin_app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* C:\dd\crmlaraveltest\resources\views/Crm/Role/Update_view.blade.php */ ?>