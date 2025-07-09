<?php
include '../config/koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        // Hapus terlebih dahulu semua kegiatan yang menggunakan jenis_kegiatan ini
        $stmt1 = $dbh->prepare("DELETE FROM kegiatan WHERE jenis_kegiatan_id = ?");
        $stmt1->execute([$id]);

        // Setelah itu hapus jenis_kegiatan
        $stmt2 = $dbh->prepare("DELETE FROM jenis_kegiatan WHERE id = ?");
        $stmt2->execute([$id]);

        echo "<script>alert('Data jenis kegiatan berhasil dihapus.'); window.location='index.php';</script>";
    } catch (PDOException $e) {
        echo "<script>alert('Gagal menghapus data: " . $e->getMessage() . "'); window.location='index.php';</script>";
    }
}
?>

