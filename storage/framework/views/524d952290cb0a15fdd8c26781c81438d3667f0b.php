<?php $__env->startSection('title'); ?>
    <?php echo e(__('lang.Add_Customer')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <form method="post" enctype="multipart/form-data">
    <div class="col-lg-10">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <?php echo e(__('lang.Add_Customer')); ?>

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

                   <label><?php echo e(__('lang.Name')); ?></label>
                   <input type="text" name="name" placeholder="<?php echo e(__('lang.Name')); ?>" class="form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>"   value="<?php echo e(old('name')); ?>" required >
               </div>
                <div class="form-group">
                    <label><?php echo e(__('lang.Phone')); ?></label>
                    <input type="tel"  name="phone" class="form-control<?php echo e($errors->has('phone') ? ' is-invalid' : ''); ?>" class="form-control" placeholder="<?php echo e(__('lang.Phone')); ?>">
                </div>
                <div class="form-group">
                    <label><?php echo e(__('lang.Email')); ?></label>
                    <input type="email"  name="email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" class="form-control" placeholder="<?php echo e(__('lang.Email')); ?>">
                </div>
                <div class="form-group">
                    <label><?php echo e(__('lang.Address')); ?></label>
                    <input type="text" name="address" class="form-control<?php echo e($errors->has('address') ? ' is-invalid' : ''); ?>"  class="form-control" placeholder="<?php echo e(__('lang.Address')); ?>">
                </div>
                <div class="form-group">
                    <label><?php echo e(__('lang.Company')); ?></label>
                    <input type="text" name="company" class="form-control<?php echo e($errors->has('company') ? ' is-invalid' : ''); ?>"  class="form-control" placeholder="<?php echo e(__('lang.Company')); ?>">
                </div>
                <div class="form-group">
                    <label><?php echo e(__('lang.Taxid')); ?></label>
                    <input type="text" name="taxid" class="form-control<?php echo e($errors->has('taxid') ? ' is-invalid' : ''); ?>"  class="form-control" placeholder="<?php echo e(__('lang.Taxid')); ?>">
                </div>
                <div class="form-group">
                    <label><?php echo e(__('lang.Company_Taxid')); ?></label>
                    <input type="text" name="company_taxid" class="form-control<?php echo e($errors->has('company_taxid') ? ' is-invalid' : ''); ?>"  class="form-control" placeholder="<?php echo e(__('lang.Company_Taxid')); ?>">
                </div>

                <div class="form-group">
                    <label><?php echo e(__('lang.Group_Name')); ?></label>
                    <select class="js-example-basic-single form-control" name="group_id">
                        
                        <?php if(!is_null($groups)): ?>
                        <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(\App\Http\Controllers\Admin\Group_cont::permision($group,'Add')|| $group->name =='Default'): ?>
                            <option  value="<?php echo e($group->id); ?>" ><?php echo e($group->name); ?></option>
                                <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label><?php echo e(__('lang.Nationality')); ?></label>
                    <input type="text" name="nationality" class="form-control<?php echo e($errors->has('nationality') ? ' is-invalid' : ''); ?>"  class="form-control" placeholder="<?php echo e(__('lang.Nationality')); ?>">
                </div>
                <div class="form-group">
                    <label><?php echo e(__('lang.Passport_Number')); ?></label>
                    <input type="text" name="passport_number" class="form-control<?php echo e($errors->has('passport_number') ? ' is-invalid' : ''); ?>"  class="form-control" placeholder="<?php echo e(__('lang.Passport_Number')); ?>">
                </div>
                <div class="form-group">
                    <label><?php echo e(__('lang.Record_Number')); ?></label>
                    <input type="text" name="record_number" class="form-control<?php echo e($errors->has('record_number') ? ' is-invalid' : ''); ?>"  class="form-control" placeholder="<?php echo e(__('lang.Record_Number')); ?>">
                </div>
                <div class="form-group">
                    <label><?php echo e(__('lang.Mersis_Number')); ?></label>
                    <input type="text" name="mersis_number" class="form-control<?php echo e($errors->has('mersis_number') ? ' is-invalid' : ''); ?>"  class="form-control" placeholder="<?php echo e(__('lang.Mersis_Number')); ?>">
                </div>

                <div class="form-group">
                    <input class="btn btn-primary" multiple="multiple" type="file" name="files[]" value="upload">
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
    <?php echo e(__('lang.Subject')); ?>}}
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.Admin_app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* C:\dd\crmlaraveltest\resources\views/Crm/Customer/Add_view.blade.php */ ?>