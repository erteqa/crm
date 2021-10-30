<?php $__env->startSection('title'); ?>
    <?php echo e(__('Customer Update')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <form method="post">
    <div class="col-lg-4">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <?php echo e(__('Customer Update')); ?>

            </div>
            <div class="panel-body">

                <div class="form-group">
                    <?php echo e(csrf_field()); ?>

                    <label><?php echo e(__('Name')); ?></label>
                    <input type="text" name="name" placeholder="<?php echo e(__('User Name')); ?>" class="form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>"   value="<?php echo e($customer->name); ?>" required >
                </div>
                <div class="form-group">
                    <label><?php echo e(__('Phone')); ?></label>
                    <input type="tel"  name="phone" class="form-control<?php echo e($errors->has('phone') ? ' is-invalid' : ''); ?>"  value="<?php echo e($customer->phone); ?>" placeholder="<?php echo e(__('Phone')); ?>">
                </div>
                <div class="form-group">
                    <label><?php echo e(__('Address')); ?></label>
                    <input type="text" name="address" class="form-control<?php echo e($errors->has('address') ? ' is-invalid' : ''); ?>"   value="<?php echo e($customer->address); ?>" placeholder="<?php echo e(__('Address')); ?>">
                </div>
                <div class="form-group">
                    <label><?php echo e(__('Company')); ?></label>
                    <input type="text" name="company" class="form-control<?php echo e($errors->has('company') ? ' is-invalid' : ''); ?>"  value="<?php echo e($customer->company); ?>" placeholder="<?php echo e(__('Company')); ?>">
                </div>
                <div class="form-group">
                    <label><?php echo e(__('Taxid')); ?></label>
                    <input type="text" name="taxid" class="form-control<?php echo e($errors->has('taxid') ? ' is-invalid' : ''); ?>"  value="<?php echo e($customer->taxid); ?>" placeholder="<?php echo e(__('Taxid')); ?>">
                </div>
                <div class="form-group">
                    <label><?php echo e(__('Company Taxid')); ?></label>
                    <input type="text" name="company_taxid" class="form-control<?php echo e($errors->has('company_taxid') ? ' is-invalid' : ''); ?>"  value="<?php echo e($customer->company_taxid); ?>" placeholder="<?php echo e(__('Company Taxid')); ?>">
                </div>

                <div class="form-group">
                    <label><?php echo e(__('Group Name')); ?></label>
                    <select class="js-example-basic-single form-control" name="group_id">
                        <option value="">Empty</option>
                        <?php if(!is_null($groups)): ?>
                            <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option <?php echo e($group->id==$customer->Group->id?'selected="selected"':''); ?>  value="<?php echo e($group->id); ?>" ><?php echo e($group->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label><?php echo e(__('Nationality')); ?></label>
                    <input type="text" name="nationality" class="form-control<?php echo e($errors->has('nationality') ? ' is-invalid' : ''); ?>"  class="form-control" value="<?php echo e($customer->nationality); ?>" placeholder="<?php echo e(__('Nationality')); ?>">
                </div>

                <div class="form-group">
                    <label><?php echo e(__('Passport Number')); ?></label>
                    <input type="text" name="passport_number" class="form-control<?php echo e($errors->has('passport_number') ? ' is-invalid' : ''); ?>"  class="form-control" value="<?php echo e($customer->passport_number); ?>" placeholder="<?php echo e(__('Passport Number')); ?>">
                </div>
                <div class="form-group">
                    <label><?php echo e(__('Record Number')); ?></label>
                    <input type="text" name="record_number" class="form-control<?php echo e($errors->has('record_number') ? ' is-invalid' : ''); ?>"  class="form-control" value="<?php echo e($customer->record_number); ?>" placeholder="<?php echo e(__('Record Number')); ?>">
                </div>
                <div class="form-group">
                    <label><?php echo e(__('Mersis Number')); ?></label>
                    <input type="text" name="mersis_number" class="form-control<?php echo e($errors->has('mersis_number') ? ' is-invalid' : ''); ?>"  class="form-control" value="<?php echo e($customer->mersis_number); ?>" placeholder="<?php echo e(__('Mersis Number')); ?>">
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
                $('.js-example-basic-single').select2();
            });
        </script>
    </form>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('subject'); ?>
    Subject !!!!!!!!!!!
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.Admin_app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* C:\xampp\htdocs\crmlaravel\resources\views/Crm/Customer/Update_view.blade.php */ ?>