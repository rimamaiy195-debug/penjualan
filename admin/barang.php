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
            <h4>Data Barang</h4>
        </div>
        <div class="panel-body">
    <br>
    <a href="barang_tambah.php" class="btn btn-sm btn-info pull-right">Barang Baru</a>

    <h3>Daftar Barang</h3>
    <table class="table table-bordered table-striped">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Harga Beli</th>
            <th>Harga Jual</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>

        <?php
        $data = mysqli_query($koneksi, "SELECT * FROM barang");

        while ($d = mysqli_fetch_array($data)) {
        ?>
        <tr>
            <td><?php echo $d['id_barang']; ?></td>
            <td><?php echo $d['nama_barang']; ?></td>
            <td><?php echo $d['harga_beli']; ?></td>
            <td><?php echo $d['harga_jual']; ?></td>
            <td><?php echo $d['stok']; ?></td>
            <td>
                <a href="barang_edit.php?id=<?php echo $d['id_barang']; ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="barang_hapus.php?id=<?php echo $d['id_barang']; ?>" class="btn btn-danger btn-sm">Hapus</a>
            </td>
        </tr>
        <?php 
            } 
        ?>
    </table>
</div>

        </div>
    </div>
</body>
</html>
