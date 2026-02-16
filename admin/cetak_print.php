<!DOCTYPE html>
<html>
<head>
	<title>Sistem Penjualan</title>

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

		<center><h2>PENJUALAN</h2></center>
		<br/>
		<br/>
		<?php 
		if(isset($_GET['dari']) && isset($_GET['sampai'])){

			$dari = $_GET['dari'];
			$sampai = $_GET['sampai'];
			?>
			<h4>Data Laporan Penjualan dari <b><?php echo $dari; ?></b> sampai <b><?php echo $sampai; ?></b></h4>
			<table class="table table-bordered table-striped">
				<tr>
                        <th width="1%">NO</th>
                        <th>ID</th>
                        <th>Nama Kasir</th>
                        <th>Nama Barang</th>
                        <th>Harga Barang</th>
                        <th>Total Harga</th>
                        <th>Tanggal Jual</th>
                    </tr>

					<?php
						$data = mysqli_query($koneksi,"SELECT p.id_jual, p.tgl_jual, p.total_harga, b.nama_barang, b.harga_jual, u.user_nama FROM penjualan p JOIN barang b ON p.id_barang = b.id_barang JOIN user u ON p.user_id = u.user_id WHERE p.tgl_jual BETWEEN '$dari' AND '$sampai' ORDER BY p.id_jual DESC");
						$no = 1;
                		while ($d = mysqli_fetch_array($data)) {
                	?>
						<tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $d['id_jual']; ?></td>
                        <td><?php echo $d['user_nama']; ?></td>
                        <td><?php echo $d['nama_barang']; ?></td>
                        <td>Rp <?php echo number_format($d['harga_jual']); ?></td>
                        <td>Rp <?php echo number_format($d['total_harga']); ?></td>
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