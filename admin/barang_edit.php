<?php
include "../koneksi.php";
include 'header.php';

$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM barang WHERE id_barang='$id'");
$d = mysqli_fetch_array($data);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Barang</title>
</head>
<body>

<div class="container">
    <div class="panel">
    <div class="panel-heading">
    <h2>Edit Barang</h2>
    </div>
    <div class="panel-body">
    <form action="barang_update.php" method="POST">
        <a href="barang.php" class="btn btn-sm btn-info pull-right">Kembali</a>
        <br><br>
        <input type="hidden" name="id_barang" value="<?php echo $d['id_barang']; ?>">

        <div class="form-group">
            <label>Nama Barang</label>
            <input type="text" name="nama_barang" value="<?php echo $d['nama_barang']; ?>" class="form-control">
        </div>

        <div class="form-group">
            <label>Harga Beli</label>
            <input type="number" name="harga_beli" value="<?php echo $d['harga_beli']; ?>" class="form-control">
        </div>

        <div class="form-group">
            <label>Harga Jual</label>
            <input type="number" name="harga_jual" value="<?php echo $d['harga_jual']; ?>" class="form-control">
        </div>

        <div class="form-group">
            <label>Stok</label>
            <input type="number" name="stok" value="<?php echo $d['stok']; ?>" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
    </div>
</div>

</body>
</html>
