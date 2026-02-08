<!DOCTYPE html>
<html>
<head>
	<title>Cetak Invoice Penjualan</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
	<style>
		body{
			font-size: 12px;
		}
		hr{
			border-top: 1px solid #000;
		}
	</style>
</head>
<body onload="window.print()">

<?php
	session_start();
	if ($_SESSION['status'] != "login") {
		header("location:../index.php?pesan=belum_login");
	}

	include '../koneksi.php';

	$id = $_GET['id'];
    $penjualan = mysqli_query($koneksi,"SELECT p.*, b.nama_barang, b.harga_jual, u.user_nama FROM penjualan p JOIN barang b ON p.id_barang = b.id_barang JOIN user u ON p.user_id = u.user_id WHERE p.id_jual='$id'");
	while($p = mysqli_fetch_array($penjualan)){
?>

<div class="container">
	<center>
		<h3>INVOICE PENJUALAN</h3>
	</center>

	<hr>

	<table width="100%">
		<tr>
			<td width="30%">No. Invoice</td>
			<td>: INVOICE-<?php echo $p['id_jual']; ?></td>
		</tr>
		<tr>
			<td>Tanggal</td>
			<td>: <?php echo $p['tgl_jual']; ?></td>
		</tr>
		<tr>
			<td>Kasir</td>
			<td>: <?php echo $p['user_nama']; ?></td>
		</tr>
	</table>

	<br>

	<table class="table table-bordered">
		<tr>
			<th>Nama Barang</th>
			<th>Harga</th>
			<th>Total</th>
		</tr>
		<tr>
			<td><?php echo $p['nama_barang']; ?></td>
			<td>Rp <?php echo number_format($p['harga_jual']); ?></td>
			<td>Rp <?php echo number_format($p['total_harga']); ?></td>
		</tr>
	</table>

	<table width="100%">
		<tr>
			<td align="right">
				<b>Total Bayar :</b>
				Rp <?php echo number_format($p['total_harga']); ?>
			</td>
		</tr>
	</table>

	<br><br>

	<center>
		<p><i>Terima kasih atas pembelian Anda</i></p>
	</center>

</div>

<?php } ?>

</body>
</html>
