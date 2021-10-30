<?php $__env->startSection('content'); ?>




                    <form class="payment" method="post" action="">
                        <?php echo e(csrf_field()); ?>

                        <div class="row">
                            <div class="col-xs-6">
                                <div class="input-group">
                                    <div class="input-group-addon"><?php echo e(__('TL')); ?></div>
                                    <input type="text" id="amount" class="form-control" placeholder="Total Amount" name="amount"
                                           <?php echo $rming = $invoice['total'] - $invoice['pamnt']; ?>


                                           id="rmpay" value="<?php echo e($rming<0?0:$rming); ?>">
                                </div>

                            </div>
                            <div class="col-xs-6">
                                <div class="input-group">
                                    <div class="input-group-addon"><span class="icon-calendar4"
                                                                         aria-hidden="true"></span></div>
                                    <input type="text" class="form-control required" id="paydate"
                                           placeholder="Billing Date" name="paydate" value="<?php echo e(date('Y-m-d')); ?>"
                                           data-provide="datepicker">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12 mb-1"><label
                                        for="pmethod"><?php echo e(__('lang.Payment_Method')); ?></label>
                                <select name="pmethod"  id="pmethod" class="form-control mb-1">
                                    <option value="Cash"><?php echo e(__('lang.Cash')); ?></option>
                                    <option value="Card"><?php echo e(__('lang.Card')); ?></option>
                                    <option value="Balance"><?php echo e(__('lang.Client_Balance')); ?></option>
                                    <option value="Bank"><?php echo e(__('lang.Bank')); ?></option>
                                </select>


                            </div>
                            <div class="row">
                                <div class="col-xs-12 mb-1"><label
                                            for="shortnote"><?php echo e(__('lang.Note')); ?></label>
                                    <input type="text" class="form-control"
                                           name="shortnote" placeholder="Short note" id="not"
                                           value="Payment for invoice #<?php echo e($invoice['tid']); ?>"></div>
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" class="form-control required"
                                       name="tid" id="invoiceid" value="<?php echo e($invoice['tid']); ?>">
                                <button type="button" class="btn btn-default"
                                        data-dismiss="modal"><?php echo e(__('lang.Close')); ?></button>
                                <input type="hidden" name="cid" value="<?php echo e($invoice['customer_id']); ?>">
                                <input type="hidden" name="eid" value="<?php echo e($invoice['user_id']); ?>">
                                <button type="submit" class="btn btn-primary"
                                        id="submitpayment"><?php echo e(('Make Payment')); ?></button>
                            </div>
                        </div>
                    </form>



<?php $__env->stopSection(); ?>
<?php $__env->startSection('subject'); ?>
    Subject !!!!!!!!!!!
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.Admin_app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* C:\dd\crmlaraveltest\resources\views/Acounting/Invoice/payment_view.blade.php */ ?>