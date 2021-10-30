<?php $__env->startSection('title'); ?>
    <?php echo e(__('lang.Add_Customer')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<style>
    <?php if(app()->getLocale()=='ar'): ?>
        form {
        text-align: right;

    }
    label{
        float: right;

    }

    input {
        text-align: right;

    }

    textarea {
        text-align: right;
    }

    span {
        text-align: right;
    }

    .lolo {
        text-align: right;
        float: right;
    }

    .memo {
        text-align: right;
    }

    <?php else: ?>
     .memo {
        text-align: left;
    }

    .lolo {
        text-align: left;
        float: left;
    }

    <?php endif; ?>
        body {
        font-family: Arial, Helvetica, sans-serif;
    }

    .myBox1 {

        border: none;
        font: 14px/24px sans-serif;
        height: 582px;
        overflow-y: scroll;

    }

    /* The Modal (background) */
    .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        padding-top: 100px; /* Location of the box */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0, 0, 0); /* Fallback color */
        background-color: rgba(0, 0, 0, 0.4); /* Black w/ opacity */
    }

    /* Modal Content */
    .modal-content {
        background-color: #fefefe;
        margin: auto;
        padding: 20px;
        border: 1px solid #888;
        width: 50%;
    }

    /* The Close Button */
    .close {
        color: #aaaaaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }

    .Mytextarea {
        border-color: #ea2612;
    }

    .Mytextarea:focus {
        border-color: #ea0e20;
        border: 1px;
    }

    .thumbnail {
        padding: 0px;
    }

    .panel {
        position: relative;
    }

    .panel > .panel-heading:after, .panel > .panel-heading:before {
        position: absolute;
        top: 11px;
        left: -16px;
        right: 100%;
        width: 0;
        height: 0;
        display: block;
        content: " ";
        border-color: transparent;
        border-style: solid solid outset;
        pointer-events: none;
    }

    .panel > .panel-heading:after {
        border-width: 7px;
        border-right-color: #f7f7f7;
        margin-top: 1px;
        margin-left: 2px;
    }

    .panel > .panel-heading:before {
        border-right-color: #ddd;
        border-width: 8px;
    }
</style>
<div >
    <form method="post" enctype="multipart/form-data">
        <div class="container col-lg-8" style="position: center">
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
                        <?php if(auth()->user()->pattern==1 ): ?>
                            <label><?php echo e(__('lang.company')); ?></label>
                        <?php else: ?>
                            <label><?php echo e(__('lang.Degreestudy')); ?></label>
                        <?php endif; ?>

                        <input type="text" name="company" class="form-control<?php echo e($errors->has('company') ? ' is-invalid' : ''); ?>"  class="form-control" placeholder="<?php echo e(__('lang.Company')); ?>">
                    </div>
                    <div class="form-group">
                        <?php if(auth()->user()->pattern==1 ): ?>
                            <label><?php echo e(__('lang.Taxid')); ?></label>
                        <?php else: ?>
                            <label><?php echo e(__('lang.tax')); ?></label>
                        <?php endif; ?>

                        <input type="text" name="taxid" class="form-control<?php echo e($errors->has('taxid') ? ' is-invalid' : ''); ?>"  class="form-control" placeholder="<?php echo e(__('lang.Taxid')); ?>">
                    </div>
                    <div class="form-group">
                        <?php if(auth()->user()->pattern==1 ): ?>
                            <label><?php echo e(__('lang.Company_Taxid')); ?></label>
                        <?php else: ?>
                            <label><?php echo e(__('lang.school')); ?></label>
                        <?php endif; ?>
                        <input type="text" name="company_taxid" class="form-control<?php echo e($errors->has('company_taxid') ? ' is-invalid' : ''); ?>"  class="form-control" placeholder="<?php echo e(__('lang.Company_Taxid')); ?>">
                    </div>

                    <div class="form-group">
                        <label><?php echo e(__('lang.Group_Name')); ?></label>
                        <select class="js-example-basic-single form-control" name="group_id">
                            
                            <?php if(!is_null($groups)): ?>
                                <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(\App\Http\Controllers\Admin\Group_cont::permision($group,'Add')|| \App\Http\Controllers\Admin\Group_cont::permision($group,'View')): ?>
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
                        <label><?php echo e(__('lang.creat_comp')); ?></label>
                        <input type="date" name="creat_comp" class="form-control"
                               placeholder="<?php echo e(__('lang.creat_comp')); ?>">
                    </div>
                    <div class="form-group">
                        <?php if(auth()->user()->pattern==1 ): ?>
                            <label><?php echo e(__('lang.record_number')); ?></label>
                        <?php else: ?>
                            <label><?php echo e(__('lang.avarage')); ?></label>
                        <?php endif; ?>
                        <input type="text" name="record_number" class="form-control<?php echo e($errors->has('record_number') ? ' is-invalid' : ''); ?>"  class="form-control" placeholder="<?php echo e(__('lang.Record_Number')); ?>">
                    </div>
                    <div class="form-group">
                        <?php if(auth()->user()->pattern==1 ): ?>
                            <label><?php echo e(__('lang.Mersis_Number')); ?></label>
                        <?php else: ?>
                            <label><?php echo e(__('lang.depart')); ?></label>
                        <?php endif; ?>
                        <input type="text" name="mersis_number" class="form-control<?php echo e($errors->has('mersis_number') ? ' is-invalid' : ''); ?>"  class="form-control" placeholder="<?php echo e(__('lang.Mersis_Number')); ?>">
                    </div>

                    <div class="form-group">
                        <input class="btn btn-primary" multiple="multiple" type="file" name="files[]" value="upload">
                    </div>
                    <div class="form-group">
                        <label><?php echo e(__('lang.Role')); ?></label>
                        <select class="js-example-basic-single form-control" name="rolename" required>
                            <option value="">Empty</option>
                            <?php if(!is_null($roles)): ?>
                                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option  value="<?php echo e($role->name); ?>" ><?php echo e($role->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </select>
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
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('subject'); ?>
    <?php echo e(__('lang.Subject')); ?>}}
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.Admin_app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* H:\root\home\eritqaaacademy-001\www\crm\CRMV3\crmlaraveltest\resources\views/Crm/Customer/Add_view.blade.php */ ?>