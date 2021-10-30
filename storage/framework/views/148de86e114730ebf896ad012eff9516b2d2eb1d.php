

<?php $__env->startSection('content'); ?>
    <style>
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
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <?php echo e(__('lang.Customer_Editor')); ?>

            </div>
            <?php if(count($errors) > 0): ?>
                <div class="alert alert-danger">
                    Upload Validation Error<br><br>
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>
            <div class="flash-message">
                <?php $__currentLoopData = ['danger', 'warning', 'success', 'info']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(Session::has('alert-' . $msg)): ?>
                        <p class="alert alert-<?php echo e($msg); ?>"><?php echo e(Session::get('alert-' . $msg)); ?> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <div class="panel-body">
                <?php if(\App\Http\Controllers\Admin\Customer_cont::permision(null,'Customer_Add')): ?>
                <a class="btn btn-primary" style="margin-bottom: 10px"

                   href="<?php echo e(route('Customer.Add')); ?>"><?php echo e(__('lang.Add_Customer')); ?></a>
                <?php endif; ?>
                <?php if(\App\Http\Controllers\Admin\Customer_cont::permision(null,'ForceDelete')): ?>
                <a class="btn btn-danger" style="margin-bottom: 10px;margin-left: 10px"
                   href="<?php echo e(route('Customer.Index',['type'=>'Del'])); ?>"><?php echo e(__('lang.Deleted_Customers')); ?></a>
                <?php endif; ?>
                <a class="btn btn-success" style="margin-bottom: 10px;margin-left: 10px"
                   href="<?php echo e(route('Customer.Index',['type'=>'UN'])); ?>"><?php echo e(__('lang.Existed_Customers')); ?></a>
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th><?php echo e(__('lang.Name')); ?></th>
                        <th><?php echo e(__('lang.Phone')); ?></th>
                        <?php if(auth()->user()->pattern==1 ): ?>
                            <th><?php echo e(__('lang.company')); ?></th>
                        <?php else: ?>
                            <th><?php echo e(__('lang.Degreestudy')); ?></th>
                        <?php endif; ?>
                        <th><?php echo e(__('lang.Email')); ?></th>
                        <th><?php echo e(__('lang.Add_By')); ?></th>
                        <?php if(auth()->user()->pattern==1 ): ?>
                        <th><?php echo e(__('lang.record_number')); ?></th>
                        <?php else: ?>
                        <th><?php echo e(__('lang.avarage')); ?></th>
                        <?php endif; ?>

                        <th><?php echo e(__('lang.follow_by')); ?></th>
                        <th><?php echo e(__('lang.Status')); ?></th>
                        <th><?php echo e(__('lang.Action')); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1;?>
                    <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <?php if(\App\Http\Controllers\Admin\Customer_cont::permision($customer,'View')): ?>
                            <?php if($customer->trashed()): ?>
                                <tr class="danger" class="odd gradeX">
                            <?php else: ?>
                                <tr class="odd gradeX">
                            <?php endif; ?>

                                    <td><?php echo e($i++); ?></td>
                                    <td><?php echo e($customer->name); ?></td>
                                    <td><?php echo e($customer->phone); ?></td>
                                    <td><?php echo e($customer->company); ?></td>
                                    <td><?php echo e($customer->email); ?></td>
                                    <td><?php echo e($customer->User->name); ?></td>
                                    <td><?php echo e($customer->record_number); ?></td>
                                   <td><span id="following-<?php echo e($customer->id); ?>">
                                       <?php if($customer->follow_by==auth()->user()->id): ?>
                                           <button class="btn btn-danger" onclick="unfollow_by(<?php echo e($customer->id); ?>)"><?php echo e(__('lang.rmfollow')); ?></button></span>
                                       <?php else: ?>
                                           <?php echo is_null($customer->follow_by)?'<button class="btn btn-success" onclick="follow_by('.$customer->id.')">'.__('lang.follow').'</button>':\App\User::find($customer->follow_by)->name; ?>

                                       <?php endif; ?>
                                   </span>
                                   </td>
                                    <td class="text-center">
                                        <?php if(\App\Http\Controllers\Admin\Customer_cont::permision($customer,'Update')): ?>
                                        <?php if($customer->isactive == 1): ?>
                                            <label class="switch">
                                                <input type="checkbox" data-toggle="toggle"
                                                       onchange='window.location.assign("<?php echo e(route('customerSetIsActive',['id'=>$customer->id,'value'=>0])); ?>")'
                                                       checked>
                                                <span class="sliders"></span>
                                            </label>
                                        <?php else: ?>
                                            <label class="switch">
                                                <input type="checkbox" data-toggle="toggle"
                                                       onchange='window.location.assign("<?php echo e(route('customerSetIsActive',['id'=>$customer->id,'value'=>1])); ?>")'>
                                                <span class="sliders"></span>
                                            </label>
                                        <?php endif; ?>
                                        <?php endif; ?>
                                    </td>
                                    
                                    <?php if($customer->trashed()): ?>
                                        <td style="width: 23%">
                                            <?php if(\App\Http\Controllers\Admin\Customer_cont::permision($customer,'ForceDelete')): ?>
                                                <a class="btn btn-danger"
                                                   onclick="del('<?php echo e(route('Customer.ForceDelete',['id'=>$customer->id])); ?>')"><?php echo e(__('lang.Force_Delete')); ?></a>
                                                <a class="btn btn-danger"
                                                   onclick="del('<?php echo e(route('Customer.Restor',['id'=>$customer->id])); ?>')"><?php echo e(__('lang.Restor')); ?></a>
                                            <?php endif; ?>
                                        </td>
                                    <?php else: ?>
                                        <td style="width: 23%">
                                            <?php if(\App\Http\Controllers\Admin\Customer_cont::permision($customer,'Delete')): ?>
                                                <a class="btn btn-danger"
                                                   onclick="del('<?php echo e(route('Customer.Delete',['id'=>$customer->id])); ?>')"><?php echo e(__('lang.Delete')); ?></a>
                                            <?php endif; ?>
                                            <?php if(\App\Http\Controllers\Admin\Customer_cont::permision($customer,'Update')): ?>
                                                <a class="btn btn-warning"
                                                   href="<?php echo e(route('Customer.Update',['id'=>$customer->id])); ?>"><?php echo e(__('lang.Update')); ?></a>
                                            <?php endif; ?>
                                            <a class="btn btn-warning"
                                               href="<?php echo e(route('Customer.View',['id'=>$customer->id])); ?>"><?php echo e(__('lang.View')); ?></a>
                                        </td>
                                    <?php endif; ?>
                                </tr>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>

                    <div class="col-lg-6">
                        <div id="my1" class="modal">
                            <div class="modal-content">
                                <span class="clos1e">&times;</span>
                                <div class="panel panel-primary">
                                    <div class="panel-body">
                                        <input type="text" name="name" id="followid"  value="" required class="hidden"  >

                                            <label><?php echo e(__('lang.if_you_want_follow_it')); ?></label>

                                            <button class="btn btn-success"
                                                    onclick="follow()"><?php echo e(__('lang.follow')); ?></button>


                                    </div>

                                </div>

                                <script>
                                    // Get the modal
                                    var m1odal = document.getElementById("my1");

                                    var s1pan = document.getElementsByClassName("clos1e")[0];
                                    unfollow_by =function (id) {
                                        var  id=id;
                                        $.ajax({
                                            type: "get",
                                            url: '<?php echo e(route('Info.unfollow')); ?>',
                                            data: {_token: '<?php echo e(csrf_token()); ?>', id: id},
                                            success: function (data) {
                                                m1odal.style.display = "none";
                                                $("#following-"+id).html('');

                                                $("#following-"+id).html('<button class="btn btn-success" onclick="follow_by('+data+')"><?php echo e(__('lang.follow')); ?></button>');
                                            }, error: function (jqXHR, error, errorThrown) {
                                                if (jqXHR.status && jqXHR.status == 400) {
                                                    alert(jqXHR.responseText);
                                                } else {
                                                    alert("Something went wrong");
                                                }
                                            }
                                        });
                                    }
                                    follow = function () {
                                      var  id=$("#followid").val();
                                        $.ajax({
                                        type: "get",
                                        url: '<?php echo e(route('Info.follow')); ?>',
                                        data: {_token: '<?php echo e(csrf_token()); ?>', id: id},
                                        success: function (data) {
                                            m1odal.style.display = "none";
                                            $("#following-"+id).html('');

                                            $("#following-"+id).html('<button class="btn btn-danger" onclick="unfollow_by('+data+')"><?php echo e(__('lang.rmfollow')); ?></button>');
                                        }, error: function (jqXHR, error, errorThrown) {
                                        if (jqXHR.status && jqXHR.status == 400) {
                                        alert(jqXHR.responseText);
                                        } else {
                                        alert("Something went wrong");
                                        }
                                        }
                                        });
                                    }

                                    follow_by = function (id) {
                                        // var followid = document.getElementById("followid");
                                        // followid.val(id);
                                        $("#followid").val(id);
                                        m1odal.style.display = "block";
                                        if (event.stopPropagation) event.stopPropagation();


                                    }

                                    // Whn the user clicks on <span> (x), close the modal
                                    s1pan.onclick = function () {
                                        m1odal.style.display = "none";
                                    }

                                    // When the user clicks anywhere outside of the modal, close it
                                    window.onclick = function (event) {
                                        //  alert('faefewf');
                                        if (event.target == m1odal) {
                                            m1odal.style.display = "none";
                                        }

                                    }
                                </script>
                            </div>

                        </div>
                    </div>
                <!-- /.table-responsive -->
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
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('subject'); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.Admin_app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* /home/eritqaaa/public_html/crmold.eritqaa.com.tr/resources/views/Crm/Customer/Index_view.blade.php */ ?>