<?php
include '../config/koneksi.php';
$id = $_GET['id'];
$stmt = $dbh->prepare("SELECT * FROM kegiatan WHERE id = ?");
$stmt->execute([$id]);
$data = $stmt->fetch();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $dbh->prepare("UPDATE kegiatan SET tanggal_mulai=?, tanggal_selesai=?, tempat=?, deskripsi=?, jenis_kegiatan_id=? WHERE id=?");
    $stmt->execute([
        $_POST['tanggal_mulai'],
        $_POST['tanggal_selesai'],
        $_POST['tempat'],
        $_POST['deskripsi'],
        $_POST['jenis_kegiatan_id'],
        $id
    ]);
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
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
        <a class="navbar-brand ps-3" href="../index.php">Kegiatan</a>
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
                    <h1 class="mt-4">Data Kegiatan</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="index.php"></a>Dashboard</li>
                        <li class="breadcrumb-item active">Kegiatan</li>
                    </ol>
                    <h2>Edit Kegiatan</h2>

                    <div class="card mb-4">
                        <div class="card-header"><i class="fas fa-table me-1"></i>Data Kegiatan</div>
                        <div class="card-body">
<div class="container">
    <form method="POST">
        <div class="mb-3">
            <label>Tanggal Mulai</label>
            <input type="date" name="tanggal_mulai" class="form-control" value="<?= $data['tanggal_mulai'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Tanggal Selesai</label>
            <input type="date" name="tanggal_selesai" class="form-control" value="<?= $data['tanggal_selesai'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Tempat</label>
            <input type="text" name="tempat" class="form-control" value="<?= $data['tempat'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="4" required><?= $data['deskripsi'] ?></textarea>
        </div>
        <div class="mb-3">
            <label>Jenis Kegiatan</label>
            <select name="jenis_kegiatan_id" class="form-control" required>
                <?php
                $jenis = $dbh->query("SELECT * FROM jenis_kegiatan");
                while ($j = $jenis->fetch()) {
                    $selected = $j['id'] == $data['jenis_kegiatan_id'] ? "selected" : "";
                    echo "<option value='{$j['id']}' $selected>{$j['nama']}</option>";
                }
                ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>
   </div>
    </div>
    </div>
       <!-- footer -->
            <?php include_once('../layout/footer.php') ?>
                    <?php 
            $url = "/project-uts/admin"; 
            $current_page = basename($_SERVER['REQUEST_URI']);
            ?>
        <!-- batas footer -->       
    </div>
    </div>
</body>
</html>
