<form method="post">
    <div class="col-lg-12">

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
                    <label><?php echo e(__('lang.Group_Name')); ?></label>
                    <select class="js-example-basic-single form-control" name="group_id" id="group_id">
                        
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
                <hr>
                <div class="form-group">
                    <label><?php echo e(__('lang.Role')); ?></label>
                    <select class="js-example-basic-single form-control" name="rolename" required id="rolename">
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
            <input type="submit" onclick="savedata(<?php echo e($customer->id); ?>,event)" class="btn btn-primary" value="Save">
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('.js-example-basic-single').select2();
        });
        savedata = function (id,event) {
            event.preventDefault();
           var group_id= $("#group_id").val();
           var rolename=   $("#rolename").val();
            var id=id;
            $.ajax({
                type: "get",
                url: '<?php echo e(route('Info.updatesave')); ?>',
                data: {_token: '<?php echo e(csrf_token()); ?>', id: id,group_id:group_id,rolename:rolename},
                success: function (data) {
                   //  alert(data);
                    m1odalupdate.style.display = "none";
                    var rm = document.getElementById("CU."+id);
                    rm.remove();
                }, error: function (jqXHR, error, errorThrown) {
                    if (jqXHR.status && jqXHR.status == 400) {
                        alert(jqXHR.responseText);
                    } else {
                        alert("Something went wrong");
                    }
                }
            });
          //  m1odalupdate.style.display = "block";
            // if (event.stopPropagation) event.stopPropagation();
        }
    </script>
</form>

<?php /* H:\root\home\eritqaaacademy-001\www\crm\CRMV3\crmlaraveltest\resources\views/info/update.blade.php */ ?>