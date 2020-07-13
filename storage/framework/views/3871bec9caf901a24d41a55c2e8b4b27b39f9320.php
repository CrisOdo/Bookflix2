

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="col-md-8">
                    <div class="card-header">Perfil desactivado</div>
                </div>
                <div class="card-header d-flex">
                    <h1 class="col-12 display-4 text-center">Selecciona tu perfil</h1>
                </div>

                <div class="card-body">
                    <?php if($usuario->tipo == 1): ?>
                    <?php if($usuario->perfilesActivos < 2): ?> <a href="/perfil/create">
                        <div class="text-center col-3 button btn-primary">Nuevo perfil</div>
                        </a>
                        <?php endif; ?>
                        <?php else: ?>
                        <?php if($usuario->perfilesActivos < 4): ?> <a href="/perfil/create">
                            <div class="text-center col-3 button btn-primary">Nuevo perfil</div>
                            </a>
                            <?php endif; ?>
                            <?php endif; ?>
                            <?php if($usuario->perfilesActivos == 2 && $usuario->tipo == 1): ?>
                            <h3> Pasate a premium para obtener más perfiles</h3>
                            <?php endif; ?>
                            <form action="/cp" enctype="multipart/form-data" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PATCH'); ?>
                                <div class="card-body align-self-auto">
                                    <div class="row pt-1">
                                        <select id="perfilElegido" type="text" class="form-control <?php $__errorArgs = ['perfilElegido'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="perfilElegido" autofocus>>
                                            <option value="">Seleccione su perfil</option>
                                            <?php $__currentLoopData = $listaPerfiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $perfil): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($perfil['id']); ?>"> <?php echo e($perfil['name']); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php $__errorArgs = ['perfilElegido'];
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
                                            Seleccionar perfil
                                        </button>
                                    </div>
                                </div>
                            </form>
                </div>
            </div>
        </div>
    </div>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.appUsers', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Administrator\Bookflix\resources\views/user/perfiles/deleted.blade.php ENDPATH**/ ?>