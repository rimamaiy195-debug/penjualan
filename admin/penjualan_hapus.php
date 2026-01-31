<?php
	include'../koneksi.php';
	$id = $_GET['id'];
	mysqli_query($koneksi, "delete from penjualan where id_jual='$id'");
	echo "<script>alert('Data Akan Dihapus?'); window.location.href='penjualan.php'</script>";
?>