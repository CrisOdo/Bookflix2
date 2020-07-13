

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <?php if($user->spoilerAlert==false): ?>
            <form action="/ASA/<?php echo e($user->id); ?>" enctype="multipart/form-data" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PATCH'); ?>
                <div class="form-group row">
                    <div>
                        <button style="margin-left: 15px; font-size: 9px;" type="submit" class="btn btn-primary">
                            Activar spoiler alert
                        </button>
                    </div>
                </div>
            </form>
            <?php else: ?>
            <form action="/DSA/<?php echo e($user->id); ?>" enctype="multipart/form-data" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PATCH'); ?>
                <div class="form-group row">
                    <div>
                        <button style="margin-left: 15px; font-size: 9px;" type="submit" class="btn btn-primary">
                            Desactivar spoiler alert
                        </button>
                    </div>
                </div>
            </form>
            <?php endif; ?>

            <div class="card-header">Listado de libros</div>
            <div class="row pt-1">
                <?php $__currentLoopData = $libros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $libro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if( ($libro->validoDesde <= date('Y-m-d')) and ($libro->validoHasta >= date('Y-m-d'))): ?>
                    <div class="col-4 pt-4 pb-4">
                        <div class="container"><?php echo e($libro->name); ?></div>
                        <link href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" rel="stylesheet" />
                        <div class="container"> 
                            <?php                         
                                $ok=true;
                            ?>
                            <?php for($i = 0; $i < $cantidad; $i++): ?>
                                <?php if($libro->id == $lista[$i]['id']): ?>
                                    <?php                         
                                        $ok=false;
                                    ?>
                                <?php endif; ?>
                            <?php endfor; ?>
                            
                            <?php if($ok == true): ?>
                                <a href="/marcarFavorito/<?php echo e($libro->id); ?>"><i class="fas fa-heart"></i></a>
                            <?php else: ?>
                                <a href="/desmarcarFavorito/<?php echo e($libro->id); ?>"><i class="fas fa-heart-broken"></i></a>
                            <?php endif; ?>

                            <a href="/book/detalle/<?php echo e($libro->id); ?>">
                                <img src="/storage/<?php echo e($libro->image); ?>" class="w-100">
                            </a>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.appUsers', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Administrator\Bookflix\resources\views/user/book/index.blade.php ENDPATH**/ ?>