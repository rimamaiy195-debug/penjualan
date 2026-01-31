<?php
include "../koneksi.php";

$id     = $_POST['id_jual'];
$tgl    = $_POST['tgl_jualg'];
$kasir  = $_POST['nama_kasir'];

mysqli_query($koneksi, "
    UPDATE penjualan 
    SET tgl_jual='$tgl',
        nama_kasir='$kasir'
    WHERE id_jual='$id'
");

header("location:penjualan.php");
