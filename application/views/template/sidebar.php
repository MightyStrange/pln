<div class="nav-left-sidebar sidebar-dark">
    <div class="menu-list">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column">
                    <li class="nav-divider">
                        Menu
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('home') ?>"><i class="fas fa-tv"></i>Dashboard</a>
                    </li>
                     <!-- <hr class="sidebar-divider my-5"> -->
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2">
                            <i class="fas fa-database"></i>Data Menu</a>
                        <div id="submenu-2" class="collapse submenu">
                            <ul class="nav flex-column">
                                <?php if ($this->session->userdata('level') != 'user') : ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url('karyawan') ?>">Data Karyawan</a>
                                </li>
                                <?php endif; ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo base_url('sertifikasi') ?>">Sertifikasi</a>
                                    </li>
                                    <?php if ($this->session->userdata('level') != 'user') : ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo base_url('mcu') ?>">MCU</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo base_url('sk') ?>">SK</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo base_url('ktp') ?>">KTP</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo base_url('ijazah') ?>">IJAZAH</a>
                                    </li>
									
                                    <?php endif; ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo base_url('peraturan') ?>">Peraturan Berlaku</a>
                                    </li>
									<li class="nav-item">
                                        <a class="nav-link" href="<?php echo base_url('TutorialData') ?>">Data Tutorial</a>
                                    </li>
									
                            </ul>
							
                        </div>
						
                    </li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url('logout/logout') ?>" style="color: red;">
							<i class="fas fa-power-off mr-2 text-danger"></i>Logout
						</a>
					</li>

                        <!-- Tampilkan menu khusus admin -->
                         <!-- <li class="nav-item fixed-bottom">
                            <a class="nav-link" href="#" onclick="confirmLogout();"><i class="fas fa-sign-out-alt"></i>Logout</a>
                        </li> -->
                </ul>
            </div>
        </nav>
    </div>
</div>
<script>
    function confirmLogout() {
        // Tampilkan dialog konfirmasi menggunakan window.confirm
        var result = window.confirm("Apakah Anda yakin ingin logout?");

        // Jika pengguna menekan OK, redirect ke halaman logout
        if (result) {
            window.location.href = "<?php echo base_url('logout/logout') ?>";
        }
    }
</script>
