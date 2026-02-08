<!DOCTYPE html>
<html>
<head>
	<title>Sistem Informasi Laundry</title>

	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
	<script type="text/javascript" src="../assets/js/jquery.js"></script>
	<script type="text/javascript" src="../assets/js/bootstrap.js"></script>

</head>
<body>
	
	<?php 
	session_start();
	if($_SESSION['status']!="login"){
		header("location:../index.php?pesan=belum_login");
	}
	?>


	<?php 
	
	include '../koneksi.php';
	?>
	<div class="container">

		<center><h2>LAUNDRY</h2></center>
		<br/>
		<br/>
		<?php 
		if(isset($_GET['dari']) && isset($_GET['sampai'])){

			$dari = $_GET['dari'];
			$sampai = $_GET['sampai'];
			?>
			<h4>Data Laporan Laundry dari <b><?php echo $dari; ?></b> sampai <b><?php echo $sampai; ?></b></h4>
			<table class="table table-bordered table-striped">
				<tr>
					<th width="1%">No</th>
					<th>Invoice</th>
					<th>Tanggal</th>
					<th>Pelanggan</th>
					<th>Berat (Kg)</th>
					<th>Tgl. Selesai</th>
					<th>Harga</th>
				</tr>

				<?php
				$data = mysqli_query($koneksi,"SELECT p.*, b.nama_barang, b.harga_jual, u.user_nama FROM penjualan p JOIN barang b ON p.id_barang = b.id_barang JOIN user u ON p.user_id = u.user_id ORDER BY p.id_jual DESC");

		        $no=1;
		        while($d=mysqli_fetch_array($data)){
		        ?>
		        <tr>
		          <td><?php echo $no++; ?></td>
		          <td>INVOICE-<?php echo $d['id_jual']; ?></td>
		          <td><?php echo $d['user_nama']; ?></td>
		          <td><?php echo $d['nama_barang']; ?></td>
		          <td>Rp <?php echo number_format ($d['harga_jual'], 0, ',', '.'); ?></td>
				  <td>Rp <?php echo number_format($d['total_harga'], 0, ',', '.'); ?></td>
		          <td><?php echo $d['tgl_jual']; ?></td>
		        </tr>
					<?php 
				}
				?>
			</table>			
			<?php } ?>

		</div>

		<script type="text/javascript">
			window.print();
		</script>

	</body>
	</html>