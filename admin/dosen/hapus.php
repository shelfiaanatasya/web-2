<?php
include '../config/koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        $stmt = $dbh->prepare("DELETE FROM dosen WHERE id = ?");
        $stmt->execute([$id]);
        echo "<script>alert('Data dosen berhasil dihapus.'); window.location='index.php';</script>";
    } catch (PDOException $e) {
        if ($e->getCode() == 23000) {
            echo "<script>alert('Gagal menghapus, Dosen masih digunakan di tabel Dosen Kegiatan.'); window.location='index.php';</script>";
        } else {
            echo "<script>alert('Terjadi kesalahan: " . $e->getMessage() . "'); window.location='index.php';</script>";
        }
    }
} else {
    echo "<script>alert('ID tidak ditemukan.'); window.location='index.php';</script>";
}
?>
