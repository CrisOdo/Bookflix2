

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Listado de libros favoritos</div>

                <div class="card-body">
                    <div class="row pt-1">
                        <?php if($cantidad == 0): ?>
                        <h4>Aún no tienes libros marcados como Favorito</h4>
                        <?php else: ?>
                       
                        <?php $__currentLoopData = array_reverse($lista); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fav): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-4 ">
                            <p style="font-size:12px"><?php echo e($fav['name']); ?></p>
                                <a href="/book/detalle/<?php echo e($fav['id']); ?>">
                                    <img src="/storage/<?php echo e($fav['image']); ?>" class="w-25">
                                </a>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.appUsers', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Administrator\Bookflix\resources\views/user/favoritos/index.blade.php ENDPATH**/ ?>