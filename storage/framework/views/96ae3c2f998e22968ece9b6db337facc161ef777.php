<?php $__env->startSection('title'); ?>
    <?php echo e(__('Payment Update')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div>
        <form method="post">
            <?php echo e(csrf_field()); ?>

            <div class="col-lg-10">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <?php echo e(__('Add Payment')); ?>

                    </div>
                    <div class="flash-message">
                        <?php $__currentLoopData = ['danger', 'warning', 'success', 'info']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(Session::has('alert-' . $msg)): ?>

                                <p class="alert alert-<?php echo e($msg); ?>"><?php echo e(Session::get('alert-' . $msg)); ?> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="panel-body container">
                        <div class="row">
                            <div class="input-group col-sm-8">
                                <label
                                        for="amount"><?php echo e(__('lang.Date')); ?></label><br>

                                <input type="text" class="form-control required" id="paydate"
                                       placeholder="Billing Date" name="date" value="<?php echo e($payment->date); ?>"
                                       data-provide="datepicker" required>

                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-3">
                                <label
                                        for="amount"><?php echo e(__('lang.Amount')); ?></label><br>
                                <div class="">
                                    <input  type="number" placeholder="<?php echo e(__('lang.Enter_amount')); ?>"
                                            class="form-control" value="<?php echo e($payment->amount); ?>" name="amount"  required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-8">
                                <label><?php echo e(__('lang.Custmer')); ?></label>
                                <select class="js-example-basic-single form-control" id="customer_id"
                                        name="customer_id" required>
                                    <option value=""><?php echo e(__('lang.Payment')); ?></option>
                                    <?php if(!is_null($customers)): ?>
                                        <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(!is_null($customer)): ?>
                                                <option <?php echo e($payment->Customer->id==$customer->id?'selected="selected"':''); ?> value="<?php echo e($customer->id); ?>"><?php echo e($customer->name); ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-8">
                            <label><?php echo e(__('lang.Invoice_Number')); ?></label>

                            <div id="customer-box-result">
                                <select class="js-example-basic-single form-control" id="tid" name="invoice_id">
                                    <option value="<?php echo e($payment->Invoice->id); ?>"><?php echo e($payment->Invoice->tid); ?></option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 mb-1"><label
                                    for="shortnote"><?php echo e(__('lang.Note')); ?></label>
                            <input  type="text" class="form-control"
                                    name="note" value="<?php echo e($payment->note); ?>" placeholder="Short note" id="not"
                            ></div>
                    </div>

                    <div class="panel-footer">
                        <input type="submit" class="btn btn-primary" value="Save">
                    </div>
                </div>
            </div>
            <script type="text/javascript">
                $(document).ready(function () {
                    $.fn.datepicker.defaults.format = "yyyy/mm/dd";
                    $('.datepicker').datepicker({
                        startDate: '-3d'
                    });
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $("#customer").change(function () {

                        var id = $(this).val();
                        //  alert(id);
                        $.ajax({
                            type: "post",
                            url: '<?php echo e(route('GetTid')); ?>',
                            data: {_token: '<?php echo e(csrf_token()); ?>', id:id},
                            success: function (data) {
                                // alert(data);
                                $("#customer-box-result").show();
                                $("#customer-box-result").html(data);


                            }, error: function (xhr, ajaxOptions, thrownError) {
                                alert(xhr.status);
                                alert(thrownError);
                            }
                        });
                    });

                });
            </script>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('subject'); ?>
    Subject !!!!!!!!!!!
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.Admin_app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* C:\dd\crmlaraveltest\resources\views/Acounting/Payment/Update_view.blade.php */ ?>