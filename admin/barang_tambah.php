<?php
include "../koneksi.php";
include 'header.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Barang</title>
</head>
<body>

<div class="container">
        <div class="panel">
        <div class="panel-heading">
            <h4>Tambah Barang</h4>
        </div>
        <div class="panel-body">
            <a href="barang.php" class="btn btn-sm btn-info pull-right">Kembali</a>
            <br><br>

            <form action="barang_aksi.php" method="post">
                <div class="form-group">
                    <label>Nama Barang</label>
                    <input type="text" name="nama_barang" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Harga Beli</label>
                    <input type="number" name="harga_beli" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Harga Jual</label>
                    <input type="number" name="harga_jual" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Stok</label>
                    <input type="number" name="stok" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>
