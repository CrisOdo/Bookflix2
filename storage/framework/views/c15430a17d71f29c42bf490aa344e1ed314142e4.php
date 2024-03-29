

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-header">Listado de editoriales</div>
            <div class="row pt-1">
                <?php $__currentLoopData = $editoriales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $editorial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-4 pt-4 pb-4">
                    <h3><?php echo e($editorial->name); ?></h3>                    
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Administrator\Bookflix\resources\views/admin/editorial/index.blade.php ENDPATH**/ ?>