<?php
// Pastikan file konfigurasi dan kelas di-include
include_once 'config/db-config.php';
include_once 'config/class-master.php';

// Inisialisasi objek MasterData
$master = new MasterData();

// --- Logika Pengambilan Data ---
// Diasumsikan Anda memiliki method getTransaksi() atau getPembayaran() di class MasterData
// Jika belum ada, Anda harus membuatnya terlebih dahulu
/*
class MasterData extends Database {
    public function getTransaksi() {
        // Ganti dengan query tabel transaksi Anda (contoh: tb_transaksi)
        $query = "SELECT t.*, m.nama_mobil FROM tb_transaksi t 
                  JOIN tb_mobil m ON t.kode_mobil = m.kode_mobil";
        $result = $this->conn->query($query);
        $transaksi = [];
        if ($result && $result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                // Di sini Anda bisa mengambil status pembayaran juga (misalnya dari tabel status_pembayaran)
                $transaksi[] = $row;
            }
        }
        return $transaksi;
    }
}
*/

$data_transaksi = $master->getTransaksi();

// Diasumsikan Anda memiliki method getStatus() untuk mendapatkan status pembayaran
$list_status = $master->getStatus(); 

// Fungsi Pembantu untuk mencari Nama Status dari ID
function getStatusName($id, $statuses) {
    foreach ($statuses as $status) {
        if ($status['id'] == $id) {
            return $status['nama'];
        }
    }
    return 'Tidak Diketahui';
}
?>

<!doctype html>
<html lang="en">
	<head>
		<?php include 'template/header.php'; ?>
	</head>

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
									<li class="breadcrumb-item active" aria-current="page">Beranda</li>
								</ol>
							</div>
						</div>
					</div>
				</div>

				<div class="app-content">
					<div class="container-fluid">
						<div class="row">
							<div class="col-12">
								<div class="card">
									<div class="card-header">
										<h3 class="card-title">Daftar Transaksi</h3>
										<div class="card-tools">
											<button type="button" class="btn btn-tool" data-lte-toggle="card-collapse" title="Collapse">
												<i data-lte-icon="expand" class="bi bi-plus-lg"></i>
												<i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
											</button>
											<button type="button" class="btn btn-tool" data-lte-toggle="card-remove" title="Remove">
												<i class="bi bi-x-lg"></i>
											</button>
										</div>
									</div>
									<div class="card-body p-0 table-responsive">
										<table class="table table-striped" role="table">
											<thead>
													<tr>
														<th>No</th>
														<th>Nama Customer</th>
														<th>Kode Mobil</th>
														<th>Tanggal Transaksi</th>
														<th>Total Bayar</th>
														<th>Aksi</th>
													</tr>
												</thead>
												<tbody>
												<?php
													if(count($data_transaksi) == 0){
													    echo '<tr class="align-middle">
															<td colspan="6" class="text-center">Tidak ada data mobil.</td>
														</tr>';
													} else {
														foreach ($data_transaksi as $index => $transaksi){
															echo '<tr class="align-middle">
																<td>'.($index + 1).'</td>
																<td>'.$transaksi['id'].'</td>
																
																<td>'.$transaksi['kode'].'</td>
																<td>'.$transaksi['tanggal'].'</td>
																<td>'.$transaksi['harga'].'</td>
																<td class="text-center">
																	<button type="button" class="btn btn-sm btn-warning me-1" onclick="window.location.href=\'payment-bayar.php?id='.$transaksi['id'].'\'"><i class="bi bi-cash"></i> Bayar </button>
																	
																</td>
															</tr>';
														}
													}
												?>
											</tbody>
										</table>
									
								</div>
							</div>
						</div>
					</div>
				</div>

			</main>

			<?php include 'template/footer.php'; ?>

		</div>
		
		<?php include 'template/script.php'; ?>

	</body>
</html>