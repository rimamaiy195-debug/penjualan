<?php
include '../koneksi.php';

$user_id   = $_POST['user_id'];
$id_barang = $_POST['id_barang'];
$jumlah    = $_POST['jumlah'];
$tgl_jual  = $_POST['tgl_jual'];

$q = mysqli_query($koneksi,"SELECT * FROM barang WHERE id_barang='$id_barang'");
$b = mysqli_fetch_array($q);

$harga = $b['harga_jual'];
$stok  = $b['stok'];

if($jumlah > $stok){
  echo "<script>
    alert('Stok tidak cukup!');
    window.location='penjualan_tambah.php';
  </script>";
  exit;
}

$total_harga = $harga * $jumlah;
mysqli_query($koneksi,"
  INSERT INTO penjualan (id_barang,total_harga,tgl_jual,user_id)
  VALUES ('$id_barang','$total_harga','$tgl_jual','$user_id')
");

mysqli_query($koneksi,"
  UPDATE barang SET stok = stok - $jumlah
  WHERE id_barang='$id_barang'
");

header("location:penjualan.php");
?>
