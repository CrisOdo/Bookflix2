<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Estás utilizando el perfil --> <strong><?php echo e($perfilElegido->name); ?></strong>!</div>

                <div class="card-body">
                    <?php if(session('status')): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo e(session('status')); ?>

                    </div>
                    <?php endif; ?>
                    <?php if(Auth::user()->tipo == 1): ?>
                    <div>
                        <a style="text-align: center;" href="/pasatePremium">
                            <h3>Pasate a PREMIUM!</h3>
                        </a>
                    </div>
                    <?php endif; ?>


                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.appUsers', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Administrator\Bookflix\resources\views/home.blade.php ENDPATH**/ ?>