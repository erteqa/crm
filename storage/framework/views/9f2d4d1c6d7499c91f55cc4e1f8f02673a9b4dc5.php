
<?php $__env->startSection('title'); ?>
    <?php echo e(__('lang.Notes_Editor')); ?>

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
        <div class="panel panel-primary">
            <div class="flash-message">
                <?php $__currentLoopData = ['danger', 'warning', 'success', 'info']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(Session::has('alert-' . $msg)): ?>

                        <p class="alert alert-<?php echo e($msg); ?>"><?php echo e(Session::get('alert-' . $msg)); ?> <a href="#" class="close"
                                                                                                 data-dismiss="alert"
                                                                                                 aria-label="close">&times;</a>
                        </p>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="panel-body">
                <a class="btn btn-primary" style="margin-bottom: 10px"
                   href="<?php echo e(route('Note.Add')); ?>"><?php echo e(__('lang.New_Note')); ?></a>
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr>
                        <?php $i = 1;?>
                        <th>#</th>
                        <th><?php echo e(__('lang.Name')); ?></th>
                        <th><?php echo e(__('lang.customername')); ?></th>
                        <th><?php echo e(__('lang.content')); ?></th>
                        <th><?php echo e(__('lang.typename')); ?></th>
                        <th><?php echo e(__('lang.Action')); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $Notes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $note): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(is_null($note->Customer)) continue; ?>

                        <tr class="odd gradeX">
                            <td><?php echo e($i++); ?></td>
                            <td><?php echo e($note->User->name); ?></td>

                            <td><?php echo e($note->Customer->name); ?></td>

                            <td><?php echo e($note->content); ?></td>
                            <td><?php echo e($note->Notetype->typename); ?></td>

                            <td style="width: 23%">
                                <?php if(auth()->user()->id===$note->user_id): ?>
                                <a class="btn btn-danger"
                                   onclick="del('<?php echo e(route('Notes.Delete',['id'=>$note->id])); ?>')"><?php echo e(__('lang.Delete')); ?></a>

                                <button class="btn btn-success"
                                        onclick="open1dialog1(<?php echo e("'".$note->content."',".$note->id); ?>)"><?php echo e(__('lang.Update')); ?></button>
                                   <?php endif; ?>
                            </td>

                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
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
    <form method="post" action="<?php echo e(route('Notes.Update')); ?>">
        <div class="col-lg-6">
            <div id="my1" class="modal col-lg-6">
                <div class="modal-content">
                    <span class="clos1e">&times;</span>
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
                        var m1odal = document.getElementById("my1");
                        // Get the button that opens the modal
                        // var btn =   document.getElementsByClassName("myBtn");
                        // Get the <span> element that closes the modal
                        var s1pan = document.getElementsByClassName("clos1e")[0];
                        // When the user clicks the button, open the modal
                        open1dialog1 = function (content,id, event) {
//alert(content);
                             $("#con").val(content);
                             $("#id").val(id);
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
                            if (event.target == notetypemodel) {
                                notetypemodel.style.display = "none";
                            }
                            // if (event.target == modal) {
                            //     modal.style.display = "none";
                            // }
                        }
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
                                       value="<?php echo e(old('typename')); ?>" required>
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
                        var notetypespan = document.getElementsByClassName("notetypeclose")[0];
                        // When the user clicks the button, open the modal
                        notypeopen1dialog = function (event) {
                            //    alert('yrcgcb');
                            //     m1odal.style.display = "none";
                            //     modal.style.display = "none";

                            notetypemodel.style.display = "block";
                            if (event.stopPropagation) event.stopPropagation();
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('subject'); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.Admin_app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* /home/eritqaaa/public_html/crmold.eritqaa.com.tr/resources/views/Crm/Notes/Index_view.blade.php */ ?>