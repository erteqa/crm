<?php $__env->startSection('title'); ?>
    <?php echo e(__('lang.Customer_View')); ?>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        * {box-sizing: border-box}

        /* Set height of body and the document to 100% */
        body, html {
            height: 100%;
            margin: 0;
            font-family: Arial;
        }

        /* Style tab links */
        .tablink {
            background-color: #555;
            color: white;
            float: left;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            font-size: 17px;
            width: 25%;
        }

        .tablink:hover {
            background-color: #777;
        }

        /* Style the tab content (and add height:100% for full page content) */
        .tabcontent {
            color: #0a0609;
            display: none;
            padding: 100px 20px;
            height: 100%;
        }

        #Home {background-color: white;}
        #News {background-color: white;}
        #Contact {background-color: white;}
        #About {background-color: white;}

         <?php if(app()->getLocale()=='ar'): ?>
        form {
             text-align: right;
         }

        input {
            text-align: right;
        }

        textarea {
            text-align: right;
        }

        <?php endif; ?>

        body {
            font-family: Arial, Helvetica, sans-serif;
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

    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <button class="tablink" onclick="openPage('Home', this, '#72EE1E')"  id="defaultOpen"><?php echo e(__('lang.FileAndInfo')); ?></button>
    <button class="tablink" onclick="openPage('News', this, 'green')"><?php echo e(__('lang.invoises')); ?></button>
    <button class="tablink" onclick="openPage('Contact', this, 'blue')"><?php echo e(__('lang.tasks')); ?></button>
    <button class="tablink" onclick="openPage('Nots', this, 'orange')"><?php echo e(__('lang.nots')); ?></button>
    <div id="Home" class="tabcontent">
        <h3><?php echo e(__('lang.FileAndInfo')); ?></h3>
        <div>

            <form method="post">
                <div class="col-lg-4">
                    <a class="btn btn-warning"
                       href="<?php echo e(route('Customer.SendEmail',['id'=>$customer->id])); ?>"><?php echo e(__('lang.SendEmail')); ?></a>
                    <a class="btn btn-primary" href="<?php echo e(route('Customer.SendSms',['id'=>$customer->id])); ?>"><?php echo e(__('lang.SendSms')); ?></a>
                    <?php if(\App\Http\Controllers\Admin\Customer_cont::permision($customer,'Update')): ?>
                        <a class="btn btn-success"
                           href="<?php echo e(route('Customer.Update',['id'=>$customer->id])); ?>"><?php echo e(__('lang.Update')); ?></a>
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
                                       value="<?php echo e($customer->name); ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label><?php echo e(__('lang.Phone')); ?></label>
                                <input type="tel" name="phone"
                                       class="form-control<?php echo e($errors->has('phone') ? ' is-invalid' : ''); ?>"
                                       value="<?php echo e($customer->phone); ?>" placeholder="<?php echo e(__('lang.Phone')); ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label><?php echo e(__('lang.email')); ?></label>
                                <input type="email" name="phone"
                                       class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>"
                                       value="<?php echo e($customer->email); ?>" placeholder="<?php echo e(__('lang.email')); ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label><?php echo e(__('lang.Address')); ?></label>
                                <input type="text" name="address"
                                       class="form-control<?php echo e($errors->has('address') ? ' is-invalid' : ''); ?>"
                                       value="<?php echo e($customer->address); ?>" placeholder="<?php echo e(__('lang.Address')); ?>" readonly>
                            </div>
                            <div class="form-group">
                                <?php if(auth()->user()->pattern==1 ): ?>
                                    <label><?php echo e(__('lang.Company')); ?></label>
                                <?php else: ?>
                                    <label><?php echo e(__('lang.Degreestudy')); ?></label>
                                <?php endif; ?>

                                <input type="text" name="company"
                                       class="form-control<?php echo e($errors->has('company') ? ' is-invalid' : ''); ?>"
                                       value="<?php echo e($customer->company); ?>" placeholder="<?php echo e(__('lang.Company')); ?>" readonly>
                            </div>
                            <div class="form-group">
                                <?php if(auth()->user()->pattern==1 ): ?>
                                <label><?php echo e(__('lang.Taxid')); ?></label>
                                <?php else: ?>
                                <label><?php echo e(__('lang.tax')); ?></label>
                                <?php endif; ?>
                                <input type="text" name="taxid"
                                       class="form-control<?php echo e($errors->has('taxid') ? ' is-invalid' : ''); ?>"
                                       value="<?php echo e($customer->taxid); ?>" placeholder="<?php echo e(__('lang.Taxid')); ?>" readonly>
                            </div>
                            <div class="form-group">
                                <?php if(auth()->user()->pattern==1 ): ?>
                                    <label><?php echo e(__('lang.Company_Taxid')); ?></label>
                                <?php else: ?>
                                    <label><?php echo e(__('lang.school')); ?></label>
                                <?php endif; ?>

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
                                    <input type="text" name="creat_comp"
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

                                                         alt="word"   style="width: 100px; height: 100px" ></a>


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


                        </div>
                        <div class="panel-footer">

                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>

    <div id="News" class="tabcontent">
        <h3>   <?php echo e(__('lang.invoises')); ?>    </h3>
        <style>
            .st-paid, .st-due, .st-partial, .st-canceled,.st-rejected,.st-pending,.st-accepted,.st-Recurring,.st-Stopped
            {
                text-transform: capitalize;
                color: #fff;
                padding: 4px;
                border-radius: 11px;
                font-size: 12px;
            }
            .st-paid,.st-accepted
            {
                background-color: #5ed45e;
            }
            .st-due,.st-Stopped
            {
                background-color: #ff6262;
            }
            .st-partial,.st-pending,.st-Recurring
            {
                background-color: #5da6fb;
            }
            .st-canceled,.st-rejected
            {
                background-color: #848030;
            }
        </style>
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <?php echo e(__('lang.Invoice_Editor')); ?>

                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <?php if( \App\Http\Controllers\Accounting\Invoice_cont::permision('Invoice_Add')): ?>
                        <a class="btn btn-primary" style="margin-bottom: 10px" href="<?php echo e(route('Add.Invoice')); ?>"><?php echo e(__('lang.Add_Invoice')); ?></a>
                    <?php endif; ?>

                    <table width="100%" class="table table-striped table-bordered table-hover" >
                        <thead>
                        <tr>
                            <th>#</th>


                            <th><?php echo e(__('lang.Invoice_Number')); ?></th>
                            <th><?php echo e(__('lang.Customer')); ?></th>
                            <th><?php echo e(__('lang.Employee')); ?></th>
                            <th><?php echo e(__('lang.invoicedate')); ?></th>
                            <?php if(auth()->user()->pattern==1 ): ?>
                                <th><?php echo e(__('lang.Company')); ?></th>
                            <?php else: ?>
                                <th><?php echo e(__('lang.Degreestudy')); ?></th>
                            <?php endif; ?>

                            <th><?php echo e(__('lang.status')); ?></th>
                            <th><?php echo e(__('lang.Remaining_amount')); ?></th>
                            <th><?php echo e(__('lang.Action')); ?></th>

                        </tr>
                        </thead>
                        <?php $i=1?>
                        <tbody>
                        <?php $__currentLoopData = $invoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if( \App\Http\Controllers\Accounting\Invoice_cont::invpermision($invoice->Customer,'View')): ?>
                                <?php if($invoice->trashed()): ?>
                                    <tr class="danger" class="odd gradeX">
                                <?php else: ?>
                                    <tr class="odd gradeX">
                                        <?php endif; ?>

                                        <td><?php echo e($i++); ?></td>
                                        <td><?php echo e($invoice->tid); ?></td>

                                        <td><?php echo e(is_null($invoice->Customer)?'':$invoice->Customer->name); ?></td>
                                        <td><?php echo e($invoice->User->name); ?></td>
                                        <td><?php echo e($invoice->invoicedate); ?></td>
                                        <td><?php echo e($invoice->Customer->company); ?></td>
                                        <td><span class="tag tag-default st-<?php echo e($invoice['status']); ?>"><?php echo e(__('lang.'.$invoice['status'])); ?></span></td>
                                        <td><?php echo e($invoice->total-$invoice->pamnt.' TL'); ?></td>


                                        <?php if($invoice->trashed()): ?>

                                            <td style="width: 210px">
                                                <?php if( \App\Http\Controllers\Accounting\Invoice_cont::permision('Invoice_ForceDelete')): ?>
                                                    <a class="btn btn-danger"
                                                       onclick="del('<?php echo e(route('Invoice.ForceDelete',['id'=>$invoice->id])); ?>')"><?php echo e(__('lang.Force_Delete')); ?></a>

                                                    <a class="btn btn-danger"
                                                       onclick="del('<?php echo e(route('Invoice.Restor',['id'=>$invoice->id])); ?>')"><?php echo e(__('lang.Restor')); ?></a>
                                                <?php endif; ?>
                                            </td >
                                        <?php else: ?>
                                            <td style="width: 210px">

                                                <?php if( \App\Http\Controllers\Accounting\Invoice_cont::permision('Invoice_Delete')): ?>
                                                    <a class="btn btn-danger" onclick="del('<?php echo e(route('Invoice.Delete',['id'=>$invoice->id])); ?>')"><?php echo e(__('lang.Delete')); ?></a>
                                                <?php endif; ?>

                                                <?php if( \App\Http\Controllers\Accounting\Invoice_cont::permision('Invoice_Update')): ?>
                                                    <a class="btn btn-warning" href="<?php echo e(route('Invoice.Update',['id'=>$invoice->id])); ?>"><?php echo e(__('lang.Update')); ?></a>
                                                <?php endif; ?>

                                                <a class="btn btn-warning" href="<?php echo e(route('Invoice.View',['id'=>$invoice->id])); ?>"><?php echo e(__('lang.View')); ?></a>

                                                <a class="btn btn-warning" href="<?php echo e(route('Invoice.Download',['id'=>$invoice->id,'type' => 'd'])); ?>"><?php echo e(__('lang.Download')); ?></a>


                                            </td>
                                        <?php endif; ?>





                                    </tr>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <!-- /.table-responsive -->

                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>

            <!-- /.panel -->

    </div>

    <div id="Contact" class="tabcontent">
        <h3><?php echo e(__('lang.tasks')); ?></h3>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <?php echo e(__('lang.Task_Editor')); ?>

            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <a class="btn btn-primary" style="margin-bottom: 10px"
                   href="<?php echo e(route('Task.Add')); ?>"><?php echo e(__('lang.Add_Task')); ?></a>
                
                
                
                
                <table width="100%" class="table table-striped table-bordered table-hover" >
                    <thead>
                    <tr>
                        <th><?php echo e(__('lang.Name')); ?></th>
                        <th><?php echo e(__('lang.TaskType')); ?></th>
                        <th><?php echo e(__('lang.Employee')); ?></th>
                        <th><?php echo e(__('lang.Customer')); ?></th>
                        <th><?php echo e(__('lang.State')); ?></th>
                        <th><?php echo e(__('lang.Duration')); ?></th>
                        <th><?php echo e(__('lang.Description')); ?></th>
                        <th><?php echo e(__('lang.Created_at')); ?></th>
                        <th><?php echo e(__('lang.Action')); ?></th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $Tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($Task->trashed()): ?>
                            <tr class="danger" class="odd gradeX">
                        <?php else: ?>
                            <tr class="odd gradeX">
                                <?php endif; ?>

                                <td><?php echo e($Task->name==''?'':$Task->name); ?></td>
                                <td><?php echo e(is_null($Task->TaskType)?'':$Task->TaskType->name); ?></td>
                                <td><?php echo e(is_null($Task->User)?'':$Task->User->name); ?></td>
                                <td><?php echo e(is_null($Task->Customer)?'':$Task->Customer->name); ?></td>
                                <td>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar <?php echo e(\App\Http\Controllers\Style_cont::progress($Task->State->percent)); ?>"
                                             role="progressbar" aria-valuenow="<?php echo e($Task->State->percent); ?>"
                                             aria-valuemin="0" aria-valuemax="100"
                                             style="width:<?php echo e($Task->State->percent); ?>%">
                                            <span class="sr-only"><?php echo e($Task->State->percent); ?> % Complete (warning)</span>
                                        </div>
                                    </div>
                                </td>

                                <td><?php echo e($Task->duration); ?></td>
                                <td><?php echo e($Task->description); ?></td>
                                <td><?php echo e($Task->created_at); ?></td>
                                <td>
                                    <?php if($Task->trashed()): ?>
                                        <a class="btn btn-danger"
                                           onclick="del('<?php echo e(route('Task.ForceDelete',['id'=>$Task->id])); ?>')"><?php echo e(__('lang.Force_Delete')); ?></a>
                                        <a class="btn btn-danger"
                                           onclick="del('<?php echo e(route('Task.Restor',['id'=>$Task->id])); ?>')"><?php echo e(__('lang.Restor')); ?></a>
                                    <?php else: ?>
                                        <a class="btn btn-danger"
                                           onclick="del('<?php echo e(route('Task.Delete',['id'=>$Task->id])); ?>')"><?php echo e(__('lang.Delete')); ?></a>
                                        <a class="btn btn-warning" href="<?php echo e(route('Task.Update',['id'=>$Task->id])); ?>"><?php echo e(__('lang.Update')); ?></a>
                                        <a class="btn btn-warning"
                                           href="<?php echo e(route('Task.View',['id'=>$Task->id])); ?>"><?php echo e(__('lang.View')); ?></a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <!-- /.table-responsive -->
                
                
                
                
                

                

                
                
                
                
                

                
                
            </div>
            <!-- /.panel-body -->
        </div>
    </div>

    <div id="Nots" class="tabcontent">
        <!-- /.col-lg-6 -->
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <button class="btn btn-success" onclick="open1dialog1(<?php echo e($customer->id); ?>)"><?php echo e(__('lang.not')); ?></button>
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables_one">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th><?php echo e(__('lang.addby')); ?></th>
                            <th><?php echo e(__('lang.customername')); ?></th>
                            <th><?php echo e(__('lang.content')); ?></th>
                            <th><?php echo e(__('lang.created_at')); ?></th>
                            <th><?php echo e(__('lang.Action')); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1;?>

                        <?php $__currentLoopData = $customer->Not; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $not): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                            <td><?php echo e($i++); ?></td>
                            <td><?php echo e($not->User->name); ?></td>
                            <td><?php echo e($not->Customer->name); ?></td>
                            <td><?php echo e($not->content); ?></td>
                            <td><?php echo e($not->created_at); ?></td>
                                <td style="width: 23%">
                                    <?php if(auth()->user()->id===$not->user_id): ?>
                                        <a class="btn btn-danger"
                                           onclick="del('<?php echo e(route('Notes.Delete',['id'=>$not->id])); ?>')"><?php echo e(__('lang.Delete')); ?></a>

                                        <button class="btn btn-success"
                                                onclick="open1dialogupdate(<?php echo e("'".$not->content."',".$not->id); ?>)"><?php echo e(__('lang.Update')); ?></button>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <!-- /.table-responsive -->
                    <script>
                        $(document).ready(function () {
                            $('#dataTables_one').DataTable({
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
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-6 -->
    </div>


    <form method="post" action="<?php echo e(route('Note.Add')); ?>">
        <div class="col-lg-6">
            <div id="my1" class="modal col-lg-6">
                <div class="modal-content">
                    <span class="clos1e">&times;</span>
                    <a class="btn btn-success" onclick="notypeopen1dialog(event)"><?php echo e(__('lang.not')); ?></a>

                    <div class="panel panel-primary">
                        <div class="panel-body">
                            <div class="form-group">
                                <?php echo e(csrf_field()); ?>

                                <label><?php echo e(__('lang.content')); ?></label>
                                <input type="text" name="content"
                                       placeholder="<?php echo e(__('lang.content')); ?>"
                                       class="form-control<?php echo e($errors->has('content') ? ' is-invalid' : ''); ?>"
                                       value="<?php echo e(old('content')); ?>" required >
                            </div>

                            <div class="form-group">
                                <label><?php echo e(__('lang.notetype')); ?></label>
                                <select class="js-example-basic-single form-control" name="notetype_id" required>
                                    <?php $__currentLoopData = $notetypes=\App\Model\Notetype::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notetype): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(!is_null($notetype)): ?>
                                            <option  value="<?php echo e($notetype->id); ?>" ><?php echo e($notetype->typename); ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="form-group hidden">
                                <input type="text" name="customer_id" id="cuid1"
                                       required >
                            </div>
                        </div>
                        <div class="panel-footer">
                            <input type="submit" class="btn btn-primary" value="Save">
                        </div>
                    </div>

                    <script>
                        // Get the modal
                        var m1odal = document.getElementById("my1");
                        // Get the button that opens the modal
                        // var btn =   document.getElementsByClassName("myBtn");
                        // Get the <span> element that closes the modal
                        var s1pan =  document.getElementsByClassName("clos1e")[0];
                        // When the user clicks the button, open the modal
                        open1dialog1 = function (id,event) {
                            // alert(id);
                            $("#cuid1").val(id);
                            m1odal.style.display = "block";
                            if (event.stopPropagation)    event.stopPropagation();
                        }
                        // Whn the user clicks on <span> (x), close the modal
                        s1pan.onclick = function () {
                            m1odal.style.display = "none";
                        }
                        // When the user clicks anywhere outside of the modal, close it
                        window.onclick = function (event) {

                            if (event.target == modalupdate) {
                                modalupdate.style.display = "none";
                            }
                            if (event.target == m1odal) {
                                m1odal.style.display = "none";
                            }
                            if (event.target == notetypemodel) {
                                notetypemodel.style.display = "none";
                            }
                            if (event.target == modal) {
                                modal.style.display = "none";
                            }

                        }
                    </script>
                </div>

            </div>
        </div>
    </form>
    <form method="post" action="<?php echo e(route('Notes.Update')); ?>">
        <div class="col-lg-6">
            <div id="Update1" class="modal col-lg-6">
                <div class="modal-content">
                    <span class="closeupdate">&times;</span>
                    <a class="btn btn-success" onclick="notypeopen1dialog(event)"><?php echo e(__('lang.not')); ?></a>
                    <div class="form-group hidden">
                        <input type="text" name="id" id="id"
                               required>
                    </div>
                    <div class="panel panel-primary">
                        <div class="panel-body">
                            <div class="form-group">
                                <?php echo e(csrf_field()); ?>

                                <label><?php echo e(__('lang.content')); ?></label>
                                <input id="con" type="text" name="content"
                                       placeholder="<?php echo e(__('lang.content')); ?>"
                                       class="form-control<?php echo e($errors->has('content') ? ' is-invalid' : ''); ?>"
                                       required>
                            </div>

                        </div>
                        <div class="panel-footer">
                            <input type="submit" class="btn btn-primary" value="Save">
                        </div>
                    </div>

                    <script>
                        // Get the modal
                        var modalupdate = document.getElementById("Update1");
                        // Get the button that opens the modal
                        // var btn =   document.getElementsByClassName("myBtn");
                        // Get the <span> element that closes the modal
                        var spanupdate = document.getElementsByClassName("closeupdate")[0];
                        // When the user clicks the button, open the modal
                        open1dialogupdate = function (content,id, event) {
//alert(content);
                            $("#con").val(content);
                            $("#id").val(id);
                            modalupdate.style.display = "block";
                            if (event.stopPropagation) event.stopPropagation();
                        }
                        // Whn the user clicks on <span> (x), close the modal
                        spanupdate.onclick = function () {
                            modalupdate.style.display = "none";
                        }
                        // When the user clicks anywhere outside of the modal, close it
                        // }

                    </script>
                </div>

            </div>
        </div>
    </form>
    <form method="post" action="<?php echo e(route('Notetype.Add')); ?>">
        <div class="col-lg-6">
            <div id="notetypemodel" class="modal col-lg-6">
                <div class="modal-content">
                    <span class="notetypeclose">&times;</span>
                    <div class="panel panel-primary">
                        <div class="panel-body">
                            <div class="form-group">
                                <?php echo e(csrf_field()); ?>

                                <label><?php echo e(__('lang.content')); ?></label>
                                <input type="text" name="typename"
                                       placeholder="<?php echo e(__('lang.typename')); ?>"
                                       class="form-control<?php echo e($errors->has('typename') ? ' is-invalid' : ''); ?>"
                                       value="<?php echo e(old('typename')); ?>" required >
                            </div>
                        </div>
                        <div class="panel-footer">
                            <input type="submit" class="btn btn-primary" value="Save">
                        </div>
                    </div>

                    <script>
                        // Get the modal
                        var notetypemodel = document.getElementById("notetypemodel");
                        // Get the button that opens the modal
                        // var btn =   document.getElementsByClassName("myBtn");
                        // Get the <span> element that closes the modal
                        var notetypespan =  document.getElementsByClassName("notetypeclose")[0];
                        // When the user clicks the button, open the modal
                        notypeopen1dialog = function (event) {
                            //    alert('yrcgcb');
                            //     m1odal.style.display = "none";
                            //     modal.style.display = "none";

                            notetypemodel.style.display = "block";
                            if (event.stopPropagation)    event.stopPropagation();
                        }
                        // Whn the user clicks on <span> (x), close the modal
                        notetypespan.onclick = function () {
                            notetypemodel.style.display = "none";
                        }
                        // When the user clicks anywhere outside of the modal, close it
                        // window.onclick = function (event) {
                        //     if (event.target == notetypemodel) {
                        //         notetypemodel.style.display = "none";
                        //     }
                        // }
                    </script>
                </div>

            </div>
        </div>
    </form>

    <script>
        function openPage(pageName,elmnt,color) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablink");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].style.backgroundColor = "";
            }
            document.getElementById(pageName).style.display = "block";
            elmnt.style.backgroundColor = color;
        }

        // Get the element with id="defaultOpen" and click on it
        document.getElementById("defaultOpen").click();
    </script>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('subject'); ?>
    Subject !!!!!!!!!!!
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.Admin_app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* H:\root\home\eritqaaacademy-001\www\crm\CRMV3\crmlaraveltest\resources\views/Crm/Customer/View_view.blade.php */ ?>