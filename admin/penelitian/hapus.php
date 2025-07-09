<?php
include '../config/koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        // Hapus data terkait terlebih dahulu di tabel tim_penelitian
        $stmt1 = $dbh->prepare("DELETE FROM tim_penelitian WHERE penelitian_id = ?");
        $stmt1->execute([$id]);

        // Baru hapus data dari tabel penelitian
        $stmt2 = $dbh->prepare("DELETE FROM penelitian WHERE id = ?");
        $stmt2->execute([$id]);

        echo "<script>alert('Data penelitian berhasil dihapus.'); window.location='index.php';</script>";
    } catch (PDOException $e) {
        echo "<script>alert('Gagal menghapus data: " . $e->getMessage() . "'); window.location='index.php';</script>";
    }
}
?>
