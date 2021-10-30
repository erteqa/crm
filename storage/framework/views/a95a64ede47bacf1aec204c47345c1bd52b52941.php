<div class="col-lg-6">
    <a class="btn btn-warning"
       href="<?php echo e(route('Customer.SendEmail',['id'=>$Customers->id])); ?>"
       target="_blank"><?php echo e(__('lang.SendEmail')); ?></a>
    <a class="btn btn-primary"
       href="<?php echo e(route('Customer.SendSms',['id'=>$Customers->id])); ?>"
       target="_blank"><?php echo e(__('lang.SendSms')); ?></a>
    <?php if(\App\Http\Controllers\Admin\Customer_cont::permision($Customers,'Update')): ?>
        <a class="btn btn-success"
           href="<?php echo e(route('Customer.Update',['id'=>$Customers->id])); ?>"
           target="_blank"><?php echo e(__('lang.Update')); ?></a>
    <?php endif; ?>
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
                       value="<?php echo e($Customers->name); ?>" readonly>
            </div>
            <div class="form-group">
                <label><?php echo e(__('lang.Phone')); ?></label>
                <input type="tel" name="phone"
                       class="form-control<?php echo e($errors->has('phone') ? ' is-invalid' : ''); ?>"
                       value="<?php echo e($Customers->phone); ?>"
                       placeholder="<?php echo e(__('lang.Phone')); ?>" readonly>
            </div>
            <div class="form-group">
                <label><?php echo e(__('lang.email')); ?></label>
                <input type="email" name="phone"
                       class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>"
                       value="<?php echo e($Customers->email); ?>"
                       placeholder="<?php echo e(__('lang.email')); ?>" readonly>
            </div>
            <div class="form-group">
                <label><?php echo e(__('lang.Address')); ?></label>
                <input type="text" name="address"
                       class="form-control<?php echo e($errors->has('address') ? ' is-invalid' : ''); ?>"
                       value="<?php echo e($Customers->address); ?>"
                       placeholder="<?php echo e(__('lang.Address')); ?>" readonly>
            </div>
            <div class="form-group">
                <?php if(auth()->user()->department_id != 3 or auth()->user()->department_id != 6 ): ?>
                    <label><?php echo e(__('lang.Company')); ?></label>
                <?php else: ?>
                    <label><?php echo e(__('lang.Degreestudy')); ?></label>
                <?php endif; ?>

                <input type="text" name="company"
                       class="form-control<?php echo e($errors->has('company') ? ' is-invalid' : ''); ?>"
                       value="<?php echo e($Customers->company); ?>"
                       placeholder="<?php echo e(__('lang.Company')); ?>" readonly>
            </div>
            <div class="form-group">
                <?php if(auth()->user()->department_id == 3 or auth()->user()->department_id == 6 or auth()->user()->department_id == 9  or auth()->user()->department_id == 8): ?>
                    <label><?php echo e(__('lang.tax')); ?></label>
                <?php else: ?>
                    <label><?php echo e(__('lang.Taxid')); ?></label>
                <?php endif; ?>
                <input type="text" name="taxid"
                       class="form-control<?php echo e($errors->has('taxid') ? ' is-invalid' : ''); ?>"
                       value="<?php echo e($Customers->taxid); ?>"
                       placeholder="<?php echo e(__('lang.Taxid')); ?>" readonly>
            </div>
            <div class="form-group">
                <label><?php echo e(__('lang.Company_Taxid')); ?></label>
                <input type="text" name="company_taxid"
                       class="form-control<?php echo e($errors->has('company_taxid') ? ' is-invalid' : ''); ?>"
                       value="<?php echo e($Customers->company_taxid); ?>"
                       placeholder="<?php echo e(__('lang.Company_Taxid')); ?>" readonly>
            </div>
            <div class="form-group">
                <label><?php echo e(__('lang.Group_Name')); ?></label>
                <input type="text" name="company_taxid"
                       class="form-control<?php echo e($errors->has('company_taxid') ? ' is-invalid' : ''); ?>"
                       value="<?php echo e($Customers->Group->name); ?>"
                       placeholder="<?php echo e(__('lang.Company_Taxid')); ?>" readonly>
            </div>
            <div class="form-group">
                <label><?php echo e(__('lang.Nationality')); ?></label>
                <input type="text" name="nationality"
                       class="form-control<?php echo e($errors->has('nationality') ? ' is-invalid' : ''); ?>"
                       class="form-control" value="<?php echo e($Customers->nationality); ?>"
                       placeholder="<?php echo e(__('lang.Nationality')); ?>">
            </div>

            <div class="form-group">
                <label><?php echo e(__('lang.Passport_Number')); ?></label>
                <input type="text" name="passport_number"
                       class="form-control<?php echo e($errors->has('passport_number') ? ' is-invalid' : ''); ?>"
                       class="form-control" value="<?php echo e($Customers->passport_number); ?>"
                       placeholder="<?php echo e(__('lang.Passport_Number')); ?>">
            </div>
            <div class="form-group">
                <label><?php echo e(__('lang.Record_Number')); ?></label>
                <input type="text" name="record_number"
                       class="form-control<?php echo e($errors->has('record_number') ? ' is-invalid' : ''); ?>"
                       class="form-control" value="<?php echo e($Customers->record_number); ?>"
                       placeholder="<?php echo e(__('lang.Record_Number')); ?>">
            </div>
            <div class="form-group">
                <label><?php echo e(__('lang.Mersis_Number')); ?></label>
                <input type="text" name="mersis_number"
                       class="form-control<?php echo e($errors->has('mersis_number') ? ' is-invalid' : ''); ?>"
                       class="form-control" value="<?php echo e($Customers->mersis_number); ?>"
                       placeholder="<?php echo e(__('lang.Mersis_Number')); ?>">
            </div>
            <hr>
            <?php if(\App\Http\Controllers\Accounting\Invoice_cont::permision('vergi_view')): ?>
                <div class="form-group">
                    <label><?php echo e(__('lang.vergi_username')); ?></label>
                    <input type="text" name="vergi_username"
                           class="form-control<?php echo e($errors->has('vergi_username') ? ' is-invalid' : ''); ?>"
                           class="form-control" value="<?php echo e($Customers->vergi_username); ?>"
                           placeholder="<?php echo e(__('lang.vergi_username')); ?>">
                </div>
                <div class="form-group">
                    <label><?php echo e(__('lang.vergi_password')); ?></label>
                    <input type="text" name="vergi_password"
                           class="form-control<?php echo e($errors->has('vergi_password') ? ' is-invalid' : ''); ?>"
                           class="form-control" value="<?php echo e($Customers->vergi_password); ?>"
                           placeholder="<?php echo e(__('lang.vergi_password')); ?>">
                </div>
                <hr>
                <div class="form-group">
                    <label><?php echo e(__('lang.sgk_username')); ?></label>
                    <input type="text" name="sgk_username"
                           class="form-control<?php echo e($errors->has('sgk_username') ? ' is-invalid' : ''); ?>"
                           class="form-control" value="<?php echo e($Customers->sgk_username); ?>"
                           placeholder="<?php echo e(__('lang.sgk_username')); ?>">
                </div>
                <div class="form-group">
                    <label><?php echo e(__('lang.sgk_password')); ?></label>
                    <input type="text" name="sgk_password"
                           class="form-control<?php echo e($errors->has('sgk_password') ? ' is-invalid' : ''); ?>"
                           class="form-control" value="<?php echo e($Customers->sgk_password); ?>"
                           placeholder="<?php echo e(__('lang.sgk_password')); ?>">
                </div>
                <hr>
                <div class="form-group">
                    <label><?php echo e(__('lang.eimza_username')); ?></label>
                    <input type="text" name="eimza_username"
                           class="form-control<?php echo e($errors->has('eimza_username') ? ' is-invalid' : ''); ?>"
                           class="form-control" value="<?php echo e($Customers->eimza_username); ?>"
                           placeholder="<?php echo e(__('lang.eimza_username')); ?>">
                </div>
                <div class="form-group">
                    <label><?php echo e(__('lang.eimza_password')); ?></label>
                    <input type="text" name="eimza_password"
                           class="form-control<?php echo e($errors->has('eimza_password') ? ' is-invalid' : ''); ?>"
                           class="form-control" value="<?php echo e($Customers->eimza_password); ?>"
                           placeholder="<?php echo e(__('lang.eimza_password')); ?>">
                </div>
                <hr>
                <div class="form-group">
                    <label><?php echo e(__('lang.edevlet_username')); ?></label>
                    <input type="text" name="edevlet_username"
                           class="form-control<?php echo e($errors->has('edevlet_username') ? ' is-invalid' : ''); ?>"
                           class="form-control"
                           value="<?php echo e($Customers->edevlet_username); ?>"
                           placeholder="<?php echo e(__('lang.edevlet_username')); ?>">
                </div>
                <div class="form-group">
                    <label><?php echo e(__('lang.edevlet_password')); ?></label>
                    <input type="text" name="edevlet_password"
                           class="form-control<?php echo e($errors->has('edevlet_password') ? ' is-invalid' : ''); ?>"
                           class="form-control"
                           value="<?php echo e($Customers->edevlet_password); ?>"
                           placeholder="<?php echo e(__('lang.edevlet_password')); ?>">
                </div>
                <hr>
                <div class="form-group">
                    <label><?php echo e(__('lang.creat_comp')); ?></label>
                    <input type="text" name="creat_comp"
                           class="form-control<?php echo e($errors->has('creat_comp') ? ' is-invalid' : ''); ?>"
                           class="form-control" value="<?php echo e($Customers->creat_comp); ?>"
                           placeholder="<?php echo e(__('lang.creat_comp')); ?>">
                </div>
                <hr>

            <?php endif; ?>
            <div class="form-group">
                <label><?php echo e(__('lang.Tc')); ?></label>
                <input type="text" name="Tc"
                       class="form-control<?php echo e($errors->has('Tc') ? ' is-invalid' : ''); ?>"
                       class="form-control" value="<?php echo e($Customers->Tc); ?>"
                       placeholder="<?php echo e(__('lang.Tc')); ?>">
            </div>
        </div>
    </div>

</div>


<div class="col-lg-6">
    <div class="panel panel-primary">
        <div class="panel-heading">
            Customer Files
        </div>
        <div class="panel-body">
            <?php echo e(csrf_field()); ?>

            <table width="100%" class="table table-striped table-bordered table-hover"
                  >
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
                                
                                
                                
                                
                                <a href="<?php echo e(asset('Files/'.$file->path)); ?>" target="_blank">
                                    <img src="<?php echo e(asset('Images/'.'pdf image.jpg')); ?>"
                                         alt="pdf" style="width: 100px; height: 100px"></a>
                            </td>
                            <td>
                                <a href="<?php echo e(route('Downloads',['file'=>$file->path])); ?>">
                                    download</a>
                            </td>
                        </tr>
                    <?php elseif(strpos($file->name, '.docx') or strpos($file->name, '.doc')): ?>
                        <tr class="odd gradeX">
                            <td><?php echo e($file->name); ?></td>
                            <td>

                                <a href="<?php echo e(asset('Files/'.$file->path)); ?>" target="_blank">
                                    <img src="<?php echo e(asset('Images/'.'word.jpg')); ?>"
                                         alt="word" style="width: 100px; height: 100px"></a>
                            </td>
                            <td>
                                <a href="<?php echo e(route('Downloads',['file'=>$file->path])); ?>">
                                    download</a>
                            </td>
                        </tr>
                    <?php else: ?>
                        <tr class="odd gradeX">
                            <td><?php echo e($file->name); ?></td>
                            <td>
                                <a href="<?php echo e(asset('Files/'.$file->path)); ?>" target="_blank">
                                    <img src="<?php echo e(asset('Files/'.$file->path)); ?>"
                                         alt="Image"
                                         style="width: 100px; height: 100px" ></a>
                            </td>
                            <td>
                                <a href="<?php echo e(route('Downloads',['file'=>$file->path])); ?>">
                                    download</a>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <script>
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

<?php /* H:\root\home\eritqaaacademy-001\www\crm\CRMV3\crmlaraveltest\resources\views/info/cuinfo.blade.php */ ?>