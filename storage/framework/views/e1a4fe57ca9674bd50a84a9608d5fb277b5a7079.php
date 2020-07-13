

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
                        <?php if($leido == false): ?>
                        <div class="col-4 d-inline ">
                            <form action="/book/leido/<?php echo e($libro['id']); ?>" enctype="multipart/form-data" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PATCH'); ?>
                                <div class="form-group row">
                                    <div>
                                        <button type="submit" class="btn btn-primary">
                                            Marcar como leído
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
                <div>
                    <div class="col-6">
                        <h3>Comentarios sobre este libro</h3>
                    </div>
                    <?php if($leido == true): ?>
                    <div class="col-12">
                        <form action="/comment/<?php echo e($libro['id']); ?>" enctype="multipart/form-data" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="form-group row">
                                <label for="comentario" class="col-md-4 col-form-label ">Escribe tu comentario</label>

                                <div class="col-md-6">
                                    <input id="comentario" type="text" class="form-control <?php $__errorArgs = ['comentario'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="comentario" value="<?php echo e(old('comentario')); ?>" autocomplete="comentario" autofocus>

                                    <?php $__errorArgs = ['comentario'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="spoiler" class="col-md-4 col-form-label">Spoiler</label>

                                <div class="col-md-6">
                                    <input id="spoiler" type="checkbox" class="form-control <?php $__errorArgs = ['spoiler'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="spoiler" checked autofocus>

                                    <?php $__errorArgs = ['spoiler'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Comentar
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <?php endif; ?>
                </div>
                <div>
                    <?php if($libro->cantidadComentarios > 0): ?>
                    <?php $__currentLoopData = $libro->comentarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comentario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-6" style="border: solid; margin-left: 20px; margin-top: 10px;">
                        <?php if($comentario['spoiler'] == true && $user->spoilerAlert == true && $comentario['user_id'] != $user->id): ?>
                        <h5 style="color: transparent; text-shadow: 0 0 5px rgba(0,0,0,0.5);"><?php echo e($comentario['cuerpo']); ?></h5>
                        <?php else: ?>
                        <h5><?php echo e($comentario['cuerpo']); ?></h5>
                        <?php endif; ?>
                        <?php if($comentario['user_id'] == $user->id): ?>
                        <form action="/comment/delete/<?php echo e($comentario['id']); ?>" enctype="multipart/form-data" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <div class="form-group row mb-0">
                                <div class="col-md-6">
                                    <button style="font-size: 8px;" type="submit" class="btn btn-danger">
                                        Eliminar
                                    </button>
                                </div>
                            </div>
                        </form>
                        <?php endif; ?>
                    </div>
                    <br>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.appUsers', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Administrator\Bookflix\resources\views/user/book/show.blade.php ENDPATH**/ ?>