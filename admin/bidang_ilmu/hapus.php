<?php
include '../config/koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        $stmt = $dbh->prepare("DELETE FROM bidang_ilmu WHERE id = ?");
        $stmt->execute([$id]);
        echo "<script>alert('Data berhasil dihapus.'); window.location='index.php';</script>";
    } catch (PDOException $e) {
        // Jika error karena foreign key
        if ($e->getCode() == 23000) {
            echo "<script>alert('Gagal menghapus! Data masih digunakan di tabel Penelitian.'); window.location='index.php';</script>";
        } else {
            // Error lainnya
            echo "<script>alert('Terjadi kesalahan: " . $e->getMessage() . "'); window.location='index.php';</script>";
        }
    }
} else {
    echo "<script>alert('ID tidak ditemukan.'); window.location='index.php';</script>";
}
?>
