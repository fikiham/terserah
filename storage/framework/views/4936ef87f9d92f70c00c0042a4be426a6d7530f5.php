
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
        <h5 class="card-title fw-bolder mb-3">Ubah Data
            player</h5>

        <form method="post" action="<?php echo e(route('player.update', $data->username)); ?>">

            <?php echo csrf_field(); ?>
            <div class="mb-3">

                <label for="username" class="form-label">Username</label>

                <input type="text" class="form-control" id="username" name="username" value="<?php echo e($data->username); ?>">
            </div>

            <div class="mb-3">

                <label for="name" class="form-label">Nama player</label>

                <input type="text" class="form-control" id="name" name="name" value="<?php echo e($data->name); ?>">
            </div>
            <div class="mb-3">

                <label for="level" class="form-label">Level Player</label>

                <input type="text" class="form-control" id="level" name="level" value="<?php echo e($data->level); ?>">
            </div>

            <div class="mb-3">

                <label for="id_item" class="form-label">id_item</label>

                <input type="text" class="form-control" id="id_item" name="id_item" value="<?php echo e($data->id_item); ?>">
            </div>

            <div class="text-center">
                <input type="submit" class="btn btn-primary" value="Ubah" />
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('player.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH A:\xampp\htdocs\tugasakhirsbd\resources\views/player/edit.blade.php ENDPATH**/ ?>