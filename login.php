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
                            <h3 class="mb-0">Login</h3>
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
                    <div class="row justify-content-center"> <div class="col-md-6"> <div class="card card-primary card-outline shadow-lg" style="border-radius: 15px;">
                                
                                <div class="card-header">
                                    <h3 class="card-title">Silahkan Melakukan Login</h3>
                                </div>

                                <div class="card-body p-4">
                                <form action="proses/proses-login.php" method="POST">
                                    
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Email Address</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                            <input 
                                                type="email" 
                                                class="form-control" 
                                                placeholder="Enter your email" 
                                                name="email" 
                                                required
                                            >
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label fw-bold">Password</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-lock"></i></span>
                                            <input 
                                                type="password" 
                                                class="form-control" 
                                                placeholder="Enter your password" 
                                                name="password" 
                                                required
                                            >
                                        </div>
                                    </div>

                                    <div class="d-grid gap-2">
                                        <button 
                                            type="submit" 
                                            name="login_btn" 
                                            class="btn btn-primary btn-lg shadow-sm"
                                            style="border-radius: 50px; font-weight: 600;"
                                        >
                                            <i class="bi bi-box-arrow-in-right"></i> Masuk 
                                        </button>
                                    </div>

                                </form> </div>

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