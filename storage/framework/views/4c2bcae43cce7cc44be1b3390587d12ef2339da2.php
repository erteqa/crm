<?php $__env->startSection('content'); ?>
    <div class="app-content content container-fluid">
        <div class="content-wrapper">


            <div id="notify" class="alert alert-success" style="display:none;">
                <a href="#" class="close" data-dismiss="alert">&times;</a>

                <div class="message"></div>
            </div>
            <section class="card">
                <div class="card-block">
                    <h2 class="text-xs-center"><?php echo e(__('lang.Current_Balance_is').'  '. $coustomer['balance']); ?></h2>


                </div>
                <div class="card-block">
                    <form method="post" id="data_form" class="form-horizontal">

<?php echo e(csrf_field()); ?>

                        <div class="form-group row">

                            <label class="col-sm-2 col-form-label"
                                   for="amount"><?php echo e(__('lang.Amount')); ?></label>

                            <div class="col-sm-3">
                                <input type="number" placeholder="<?php echo e(__('lang.Enter_amount')); ?>"
                                       class="form-control margin-bottom" name="amount"  required>
                            </div>
                        </div>
                        <div class="form-group row">

                            <label class="col-sm-2 col-form-label"
                                   for="nots"><?php echo e(__('lang.Nots')); ?></label>

                            <div class="col-sm-3">
                                <input type="text" placeholder="<?php echo e(__('lang.Nots')); ?>"
                                       class="form-control margin-bottom " name="nots">
                            </div>
                        </div>
                        <div class="form-group row">

                            <label class="col-sm-2 col-form-label"
                                   for="name"></label>

                            <div class="col-sm-3">
                                <input type="submit" id="submit-data" class="btn btn-success margin-bottom"
                                       value="<?php echo e(__('lang.Add_Balance')); ?>" data-loading-text="Updating...">
                                <input type="hidden" value="" id="action-url">
                            </div>
                        </div>


                    </form>


                </div>

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th><?php echo e(__('lang.Amount')); ?></th>
                        <th><?php echo e(__('lang.Note')); ?></th>
                        <th><?php echo e(__('lang.Date')); ?></th>
                        <th><?php echo e(__('lang.Recharg_BY')); ?></th>


                    </tr>
                    </thead>
                    <tbody id="activity">
                    <?php $__currentLoopData = $trans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tran): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                    <td><?php echo e($tran->amount); ?></td>
                    <td><?php echo e($tran->note); ?></td>
                    <td><?php echo e($tran->created_at); ?></td>
                    <td><?php echo e($tran->User->name); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </tbody>
                </table>

            </section>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('subject'); ?>
    Subject !!!!!!!!!!!
<?php $__env->stopSection(); ?>


<?php echo $__env->make("layouts.Admin_app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* C:\dd\crmlaraveltest\resources\views/Crm/Customer/Recharg_view.blade.php */ ?>