<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <?php if (session()->get('role') == 1) : ?>
                        <div class="sb-sidenav-menu-heading">Super Admin</div>
                    <?php elseif (session()->get('role') == 2) : ?>
                        <div class="sb-sidenav-menu-heading">Admin</div>
                    <?php elseif (session()->get('role') == 3) : ?>
                        <div class="sb-sidenav-menu-heading">User</div>
                    <?php endif; ?>

                    <!-- Dashboard -->
                    <?php if (session()->get('role') == 1) : ?>
                        <a class="nav-link <?= ($title == "Dashboard") ? 'active' : ''; ?>" href="<?= base_url('super'); ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                    <?php elseif (session()->get('role') == 2) : ?>
                        <a class="nav-link <?= ($title == "Dashboard") ? 'active' : ''; ?>" href="<?= base_url('admin'); ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                    <?php endif; ?>
                    <!-- End Dashboard -->

                    <!-- Data User -->
                    <?php if (session()->get('role') == 1) : ?>
                        <div class="sb-sidenav-menu-heading">Master User</div>
                        <a class="nav-link <?= ($title == "Data User") ? 'active' : ''; ?>" href="/super/user">
                            <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                            Data User
                        </a>
                    <?php endif; ?>
                    <!-- End Data User -->

                    <!-- Data Aset -->
                    <div class="sb-sidenav-menu-heading">Master Aset</div>
                    <?php if (session()->get('role') == 1) : ?>
                        <a class="nav-link collapsed <?= ($title == "Data Gedung" || $title == "Data Ruangan" || $title == "Data Barang") ? 'active' : ''; ?>" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-database"></i></div>
                            Aset
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link <?= ($title == "Data Barang") ? 'active' : '' ?>" href="/super/barang">
                                    <div class="sb-nav-link-icon"><i class="fas fa-laptop"></i></div>
                                    Barang
                                </a>
                                <a class="nav-link <?= ($title ==  "Data Ruangan") ? 'active' : ''; ?>" href="/super/ruangan">
                                    <div class="sb-nav-link-icon"><i class="fas fa-door-open"></i></div>
                                    Ruangan
                                </a>
                                <a class="nav-link <?= ($title == "Data Gedung") ? 'active' : ''; ?>" href="/super/gedung">
                                    <div class="sb-nav-link-icon"><i class="fas fa-building"></i></div>
                                    Gedung
                                </a>
                            </nav>
                        </div>
                        <a class="nav-link <?= ($title == "Laporan Aset") ? 'active' : ''; ?>" href="/super/laporan">
                            <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                            Laporan
                        </a>
                    <?php elseif (session()->get('role') == 2) : ?>
                        <a class="nav-link collapsed <?= ($title == "Data Gedung" || $title == "Data Ruangan" || $title == "Data Barang") ? 'active' : ''; ?>" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-database"></i></div>
                            Aset
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link <?= ($title == "Data Barang") ? 'active' : '' ?>" href="/admin/barang">
                                    <div class="sb-nav-link-icon"><i class="fas fa-laptop"></i></div>
                                    Barang
                                </a>
                                <a class="nav-link <?= ($title ==  "Data Ruangan") ? 'active' : ''; ?>" href="/admin/ruangan">
                                    <div class="sb-nav-link-icon"><i class="fas fa-door-open"></i></div>
                                    Ruangan
                                </a>
                                <a class="nav-link <?= ($title == "Data Gedung") ? 'active' : ''; ?>" href="/admin/gedung">
                                    <div class="sb-nav-link-icon"><i class="fas fa-building"></i></div>
                                    Gedung
                                </a>
                            </nav>
                        </div>
                        <a class="nav-link <?= ($title == "Laporan Aset") ? 'active' : ''; ?>" href="/admin/laporan">
                            <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                            Laporan
                        </a>
                    <?php endif; ?>
                    <!-- End Data Aset -->

                    <!-- My Profile -->
                    <?php if (session()->get('role') == 1) : ?>
                        <div class="sb-sidenav-menu-heading">Profil</div>
                        <a class="nav-link <?= ($title == "Edit Profil") ? 'active' : ''; ?>" href="/super/editprofile">
                            <div class=" sb-nav-link-icon"><i class="fas fa-user-edit"></i></div>
                            Edit Profil
                        </a>
                    <?php elseif (session()->get('role') == 2) : ?>
                        <div class="sb-sidenav-menu-heading">Profil</div>
                        <a class="nav-link <?= ($title == "Edit Profil") ? 'active' : ''; ?>" href="/admin/editprofile">
                            <div class=" sb-nav-link-icon"><i class="fas fa-user-edit"></i></div>
                            Edit Profil
                        </a>
                    <?php elseif (session()->get('role') == 3) : ?>
                        <div class="sb-sidenav-menu-heading">Profil</div>
                        <a class="nav-link <?= ($title == "Edit Profil") ? 'active' : ''; ?>" href="/user/editprofile">
                            <div class=" sb-nav-link-icon"><i class="fas fa-user-edit"></i></div>
                            Edit Profil
                        </a>
                    <?php endif; ?>
                    <!-- End My Profile -->

                    <!-- Ganti Password -->
                    <?php if (session()->get('role') == 1) : ?>
                        <a class="nav-link <?= ($title == "Ganti Password") ? 'active' : ''; ?>" href="/super/changepassword">
                            <div class="sb-nav-link-icon"><i class="fas fa-key"></i></div>
                            Ganti Password
                        </a>
                    <?php elseif (session()->get('role') == 2) : ?>
                        <a class="nav-link <?= ($title == "Ganti Password") ? 'active' : ''; ?>" href="/super/changepassword">
                            <div class="sb-nav-link-icon"><i class="fas fa-key"></i></div>
                            Ganti Password
                        </a>
                    <?php endif; ?>
                    <!-- End My Profile -->

                    <!-- Reset Password -->
                    <?php if (session()->get('role') == 1) : ?>
                        <a class="nav-link <?= ($title == "Reset Password") ? 'active' : ''; ?>" href="<?= base_url('super/resetpassword'); ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-sync-alt"></i></div>
                            Reset Password
                        </a>
                    <?php endif; ?>
                    <!-- End Reset Password -->

                    <hr style="height:1px; border-width:0; color:gray; background-color:gray; margin-left: 15px; margin-right: 25px;">

                    <a class="nav-link" href="/auth/logout">
                        <div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt"></i></div>
                        Keluar
                    </a>

                </div>

            </div>
        </nav>
    </div>
</div>