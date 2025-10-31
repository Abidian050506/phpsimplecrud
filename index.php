<!doctype html>
<html lang="en">
	<head>
		<?php include 'template/header.php'; // Menyertakan header template ?>
	</head>

	<body class="layout-fixed fixed-header fixed-footer sidebar-expand-lg sidebar-open bg-body-tertiary">

		<div class="app-wrapper">

			<?php include 'template/navbar.php'; // Menyertakan navbar template ?>

			<?php include 'template/sidebar.php'; // Menyertakan sidebar template ?>

			<main class="app-main">

				<div class="app-content-header">
					<div class="container-fluid">
						<div class="row">
							<div class="col-sm-6">
								<h3 class="mb-0">RENTAL MOBIL YUK</h3>
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
										<h3 class="card-title">Selamat Datang di GoRent — Solusi Terbaik untuk Kebutuhan Sewa Mobil Anda!</h3>
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

									<div class="card-body">
										<p>Halo user! </p>
										<p> Di era yang serba cepat seperti sekarang, kenyamanan dan efisiensi dalam bepergian menjadi hal yang sangat penting. GoRent hadir sebagai sistem informasi manajemen rental mobil yang modern, praktis, dan dapat diandalkan untuk memenuhi kebutuhan transportasi Anda.
										</p>
										<p>
										Melalui platform ini, kami menghadirkan kemudahan dalam pengelolaan data kendaraan, pelanggan, dan transaksi sewa, semuanya dalam satu sistem terpadu. Tidak perlu lagi repot mencatat secara manual — dengan GoRent, proses penyewaan mobil menjadi lebih cepat, akurat, dan transparan.</p>
										<p>Mulailah perjalanan Anda bersama GoRent — nikmati kemudahan dalam setiap perjalanan, dan jadikan setiap kilometer berarti! 🚗💨</p>

										<p>GoRent — Easy. Fast. Reliable.</p>
										<a href="data-input.php" class="btn btn-primary btn-lg"><i class="bi bi-clipboard-data-fill"></i> Input Data Customer</a>
										<a href="data-list.php" class="btn btn-success btn-lg"><i class="bi bi-card-list"></i> Lihat Daftar Customer</a>
										<a href="data-search.php" class="btn btn-warning btn-lg"><i class="bi bi-search-heart-fill"></i> Cari Customer</a>
									</div>

								</div>
							</div>
						</div>
					</div>
				</div>

			</main>

			<?php include 'template/footer.php'; // Menyertakan footer template ?>

		</div>
		
		<?php include 'template/script.php'; // Menyertakan script template ?>

	</body>
</html>