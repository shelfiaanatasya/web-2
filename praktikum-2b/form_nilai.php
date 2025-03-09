<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Nilai</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body style="font-size: 18px;">

<form method="POST" action="" class="container mt-5">
  <div class="form-group row">
    <label for="nama_lengkap" class="col-4 col-form-label">Nama Lengkap</label> 
    <div class="col-8">
      <input id="nama_lengkap" name="nama_lengkap" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="matkul" class="col-4 col-form-label">Mata Kuliah</label> 
    <div class="col-8">
      <select id="matkul" name="matkul" class="custom-select" required="required">
        <option value="Dasar-Dasar Pemrograman">Dasar-Dasar Pemrograman</option>
        <option value="Basis Data">Basis Data</option>
        <option value="Pemrograman Web">Pemrograman Web</option>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="uts" class="col-4 col-form-label">Nilai UTS</label> 
    <div class="col-8">
      <input id="uts" name="uts" type="number" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="uas" class="col-4 col-form-label">Nilai UAS</label> 
    <div class="col-8">
      <input id="uas" name="uas" type="number" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="tugas" class="col-4 col-form-label">Nilai Tugas/Praktikum</label> 
    <div class="col-8">
      <input id="tugas" name="tugas" type="number" class="form-control" required="required">
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary">Submit</button>
    </div>
  </div>
</form>

<?php
// Pastikan form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_lengkap = isset($_POST['nama_lengkap']) ? $_POST['nama_lengkap'] : '';
    $matkul = isset($_POST['matkul']) ? $_POST['matkul'] : '';
    $uts = isset($_POST['uts']) ? $_POST['uts'] : '';
    $uas = isset($_POST['uas']) ? $_POST['uas'] : '';
    $tugas = isset($_POST['tugas']) ? $_POST['tugas'] : '';

    echo '<h3>Hasil Input:</h3>';
    echo '<br/> Nama : ' . htmlspecialchars($nama_lengkap);
    echo '<br/> Mata Kuliah : ' . htmlspecialchars($matkul);
    echo '<br/> Nilai UTS : ' . htmlspecialchars($uts);
    echo '<br/> Nilai UAS : ' . htmlspecialchars($uas);
    echo '<br/> Nilai Tugas Praktikum : ' . htmlspecialchars($tugas);
}
?>

</body>
</html>
