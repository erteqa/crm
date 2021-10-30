<div class="panel panel-primary">

    <div class="panel-body">
        <a class="btn btn-primary" style="margin-bottom: 10px"
           href="<?php echo e(route('Task.Add')); ?>" target="_blank"><?php echo e(__('lang.Add_Task')); ?></a>
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
<?php /* H:\root\home\eritqaaacademy-001\www\crm\CRMV3\crmlaraveltest\resources\views/info/taskinfo.blade.php */ ?>