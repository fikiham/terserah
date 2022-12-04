
<?php $__env->startSection('content'); ?>
<a href="<?php echo e(route('player.index_summary')); ?>" type="button" class="btn btn-success rounded-3">Summary</a>
<a href="<?php echo e(route('player.index')); ?>" type="button" class="btn btn-success rounded-3">Player</a>
<a href="<?php echo e(route('player.item_index')); ?>" type="button" class="btn btn-success rounded-3">Item</a>
<a href="<?php echo e(route('player.index_benefit')); ?>" type="button" class="btn btn-success rounded-3">Benefit</a>

<h4 class="mt-5">Data Benefit</h4>
<a href="<?php echo e(route('player.create_benefit')); ?>" type="button" class="btn btn-success rounded-3">Tambah Data</a>

<?php if($message = Session::get('success')): ?>
<div class="alert alert-success mt-3" role="alert">
    <?php echo e($message); ?>

</div>
<?php endif; ?>
<table class="table table-hover mt-2">
    <thead>
        <tr>
            <th>ID Benefit</th>
            <th>Nama</th>
            <th>The Benefit</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <tr>
            <td><?php echo e($data->id_benefit); ?></td>
            <td><?php echo e($data->name); ?></td>
            <td><?php echo e($data->benefit); ?></td>
            <td>
                <a href="<?php echo e(route('player.edit_benefit',$data->id_benefit)); ?>" type="button" class="btn btn-warning rounded-3">
                    Ubah
                </a>

                <!-- TAMBAHKAN KODE DELETE DIBAWAH BARIS INI -->
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal<?php echo e($data->id_benefit); ?>">
                    Hapus
                </button>
                <!-- Modal -->
                <div class="modal fade" id="hapusModal<?php echo e($data->id_benefit); ?>" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <div class="modal-header">

                                <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>

                                <buttontype="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    </button>
                            </div>

                            <form method="POST" action="<?php echo e(route('player.delete_benefit', $data->id_benefit)); ?>">
                                <?php echo csrf_field(); ?>

                                <div class="modal-body">

                                    Apakah anda
                                    yakin ingin menghapus data ini?
                                </div>

                                <div class="modal-footer">

                                    <buttontype="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>

                                        <button type="submit" class="btn btn-primary">Ya</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- TAMBAHKAN KODE DELETE DIBAWAH BARIS INI -->
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal<?php echo e($data->id_benefit); ?>">
                    Hapus Beneran
                </button>
                <!-- Modal -->
                <div class="modal fade" id="hapusModal<?php echo e($data->id_benefit); ?>" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <div class="modal-header">

                                <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>

                                <buttontype="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    </button>
                            </div>

                            <form method="POST" action="<?php echo e(route('player.hdelete_benefit', $data->id_benefit)); ?>">
                                <?php echo csrf_field(); ?>

                                <div class="modal-body">

                                    Apakah anda
                                    yakin ingin menghapus data ini?
                                </div>

                                <div class="modal-footer">

                                    <buttontype="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>

                                        <button type="submit" class="btn btn-primary">Ya</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('player.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH A:\xampp\htdocs\tugasakhirsbd\resources\views/player/index_benefit.blade.php ENDPATH**/ ?>