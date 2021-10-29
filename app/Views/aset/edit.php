<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid px-4">
    <h2 class="mt-4 mb-4"><?= $title; ?></h2>
    <hr>
    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-body">
                    <form action="/aset/<?= $barang['id']; ?>" method="POST" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="user_penginput" id="user_penginput" value="<?= $user['name']; ?>">
                        <input type="hidden" name="old_image" id="old_image" value="<?= $barang['foto']; ?>">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="nomor">Nomor</label>
                                <input type="number" class="form-control <?= ($validation->hasError('nomor')) ? 'is-invalid' : ''; ?>" name="nomor" id="nomor" value="<?= (old('nomor')) ? old('nomor') : $barang['nomor']; ?>" placeholder="Nomor...">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nomor'); ?>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="sub_nomor">Sub Nomor</label>
                                <input type="number" class="form-control <?= ($validation->hasError('sub_nomor')) ? 'is-invalid' : ''; ?>" name="sub_nomor" id="sub_nomor" value="<?= (old('sub_nomor')) ? old('sub_nomor') : $barang['sub_nomor']; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('sub_nomor'); ?>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="satuan">Satuan</label>
                                <input type="text" class="form-control <?= ($validation->hasError('satuan')) ? 'is-invalid' : ''; ?>" name="satuan" id="satuan" value="<?= (old('satuan')) ? old('satuan') : $barang['satuan']; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('satuan'); ?>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="kode_barang">Kode Barang</label>
                                <input type="text" class="form-control <?= ($validation->hasError('kode_barang')) ? 'is-invalid' : ''; ?>" name="kode_barang" id="kode_barang" value="<?= (old('kode_barang')) ? old('kode_barang') : $barang['kode_barang']; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('kode_barang'); ?>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="no_aset">Nomor Aset</label>
                                <input type="number" class="form-control <?= ($validation->hasError('no_aset')) ? 'is-invalid' : ''; ?>" name="no_aset" id="no_aset" value="<?= (old('no_aset')) ? old('no_aset') : $barang['no_aset']; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('no_aset'); ?>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="tercatat">Tercatat</label>
                                <input type="text" class="form-control <?= ($validation->hasError('tercatat')) ? 'is-invalid' : ''; ?>" name="tercatat" id="tercatat" value="<?= (old('tercatat')) ? old('tercatat') : $barang['tercatat']; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('tercatat'); ?>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="kode_lokasi">Kode Lokasi</label>
                                <input type="text" class="form-control <?= ($validation->hasError('kode_lokasi')) ? 'is-invalid' : ''; ?>" name="kode_lokasi" id="kode_lokasi" value="<?= (old('kode_lokasi')) ? old('kode_lokasi') : $barang['kode_lokasi']; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('kode_lokasi'); ?>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="kode_perkap">Kode Perkap</label>
                                <input type="text" class="form-control <?= ($validation->hasError('kode_perkap')) ? 'is-invalid' : ''; ?>" name="kode_perkap" id="kode_perkap" value="<?= (old('kode_perkap')) ? old('kode_perkap') : $barang['kode_perkap']; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('kode_perkap'); ?>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="kondisi_aset">Kondisi Aset</label>
                                <input type="text" class="form-control <?= ($validation->hasError('kondisi_aset')) ? 'is-invalid' : ''; ?>" name="kondisi_aset" id="kondisi_aset" value="<?= (old('kondisi_aset')) ? old('kondisi_aset') : $barang['kondisi_aset']; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('kondisi_aset'); ?>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="uraian_aset">Uraian Aset</label>
                                <input type="text" class="form-control <?= ($validation->hasError('uraian_aset')) ? 'is-invalid' : ''; ?>" name="uraian_aset" id="uraian_aset" value="<?= (old('uraian_aset')) ? old('uraian_aset') : $barang['uraian_aset']; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('uraian_aset'); ?>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="uraian_perkap">Uraian Perkap</label>
                                <input type="text" class="form-control <?= ($validation->hasError('uraian_perkap')) ? 'is-invalid' : ''; ?>" name="uraian_perkap" id="uraian_perkap" value="<?= (old('uraian_perkap')) ? old('uraian_perkap') : $barang['uraian_perkap']; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('uraian_perkap'); ?>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="kode_ruang">Kode Ruang</label>
                                <input type="text" class="form-control <?= ($validation->hasError('kode_ruang')) ? 'is-invalid' : ''; ?>" name="kode_ruang" id="kode_ruang" value="<?= (old('kode_ruang')) ? old('kode_ruang') : $barang['kode_ruang']; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('kode_ruang'); ?>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="uraian_ruang">Uraian Ruang</label>
                                <input type="text" class="form-control <?= ($validation->hasError('uraian_ruang')) ? 'is-invalid' : ''; ?>" name="uraian_ruang" id="uraian_ruang" value="<?= (old('uraian_ruang')) ? old('uraian_ruang') : $barang['uraian_ruang']; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('uraian_ruang'); ?>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="nominal_aset">Nominal Aset</label>
                                <input type="number" class="form-control <?= ($validation->hasError('nominal_aset')) ? 'is-invalid' : ''; ?>" name="nominal_aset" id="nominal_aset" value="<?= (old('nominal_aset')) ? old('nominal_aset') : $barang['nominal_aset']; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nominal_aset'); ?>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="tanggal_pengadaan">Tanggal Pengadaan</label>
                                <input type="date" class="form-control <?= ($validation->hasError('tanggal_pengadaan')) ? 'is-invalid' : ''; ?>" name="tanggal_pengadaan" id="tanggal_pengadaan" value="<?= (old('tanggal_pengadaan')) ? old('tanggal_pengadaan') : $barang['tanggal_pengadaan']; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('tanggal_pengadaan'); ?>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="sumber_pengadaan">Sumber Pengadaan</label>
                                <input type="text" class="form-control <?= ($validation->hasError('sumber_pengadaan')) ? 'is-invalid' : ''; ?>" name="sumber_pengadaan" id="sumber_pengadaan" value="<?= (old('sumber_pengadaan')) ? old('sumber_pengadaan') : $barang['sumber_pengadaan']; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('sumber_pengadaan'); ?>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="kondisi">Kondisi</label>
                            <div class="col">
                                <textarea type="text" class="form-control <?= ($validation->hasError('kondisi')) ? 'is-invalid' : ''; ?>" name="kondisi" id="kondisi"><?= (old('kondisi')) ? old('kondisi') : $barang['kondisi']; ?></textarea>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('kondisi'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="catatan">Catatan</label>
                            <div class="col">
                                <textarea type="text" class="form-control <?= ($validation->hasError('catatan')) ? 'is-invalid' : ''; ?>" name="catatan" id="catatan"><?= (old('kondisi')) ? old('kondisi') : $barang['kondisi']; ?></textarea>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('catatan'); ?>
                                </div>
                            </div>
                        </div>
                        <div class=" form-group row">
                            <label for="image">Foto</label>
                            <div class="col">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <img src="/img/aset/<?= $barang['foto']; ?>" class="img-thumbnail img-preview">
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="image" name="image" onchange="previewImg()">
                                            <label class="custom-file-label" for="image"><?= $barang['foto']; ?></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Update Data</button>
                                <a href="<?= base_url('aset'); ?>" class="btn btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function previewImg() {
        const image = document.querySelector('#image')
        const imageLabel = document.querySelector('.custom-file-label')
        const imgPreview = document.querySelector('.img-preview')

        imageLabel.textContent = image.files[0].name

        const fileimage = new FileReader()
        fileimage.readAsDataURL(image.files[0])

        fileimage.onload = function(e) {
            imgPreview.src = e.target.result
        }
    }
</script>
<?= $this->endSection(); ?>

<?= $this->extend('layout/template'); ?>