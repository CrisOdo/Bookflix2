

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-header">Listado de novedades</div>
            <div class="row pt-1">
                <?php $__currentLoopData = $novedades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $novedad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-4 pt-4 pb-4">
                    <h6><?php echo e($novedad->name); ?></h3>
                    <img src="/storage/<?php echo e($novedad->image); ?>" class="w-100">
                    <button>
                        <a href="/novedad/show/<?php echo e($novedad->id); ?>">Ver detalle novedad</a> 
                    </button>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Administrator\Bookflix\resources\views/admin/novedad/index.blade.php ENDPATH**/ ?>