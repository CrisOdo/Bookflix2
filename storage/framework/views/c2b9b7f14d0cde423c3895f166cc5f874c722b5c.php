

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div  class="col-12 pt-4 pb-4">
        <h1 class="col-12 display-4 text-center">Suscribite a Bookflix y difrutá de los mejores títulos</h1>
            <div class="row pt-1">
                <?php $__currentLoopData = $libros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $libro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if( ($libro->validoDesde <= date('Y-m-d')) and ($libro->validoHasta >= date('Y-m-d'))): ?>
                    <div class="col-2 pt-4 pb-4">
                        <a href="/book/detalle/<?php echo e($libro->id); ?>">
                            <img src="/storage/<?php echo e($libro->image); ?>" class="w-100">
                        </a>
                    </div>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Administrator\Desktop\New folder\Bookflix2\resources\views/welcome.blade.php ENDPATH**/ ?>