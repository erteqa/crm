<?php $__env->startSection('title'); ?>
    <?php echo e(__('lang.Add_Task')); ?>

<?php $__env->stopSection(); ?>
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

    <div class="col-lg-10">
        <button class="btn btn-primary" onclick="showformtask()"><?php echo e(__('lang.addtasktype')); ?></button>
    <form method="post">


        <div class="panel panel-primary">
            <div class="panel-heading">
                <?php echo e(__('lang.Add_Task')); ?>

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
                   <input type="text" name="name" placeholder="<?php echo e(__('lang.Task_Name')); ?>" class="form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>"   value="<?php echo e(old('name')); ?>" required >
               </div>
                <div class="form-group">
                    <label><?php echo e(__('lang.TaskType_Name')); ?></label>
                    <select class="js-example-basic-single form-control" id="select_id" name="task_type_id">
                        
                        <?php if(!is_null($tasktyps)): ?>
                            <?php $__currentLoopData = $tasktyps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tasktyp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(!is_null($tasktyp)): ?>
                                <option  value="<?php echo e($tasktyp->id); ?>" ><?php echo e($tasktyp->name); ?></option>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label><?php echo e(__('lang.Employee_Name')); ?></label>
                    <select class="js-example-basic-single form-control" name="user_id" required>
                        <?php if(!is_null($employees)): ?>
                            <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(!is_null($employee)): ?>
                                    <option  value="<?php echo e($employee->id); ?>" ><?php echo e($employee->name); ?></option>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label><?php echo e(__('lang.Customers_Name')); ?></label>
                    <select class="js-example-basic-single form-control" name="customer_id" required>
                        <?php if(!is_null($customers)): ?>
                            <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(\App\Http\Controllers\Admin\Customer_cont::permision($customer,'View')): ?>
                                <?php if(!is_null($customer)): ?>
                                    <option  value="<?php echo e($customer->id); ?>" ><?php echo e($customer->name); ?> : <?php echo e($customer->company); ?></option>
                                <?php endif; ?>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label><?php echo e(__('lang.state_Name')); ?></label>
                    <select class="js-example-basic-single form-control" name="state_id"  required>
                        <?php if(!is_null($status)): ?>
                            <?php $__currentLoopData = $status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(!is_null($state)): ?>
                                    <option  value="<?php echo e($state->id); ?>" ><?php echo e($state->name); ?></option>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="form-group">

                    <label><?php echo e(__('lang.Duration')); ?></label>
                    <input type="text" name="duration" placeholder="<?php echo e(__('lang.Duration')); ?>" class="form-control<?php echo e($errors->has('duration') ? ' is-invalid' : ''); ?>"   value="<?php echo e(old('duration')); ?>" >
                </div>
                <div class="form-group">
                    <label><?php echo e(__('lang.Description')); ?></label>
                    <input type="text" name="description" placeholder="<?php echo e(__('lang.Description')); ?>" class="form-control<?php echo e($errors->has('description') ? ' is-invalid' : ''); ?>"   value="<?php echo e(old('description')); ?>" >
                </div>
            </div>
            <div class="panel-footer">
               <input type="submit" class="btn btn-primary" value="Save">
            </div>
        </div>


        <script>
            $(document).ready(function() {
                $('.js-example-basic-single').select2();
            });
        </script>
    </form>
        <div class="col-lg-6">
            <div id="my1" class="modal">
                <div class="modal-content">
                    <span class="clos1e">&times;</span>
                    <div class="panel panel-primary">
                        <div class="panel-body">

                            <label><?php echo e(__('lang.Name')); ?></label>
                            <input id="tasktype" type="text" name="name" placeholder="<?php echo e(__('lang.Name')); ?>" class="form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>"   value="<?php echo e(old('name')); ?>" required ><br>
                            <button class="btn btn-danger" onclick="stortasktype()"><?php echo e(__('lang.addtasktype')); ?></button>
                        </div>
                    </div>

                    <script>
                        // Get the modal
                        var m1odal = document.getElementById("my1");

                        var s1pan = document.getElementsByClassName("clos1e")[0];

                        stortasktype = function () {
                            var  name=$("#tasktype").val();
                           // alert(name);
                            $.ajax({
                                type: "get",
                                url: '<?php echo e(route('TaskType.Addajax')); ?>',
                                data: {_token: '<?php echo e(csrf_token()); ?>', name: name},
                                success: function (data) {
                                    $("#select_id").prepend(data);
                                    m1odal.style.display = "none";
                                    //alert(data);
                                }, error: function (jqXHR, error, errorThrown) {
                                    if (jqXHR.status && jqXHR.status == 400) {
                                        alert(jqXHR.responseText);
                                    } else {
                                        alert("Something went wrong");
                                    }
                                }
                            });
                        }

                        showformtask = function () {
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
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('subject'); ?>
    <?php echo e(__('lang.Subject')); ?>}}
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.Admin_app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* /home/eritqaaa/public_html/crmold.eritqaa.com.tr/resources/views/Crm/Task/Add_view.blade.php */ ?>