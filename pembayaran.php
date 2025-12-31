<?php
session_start();
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
                        <h3 class="mb-0">Payment</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="index.php">Beranda</a></li>
                            <li class="breadcrumb-item active">Bayar</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="app-content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-6">

                        <div class="card card-success card-outline shadow-lg" style="border-radius: 15px;">
                            
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="bi bi-cash"></i> Form Pembayaran
                                </h3>
                            </div>

                            <div class="card-body p-4">
                                <form action="pembayaran.php" method="POST">

                                    <!-- ID Transaksi -->
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">ID Transaksi</label>
                                        <input type="text" name="id_transaksi" class="form-control" readonly value="<?= $_GET['id'] ?? '' ?>">
                                    </div>

                                    <!-- Total Bayar -->
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Total Bayar</label>
                                        <div class="input-group">
                                            <span class="input-group-text">Rp</span>
                                            <input type="number" name="total_bayar" class="form-control" placeholder="Masukkan jumlah bayar" required>
                                        </div>
                                    </div>

                                    <!-- Metode Pembayaran -->
                                    <div class="mb-4">
                                        <label class="form-label fw-bold">Metode Pembayaran</label>
                                        <select name="metode" class="form-select" required>
                                            <option value="">-- Pilih Metode --</option>
                                            <option value="cash">Cash</option>
                                            <option value="transfer">Transfer</option>
                                            <option value="qris">QRIS</option>
                                        </select>
                                    </div>

                                    <!-- Tombol -->
                                    <div class="d-grid gap-2">
                                        <button type="submit" name="bayar_btn"
                                            class="btn btn-success btn-lg shadow-sm"
                                            style="border-radius: 50px; font-weight: 600;">
                                            <i class="bi bi-check-circle"></i> Bayar Sekarang
                                        </button>
                                    </div>

                                </form>
                            </div>

                            <div class="card-footer text-center text-muted">
                                GoRent — Payment System
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>

    </main>

    <?php include("template/footer.php"); ?>
</div>

<?php include 'template/script.php'; ?>
</body>
</html>
