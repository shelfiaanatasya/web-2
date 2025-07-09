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
        <a class="navbar-brand ps-3" href="../index.php">Tim Penelitian</a>
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
        <main class="container-fluid px-4">
            <h1 class="mt-4">Tim Penelitian</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="index.php"></a>Dashboard</li>
                        <li class="breadcrumb-item active">Tim Penelitian</li>
                    </ol>
            <div class="card mb-4">
            <div class="card-header"><i class="fas fa-table me-1"></i>Tim Penelitian</div>
            <a href="tambah.php" class="btn btn-primary btn-sm my-2">Tambah +</a>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nama Dosen</th>
                                <th>Judul Penelitian</th>
                                <th>Peran</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include '../config/koneksi.php';
                            $sql = "SELECT tp.*, d.nama AS nama_dosen, p.judul
                                    FROM tim_penelitian tp
                                    JOIN dosen d ON tp.dosen_id = d.id
                                    JOIN penelitian p ON tp.penelitian_id = p.id";
                            $stmt = $dbh->prepare($sql);
                            $stmt->execute();
                            foreach ($stmt->fetchAll() as $row) {
                                echo "<tr>
                                        <td>{$row['nama_dosen']}</td>
                                        <td>{$row['judul']}</td>
                                        <td>{$row['peran']}</td>
                                        <td>
                                            <a href='edit.php?dosen_id={$row['dosen_id']}&penelitian_id={$row['penelitian_id']}' class='btn btn-warning btn-sm'>Edit</a>
                                            <a href='hapus.php?dosen_id={$row['dosen_id']}&penelitian_id={$row['penelitian_id']}' class='btn btn-danger btn-sm' onclick=\"return confirm('Yakin hapus data?')\">Hapus</a>
                                        </td>
                                      </tr>";
                            }
                            ?>
                        </tbody>
                    </table>
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
    <script src="../js/scripts.js"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>
