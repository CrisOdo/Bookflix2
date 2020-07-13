

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Desactivar perfil</div>
                <div class="card-body">
                    <form method="POST" action="/pasatePremium/<?php echo e($usuario->id); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PATCH'); ?>
                        <div>
                            <h4>Suscribase al abono PREMIUM de BOOKFLIX y usted contará con hasta 4 perfiles para utilizar<h4>
                            <p style="font-size: 12px;">Al confirmar la suscripción al abono PREMIUM se cobrarán de su tarjeta el precio del mismo</p>
                        </div>
                        <div class="col-md-6 offset-md-4 d-inline">
                            <button type="submit" class="btn btn-primary">
                                Confirmar
                            </button>
                            <a href="/home">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.appUsers', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Administrator\Bookflix\resources\views/user/perfiles/confirmPremium.blade.php ENDPATH**/ ?>