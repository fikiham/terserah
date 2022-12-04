
<?php $__env->startSection('content'); ?>

<?php if($errors->any()): ?>
<div class="alert alert-danger">
    <ul>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li><?php echo e($error); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</div>
<?php endif; ?>
<div class="card mt-4">
    <div class="card-body">
        <h5 class="card-title fw-bolder mb-3">Tambah Item</h5>

        <form method="post" action="<?php echo e(route('player.store_item')); ?>">
            <?php echo csrf_field(); ?>
            <div class="mb-3">

                <label for="item_name" class="form-label">Nama Item</label>

                <input type="text" class="form-control" id="item_name" name="item_name">
            </div>
            <div class="mb-3">

                <label for="icon_source" class="form-label">Source Icon</label>

                <input type="text" class="form-control" id="icon_source" name="icon_source">
            </div>
            <div class="mb-3">

                <label for="id_benefit" class="form-label">ID Benefit</label>

                <input type="text" class="form-control" id="id_benefit" name="id_benefit">
            </div>

            <div class="text-center">
                <input type="submit" class="btn btn-primary" value="Tambah" />

            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('player.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH A:\xampp\htdocs\tugasakhirsbd\resources\views/player/add_item.blade.php ENDPATH**/ ?>