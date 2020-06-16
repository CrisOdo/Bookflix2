

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-header">Listado de libros</div>
            <div class="row pt-1">
                <?php $__currentLoopData = $libros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $libro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-4 pt-4 pb-4">
                    <h6><?php echo e($libro->name); ?></h3>
                        <img src="/storage/<?php echo e($libro->image); ?>" class="w-100">
                        <?php if($libro->cantidad==0): ?>
                        <button>
                            <a href="/book/editE/<?php echo e($libro->id); ?>">Editar libro</a>
                        </button>
                        <?php else: ?>
                        <button>
                            <a href="/book/editC/<?php echo e($libro->id); ?>">Editar libro</a>
                        </button>
                        <?php endif; ?>
                        <?php if($libro->adelanto != null): ?>
                        <button>
                            <a href="/book/deleteAdelanto/<?php echo e($libro->id); ?>">Eliminar adelanto</a>
                        </button>
                        <?php endif; ?>
                        <button>
                            <a href="/book/deleteConfirm/<?php echo e($libro->id); ?>">Eliminar libro</a>
                        </button>                        
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Administrator\Bookflix\resources\views/admin/book/index.blade.php ENDPATH**/ ?>