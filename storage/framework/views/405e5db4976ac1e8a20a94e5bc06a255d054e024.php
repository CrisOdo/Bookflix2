

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-header">Listado de suscripciones entre las fechas solicitadas</div>
            <div class="row pt-1">
                <h3 style="margin-left: 20px;">Total de suscripciones: <?php echo e($cantidad); ?> </h3>
                <?php $__currentLoopData = $lista; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-8">
                    <h6 style="margin-left: 20px;"><?php echo e($user->email); ?></h3>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</div>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Administrator\Bookflix\resources\views/admin/reportes/index.blade.php ENDPATH**/ ?>