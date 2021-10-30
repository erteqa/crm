<?php $__env->startSection('title'); ?>
    <?php echo e(__('lang.Customer_View')); ?>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div>

        <form method="post">
            <div class="col-lg-4">
                <a class="btn btn-warning"
                   href="<?php echo e(route('Customer.SendEmail',['id'=>$customer->id])); ?>"><?php echo e(__('lang.SendEmail')); ?></a>
                 <a class="btn btn-primary" href="<?php echo e(route('Customer.SendSms',['id'=>$customer->id])); ?>"><?php echo e(__('lang.SendSms')); ?></a>
                <div class="panel panel-primary">

                    <div class="panel-heading">
                        <?php echo e(__('lang.Customer_View')); ?>



                       </div>
                    <div class="panel-body">

                        <div class="form-group">
                            <?php echo e(csrf_field()); ?>

                            <label><?php echo e(__('lang.Name')); ?></label>
                            <input type="text" name="name" placeholder="<?php echo e(__('lang.User_Name')); ?>"
                                   class="form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>"
                                   value="<?php echo e($customer->name); ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label><?php echo e(__('lang.Phone')); ?></label>
                            <input type="tel" name="phone"
                                   class="form-control<?php echo e($errors->has('phone') ? ' is-invalid' : ''); ?>"
                                   value="<?php echo e($customer->phone); ?>" placeholder="<?php echo e(__('lang.Phone')); ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label><?php echo e(__('lang.Address')); ?></label>
                            <input type="text" name="address"
                                   class="form-control<?php echo e($errors->has('address') ? ' is-invalid' : ''); ?>"
                                   value="<?php echo e($customer->address); ?>" placeholder="<?php echo e(__('lang.Address')); ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label><?php echo e(__('lang.Company')); ?></label>
                            <input type="text" name="company"
                                   class="form-control<?php echo e($errors->has('company') ? ' is-invalid' : ''); ?>"
                                   value="<?php echo e($customer->company); ?>" placeholder="<?php echo e(__('lang.Company')); ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label><?php echo e(__('lang.Taxid')); ?></label>
                            <input type="text" name="taxid"
                                   class="form-control<?php echo e($errors->has('taxid') ? ' is-invalid' : ''); ?>"
                                   value="<?php echo e($customer->taxid); ?>" placeholder="<?php echo e(__('lang.Taxid')); ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label><?php echo e(__('lang.Company_Taxid')); ?></label>
                            <input type="text" name="company_taxid"
                                   class="form-control<?php echo e($errors->has('company_taxid') ? ' is-invalid' : ''); ?>"
                                   value="<?php echo e($customer->company_taxid); ?>" placeholder="<?php echo e(__('lang.Company_Taxid')); ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label><?php echo e(__('lang.Group_Name')); ?></label>
                            <input type="text" name="company_taxid"
                                   class="form-control<?php echo e($errors->has('company_taxid') ? ' is-invalid' : ''); ?>"
                                   value="<?php echo e($customer->Group->name); ?>" placeholder="<?php echo e(__('lang.Company_Taxid')); ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label><?php echo e(__('lang.Nationality')); ?></label>
                            <input type="text" name="nationality"
                                   class="form-control<?php echo e($errors->has('nationality') ? ' is-invalid' : ''); ?>"
                                   class="form-control" value="<?php echo e($customer->nationality); ?>"
                                   placeholder="<?php echo e(__('lang.Nationality')); ?>">
                        </div>

                        <div class="form-group">
                            <label><?php echo e(__('lang.Passport_Number')); ?></label>
                            <input type="text" name="passport_number"
                                   class="form-control<?php echo e($errors->has('passport_number') ? ' is-invalid' : ''); ?>"
                                   class="form-control" value="<?php echo e($customer->passport_number); ?>"
                                   placeholder="<?php echo e(__('lang.Passport_Number')); ?>">
                        </div>
                        <div class="form-group">
                            <label><?php echo e(__('lang.Record_Number')); ?></label>
                            <input type="text" name="record_number"
                                   class="form-control<?php echo e($errors->has('record_number') ? ' is-invalid' : ''); ?>"
                                   class="form-control" value="<?php echo e($customer->record_number); ?>"
                                   placeholder="<?php echo e(__('lang.Record_Number')); ?>">
                        </div>
                        <div class="form-group">
                            <label><?php echo e(__('lang.Mersis_Number')); ?></label>
                            <input type="text" name="mersis_number"
                                   class="form-control<?php echo e($errors->has('mersis_number') ? ' is-invalid' : ''); ?>"
                                   class="form-control" value="<?php echo e($customer->mersis_number); ?>"
                                   placeholder="<?php echo e(__('lang.Mersis_Number')); ?>">
                        </div>
                        <hr>
                        <?php if(\App\Http\Controllers\Accounting\Invoice_cont::permision('vergi_view')): ?>
                            <div class="form-group">
                                <label><?php echo e(__('lang.vergi_username')); ?></label>
                                <input type="text" name="vergi_username"
                                       class="form-control<?php echo e($errors->has('vergi_username') ? ' is-invalid' : ''); ?>"
                                       class="form-control" value="<?php echo e($customer->vergi_username); ?>"
                                       placeholder="<?php echo e(__('lang.vergi_username')); ?>">
                            </div>
                            <div class="form-group">
                                <label><?php echo e(__('lang.vergi_password')); ?></label>
                                <input type="text" name="vergi_password"
                                       class="form-control<?php echo e($errors->has('vergi_password') ? ' is-invalid' : ''); ?>"
                                       class="form-control" value="<?php echo e($customer->vergi_password); ?>"
                                       placeholder="<?php echo e(__('lang.vergi_password')); ?>">
                            </div>
                            <hr>
                            <div class="form-group">
                                <label><?php echo e(__('lang.sgk_username')); ?></label>
                                <input type="text" name="sgk_username"
                                       class="form-control<?php echo e($errors->has('sgk_username') ? ' is-invalid' : ''); ?>"
                                       class="form-control" value="<?php echo e($customer->sgk_username); ?>"
                                       placeholder="<?php echo e(__('lang.sgk_username')); ?>">
                            </div>
                            <div class="form-group">
                                <label><?php echo e(__('lang.sgk_password')); ?></label>
                                <input type="text" name="sgk_password"
                                       class="form-control<?php echo e($errors->has('sgk_password') ? ' is-invalid' : ''); ?>"
                                       class="form-control" value="<?php echo e($customer->sgk_password); ?>"
                                       placeholder="<?php echo e(__('lang.sgk_password')); ?>">
                            </div>
                            <hr>
                            <div class="form-group">
                                <label><?php echo e(__('lang.eimza_username')); ?></label>
                                <input type="text" name="eimza_username"
                                       class="form-control<?php echo e($errors->has('eimza_username') ? ' is-invalid' : ''); ?>"
                                       class="form-control" value="<?php echo e($customer->eimza_username); ?>"
                                       placeholder="<?php echo e(__('lang.eimza_username')); ?>">
                            </div>
                            <div class="form-group">
                                <label><?php echo e(__('lang.eimza_password')); ?></label>
                                <input type="text" name="eimza_password"
                                       class="form-control<?php echo e($errors->has('eimza_password') ? ' is-invalid' : ''); ?>"
                                       class="form-control" value="<?php echo e($customer->eimza_password); ?>"
                                       placeholder="<?php echo e(__('lang.eimza_password')); ?>">
                            </div>
                            <hr>
                            <div class="form-group">
                                <label><?php echo e(__('lang.edevlet_username')); ?></label>
                                <input type="text" name="edevlet_username"
                                       class="form-control<?php echo e($errors->has('edevlet_username') ? ' is-invalid' : ''); ?>"
                                       class="form-control" value="<?php echo e($customer->edevlet_username); ?>"
                                       placeholder="<?php echo e(__('lang.edevlet_username')); ?>">
                            </div>
                            <div class="form-group">
                                <label><?php echo e(__('lang.edevlet_password')); ?></label>
                                <input type="text" name="edevlet_password"
                                       class="form-control<?php echo e($errors->has('edevlet_password') ? ' is-invalid' : ''); ?>"
                                       class="form-control" value="<?php echo e($customer->edevlet_password); ?>"
                                       placeholder="<?php echo e(__('lang.edevlet_password')); ?>">
                            </div>
                            <hr>


                        <?php endif; ?>
                        <div class="form-group">
                            <label><?php echo e(__('lang.Tc')); ?></label>
                            <input type="text" name="Tc"
                                   class="form-control<?php echo e($errors->has('Tc') ? ' is-invalid' : ''); ?>"
                                   class="form-control" value="<?php echo e($customer->Tc); ?>"
                                   placeholder="<?php echo e(__('lang.Tc')); ?>">
                        </div>
                    </div>

                </div>
                <div class="panel-footer">

                </div>
            </div>
            <script>
                $(document).ready(function () {
                    $('.js-example-basic-single').select2();
                });
            </script>
        </form>
        <form method="post" action="<?php echo e(route('Uploadfile',['id'=>$customer->id])); ?>" enctype="multipart/form-data">
            <div class="col-lg-8">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Customer Files
                    </div>
                    <div class="panel-body">
                        <?php echo e(csrf_field()); ?>

                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>
                                <th><?php echo e(__('lang.Name_file')); ?></th>
                                <th><?php echo e(__('lang.file')); ?></th>
                                <th><?php echo e(__('lang.Action')); ?></th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                                <?php if(strpos($file->name, '.pdf')): ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo e($file->name); ?></td>
                                        <td>
                                            
                                            
                                            
                                            
                                            <a href="<?php echo e(asset('Files/'.$file->path)); ?>">
                                                <img src="<?php echo e(asset('Images/'.'pdf image.jpg')); ?>"

                                                     alt="pdf"   style="width: 100px; height: 100px" ></a>


                                        </td>
                                        <td>
                                            <a href="<?php echo e(route('Downloads',['file'=>$file->path])); ?>"> download</a>
                                                       </td>
                                    </tr>
                                <?php elseif(strpos($file->name, '.docx') or strpos($file->name, '.doc')): ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo e($file->name); ?></td>
                                        <td>

                                            <a href="<?php echo e(asset('Files/'.$file->path)); ?>">
                                                <img src="<?php echo e(asset('Images/'.'word.jpg')); ?>"

                                                     alt="pdf"   style="width: 100px; height: 100px" ></a>


                                        </td>
                                        <td>
                                            <a href="<?php echo e(route('Downloads',['file'=>$file->path])); ?>"> download</a>
                                              </td>
                                    </tr>
                                <?php else: ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo e($file->name); ?></td>
                                        <td>
                                            <a href="<?php echo e(asset('Files/'.$file->path)); ?>">
                                                <img src="<?php echo e(asset('Files/'.$file->path)); ?>"
                                                     alt="Image" style="width: 100px; height: 100px"></a>
                                        </td>
                                        <td>
                                            <a href="<?php echo e(route('Downloads',['file'=>$file->path])); ?>"> download</a>

                                           </td>
                                    </tr>
                                <?php endif; ?>


                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </tbody>
                        </table>
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


                    </div>
                    <div class="panel-footer">

                    </div>
                </div>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('subject'); ?>
    Subject !!!!!!!!!!!
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.Admin_app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* C:\dd\crmlaraveltest\resources\views/Crm/Customer/View_view.blade.php */ ?>