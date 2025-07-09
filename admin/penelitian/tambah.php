 <?php
                            include '../config/koneksi.php';

                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                $judul = $_POST['judul'];
                                $mulai = $_POST['mulai'];
                                $akhir = $_POST['akhir'];
                                $tahun = $_POST['tahun_ajaran'];
                                $bidang = $_POST['bidang_ilmu_id'];

                                $sql = "INSERT INTO penelitian (judul, mulai, akhir, tahun_ajaran, bidang_ilmu_id) 
                                  VALUES (?, ?, ?, ?, ?)";
                                $stmt = $dbh->prepare($sql);
                                $stmt->execute([$judul, $mulai, $akhir, $tahun, $bidang]);
                                header("Location: index.php");
                            }
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
        <a class="navbar-brand ps-3" href="../index.php">Penelitian</a>
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
                    <h1 class="mt-4">Data Penelitian</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="index.php"></a>Dashboard</li>
                        <li class="breadcrumb-item active">Penlitian</li>
                    </ol>

                    <h1 class="mt-4">Tambah Penelitian</h1>
                    <div class="card mb-4">
                        <div class="card-header"><i class="fas fa-table me-1"></i>Form Tambah Penelitian</div>
                        <div class="container-fluid px-4">
                           

                            <form method="post">
                                <div class="mb-3">
                                    <label>Judul</label>
                                    <textarea name="judul" class="form-control" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label>Mulai</label>
                                    <input type="date" name="mulai" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label>Akhir</label>
                                    <input type="date" name="akhir" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label>Tahun Ajaran</label>
                                    <input type="text" name="tahun_ajaran" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label>Bidang Ilmu</label>
                                    <select name="bidang_ilmu_id" class="form-control">
                                        <?php
                                        $bidang = $dbh->query("SELECT * FROM bidang_ilmu");
                                        foreach ($bidang as $b) {
                                            echo "<option value='{$b['id']}'>{$b['nama']}</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <button class="btn btn-success" type="submit">Simpan</button>
                                <a href="index.php" class="btn btn-secondary">Batal</a>
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
