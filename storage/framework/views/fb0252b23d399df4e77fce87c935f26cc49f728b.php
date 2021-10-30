<?php $__env->startSection('title'); ?>
    <?php echo e(__('lang.View_Group')); ?>

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
    <div class="col-lg-12">
        <form method="post" enctype="multipart/form-data" action="<?php echo e(route('cu.import',['gid'=>$gid])); ?>">
            <?php echo e(csrf_field()); ?>

            <div class="form-group">
                <table class="table">
                    <tr>
                        <td><a href="<?php echo e(route('Downloads',['file'=>'formCustomers.xlsx'])); ?>"> <?php echo e(__('lang.formCustomer')); ?></a> </td>
                        <td width="20%" align="right"><label>Select File for Upload</label></td>
                        <td width="30">
                            <input type="file" name="select_file" />
                        </td>
                        <td width="30%" align="left">
                            <input type="submit" name="upload" class="btn btn-primary" value="Upload">
                        </td>
                    </tr>

                </table>
            </div>
        </form>
        <div class="col-sm-12 panel panel-primary">
            <!-- /.panel-heading -->
            <div class="panel-body">
                <a class="btn btn-primary" style="margin-bottom: 10px"
                   href="<?php echo e(route('Customer.Add')); ?>"><?php echo e(__('lang.Add_Customer')); ?></a>
                <table class="col-sm-11 fixed table table-striped table-bordered table-hover" id="dataTables-Customerinfo">
                    <thead>
                    <tr>
                        <th width="3%">#</th>
                        <th width="10%" ><?php echo e(__('lang.Name')); ?></th>
                        <th width="5%"><?php echo e(__('lang.Nationality')); ?></th>
                        <?php if(auth()->user()->pattern==1 ): ?>
                            <th width="5%"><?php echo e(__('lang.company')); ?></th>
                        <?php else: ?>
                            <th width="5%"><?php echo e(__('lang.Degreestudy')); ?></th>
                        <?php endif; ?>
                        <?php if(auth()->user()->pattern==1 ): ?>
                            <th width="10%" style="overflow:scroll"><?php echo e(__('lang.Taxid')); ?></th>
                        <?php else: ?>
                            <th width="10%" style="overflow:scroll"><?php echo e(__('lang.tax')); ?></th>
                        <?php endif; ?>
                        <th width="5%"><?php echo e(__('lang.Add_By')); ?></th>
                        <?php if(auth()->user()->pattern==1 ): ?>
                            <th width="5%"><?php echo e(__('lang.record_number')); ?></th>
                        <?php else: ?>
                            <th width="5%"><?php echo e(__('lang.avarage')); ?></th>
                        <?php endif; ?>
                        <?php if(auth()->user()->pattern==1 ): ?>
                            <th width="7%"><?php echo e(__('lang.Tc')); ?></th>
                        <?php else: ?>
                            <th width="7%"><?php echo e(__('lang.borndate')); ?></th>
                        <?php endif; ?>
                        <th width="7%"><?php echo e(__('lang.follow_by')); ?></th>
                        <th width="3%"><?php echo e(__('lang.Status')); ?></th>
                        <th ><?php echo e(__('lang.Action')); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1;?>
                    <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($customer->trashed()): ?>
                            <tr class="danger" class="odd gradeX">
                        <?php else: ?>
                            <tr class="odd gradeX" id='CU.<?php echo e($customer->id); ?>'>
                                <?php endif; ?>
                                <td width="3%"><?php echo e($i++); ?></td>
                                <td width="10%"><?php echo e($customer->name); ?></td>
                                <td width="5%"><?php echo e($customer->nationality); ?></td>
                                <td width="5%"><?php echo e($customer->company); ?></td>
                                <td width="10%"><?php echo e($customer->taxid); ?></td>
                                <td width="5%"><?php echo e($customer->User->name); ?></td>
                                <td width="5%"><?php echo e($customer->record_number); ?></td>
                                <td width="7%"><?php echo e($customer->Tc); ?></td>
                                <td width="7%"><span id="following-<?php echo e($customer->id); ?>">
                                       <?php if($customer->follow_by==auth()->user()->id): ?>
                                            <button class="btn btn-danger" onclick="unfollow_by(<?php echo e($customer->id); ?>)"><?php echo e(__('lang.rmfollow')); ?></button></span>
                                    <?php else: ?>
                                    <?php echo is_null($customer->follow_by)?'<button class="btn btn-success" onclick="follow_by('.$customer->id.')">'.__('lang.follow').'</button>':\App\User::find($customer->follow_by)->name; ?>

                                    <?php endif; ?>
                                    </span>
                                </td>
                                <td width="3%" class="text-center">
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
                                </td>
                                <?php if($customer->trashed()): ?>
                                    <td style="width: 210px">
                                        <a class="btn btn-danger"
                                           onclick="del('<?php echo e(route('Customer.ForceDelete',['id'=>$customer->id])); ?>')"><?php echo e(__('lang.Force_Delete')); ?></a>
                                        <a class="btn btn-danger"
                                           onclick="del('<?php echo e(route('Customer.Restor',['id'=>$customer->id])); ?>')"><?php echo e(__('lang.Restor')); ?></a>
                                    </td>
                                <?php else: ?>
                                    <td style="width: 32%">
                                        <a class="btn btn-danger"
                                           onclick="del('<?php echo e(route('Customer.Delete',['id'=>$customer->id])); ?>')"><?php echo e(__('lang.Delete')); ?></a>
                                        <button class="btn btn-success" onclick="Updateshow(<?php echo e($customer->id); ?>)"><?php echo e(__('lang.Update')); ?></button>




                                        <button class="btn btn-success" onclick="infoshow(<?php echo e($customer->id); ?>)"><?php echo e(__('lang.View')); ?></button>
                                        <button class="btn btn-success" onclick="opendialog(<?php echo e($customer->id); ?>)"><?php echo e(__('lang.followtask')); ?></button>
                                        <button class="btn btn-success" onclick="open1dialog1(<?php echo e($customer->id); ?>)"><?php echo e(__('lang.not')); ?></button>
                                    </td>
                                <?php endif; ?>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <!-- /.table-responsive -->
                <div class="col-lg-6">
                    <div id="my2" class="modal">
                        <div class="modal-content">
                            <span class="clos2e">&times;</span>
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
                                var m1odal2 = document.getElementById("my2");

                                var s1pan = document.getElementsByClassName("clos2e")[0];
                                unfollow_by =function (id) {
                                    var  id=id;
                                    $.ajax({
                                        type: "get",
                                        url: '<?php echo e(route('Info.unfollow')); ?>',
                                        data: {_token: '<?php echo e(csrf_token()); ?>', id: id},
                                        success: function (data) {
                                          //  alert(data);
                                            m1odal2.style.display = "none";
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
                                            //alert(data);
                                            m1odal2.style.display = "none";
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
                                    m1odal2.style.display = "block";
                                    if (event.stopPropagation) event.stopPropagation();


                                }

                                // Whn the user clicks on <span> (x), close the modal
                                s1pan.onclick = function () {
                                    m1odal2.style.display = "none";
                                }

                                // When the user clicks anywhere outside of the modal, close it
                                // window.onclick = function (event) {
                                //     //  alert('faefewf');
                                //     if (event.target == m1odal2) {
                                //         m1odal2.style.display = "none";
                                //     }
                                //
                                // }
                            </script>
                        </div>

                    </div>
                </div>
                <script>
                    $(document).ready(function () {
                        $('#dataTables-Customerinfo').DataTable({
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
    <div class="col-lg-12">
        <div id="customerinfo" class="modal">
            <div class="modal-content">
                <span class="costomerclose">&times;</span>
                <div class="panel panel-primary">
                    <div class="panel-body">
                        <div id="cu_info">


                        </div>

                    </div>

                </div>

                <script>
                    // Get the modal
                    var m1odalinfo = document.getElementById("customerinfo");
                    // Get the button that opens the modal
                    var s1paninfo = document.getElementsByClassName("costomerclose")[0];
                    // When the user clicks the button, open the modal
                    infoshow = function (id, event) {
                        $.ajax({
                            type: "get",
                            url: '<?php echo e(route('Info.cu')); ?>',
                            data: {_token: '<?php echo e(csrf_token()); ?>', id: id},
                            success: function (data) {
                                $("#cu_info").html(data);
                            }, error: function (jqXHR, error, errorThrown) {
                                if (jqXHR.status && jqXHR.status == 400) {
                                    alert(jqXHR.responseText);
                                } else {
                                    alert("Something went wrong");
                                }
                            }
                        });
                        m1odalinfo.style.display = "block";
                        // if (event.stopPropagation) event.stopPropagation();
                    }

                    // Whn the user clicks on <span> (x), close the modal
                    s1paninfo.onclick = function () {
                        m1odalinfo.style.display = "none";
                    }

                </script>
            </div>

        </div>
    </div>


    <form method="post" action="<?php echo e(route('Task.Add')); ?>">
        <div class="col-lg-6">
            <div id="myModal" class=" modal col-lg-6">
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <div class="panel panel-primary">
                        <div class="panel-body">
                            <div class="form-group">
                                <?php echo e(csrf_field()); ?>

                                <label><?php echo e(__('lang.Name')); ?></label>
                                <input type="text" name="name"
                                       placeholder="<?php echo e(__('lang.Task_Name')); ?>"
                                       class="form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>"
                                       value="<?php echo e(old('name')); ?>" required >
                            </div>

                            <div class="form-group">
                                <label><?php echo e(__('lang.TaskType_Name')); ?></label>
                                <select class="js-example-basic-single form-control" name="task_type_id">
                                        <?php $__currentLoopData = $tasktyps=\App\Model\TaskType::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tasktyp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(!is_null($tasktyp)): ?>
                                                <option  value="<?php echo e($tasktyp->id); ?>" ><?php echo e($tasktyp->name); ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label><?php echo e(__('lang.Employee_Name')); ?></label>
                                <select class="js-example-basic-single form-control" name="user_id" required>
                                        <?php $__currentLoopData = $employees=\App\User::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(!is_null($employee)): ?>
                                                <option  value="<?php echo e($employee->id); ?>" ><?php echo e($employee->name); ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label><?php echo e(__('lang.state_Name')); ?></label>
                                <select class="js-example-basic-single form-control" name="state_id" required>
                                        <?php $__currentLoopData = $status=\App\Model\State::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(!is_null($state)): ?>
                                                <option  value="<?php echo e($state->id); ?>" ><?php echo e($state->name); ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="form-group hidden">

                                <input type="text" name="customer_id" id="cuid"
                                       required >
                            </div>
                        </div>
                        <div class="panel-footer">
                            <input type="submit" class="btn btn-primary" value="Save">
                        </div>
                    </div>
                    <script>
                        // Get the modal
                        var modal = document.getElementById("myModal");
                        // Get the button that opens the modal
                     //   var btn =   document.getElementsByClassName("myBtn");
                        // Get the <span> element that closes the modal
                        var span =  document.getElementsByClassName("close")[0];
                        // When the user clicks the button, open the modal
                        opendialog = function (id,event) {

                            $("#cuid").val(id);
                            modal.style.display = "block";
                            if (event.stopPropagation)    event.stopPropagation();
                        }
                        // Whn the user clicks on <span> (x), close the modal
                        span.onclick = function () {
                            modal.style.display = "none";
                        }
                        // When the user clicks anywhere outside of the modal, close it
                        // window.onclick = function (event) {
                        //     if (event.target == modal) {
                        //         modal.style.display = "none";
                        //     }
                        // }
                    </script>
                </div>

            </div>
        </div>
    </form>


        <div class="col-lg-6">
            <div id="my1" class="modal col-lg-6">
                <div class="modal-content">
                    <div id="notesh"></div>
                    <span class="clos1e">&times;</span>
                    <a class="btn btn-success" onclick="notypeopen1dialog()"><?php echo e(__('lang.not')); ?></a>

                    <div class="panel panel-primary">
                        <div class="panel-body">
                            <div class="form-group">
                                <?php echo e(csrf_field()); ?>

                                <label><?php echo e(__('lang.content')); ?></label>
                                <input type="text" name="content" id="content"
                                       placeholder="<?php echo e(__('lang.content')); ?>"
                                       class="form-control<?php echo e($errors->has('content') ? ' is-invalid' : ''); ?>"
                                       value="<?php echo e(old('content')); ?>" required >
                            </div>

                            <div class="form-group">
                                <label><?php echo e(__('lang.notetype')); ?></label>
                                <select class="js-example-basic-single form-control" name="notetype_id" id="notetype_id" required>
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
                            <input type="submit" onclick="noteadd()" class="btn btn-primary" value="Save">
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
                            $("#notesh").html('<a class="btn btn-success" onclick="notsshow('+id+')"><?php echo e(__('lang.shownot')); ?></a>');
                            m1odal.style.display = "block";
                            if (event.stopPropagation)    event.stopPropagation();
                        }
                        noteadd = function () {
                            event.preventDefault();
                            var notetype_id = $("#notetype_id").val();
                            var id = $("#cuid1").val();
                            var content = $("#content").val();

                            $.ajax({
                                type: "get",
                                url: '<?php echo e(route('Info.noteadd')); ?>',
                                data: {_token: '<?php echo e(csrf_token()); ?>', id: id,notetype_id:notetype_id,content:content},
                                success: function (data) {
                                     //alert(data);
                                    m1odal.style.display = "none";
                                }, error: function (jqXHR, error, errorThrown) {
                                    if (jqXHR.status && jqXHR.status == 400) {
                                        alert(jqXHR.responseText);
                                    } else {
                                        alert("Something went wrong");
                                    }
                                }
                            });
                            m1odal.style.display = "block";
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
                            if (event.target == notetypemodel) {
                                notetypemodel.style.display = "none";
                            }
                            if (event.target == modal) {
                                modal.style.display = "none";
                            }
                            if (event.target == m1odal2) {
                                m1odal2.style.display = "none";
                            }

                            if (event.target == m1odalinfo) {
                                m1odalinfo.style.display = "none";
                             }

                            if (event.target == m1odalnots) {
                                m1odalnots.style.display = "none";
                             }

                            if (event.target == m1odalupdate) {
                                m1odalupdate.style.display = "none";
                             }
                        }
                    </script>
                </div>

            </div>
        </div>


    <div class="col-lg-12">
        <div id="oldnots" class="modal">
            <div class="modal-content">
                <span class="oldnotsclose">&times;</span>
                <div class="panel panel-primary">
                    <div class="panel-body">
                        <div id="cu_nots">


                        </div>

                    </div>

                </div>

                <script>
                    // Get the modal
                    var m1odalnots = document.getElementById("oldnots");
                    // Get the button that opens the modal
                    var s1pannots = document.getElementsByClassName("oldnotsclose")[0];
                    // When the user clicks the button, open the modal
                    notsshow = function (id, event) {
                       // alert(id);
                        var id=id;
                        $.ajax({
                            type: "get",
                            url: '<?php echo e(route('Info.note')); ?>',
                            data: {_token: '<?php echo e(csrf_token()); ?>', id: id},
                            success: function (data) {
                               // alert(data);
                                $("#cu_nots").html(data);
                            }, error: function (jqXHR, error, errorThrown) {
                                if (jqXHR.status && jqXHR.status == 400) {
                                    alert(jqXHR.responseText);
                                } else {
                                    alert("Something went wrong");
                                }
                            }
                        });
                        m1odalnots.style.display = "block";
                        // if (event.stopPropagation) event.stopPropagation();
                    }

                    // Whn the user clicks on <span> (x), close the modal
                    s1pannots.onclick = function () {
                        m1odalnots.style.display = "none";
                    }

                </script>
            </div>

        </div>
    </div>

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

    <div class="col-lg-12">
        <div id="cuupdate" class="modal">
            <div class="modal-content">
                <span class="cuupdateclose">&times;</span>
                <div class="panel panel-primary">
                    <div class="panel-body">
                        <div id="cu_update">


                        </div>

                    </div>

                </div>

                <script>
                    // Get the modal
                    var m1odalupdate = document.getElementById("cuupdate");
                    // Get the button that opens the modal
                    var s1panupdate = document.getElementsByClassName("cuupdateclose")[0];
                    // When the user clicks the button, open the modal
                    Updateshow = function (id) {
                        //alert(id);
                        var id=id;
                        $.ajax({
                            type: "get",
                            url: '<?php echo e(route('Info.update')); ?>',
                            data: {_token: '<?php echo e(csrf_token()); ?>', id: id},
                            success: function (data) {
                                // alert(data);
                                $("#cu_update").html(data);
                            }, error: function (jqXHR, error, errorThrown) {
                                if (jqXHR.status && jqXHR.status == 400) {
                                    alert(jqXHR.responseText);
                                } else {
                                    alert("Something went wrong");
                                }
                            }
                        });
                        m1odalupdate.style.display = "block";
                        // if (event.stopPropagation) event.stopPropagation();
                    }

                    // Whn the user clicks on <span> (x), close the modal
                    s1panupdate.onclick = function () {
                        m1odalupdate.style.display = "none";
                    }

                </script>
            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('subject'); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.Admin_app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* /home/eritqaaa/public_html/crmold.eritqaa.com.tr/resources/views/Crm/Group/View_view.blade.php */ ?>