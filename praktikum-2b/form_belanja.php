<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-6">
                <div class="container px-5">
                    <form method="POST">
                        <div class="form-group row">
                            <label for="customer" class="col-4 col-form-label">Customer</label>
                            <div class="col-8">
                                <input id="customer" name="customer" placeholder="Nama Customer" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-4">Pilih Produk</label>
                            <div class="col-8">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input name="produk" id="produk_0" type="radio" class="custom-control-input" value="TV">
                                    <label for="produk_0" class="custom-control-label">TV</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input name="produk" id="produk_1" type="radio" class="custom-control-input" value="Kulkas">
                                    <label for="produk_1" class="custom-control-label">Kulkas</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input name="produk" id="produk_2" type="radio" class="custom-control-input" value="Mesin Cuci">
                                    <label for="produk_2" class="custom-control-label">Mesin Cuci</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jumlah" class="col-4 col-form-label">Jumlah</label>
                            <div class="col-8">
                                <input id="jumlah" name="jumlah" type="number" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="offset-4 col-8">
                                <button name="submit" type="submit" class="btn btn-primary">Kirim</button>                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <table class="table">
                    <thead>
                        <tr style="background-color: bisque">
                            <th scope="col">Daftar Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr >
                            <th scope="row">TV : Rp 4.200.000</th>
                        </tr>
                        <tr>
                            <th scope="row">Kulkas : Rp 3.100.000</th>
                        </tr>
                        <tr>
                            <th scope="row">Mesin Cuci : Rp 3.000.000</th>
                        </tr>
                        <tr style="background-color: bisque">
                            <th scope="row">Harga dapat berubah kapan saja!</th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php
if (isset($_POST['submit'])) {
    $customer = $_POST['customer'];

    // Memastikan kunci "produk" ada di dalam $_POST
    $produk = isset($_POST['produk']) ? $_POST['produk'] : '';
    $jumlah = $_POST['jumlah'];
    $total_belanja = 0;

    if ($produk == 'TV') {
        $harga_satuan = 4200000;
        $total_belanja = $harga_satuan * $jumlah;
    } elseif ($produk == 'Kulkas') {
        $harga_satuan = 3100000;
        $total_belanja = $harga_satuan * $jumlah;
    } elseif ($produk == 'Mesin Cuci') {
        $harga_satuan = 3800000;
        $total_belanja = $harga_satuan * $jumlah;
    }
?>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <table class="table">
                    <thead>
                        <tr style="background-color: bisque">
                            <th scope="col" >Informasi Belanja</th>
                            <th scope="col">Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Nama Customer</td>
                            <td><?php echo $customer; ?></td>
                        </tr>
                        <tr  style="background-color: beige">
                            <td>Produk Pilihan</td>
                            <td><?php echo $produk; ?></td>
                        </tr>
                        <tr>
                            <td>Jumlah Beli</td>
                            <td><?php echo $jumlah; ?></td>
                        </tr>
                        <tr style="background-color: beige">
                            <td>Total Belanja</td>
                            <td>Rp <?php echo number_format($total_belanja, 0, ',', '.'); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php } ?>


    

</body>

</html>
