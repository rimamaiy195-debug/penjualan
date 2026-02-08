<?php 
	include 'header.php'; 
	include'../koneksi.php';
?>

<div class="container">
	<div class="panel">
		<div class="panel-heading">
			<h4>Filter Laporan</h4>
		</div>
		<div class="panel-body">		

			<form action="laporan.php" method="get">
				<table class="table table-bordered table-striped">
					<tr>				
						<th>Dari Tanggal</th>
						<th>Sampai Tanggal</th>							
						<th width="1%"></th>
					</tr>
					<tr>
						<td>
							<br/>
							<input type="date" name="tgl_dari" class="form-control">
						</td>
						<td>
							<br/>
							<input type="date" name="tgl_sampai" class="form-control">
							<br/>
						</td>
						<td>
							<br/>
							<input type="submit" class="btn btn-primary" value="Filter">
						</td>
					</tr>

				</table>
			</form>
			
		</div>
	</div>

	<br/>

	<?php 
	if(isset($_GET['tgl_dari']) && isset($_GET['tgl_sampai'])){

		$dari = $_GET['tgl_dari'];
		$sampai = $_GET['tgl_sampai'];

		?>
		<div class="panel">
			<div class="panel-heading">
				<h4>Data Laporan Penjualan dari <b><?php echo $dari; ?></b> sampai <b><?php echo $sampai; ?></b></h4>
			</div>
			<div class="panel-body">			

				<a target="_blank" href="cetak_print.php?dari=<?php echo $dari; ?>&sampai=<?php echo $sampai; ?>" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-print"></i> CETAK</a>
				<br/>
				<br/>
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
			</div>
		</div>
		<?php } ?>

	</div>
