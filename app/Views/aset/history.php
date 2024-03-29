<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<div class="container-fluid px-4">
    <h2 class="mt-4 mb-4"><?= $title; ?></h2>
    <hr>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= site_url('home') ?>">Dashboard</a></li>
        <li class="breadcrumb-item" aria-current="page">Barang</li>
        <li class="breadcrumb-item active" aria-current="page">Riwayat</li>
    </ol>
    <div class="row">
        <div class="col">
            <div class="card mt-3">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Riwayat Aset <b><?= $barang['kode_barang']; ?></b></span>
                    <button class="btn btn-success" type="button" onclick="tableToExcel('tableAsset', 'history asset <?= $barang['kode_barang'] ?>')">Export</button>
                </div>
                <!-- Table -->
                <div class="card-body shadow-lg">
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm" id="tableAsset">
                            <thead>
                                <tr>
                                    <th>Kel</th>
                                    <th>Skel</th>
                                    <th>satuan</th>
                                    <th>kd_barang</th>
                                    <th>tercatat</th>
                                    <th>no_aset</th>
                                    <th>kd_lokasi</th>
                                    <th>kd_perk</th>
                                    <th>kondisi</th>
                                    <th>urai</th>
                                    <th>urperk</th>
                                    <th>kd_ruang</th>
                                    <th>uraian_ruang</th>
                                    <th>kd_gedung</th>
                                    <th>catat</th>
                                    <th>kondi</th>
                                    <th>sakhir</th>
                                    <th>Tanggal Pengadaan</th>
                                    <th>Sumber Pengadaan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($asetHistory as $h) : ?>
                                    <tr>
                                        <td><?= $h['nomor']; ?></td>
                                        <td><?= $h['sub_nomor']; ?></td>
                                        <td><?= $h['satuan']; ?></td>
                                        <td><?= $h['kode_barang']; ?></td>
                                        <td><?= $h['tercatat']; ?></td>
                                        <td><?= $h['no_aset']; ?></td>
                                        <td><?= $h['kode_lokasi']; ?></td>
                                        <td><?= $h['kode_perkap']; ?></td>
                                        <td><?= $h['kondisi_aset']; ?></td>
                                        <td><?= $h['uraian_aset']; ?></td>
                                        <td><?= $h['uraian_perkap']; ?></td>
                                        <td><?= $h['kode_ruang']; ?></td>
                                        <td><?= $h['uraian_ruang']; ?></td>
                                        <td><?= $h['kode_gedung']; ?></td>
                                        <td><?= $h['catatan']; ?></td>
                                        <td><?= $h['kondisi']; ?></td>
                                        <td><?= $h['nominal_aset']; ?></td>
                                        <td><?= $h['tanggal_pengadaan']; ?></td>
                                        <td><?= $h['sumber_pengadaan']; ?></td>
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

<?php $this->endSection('content'); ?>