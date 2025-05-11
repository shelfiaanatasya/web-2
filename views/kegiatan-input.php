<?php
require_once 'Controllers/Pegawai.php'; 
require_once 'Helpers/helper.php';

$pegawai_id = isset($_GET['id']) ? $_GET['id'] : null;
$show_pegawai = $pegawai_id ? $pegawai->show($pegawai_id) : [];

// Daftar Jabatan
$list_jabatan = ['Manager', 'Supervisor', 'Staff', 'Operator'];

// Daftar Jenis Kelamin
$list_jenis_kelamin = ['Laki-laki', 'Perempuan'];

if (isset($_POST['type'])) {
    if ($_POST['type'] == 'create') {
        $id = $pegawai->create($_POST);
        echo "<script>alert('Data berhasil ditambahkan')</script>";
        echo "<script>window.location='?url=pegawai'</script>";
    } elseif ($_POST['type'] == 'update') {
        $row = $pegawai->update($pegawai_id, $_POST);
        echo "<script>alert('Data $row[nama] berhasil diperbarui')</script>";
        echo "<script>window.location='?url=pegawai'</script>";
    }
}
?>

<div class="container">
    <form method="post">

        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <?= $pegawai_id ? 'Edit Pegawai' : 'Tambah Pegawai' ?>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="nip">NIP</label>
                    <input type="text" class="form-control" id="nip" name="nip" 
                           value="<?= getSafeFormValue($show_pegawai, 'nip') ?>" required>
                </div>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" 
                           value="<?= getSafeFormValue($show_pegawai, 'nama') ?>" required>
                </div>
                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                        <option value="">Pilih Jenis Kelamin</option>
                        <?php foreach ($list_jenis_kelamin as $jk) : ?>
                            <option value="<?= $jk ?>" <?= $jk == getSafeFormValue($show_pegawai, 'jenis_kelamin') ? 'selected' : '' ?>>
                                <?= $jk ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="jabatan">Jabatan</label>
                    <select class="form-control" id="jabatan" name="jabatan" required>
                        <option value="">Pilih Jabatan</option>
                        <?php foreach ($list_jabatan as $jabatan) : ?>
                            <option value="<?= $jabatan ?>" <?= $jabatan == getSafeFormValue($show_pegawai, 'jabatan') ? 'selected' : '' ?>>
                                <?= $jabatan ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="card-footer text-right">
                <input type="hidden" name="type" value="<?= $pegawai_id ? 'update' : 'create' ?>">
                <input type="hidden" name="id" value="<?= $pegawai_id ?>">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
</div>
