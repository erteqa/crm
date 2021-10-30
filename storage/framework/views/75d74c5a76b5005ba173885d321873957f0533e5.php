<?php $__env->startSection('content'); ?>
    <h3>Administer Database Backups</h3>
    <div class="row">
        <div class="col-xs-12 clearfix">
            <a id="create-new-backup-button" href="<?php echo e(route('Backup.Create')); ?>" class="btn btn-primary pull-right"
               style="margin-bottom:2em;"><i
                        class="fa fa-plus"></i> Create New Backup
            </a>
        </div>
        <div class="col-xs-12">
            <?php if(count($backups)): ?>

                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>File</th>
                        <th>Size</th>
                        <th>Date</th>
                        <th>Age</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $backups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $backup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($backup['file_name']); ?></td>
                            <td><?php echo e(humanFilesize($backup['file_size'])); ?></td>
                            <td>
                                <?php echo e(formatTimeStamp($backup['last_modified'], 'F jS, Y, g:ia (T)')); ?>

                            </td>
                            <td>
                                <?php echo e(diffTimeStamp($backup['last_modified'])); ?>

                            </td>
                            <td class="text-right">
                                <a class="btn btn-xs btn-default"
                                   href="<?php echo e(url('backup/download/'.$backup['file_name'])); ?>"><i
                                            class="fa fa-cloud-download"></i> Download</a>
                                <a class="btn btn-xs btn-danger" data-button-type="delete"
                                   href="<?php echo e(url('backup/delete/'.$backup['file_name'])); ?>"><i class="fa fa-trash-o"></i>
                                    Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            <?php else: ?>
                <div class="well">
                    <h4>There are no backups</h4>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.Admin_app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* C:\dd\crmlaraveltest\resources\views/Backup/backups.blade.php */ ?>