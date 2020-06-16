

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h3 class="card-header"><?php echo e($libro->name); ?></h3>
                <div class="card-body d-flex">

                    <div class="col-4 center">
                        <img src="/storage/<?php echo e($libro->image); ?>" class="w-100">
                        <h4>Autor:</h4>
                        <p><?php echo e($autor->name); ?></p>
                        <h4>Genero:</h4>
                        <p><?php echo e($genero->name); ?></p>
                        <h4>Editorial:</h4>
                        <p><?php echo e($editorial->name); ?></p>
                        <?php if($libro->adelanto != null): ?>
                        <div class="col-12">
                            <form action="/book/readAdelanto/<?php echo e($libro->id); ?>" enctype="multipart/form-data" method="GET">
                                <?php echo csrf_field(); ?>
                                <div class="form-group row">
                                    <div>
                                        <button type="submit" class="btn btn-primary">
                                            Ver adelanto
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <?php endif; ?>
                    </div>

                    <div class="col-4 center">
                        <div>
                            <h4>Descripcion: </h4>
                        </div>

                        <div>
                            <p class="text-justify" id="description" type="text" name="description">
                                <?php echo e($libro->description); ?>

                            </p>
                        </div>
                    </div>


                    <div class="col-12">
                        <?php if($libro->cantidad == 0): ?>
                        <form action="/book/read/<?php echo e($libro->id); ?>" enctype="multipart/form-data" method="GET">
                            <?php echo csrf_field(); ?>
                            <div class="form-group row">
                                <div>
                                    <button type="submit" class="btn btn-primary">
                                        Leer libro
                                    </button>
                                </div>
                            </div>
                        </form>
                        <?php else: ?>
                        <?php $__currentLoopData = $libro->chapters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chapter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-4 d-inline ">
                            <p style="font-size:12px"><?php echo e($chapter['name']); ?></p>
                            
                            <form action="/chapter/read/<?php echo e($chapter['id']); ?>" enctype="multipart/form-data" method="GET">
                                <?php echo csrf_field(); ?>
                                <div class="form-group row">
                                    <div>
                                        <button type="submit" class="btn btn-primary">
                                            Leer capitulo
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.appUsers', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Administrator\Bookflix\resources\views/user/book/show.blade.php ENDPATH**/ ?>