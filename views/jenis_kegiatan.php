<?php
require_once 'Controllers/JenisKegiatan.php';
require_once 'Helpers/helper.php';

$list_JenisKegiatan = $jeniskegiatan->index();

if (isset($_POST['type'])) {
  if ($_POST['type'] == 'delete') {
    $row = $jeniskegiatan->delete($_POST['id']);
    echo "<script>alert('Data $row[nama] berhasil dihapus')</script>";
    echo "<script>window.location='?url=jenis_kegiatan'</script>";
  }
}
?>

<div class="container">
  <div class="card">
    <div class="card-body">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1;
          foreach ($list_JenisKegiatan as $row): ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= $row['nama'] ?></td>
              <td>
                <div class="d-flex">
                  <a href="?url=jenis_kegiatan-input&id=<?= $row['id'] ?>" class="btn btn-sm btn-warning mr-2">Edit</a>
                  <form action="" method="post" onsubmit="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                    <input type="hidden" name="type" value="delete">
                    <button class="btn btn-sm btn-danger">Hapus</button>
                  </form>
                </div>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
      <div class="d-flex justify-content-center mt-3">
        <a class="btn btn-success btn-sm" href="?url=jenis_kegiatan-input">
          <i class="fas fa-plus"></i> Tambah Jenis Kegiatan
        </a>
      </div>
    </div>
  </div>
</div>
