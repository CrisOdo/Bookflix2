

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h3 class="card-header"><?php echo e($novedad->name); ?></h3>
                
                <div class="card-body d-flex">
                    <div class="col-4 pt-4 pb-4 center">
                        <img src="/storage/<?php echo e($novedad->image); ?>" class="w-100">
                    </div>
                    <div>

                    <div class="form-group row pt-4">
                        <label for="description" class="col-md-4 col-form-label text-md-right">Descripcion:</label>

                        <div class="col-md-6 pt-2">
                            <p class="text-justify" id="description" type="text" name="description">
                            <?php echo e($novedad->description); ?>

                            </p>
                        </div>
                    </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.appUsers', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Administrator\Bookflix\resources\views/user/novedad/show.blade.php ENDPATH**/ ?>