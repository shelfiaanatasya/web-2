<?php
                            include '../config/koneksi.php';

                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                $nidn = $_POST['nidn'];
                                $nama = $_POST['nama'];
                                $gelar_depan = $_POST['gelar_depan'];
                                $gelar_belakang = $_POST['gelar_belakang'];
                                $jenis_kelamin = $_POST['jenis_kelamin'];
                                $tempat_lahir = $_POST['tempat_lahir'];
                                $tanggal_lahir = $_POST['tanggal_lahir'];
                                $alamat = $_POST['alamat'];
                                $email = $_POST['email'];
                                $tahun_masuk = $_POST['tahun_masuk'];
                                $prodi_id = $_POST['prodi_id'];

                                $sql = "INSERT INTO dosen (nidn, nama, gelar_depan, gelar_belakang, jenis_kelamin, tempat_lahir, tanggal_lahir, alamat, email, tahun_masuk, prodi_id)
                              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                                $stmt = $dbh->prepare($sql);
                                $stmt->execute([$nidn, $nama, $gelar_depan, $gelar_belakang, $jenis_kelamin, $tempat_lahir, $tanggal_lahir, $alamat, $email, $tahun_masuk, $prodi_id]);

                                header("Location: index.php");
                                exit;
                            }

                            $stmt = $dbh->query("SELECT * FROM prodi");
                            $prodi = $stmt->fetchAll();
                            ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" /> 
    <title>Data Dosen - SB Admin</title>

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="../css/styles.css" rel="stylesheet" />

    <!-- Scripts --> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="../index.php">Dosen</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        </form>
       <!-- navbar -->
        <?php include_once('../layout/navbar.php') ?>
           <?php 
            $url = "/project-uts/admin"; 
            $current_page = basename($_SERVER['REQUEST_URI']);
            ?>
        <!-- batas navbar -->
        <!-- sidebar -->
        <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <?php include_once('../layout/sidebar.php') ?>
        </div>
        <!-- batas sidebar -->

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Data Dosen</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="index.php"></a>Dashboard</li>
                        <li class="breadcrumb-item active">Dosen</li>
                    </ol>

                    <h2 class="mt-4">Tambah Dosen</h2>
                    <div class="card mb-4">
                        <div class="card-header"><i class="fas fa-table me-1"></i>Form Data Dosen</div>
                        <div class="container-fluid px-4">
                            

                            <form method="post">
                                <div class="mb-3">
                                    <label>NIDN</label>
                                    <input type="text" name="nidn" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label>Nama</label>
                                    <input type="text" name="nama" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label>Gelar Depan</label>
                                    <input type="text" name="gelar_depan" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Gelar Belakang</label>
                                    <input type="text" name="gelar_belakang" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-control" required>
                                        <option value="">-- Pilih --</option>
                                        <option value="L">Laki-laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label>Tempat Lahir</label>
                                    <input type="text" name="tempat_lahir" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Tanggal Lahir</label>
                                    <input type="date" name="tanggal_lahir" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Alamat</label>
                                    <textarea name="alamat" class="form-control"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Tahun Masuk</label>
                                    <input type="number" name="tahun_masuk" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Prodi</label>
                                    <select name="prodi_id" class="form-control">
                                        <?php foreach ($prodi as $p): ?>
                                            <option value="<?= $p['id'] ?>"><?= $p['nama'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="index.php" class="btn btn-secondary">Kembali</a>
                            </form>
                        </div>

                    </div>
                </div>
            </main>

        <!-- footer -->
            <?php include_once('../layout/footer.php') ?>
                    <?php 
            $url = "/project-uts/admin"; 
            $current_page = basename($_SERVER['REQUEST_URI']);
            ?>
        <!-- batas footer -->       
    </div>
    </div>

    <!-- Scripts -->
    <script src="../js/scripts.js"></script>
    <script src="../js/datatables-simple-demo.js"></script>
</body>

</html>