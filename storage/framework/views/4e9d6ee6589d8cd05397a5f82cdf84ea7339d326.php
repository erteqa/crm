
<?php $__env->startSection('title'); ?>
    <?php echo e(__('lang.Customer_Update')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div>
        <form method="post">
            <div class="col-lg-4">
                <div class="flash-message">
                    <?php $__currentLoopData = ['danger', 'warning', 'success', 'info']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(Session::has('alert-' . $msg)): ?>

                            <p class="alert alert-<?php echo e($msg); ?>"><?php echo e(Session::get('alert-' . $msg)); ?> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <a class="btn btn-info" href="<?php echo e(route('Customer.Reset',['id'=>$customer->id])); ?>"> <?php echo e(__('lang.Reset_Passsword')); ?></a>
                <a class="btn btn-warning"
                   href="<?php echo e(route('Customer.SendEmail',['id'=>$customer->id])); ?>"><?php echo e(__('lang.SendEmail')); ?></a>
                <a class="btn btn-primary" href="<?php echo e(route('Customer.SendSms',['id'=>$customer->id])); ?>"><?php echo e(__('lang.SendSms')); ?></a>

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <?php echo e(__('lang.Customer_Update')); ?>

                    </div>
                    <div class="panel-body">

                        <div class="form-group">
                            <?php echo e(csrf_field()); ?>

                            <label><?php echo e(__('lang.Name')); ?></label>
                            <input type="text" name="name" placeholder="<?php echo e(__('lang.Name')); ?>"
                                   class="form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>"
                                   value="<?php echo e($customer->name); ?>" required>
                        </div>
                        <div class="form-group">
                            <label><?php echo e(__('lang.Phone')); ?></label>
                            <input type="tel" name="phone"
                                   class="form-control<?php echo e($errors->has('phone') ? ' is-invalid' : ''); ?>"
                                   value="<?php echo e($customer->phone); ?>" placeholder="<?php echo e(__('lang.Phone')); ?>">
                        </div>
                        <div class="form-group">
                            <label><?php echo e(__('lang.Email')); ?></label>
                            <input type="tel" name="email"
                                   class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>"
                                   value="<?php echo e($customer->email); ?>" placeholder="<?php echo e(__('lang.Email')); ?>">
                        </div>
                        <div class="form-group">
                            <label><?php echo e(__('lang.Address')); ?></label>
                            <input type="text" name="address"
                                   class="form-control<?php echo e($errors->has('address') ? ' is-invalid' : ''); ?>"
                                   value="<?php echo e($customer->address); ?>" placeholder="<?php echo e(__('lang.Address')); ?>">
                        </div>
                        <div class="form-group">
                            <?php if(auth()->user()->pattern==1 ): ?>
                                <label><?php echo e(__('lang.Company')); ?></label>
                            <?php else: ?>
                                <label><?php echo e(__('lang.Degreestudy')); ?></label>
                            <?php endif; ?>
                            <input type="text" name="company"
                                   class="form-control<?php echo e($errors->has('company') ? ' is-invalid' : ''); ?>"
                                   value="<?php echo e($customer->company); ?>" placeholder="<?php echo e(__('lang.Company')); ?>">
                        </div>
                        <div class="form-group">
                            <?php if(auth()->user()->pattern==1 ): ?>
                                <label><?php echo e(__('lang.Taxid')); ?></label>
                            <?php else: ?>
                                <label><?php echo e(__('lang.tax')); ?></label>
                            <?php endif; ?>
                            <input type="text" name="taxid"
                                   class="form-control<?php echo e($errors->has('taxid') ? ' is-invalid' : ''); ?>"
                                   value="<?php echo e($customer->taxid); ?>" placeholder="<?php echo e(__('lang.Taxid')); ?>">
                        </div>
                        <div class="form-group">
                            <?php if(auth()->user()->pattern==1 ): ?>
                                <label><?php echo e(__('lang.Company_Taxid')); ?></label>
                            <?php else: ?>
                                <label><?php echo e(__('lang.school')); ?></label>
                            <?php endif; ?>

                            <input type="text" name="company_taxid"
                                   class="form-control<?php echo e($errors->has('company_taxid') ? ' is-invalid' : ''); ?>"
                                   value="<?php echo e($customer->company_taxid); ?>" placeholder="<?php echo e(__('lang.Company_Taxid')); ?>">
                        </div>
                        <div class="form-group">
                            <label><?php echo e(__('lang.Group_Name')); ?></label>
                            <select class="js-example-basic-single form-control" name="group_id">
                                
                                <?php if(!is_null($groups)): ?>
                                    <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(\App\Http\Controllers\Admin\Group_cont::permision($group,'Add')||\App\Http\Controllers\Admin\Group_cont::permision($group,'View')): ?>
                                            <?php if(!is_null($customer->Group)): ?>
                                                <option <?php echo e($group->id==$customer->Group->id?'selected="selected"':''); ?>  value="<?php echo e($group->id); ?>"><?php echo e($group->name); ?></option>
                                            <?php else: ?>
                                                <option value="<?php echo e($group->id); ?>"><?php echo e($group->name); ?></option>

                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </select>
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
                            <?php if(auth()->user()->pattern==1 ): ?>
                                <label><?php echo e(__('lang.record_number')); ?></label>
                            <?php else: ?>
                                <label><?php echo e(__('lang.avarage')); ?></label>
                            <?php endif; ?>
                            <input type="text" name="record_number"
                                   class="form-control<?php echo e($errors->has('record_number') ? ' is-invalid' : ''); ?>"
                                   class="form-control" value="<?php echo e($customer->record_number); ?>"
                                   placeholder="<?php echo e(__('lang.Record_Number')); ?>">
                        </div>
                        <div class="form-group">
                            <?php if(auth()->user()->pattern==1 ): ?>
                                <label><?php echo e(__('lang.Mersis_Number')); ?></label>
                            <?php else: ?>
                                <label><?php echo e(__('lang.depart')); ?></label>
                            <?php endif; ?>

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
                            <div class="form-group">
                                <label><?php echo e(__('lang.creat_comp')); ?></label>
                                <input type="date" name="creat_comp"
                                       class="form-control<?php echo e($errors->has('creat_comp') ? ' is-invalid' : ''); ?>"
                                       class="form-control" value="<?php echo e($customer->creat_comp); ?>"
                                       placeholder="<?php echo e(__('lang.creat_comp')); ?>">
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
                        <div class="form-group">
                            <label><?php echo e(__('lang.Role')); ?></label>
                            <select class="js-example-basic-single form-control" name="rolename" required>
                             <option value="">Empty</option>
                                <?php if(!is_null($roles)): ?>
                                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option <?php echo e($customer->hasRole($role)?'selected="selected"':''); ?> value="<?php echo e($role->name); ?>" ><?php echo e($role->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <input type="submit" class="btn btn-primary" value="Save">
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

                <a class="btn btn-info" href="<?php echo e(route('Invoice.Recharg',['id'=>$customer->id])); ?>"> <?php echo e(__('lang.Invoice_Recharg')); ?></a>
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
                                            <a class="btn btn-danger"
                                               onclick="del('<?php echo e(route('Deletefile',['id'=>$file->id])); ?>')"><?php echo e(__('lang.Delete')); ?></a>
                                        </td>
                                    </tr>
                                    <?php elseif(strpos($file->name, '.docx') or strpos($file->name, '.doc')): ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo e($file->name); ?></td>
                                        <td>

                                            <a href="<?php echo e(asset('Files/'.$file->path)); ?>">
                                                <img src="<?php echo e(asset('Images/'.'word.jpg')); ?>"

                                                     alt="word"   style="width: 100px; height: 100px" ></a>


                                        </td>
                                        <td>
                                            <a href="<?php echo e(route('Downloads',['file'=>$file->path])); ?>"> download</a>
                                            <a class="btn btn-danger"
                                               onclick="del('<?php echo e(route('Deletefile',['id'=>$file->id])); ?>')"><?php echo e(__('lang.Delete')); ?></a>
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

                                            <a class="btn btn-danger"
                                               onclick="del('<?php echo e(route('Deletefile',['id'=>$file->id])); ?>')"><?php echo e(__('lang.Delete')); ?></a>
                                        </td>
                                    </tr>
                                <?php endif; ?>


                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </tbody>
                        </table>
                        <script>
                            $(document).ready(function () {
                                $('#dataTables-example').DataTable({
                                    responsive: true,
                                    stateSave: true
                                });

                            });

                            function del($url) {
                                var $ret_val = confirm('Yes Or No');
                                if ($ret_val == true) {
                                    window.location.href = $url;
                                }

                            }
                        </script>
                        <div class="form-group">
                            <input class="btn btn-primary" multiple="multiple" type="file" name="files[]" value="upload">
                        </div>

                    </div>
                    <div class="panel-footer">
                        <input type="submit" class="btn btn-primary" value="Save">
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
<?php /* /home/eritqaaa/public_html/crmold.eritqaa.com.tr/resources/views/Crm/Customer/Update_view.blade.php */ ?>