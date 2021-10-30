
<?php $__env->startSection('title'); ?>
    <?php echo e(__('lang.Add_Article')); ?>

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
            <button style="float:right;color: white;margin: 5px;background-color: black" id="myBtn"><?php echo e(__('lang.Category_Add')); ?></button>
            <form method="post">
                <?php echo e(csrf_field()); ?>

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <?php echo e(__('lang.Add_Article')); ?>


                </div>
                <div class="flash-message">
                    <?php $__currentLoopData = ['danger', 'warning', 'success', 'info']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(Session::has('alert-' . $msg)): ?>
                            <p class="alert alert-<?php echo e($msg); ?>"><?php echo e(Session::get('alert-' . $msg)); ?> <a href="#"
                                                                                                     class="close"
                                                                                                     data-dismiss="alert"
                                                                                                     aria-label="close">&times;</a>
                            </p>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="panel-body">

                    <div class="form-group">
                        <label><?php echo e(__('lang.title')); ?></label>
                        <input type="text" name="title" placeholder="<?php echo e(__('lang.title')); ?>"
                               class="form-control<?php echo e($errors->has('tilte') ? ' is-invalid' : ''); ?>"
                               value="<?php echo e(old('title')); ?>" required>
                    </div>
                    <div class="form-group">
                        <label><?php echo e(__('lang.Catrgory')); ?></label>
                        <select class="js-example-basic-single form-control" name="category_id">
                            
                            <?php if(!is_null($Cats)): ?>
                                <?php $__currentLoopData = $Cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($Cat->id); ?>"><?php echo e($Cat->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 mb-1"><label
                                    for="shortnote"><?php echo e(__('lang.content')); ?></label><br>
                            <textarea required name="content" rows="4" class="summernote form-control ckeditor"
                                      id="contents" value="<?php echo e(old('content')); ?>" title="Contents"></textarea></div>
                    </div>
                    <select class="js-example-basic-single form-control" name="status">
                        <option value="all"><?php echo e(__('lang.all')); ?></option>
                        <option value="Deprtment_me"><?php echo e(__('lang.Deprtment_me')); ?></option>
                        <option value="none"><?php echo e(__('lang.none')); ?></option>
                    </select>
                </div>
                <div class="panel-footer">
                    <input type="submit" class="btn btn-primary" value="<?php echo e(__('lang.Send')); ?>">
                </div>
            </div>
            <script>
                $(document).ready(function() {
                    $('.js-example-basic-single').select2();
                });
            </script>
            </form>
        </div>

    <!-- The Modal -->
    <form method="post" action="<?php echo e(route('Category.Add')); ?>">
        <div class="col-lg-6">
        <div id="myModal" class="modal col-lg-6">
            <div class="modal-content">
                <span class="close">&times;</span>
                <div class="panel panel-primary">
                    <div class="panel-body">

                        <div class="form-group">
                            <?php echo e(csrf_field()); ?>

                            <label><?php echo e(__('lang.Name')); ?></label>
                            <input type="text" name="name" placeholder="<?php echo e(__('lang.Name')); ?>"
                                   class="form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>"
                                   value="<?php echo e(old('name')); ?>" required>
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
                    var btn = document.getElementById("myBtn");

                    // Get the <span> element that closes the modal
                    var span = document.getElementsByClassName("close")[0];

                    // When the user clicks the button, open the modal
                    btn.onclick = function (event) {
                        if (event.stopPropagation)    event.stopPropagation();
                        modal.style.display = "block";
                    }

                    // When the user clicks on <span> (x), close the modal
                    span.onclick = function () {
                        modal.style.display = "none";
                    }

                    // When the user clicks anywhere outside of the modal, close it
                    window.onclick = function (event) {
                        if (event.target == modal) {
                            modal.style.display = "none";
                        }
                    }
                </script>
            </div>

        </div>
        </div>
    </form>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('subject'); ?>
    <?php echo e(__('lang.Subject')); ?>}}
<?php $__env->stopSection(); ?>
<script src="//cdn.ckeditor.com/4.11.3/full/ckeditor.js"></script>
<?php echo $__env->make("layouts.Admin_app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* /home/eritqaaa/public_html/crmold.eritqaa.com.tr/resources/views/Crm/Article/Add_view.blade.php */ ?>