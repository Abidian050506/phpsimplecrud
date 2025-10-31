<?php 

include_once 'config/class-master.php';
$master = new MasterData();
// Mengambil daftar program studi, provinsi, dan status mahasiswa
$prodiList = $master->getProdi();
// Mengambil daftar status mahasiswa
$statusList = $master->getStatus();
// Menampilkan alert berdasarkan status yang diterima melalui parameter GET
if(isset($_GET['status'])){
    // Mengecek nilai parameter GET 'status' dan menampilkan alert yang sesuai menggunakan JavaScript
    if($_GET['status'] == 'failed'){
        echo "<script>alert('Gagal menambahkan data mahasiswa. Silakan coba lagi.');</script>";
    }
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
								<h3 class="mb-0">Input Customer</h3>
							</div>
							<div class="col-sm-6">
								<ol class="breadcrumb float-sm-end">
									<li class="breadcrumb-item"><a href="index.php">Beranda</a></li>
									<li class="breadcrumb-item active" aria-current="page">Input Data</li>
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
										<h3 class="card-title">Formulir Customer</h3>
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
                                    <form action="proses/proses-input.php" method="POST">
									    <div class="card-body">
                                            <div class="mb-3">
                                                <label for="ktp" class="form-label">No. KTP/SIM</label>
                                                <input type="text" class="form-control" id="ktp" name="ktp" placeholder="Masukkan No. KTP/SIM Anda" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="nama" class="form-label">Nama Lengkap</label>
                                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Lengkap Anda" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="alamat" class="form-label">Alamat</label>
                                                <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Masukkan Alamat Lengkap Sesuai KTP" required></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="telp" class="form-label">No. Telepon</label>
                                                <input type="tel" class="form-control" id="telp" name="telp" placeholder="Masukkan Nomor Telpon/HP" pattern="[0-9+\-\s()]{6,20}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email Valid dan Benar" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="mobil" class="form-label">Pilih Mobil</label>
                                                <select class="form-select" id="mobil" name="mobil" required>
                                                    <option value="" selected disabled>Pilih Mobil</option>
                                                    <?php 
                                                    // Iterasi daftar program studi dan menampilkannya sebagai opsi dalam dropdown
                                                    foreach ($prodiList as $prodi){
                                                        echo '<option value="'.$prodi['id'].'">'.$prodi['nama'].'</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="sewa" class="form-label">Tanggal Sewa</label>
                                                <input type="date" class="form-control" id="sewa" name="sewa" placeholder="Masukkan Tanggal Sewa Yang Benar" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="kembali" class="form-label">Tanggal Kembali</label>
                                                <input type="date" class="form-control" id="kembali" name="kembali" placeholder="Masukkan Tanggal kembali Yang Benar" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="biaya" class="form-label">Total Biaya</label>
                                                <input type="text" class="form-control" id="biaya" name="biaya" placeholder="Masukkan Total Biaya" required>
                                            </div> 
                                            <div class="mb-3">
                                                <label for="status" class="form-label">Status Pembayaran</label>
                                                <select class="form-select" id="status" name="status" required>
                                                    <option value="" selected disabled>Pilih Metode</option>
                                                    <?php 
                                                    // Iterasi daftar status mahasiswa dan menampilkannya sebagai opsi dalam dropdown
                                                    foreach ($statusList as $status){
                                                        echo '<option value="'.$status['id'].'">'.$status['nama'].'</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
									    <div class="card-footer">
                                            <button type="button" class="btn btn-danger me-2 float-start" onclick="window.location.href='data-list.php'">Batal</button>
                                            <button type="reset" class="btn btn-secondary me-2 float-start">Reset</button>
                                            <button type="submit" class="btn btn-primary float-end">Submit</button>
                                        </div>
                                    </form>
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