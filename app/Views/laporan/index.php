<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid px-4">
    <h2 class="mt-4 mb-4"><?= $title; ?></h2>
    <hr>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Laporan Aset</li>
    </ol>
    <div class="row">
        <div class="col">

            <div class="d-inline">
                <a href="/report/exportexcel" class="btn btn-success"><i class="fas fa-download me-1"></i> Download Excel</a>
                <a href="/report/invoice" class="btn btn-danger" target="_blank"><i class="fas fa-download me-1"></i> Download PDF</a>
            </div>

            <div class="card mt-3">
                <div class="card-header">
                    Laporan Aset
                </div>

                <div class="card-body shadow-lg">
                    <div class="responsive">
                        <table class="table table-bordered text-center" id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Aset</th>
                                    <th>Kondisi</th>
                                    <th>Tanggal Pengadaan</th>
                                    <th>Penginput</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($barang as $b) : ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><?= $b['kode_barang']; ?></td>
                                        <td><?= $b['kondisi_aset']; ?></td>
                                        <td><?= $b['tanggal_pengadaan']; ?></td>
                                        <td><?= $b['user_penginput']; ?></td>
                                        <td>
                                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#staticBackdrop">
                                                <i class="fas fa-info-circle"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#staticBackdrop">
                                                <i class="fas fa-file-pdf"></i>
                                            </button>
                                        </td>
                                    </tr>
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