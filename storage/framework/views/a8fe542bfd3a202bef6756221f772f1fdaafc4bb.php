

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Desactivar perfil</div>
                <div class="card-body">
                    <form method="POST" action="/perfiles/delete/<?php echo e($perfilElegido->id); ?>" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>     
                            <?php echo method_field('DELETE'); ?>                       
                            <div class="card-header">¿Está seguro que desea desactivar el perfil <?php echo e($perfilElegido->name); ?> ?</div>
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Confirmar
                                </button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.appUsers', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Administrator\Bookflix\resources\views/user/perfiles/delete.blade.php ENDPATH**/ ?>