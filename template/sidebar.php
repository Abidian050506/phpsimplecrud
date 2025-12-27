<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <div class="sidebar-brand">
        <a href="index.php" class="brand-link">
            <img src="assets/img/Logo.png" alt="GoRent Logo" class="brand-image opacity-75 shadow" />
            <span class="brand-text fw-light">GoRent</span>
        </a>
    </div>

    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="navigation" aria-label="Main navigation" data-accordion="false" id="navigation">
                <li class="nav-item">
                    <a href="login.php" class="nav-link">
                        <i class="nav-icon bi bi-house-door-fill"></i>
                        <p>Login</p>
                    </a>
                </li>    

                <?php
                if (isset($_SESSION['auth'])) {
                ?>
                    <li class="nav-header">APLIKASI</li>
                        <li class="nav-item">
                            <a href="index.php" class="nav-link">
                                <i class="nav-icon bi bi-house-door-fill"></i>
                                <p>Beranda</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="data-input.php" class="nav-link">
                                <i class="nav-icon bi bi-clipboard-data-fill"></i>
                                <p>Input Customer</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="data-list.php" class="nav-link">
                                <i class="nav-icon bi bi-card-list"></i>
                                <p>Daftar Customer</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="data-search.php" class="nav-link">
                                <i class="nav-icon bi bi-search-heart-fill"></i>
                                <p>Cari Customer</p>
                            </a>
                        </li>
                        <li class="nav-header">MASTER DATA</li>
                        <li class="nav-item">
                            <a href="master-prodi-list.php" class="nav-link">
                                <i class="nav-icon bi bi-building"></i>
                                <p>Daftar Mobil</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="payment.php" class="nav-link">
                                <i class="nav-icon bi bi-cash"></i>
                                <p>Payment</p>
                            </a>
                        </li>
                        <a href="logout.php">logout</a>
                        
                    </ul>
                <?php
                } else {
                ?>
                    <a href="#">login untuk lihat</a>
                    
                <?php
                }
                ?>


        </nav>
    </div>

</aside>