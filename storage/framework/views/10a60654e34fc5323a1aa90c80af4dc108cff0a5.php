

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Historial</div>

                <div class="card-body">
                    <div class="row pt-1">
                        <?php if($historial->cantidad == 0): ?>
                        <h4>Historial vacío</h4>
                        <?php else: ?>
                       
                        <?php $__currentLoopData = array_reverse($historial->books); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-4 pt-8 ">
                            <p style="font-size:12px"><?php echo e($book['name']); ?></p>
                                <a href="/book/detalle/<?php echo e($book['id']); ?>">
                                    <img src="/storage/<?php echo e($book['image']); ?>" class="w-25">
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
<?php echo $__env->make('layouts.appUsers', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Administrator\Bookflix\resources\views/user/historial/index.blade.php ENDPATH**/ ?>