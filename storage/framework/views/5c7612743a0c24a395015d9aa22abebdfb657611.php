<?php $__env->startSection('title'); ?>
    <?php echo e(__('lang.Customer_Update')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div>

        <form method="post"  enctype="multipart/form-data">
            <div class="col-lg-8">

                    <div class="panel panel-primary">
                    <div class="panel-heading">
                        User Files
                    </div>
                    <div class="panel-body">
                        <?php echo e(csrf_field()); ?>

                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th><?php echo e(__('lang.Name_file')); ?></th>
                                <th><?php echo e(__('lang.file')); ?></th>
                                <th><?php echo e(__('lang.Action')); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(strpos($file->name, '.pdf')): ?>
                                    <tr class="odd gradeX">
                                        <td class="nr"><?php echo e($file->id); ?></td>
                                        <td><?php echo e($file->name); ?></td>
                                        <td>
                                            
                                            
                                            
                                            
                                            <a href="<?php echo e(asset('Files/'.$file->path)); ?>">
                                                <img src="<?php echo e(asset('Images/'.'pdf image.jpg')); ?>"

                                                     alt="pdf"   style="width: 100px; height: 100px" ></a>
                                        </td>
                                        <td>
                                            <a href="<?php echo e(route('Downloads',['file'=>$file->path])); ?>"> download</a>
                                            <a class="btn btn-danger"
                                               onclick="del('<?php echo e(route('UserFile.Delete',['id'=>$file->id])); ?>')"><?php echo e(__('lang.Delete')); ?></a>

                                        </td>
                                    </tr>
                                <?php elseif(strpos($file->name, '.docx') or strpos($file->name, '.doc')): ?>
                                    <tr class="odd gradeX">
                                        <td class="nr"><?php echo e($file->id); ?></td>
                                        <td><?php echo e($file->name); ?></td>
                                        <td>
                                            <a href="<?php echo e(asset('Files/'.$file->path)); ?>">
                                                <img src="<?php echo e(asset('Images/'.'word.jpg')); ?>"

                                                     alt="word"   style="width: 100px; height: 100px" ></a>
                                            <a class="btn btn-info" id="sharefile"><?php echo e(__('lang.Share')); ?></a>
                                        </td>
                                        <td>
                                            <a href="<?php echo e(route('Downloads',['file'=>$file->path])); ?>"> download</a>
                                            <a class="btn btn-danger"
                                               onclick="del('<?php echo e(route('UserFile.Delete',['id'=>$file->id])); ?>')"><?php echo e(__('lang.Delete')); ?></a>

                                        </td>
                                    </tr>
                                <?php elseif(strpos($file->name, '.xlsx') or strpos($file->name, '.xls')): ?>
                                    <tr class="odd gradeX">
                                        <td class="nr"><?php echo e($file->id); ?></td>
                                        <td><?php echo e($file->name); ?></td>
                                        <td>
                                            <a href="<?php echo e(asset('Files/'.$file->path)); ?>">
                                                <img src="<?php echo e(asset('Images/'.'excel.jpg')); ?>"
                                                     alt="word"   style="width: 100px; height: 100px" ></a>
                                        </td>
                                        <td>
                                            <a href="<?php echo e(route('Downloads',['file'=>$file->path])); ?>"> download</a>
                                            <a class="btn btn-danger"
                                               onclick="del('<?php echo e(route('UserFile.Delete',['id'=>$file->id])); ?>')"><?php echo e(__('lang.Delete')); ?></a>

                                            <a class="sharefile btn btn-info"  data-toggle="modal" data-target="#myModal" ><?php echo e(__('lang.Share')); ?></a>

                                        </td>
                                    </tr>
                                <?php else: ?>
                                    <tr class="odd gradeX">
                                        <td class="nr"><?php echo e($file->id); ?></td>
                                        <td><?php echo e($file->name); ?></td>
                                        <td>
                                            <a href="<?php echo e(asset('Files/'.$file->path)); ?>">
                                                <img src="<?php echo e(asset('Files/'.$file->path)); ?>"
                                                     alt="Image" style="width: 100px; height: 100px"></a>
                                        </td>
                                        <td>
                                            <a href="<?php echo e(route('Downloads',['file'=>$file->path])); ?>"> download</a>

                                            <a class="btn btn-danger"
                                               onclick="del('<?php echo e(route('UserFile.Delete',['id'=>$file->id])); ?>')"><?php echo e(__('lang.Delete')); ?></a>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        <!-- Modal -->
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
    <form method="post" action="<?php echo e(route('UserFile.Share')); ?>">
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <?php echo e(csrf_field()); ?>

                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Modal Header</h4>
                    </div>
                    <div class="modal-body">
                        <div >

                            <input  id="fileid" name="fileid" vlaue="" required>

                        </div>
                        <div class="form-group">
                            <label><?php echo e(__('lang.Employee_Name')); ?></label>
                            <select class="js-example-basic-single form-control" name="user_id">
                                
                                <?php if(!is_null($Users)): ?>
                                    <?php $__currentLoopData = $Users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $User): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(!is_null($User)): ?>
                                            <option  value="<?php echo e($User->id); ?>"><?php echo e($User->name); ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-default"><?php echo e(__('lang.Share')); ?></button>
                        
                    </div>
                </div>

            </div>
        </div>
        <script>
            $(document).ready(function () {

                $(".sharefile").on('click',function(){
                    var $item = $(this).closest("tr")   // Finds the closest row <tr>
                        .find(".nr")     // Gets a descendent with class="nr"
                        .text();
                    $("#fileid").val($item);
                  //  alert($item);
                });
            });

            function del($url) {
                var $ret_val = confirm('Yes Or No');
                if ($ret_val == true) {
                    window.location.href = $url;
                }
            }
        </script>
    </form>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('subject'); ?>
    Subject !!!!!!!!!!!
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.Admin_app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* H:\root\home\eritqaaacademy-001\www\crm\CRMV3\crmlaraveltest\resources\views/Crm/UserFile/Update_view.blade.php */ ?>