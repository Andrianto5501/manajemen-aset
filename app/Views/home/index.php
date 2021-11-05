<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid px-4">
    <h2 class="mt-4 mb-4"><?= $title; ?></h1>
        <hr>

        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        Aset
                        <i class="fas fa-folder-open"></i>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        Jumlah : <?= $dataAset; ?>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-info text-white mb-4">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        Admin
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        Jumlah : <?= $dataAdmin; ?>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-secondary text-white mb-4">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        User
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        Jumlah : <?= $dataUser; ?>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        Backup
                        <i class="fas fa-trash-alt"></i>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        Jumlah : <?= $dataAsetDelete; ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-bar me-1"></i>
                        Bar Chart Example
                    </div>
                    <div class="card-body"><canvas id="myBarChart" width="100%" height="50"></canvas></div>
                    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-pie me-1"></i>
                        Kondisi Aset
                    </div>
                    <div class="card-body"><canvas id="myPieChart" width="100%" height="50"></canvas></div>
                    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                </div>
            </div>
        </div>


</div>
<?= $this->endSection(); ?>