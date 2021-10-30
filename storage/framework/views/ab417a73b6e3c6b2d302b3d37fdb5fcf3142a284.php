<?php $__env->startSection('title'); ?>
    <?php echo e(__('lang.Task_Update')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <form method="post">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <?php echo e(__('lang.Task_Update')); ?>


                <a  style="margin-left: 20%" class="btn btn-success"
                   href="<?php echo e(route('Customer.View',['id'=>$Task->customer_id])); ?>"><?php echo e(__('lang.Customer_View')); ?></a>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <?php echo e(csrf_field()); ?>

                    <label><?php echo e(__('lang.Name')); ?></label>
                    <input type="text"  readonly class="form-control"   value="<?php echo e($Task->name); ?>" required >
                </div>
                <div class="form-group">

                    <label><?php echo e(__('lang.TaskType')); ?></label>
                    <input type="text" readonly class="form-control"   value="<?php echo e(is_null( $Task->TaskType)?'':$Task->TaskType->name); ?>" required >
                </div>


                <div class="form-group">
                    <label><?php echo e(__('lang.Employee')); ?></label>
                    <select class="js-example-basic-single form-control" name="user_id">

                        <?php if(!is_null($employees)): ?>
                            <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(!is_null($employee->Task)): ?>
                                    <option <?php echo e($employee->id==$Task->User->id?'selected="selected"':''); ?>   value="<?php echo e($employee->id); ?>" ><?php echo e($employee->name); ?></option>
                                <?php else: ?>
                                    <option    value="<?php echo e($employee->id); ?>" ><?php echo e($employee->name); ?></option>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label><?php echo e(__('lang.Customer')); ?></label>
                    <input type="text" readonly class="form-control"   value="<?php echo e(is_null($Task->Customer)?'':$Task->Customer->name); ?>" required >
                </div>

                <div class="form-group">
                    <label><?php echo e(__('lang.State')); ?></label>
                    <input type="text"  readonly class="form-control"   value="<?php echo e(is_null( $Task->State)?'':$Task->State->name); ?>" required >
                    <div class="progress progress-striped active">
                        <div class="progress-bar <?php echo e(\App\Http\Controllers\Style_cont::progress(is_null($Task->State)?'':$Task->State->percent)); ?>" role="progressbar" aria-valuenow="<?php echo e(is_null($Task->State)?'':$Task->State->percent); ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo e($Task->State->percent); ?>%">
                            <span class="sr-only"><?php echo e(is_null($Task->State)?'':$Task->State->percent); ?> % Complete (warning)</span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label><?php echo e(__('lang.Chang_State_to')); ?></label>
                    <select class="js-example-basic-single form-control" name="state_id">

                        <?php if(!is_null($status)): ?>
                            <?php $__currentLoopData = $status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(!is_null($state)): ?>
                                    <option  <?php echo e($state->id==$Task->State->id?'selected="selected"':''); ?> value="<?php echo e($state->id); ?>" ><?php echo e($state->name); ?></option>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label><?php echo e(__('lang.Duration')); ?></label>
                    <input type="text"  readonly class="form-control"   value="<?php echo e($Task->duration); ?>" required >
                </div>

                <div class="form-group">
                    <label><?php echo e(__('lang.Description')); ?></label>
                    <input type="text"  readonly class="form-control"   value="<?php echo e($Task->description); ?>" required >
                </div>

                <div class="form-group">
                    <label><?php echo e(__('lang.Memo_User')); ?></label>
                    <table id="tbUser">

                     <?php if(strpos($Task->memo_user, ']')): ?>
                            <?php $__currentLoopData = json_decode($Task->memo_user); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $memo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td width="96%"><input type="text"  name ="memouser[]"  class="form-control"   value="<?php echo e($memo); ?>" ></td>
                                    <td width="4%"><button class="btnDelete">Delete</button></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                         <?php else: ?>
                            <tr>
                                <td width="96%"><input type="text"  name ="memouser[]"  class="form-control"   value="<?php echo e($Task->memo_user); ?>" ></td>
                                <td width="4%"><button class="btnDelete">Delete</button></td>
                            </tr>
                     <?php endif; ?>








                    </table>
                    <a class="btn btn-primary" onclick="addrow()"><?php echo e(__('lang.Add_Row')); ?></a>

                </div>

                <div class="form-group">
                    <label><?php echo e(__('lang.Memo_Customer')); ?></label>
                    <input type="text"  readonly class="form-control"   value="<?php echo e($Task->memo_customer); ?>"  >
                </div>



            </div>
            <div class="panel-footer">
               <input type="submit" class="btn btn-primary" value="Save">
            </div>
        </div>
    </div>
    </form>
<script>
    function IsJsonString(str) {
        try {
            JSON.parse(str);
        } catch (e) {
            return false;
        }
        return true;
    }
    $("#tbUser").on('click', '.btnDelete', function () {
        event.preventDefault();
        var txt;
        var r = confirm("Press a button!");
        if (r == true) {
            $(this).closest('tr').remove();
        }

        return false;
    });
   function addrow(){
       event.preventDefault();
       $('#tbUser').append('<tr> <td width="96%">' +
           '<input type="text"  name ="memouser[]"  class="form-control"   value=""  ></td>\n' +
           '                            <td width="4%"><button class="btnDelete">Delete</button></td></tr>');
       return false;
    }
    var slider = $('#progress');
    var textn = $('#prog');
    textn.text(slider.val() + '%');
    $(document).on('change', slider, function (e) {
        e.preventDefault();
        textn.text($('#progress').val() + '%');

    });
</script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('subject'); ?>
    Subject !!!!!!!!!!!
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.Admin_app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* H:\root\home\eritqaaacademy-001\www\crm\CRMV3\crmlaraveltest\resources\views/Crm/Task/View_view.blade.php */ ?>