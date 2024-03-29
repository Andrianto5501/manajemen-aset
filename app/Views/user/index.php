<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid px-4">
    <h2 class="mt-4 mb-4"><?= $title; ?></h1>
        <hr>
        <div class="row">
            <div class="col">

                <?php if (session()->get('role') == 1) : ?>
                    <div class="d-inline">
                        <a href="<?= site_url('user/add') ?>" class="btn btn-primary"><i class="fas fa-user me-1"></i> Tambah User</a>
                    </div>
                <?php endif; ?>

                <div class="mt-3">
                    <?= session()->getFlashdata('message'); ?>
                </div>

                <div class="card mt-3">
                    <div class="card-header">
                        <b>Daftar User</b>
                    </div>
                    <!-- Table -->
                    <div class="card-body shadow-lg">
                        <div class="responsive">
                            <table class="table table-bordered text-center" id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Foto</th>
                                        <th>Nama</th>
                                        <th>Role</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($users as $user) : ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><img src="<?= base_url() ?>/img/profile/<?= $user['image']; ?>" alt="<?= $user['name']; ?>" class="img-thumbnail" style="width: 100px;"></td>
                                            <td><?= $user['name']; ?></td>
                                            <?php if ($user['role'] == 1) : ?>
                                                <td>Super Admin</td>
                                            <?php elseif ($user['role'] == 2) : ?>
                                                <td>Admin</td>
                                            <?php elseif ($user['role'] == 3) : ?>
                                                <td>User</td>
                                            <?php endif; ?>
                                            <td>
                                                <?php if (session('role') == 1) : ?>
                                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal<?= $user['id']; ?>">
                                                        <i class="fas fa-trash"></i> Hapus
                                                    </button>
                                                    <a href="<?= site_url('user/edit/' . $user['nik']); ?>" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
                                                <?php elseif (session('role') == 2) : ?>
                                                    <!-- No Delete & Edit -->
                                                <?php endif; ?>
                                                <a href="<?= site_url('user/detail/' . $user['nik']); ?>" class="btn btn-info"><i class="fas fa-info"></i> Detail</a>
                                            </td>
                                        </tr>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal<?= $user['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Apakah data ini akan dihapus?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form action="<?= site_url() ?>/user/<?= $user['id']; ?>" method="POST" class="d-inline">
                                                            <?= csrf_field(); ?>
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <button type=" submit" class="btn btn-danger">Ya</button>
                                                            <button type=" button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
<?= $this->endSection(); ?>