<?php 
session_start();

if (isset($_SESSION['auth'])) {
    $_SESSION['message'] = "You are already Logged In";
    header('Location: index.php');
    exit();
}

include("template/header.php"); 
?>

<body class="layout-fixed fixed-header fixed-footer sidebar-expand-lg sidebar-open bg-body-tertiary">

<div class="app-wrapper">

    <?php include 'template/navbar.php'; ?>
    <?php include 'template/sidebar.php'; ?>

    <main class="app-main">

        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">Register</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="index.php">Beranda</a></li>
                            <li class="breadcrumb-item active">Register</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="app-content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-6">

                        <div class="card card-primary card-outline shadow-lg" style="border-radius: 15px;">

                            <div class="card-header">
                                <h3 class="card-title">Buat Akun Baru</h3>
                            </div>

                            <div class="card-body p-4">
                                <form action="proses/proses-register.php" method="POST">

                                    <!-- Name -->
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Nama</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-person"></i></span>
                                            <input type="text" class="form-control" name="name" placeholder="Masukkan nama" required>
                                        </div>
                                    </div>

                                    <!-- Phone -->
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">No. Telepon</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                                            <input type="number" class="form-control" name="phone" placeholder="Masukkan nomor telepon" required>
                                        </div>
                                    </div>

                                    <!-- Email -->
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Email</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                            <input type="email" class="form-control" name="email" placeholder="Masukkan email" required>
                                        </div>
                                    </div>

                                    <!-- Password -->
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Password</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-lock"></i></span>
                                            <input type="password" class="form-control" name="password" placeholder="Masukkan password" required>
                                        </div>
                                    </div>

                                    <!-- Confirm -->
                                    <div class="mb-4">
                                        <label class="form-label fw-bold">Konfirmasi Password</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-shield-lock"></i></span>
                                            <input type="password" class="form-control" name="cpassword" placeholder="Ulangi password" required>
                                        </div>
                                    </div>

                                    <div class="d-grid gap-2">
                                        <button type="submit" name="register_btn"
                                            class="btn btn-primary btn-lg shadow-sm"
                                            style="border-radius: 50px; font-weight: 600;">
                                            <i class="bi bi-person-plus"></i> Register
                                        </button>
                                    </div>

                                </form>
                            </div>

                            <div class="card-footer text-center text-muted">
                                GoRent — Easy. Fast. Reliable.
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>

    </main>

    <?php include("template/footer.php") ?>

</div>

<?php include 'template/script.php'; ?>
</body>
</html>
