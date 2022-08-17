<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<div class="container-fluid px-4">
    <h2 class="mt-4 mb-4"><?= $title; ?></h2>
    <hr>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= site_url('home') ?>">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Barang</li>
    </ol>
    <div class="row">
        <div class="col">

            <div class="d-inline">
                <?php if (session()->get('role') == 1 || session()->get('role') == 2) : ?>
                    <a href="<?= site_url('aset/add') ?>" class="btn btn-primary"><i class="fas fa-laptop me-1"></i> Tambah Barang</a>
                    <a href="<?= site_url('aset/trash') ?>" class="btn btn-outline-danger"><i class="fas fa-trash-alt me-1"></i> Sampah</a>
                    <a href="<?= site_url('aset/excel') ?>" class="btn btn-outline-success"><i class="fas fa-upload me-1"></i> Import Excel</a>
                    <a href="<?= site_url('aset/templateexcel') ?>" class="ml-2"><i class="fas fa-download me-1"></i> Unduh Template Excel</a>
                <?php endif; ?>
            </div>

            <!-- Alert Message -->
            <div class="mt-3">
                <?= session()->getFlashdata('message'); ?>
            </div>

            <div class="card mt-3">
                <div class="card-header">
                    Daftar Barang
                </div>
                <!-- Table -->
                <div class="card-body shadow-lg">
                    <div class="responsive">
                        <table class="table table-stripped text-center" id="tableAsset">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kel</th>
                                    <th>SKel</th>
                                    <th>kd_brg</th>
                                    <th>urai</th>
                                    <th>kd_gedung</th>
                                    <th>kondisi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Modal Delete -->
<div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="modalDelete" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
                <button type="button" class="close" onclick='$("#modalDelete").modal("hide")' aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah data ini akan dihapus?
            </div>
            <div class="modal-footer">
                <form id="formDelete" action="" method="post" class="d-inline">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-danger">Ya</button>
                    <button type="button" class="btn btn-secondary" onclick='$("#modalDelete").modal("hide")'>Tidak</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Detail -->
<div class="modal fade" id="modalInfo" tabindex="-1" aria-labelledby="modalInfo" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Aset</h5>
                <button type="button" class="close" onclick='$("#modalInfo").modal("hide")' aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <tbody>
                        <tr>
                            <th>Kel</th>
                            <td>:</td>
                            <td class="value_nomor"></td>
                        </tr>
                        <tr>
                            <th>Skel</th>
                            <td>:</td>
                            <td class="value_sub_nomor"></td>
                        </tr>
                        <tr>
                            <th>satuan</th>
                            <td>:</td>
                            <td class="value_satuan"></td>
                        </tr>
                        <tr>
                            <th>kd_barang</th>
                            <td>:</td>
                            <td class="value_kode_barang"></td>
                        </tr>
                        <tr>
                            <th>tercatat</th>
                            <td>:</td>
                            <td class="value_tercatat"></td>
                        </tr>
                        <tr>
                            <th>no_aset</th>
                            <td>:</td>
                            <td class="value_no_aset"></td>
                        </tr>
                        <tr>
                            <th>kd_lokasi</th>
                            <td>:</td>
                            <td class="value_kode_lokasi"></td>
                        </tr>
                        <tr>
                            <th>kd_perk</th>
                            <td>:</td>
                            <td class="value_kode_perkap"></td>
                        </tr>
                        <tr>
                            <th>kondisi</th>
                            <td>:</td>
                            <td class="value_kondisi_aset"></td>
                        </tr>
                        <tr>
                            <th>urai</th>
                            <td>:</td>
                            <td class="value_uraian_aset"></td>
                        </tr>
                        <tr>
                            <th>urperk</th>
                            <td>:</td>
                            <td class="value_uraian_perkap"></td>
                        </tr>
                        <tr>
                            <th>kd_ruang</th>
                            <td>:</td>
                            <td class="value_kode_ruang"></td>
                        </tr>
                        <tr>
                            <th>kd_gedung</th>
                            <td>:</td>
                            <td class="value_kode_gedung"></td>
                        </tr>
                        <tr>
                            <th>catat</th>
                            <td>:</td>
                            <td class="value_catatan"></td>
                        </tr>
                        <tr>
                            <th>kondi</th>
                            <td>:</td>
                            <td class="value_kondisi"></td>
                        </tr>
                        <tr>
                            <th>sakhir</th>
                            <td>:</td>
                            <td class="value_nominal_aset"></td>
                        </tr>
                        <tr>
                            <th>Tanggal Pengadaan</th>
                            <td>:</td>
                            <td class="value_tanggal_pengadaan"></td>
                        </tr>
                        <tr>
                            <th>Sumber Pengadaan</th>
                            <td>:</td>
                            <td class="value_sumber_pengadaan"></td>
                        </tr>
                        <tr>
                            <th>Foto</th>
                            <td>:</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <img class="img-thumbnail w-100 value_foto" src="" alt="">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <a href="" target="_blank" class="btn btn-primary linkHistoryAsset">History</a>
                <button type="button" class="btn btn-secondary" onclick='$("#modalInfo").modal("hide")'>Tutup</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal QR -->
<div class="modal fade" id="modalQR" tabindex="-1" aria-labelledby="modalQR" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">QR Code</h5>
                <button type="button" class="close" onclick='$("#modalQR").modal("hide")' aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img class="value_qr" src="" alt="" class="rounded mx-auto d-block">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick='$("#modalQR").modal("hide")'>Tutup</button>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>


<?= $this->section('scripts'); ?>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    const assetData = <?= json_encode($barang); ?>;
    assetData.map((v, k) => v.norut = k + 1);

    (function() {
        let table = $("#tableAsset").DataTable({
            data: assetData,
            columns: [{
                    data: "norut",
                },
                {
                    data: "nomor",
                },
                {
                    data: "sub_nomor",
                },
                {
                    data: "kode_barang",
                },
                {
                    data: "uraian_aset",
                },
                {
                    data: "kode_ruang",
                },
                {
                    data: "kondisi",
                },
                {
                    data: "id",
                    render: function(data, type, row) {
                        return `
                        <?php if (session()->get('role') == 1 || session()->get('role') == 2) : ?>
                            <button type="button" class="btn btn-danger" title="Hapus"  onclick="deleteAsset('${data}');">
                                <i class="fas fa-trash"></i>
                            </button>
                            <a href="<?= site_url('aset/edit/'); ?>${row.id}" title="Ubah Aset" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                        <?php endif; ?>

                        <button type="button" class="btn btn-info" title="Detail" onclick="showInfo('${data}');">
                            <i class="fas fa-info-circle"></i>
                        </button>
                        <button type="button" class="btn btn-primary" title="Tampilkan QRCode" onclick="showQR('${data}');">
                            <i class="fas fa-qrcode"></i>
                        </button>
                    `;
                    }
                }
            ]
        })
    })();

    function showInfo(id) {
        let data = assetData.find(function(data) {
            return data.id == id;
        });
        $(".value_nomor").text(data.nomor ?? "-");
        $(".value_sub_nomor").text(data.sub_nomor ?? "-");
        $(".value_satuan").text(data.satuan ?? "-");
        $(".value_kode_barang").text(data.kode_barang ?? "-");
        $(".value_tercatat").text(data.tercatat ?? "-");
        $(".value_no_aset").text(data.no_aset ?? "-");
        $(".value_kode_lokasi").text(data.kode_lokasi ?? "-");
        $(".value_kode_perkap").text(data.kode_perkap ?? "-");
        $(".value_kondisi_aset").text(data.kondisi_aset ?? "-");
        $(".value_uraian_aset").text(data.uraian_aset ?? "-");
        $(".value_uraian_perkap").text(data.uraian_perkap ?? "-");
        $(".value_kode_ruang").text(data.kode_ruang ?? "-");
        $(".value_kode_gedung").text(data.kode_gedung ?? "-");
        $(".value_catatan").text(data.catatan ?? "-");
        $(".value_kondisi").text(data.kondisi ?? "-");
        $(".value_nominal_aset").text(data.nominal_aset ?? "-");
        $(".value_tanggal_pengadaan").text(data.tanggal_pengadaan ?? "-");
        $(".value_sumber_pengadaan").text(data.sumber_pengadaan ?? "-");
        $(".value_foto").attr("src", (data.foto ? "<?= base_url() ?>/img/aset/" + data.foto : ""));

        $(".linkHistoryAsset").attr("href", "<?= site_url("/aset/history/") ?>" + data.id);

        $("#modalInfo").modal("show");
    }

    function showQR(id) {
        let data = assetData.find(function(data) {
            return data.id == id;
        });
        $(".value_qr").attr("src", (data.qr_code ? "<?= base_url() ?>/img/aset/qr/" + data.qr_code : ""));

        $("#modalQR").modal("show");
    }

    function deleteAsset(id) {
        $("#formDelete").attr("action", "<?= site_url('aset/delete/'); ?>" + id);

        $("#modalDelete").modal("show");
    }
</script>

<?= $this->endSection(); ?>