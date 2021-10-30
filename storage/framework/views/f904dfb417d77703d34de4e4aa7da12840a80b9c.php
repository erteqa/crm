<?php $__env->startSection('title'); ?>
    <?php echo e(__('lang.Customer_Summery')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <article class="content">
        <div class="card card-block">
            <div id="notify" class="alert alert-success" style="display:none;">
                <a href="#" class="close" data-dismiss="alert">&times;</a>

                <div class="message"></div>
            </div>
            <div class="grid_3 grid_4">
                <h6><?php echo e(__('lang.Customer') . __('Account Statement')); ?></h6>
                <hr>

                <div class="row sameheight-container">
                    <div class="col-md-6">
                        <div class="card card-block sameheight-item">

                            <form  method="post" >
                                <?php echo csrf_field(); ?>
                                <div class="form-group">
                                    <label><?php echo e(__('lang.Customers_Name')); ?></label>
                                    <select class="js-example-basic-single form-control" required name="customer_id">
                                        <option value="">Empty</option>

                                        <?php if(!is_null($customers)): ?>
                                            <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if(\App\Http\Controllers\Admin\Customer_cont::permision($customer,'View')): ?>
                                                    <?php if(!is_null($customer)): ?>
                                                        <option  value="<?php echo e($customer->id); ?>" ><?php echo e($customer->name); ?></option>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        <?php endif; ?>
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"
                                           for="pay_cat"><?php echo e(__('lang.Type')); ?></label>

                                    <div class="col-sm-9">
                                        <select name="trans_type" class="form-control">
                                            <option value='All'><?php echo e(__('lang.All_Transactions')); ?></option>
                                            <option value='Deposit'><?php echo e(__('lang.Deposit')); ?></option>
                                            <option value='Income'><?php echo e(__('lang.Payment')); ?></option>
                                        </select>


                                    </div>
                                </div>
                                <div class="form-group row">

                                    <label class="col-sm-3 control-label"
                                           for="sdate"><?php echo e(__('lang.From_Date')); ?></label>

                                    <div class="col-sm-4">
                                        <input type="text" class="form-control required"
                                               placeholder="Start Date" value="<?php echo e(date('Y/m/d',strtotime("-1 months"))); ?>" name="sdate" id="sdate"
                                               data-provide="datepicker" autocomplete="false">
                                    </div>
                                </div>
                                <div class="form-group row">

                                    <label class="col-sm-3 control-label"
                                           for="edate"><?php echo e(__('lang.To_Date')); ?></label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control required"
                                               placeholder="End Date" name="edate" value="<?php echo e(date('Y/m/d')); ?>"
                                               data-provide="datepicker" autocomplete="false">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="pay_cat"></label>

                                    <div class="col-sm-4">
                                        <input type="submit" class="btn btn-primary btn-md" value="View">
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </article>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>
    <script>
        $.fn.datepicker.defaults.format = "yyyy/mm/dd";
        $('.datepicker').datepicker({
            startDate: '-3d'
        });
    </script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('subject'); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.Admin_app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* H:\root\home\eritqaaacademy-001\www\crm\CRMV3\crmlaraveltest\resources\views/Acounting/Account_statement/create.blade.php */ ?>