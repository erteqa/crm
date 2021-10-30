<?php $__env->startSection('title'); ?>
    <?php echo e(__('Add Customer')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <form method="post">
    <div class="col-lg-10">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <?php echo e(__('Add Customer')); ?>

            </div>
            <div class="flash-message">
                <?php $__currentLoopData = ['danger', 'warning', 'success', 'info']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(Session::has('alert-' . $msg)): ?>

                        <p class="alert alert-<?php echo e($msg); ?>"><?php echo e(Session::get('alert-' . $msg)); ?> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="panel-body">

               <div class="form-group">
                   <?php echo e(csrf_field()); ?>

                   <label><?php echo e(__('Name')); ?></label>
                   <input type="text" name="name" placeholder="<?php echo e(__('User Name')); ?>" class="form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>"   value="<?php echo e(old('name')); ?>" required >
               </div>
                <div class="form-group">
                    <label><?php echo e(__('Phone')); ?></label>
                    <input type="tel"  name="phone" class="form-control<?php echo e($errors->has('phone') ? ' is-invalid' : ''); ?>" class="form-control" placeholder="<?php echo e(__('Phone')); ?>">
                </div>
                <div class="form-group">
                    <label><?php echo e(__('Email')); ?></label>
                    <input type="email"  name="email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" class="form-control" placeholder="<?php echo e(__('Email')); ?>">
                </div>
                <div class="form-group">
                    <label><?php echo e(__('Address')); ?></label>
                    <input type="text" name="address" class="form-control<?php echo e($errors->has('address') ? ' is-invalid' : ''); ?>"  class="form-control" placeholder="<?php echo e(__('Address')); ?>">
                </div>
                <div class="form-group">
                    <label><?php echo e(__('Company')); ?></label>
                    <input type="text" name="company" class="form-control<?php echo e($errors->has('company') ? ' is-invalid' : ''); ?>"  class="form-control" placeholder="<?php echo e(__('Company')); ?>">
                </div>
                <div class="form-group">
                    <label><?php echo e(__('Taxid')); ?></label>
                    <input type="text" name="taxid" class="form-control<?php echo e($errors->has('taxid') ? ' is-invalid' : ''); ?>"  class="form-control" placeholder="<?php echo e(__('Taxid')); ?>">
                </div>
                <div class="form-group">
                    <label><?php echo e(__('Company Taxid')); ?></label>
                    <input type="text" name="company_taxid" class="form-control<?php echo e($errors->has('company_taxid') ? ' is-invalid' : ''); ?>"  class="form-control" placeholder="<?php echo e(__('Company Taxid')); ?>">
                </div>

                <div class="form-group">
                    <label><?php echo e(__('Group Name')); ?></label>
                    <select class="js-example-basic-single form-control" name="group_id">
                        <option value="">Empty</option>
                        <?php if(!is_null($groups)): ?>
                        <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option  value="<?php echo e($group->id); ?>" ><?php echo e($group->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label><?php echo e(__('Nationality')); ?></label>
                    <input type="text" name="nationality" class="form-control<?php echo e($errors->has('nationality') ? ' is-invalid' : ''); ?>"  class="form-control" placeholder="<?php echo e(__('Nationality')); ?>">
                </div>
                <div class="form-group">
                    <label><?php echo e(__('Passport Number')); ?></label>
                    <input type="text" name="passport_number" class="form-control<?php echo e($errors->has('passport_number') ? ' is-invalid' : ''); ?>"  class="form-control" placeholder="<?php echo e(__('Passport Number')); ?>">
                </div>
                <div class="form-group">
                    <label><?php echo e(__('Passport Number')); ?></label>
                    <input type="text" name="passport_number" class="form-control<?php echo e($errors->has('passport_number') ? ' is-invalid' : ''); ?>"  class="form-control" placeholder="<?php echo e(__('Passport Number')); ?>">
                </div>
                <div class="form-group">
                    <label><?php echo e(__('Record Number')); ?></label>
                    <input type="text" name="record_number" class="form-control<?php echo e($errors->has('record_number') ? ' is-invalid' : ''); ?>"  class="form-control" placeholder="<?php echo e(__('Record Number')); ?>">
                </div>
                <div class="form-group">
                    <label><?php echo e(__('Mersis Number')); ?></label>
                    <input type="text" name="mersis_number" class="form-control<?php echo e($errors->has('mersis_number') ? ' is-invalid' : ''); ?>"  class="form-control" placeholder="<?php echo e(__('Mersis Number')); ?>">
                </div>
            </div>
            <div class="panel-footer">
               <input type="submit" class="btn btn-primary" value="Save">
            </div>
        </div>
    </div>
        <script>
            $(document).ready(function() {
                $('.js-example-basic-single').select2();
            });
        </script>
    </form>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('subject'); ?>
    <?php echo e(__('Subject')); ?>}}
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.Admin_app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* C:\xampp\htdocs\crmlaravel\resources\views/Crm/Customer/Add_view.blade.php */ ?>