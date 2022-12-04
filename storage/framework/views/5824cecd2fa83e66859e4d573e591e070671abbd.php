
<?php $__env->startSection('content'); ?>
<a href="<?php echo e(route('player.index_summary')); ?>" type="button" class="btn btn-success rounded-3">Summary</a>
<a href="<?php echo e(route('player.index')); ?>" type="button" class="btn btn-success rounded-3">Player</a>
<a href="<?php echo e(route('player.item_index')); ?>" type="button" class="btn btn-success rounded-3">Item</a>
<a href="<?php echo e(route('player.index_benefit')); ?>" type="button" class="btn btn-success rounded-3">Benefit</a>
<h4 class="mt-5">Data Semua</h4>
<form action="<?php echo e(route('player.search_summary')); ?>" method="post">
    <?php echo csrf_field(); ?>
    <div class="mb-3">

        <label for="name" class="form-label">Search Name</label>

        <input type="text" class="form-control" id="name" name="name">
    </div>

    <div class="text-center">
        <input type="submit" class="btn btn-primary" value="Cari" />

    </div>
</form>

<table class="table table-hover mt-2">
    <thead>
        <tr>
            <th>Username</th>
            <th>Nama</th>
            <th>Level</th>
            <th>Item</th>
            <th>Benefit</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <tr>
            <td><?php echo e($data->username); ?></td>
            <td><?php echo e($data->name); ?></td>
            <td><?php echo e($data->level); ?></td>
            <td><?php echo e($data->item_name); ?></td>
            <td><?php echo e($data->benefit); ?></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


    </tbody>
</table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('player.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH A:\xampp\htdocs\tugasakhirsbd\resources\views/player/index_summary.blade.php ENDPATH**/ ?>