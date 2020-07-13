

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-header">Listado de los libros menos leídos</div>
            <div class="row pt-1">
                <div class="col-md-8">
                    <h3 style="margin-left: 20px;">Libros menos leídos </h3>
                </div>

                <?php if($cantidad != 0): ?>
                <?php $__currentLoopData = $libros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-12">
                    <a href="/book/deleteConfirm/<?php echo e($book['id']); ?>">
                        <h6 style="margin-left: 20px;"><?php echo e($book->name); ?>---><strong>Fue leído <?php echo e($book->vecesTerminado); ?> veces. Haga click para eliminarlo.</strong></h6>
                    </a>

                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                <h3 style="margin-left: 20px;">No hay libros en el sistema</h3>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Administrator\Bookflix\resources\views/admin/reportes/indexML.blade.php ENDPATH**/ ?>