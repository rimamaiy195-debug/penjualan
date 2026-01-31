<?php 
	include 'header.php'; 
?>

<?php 
	include '../koneksi.php'; 
?>

<div class="container">
  <div class="panel">
    <div class="panel-heading">
      <h4>Data Penjualan</h4>
    </div>

    <div class="panel-body">

      <a href="penjualan_tambah.php" class="btn btn-info btn-sm pull-right">
        Tambah Penjualan
      </a>

      <br><br>

      <table class="table table-bordered">
        <tr>
          <th>No</th>
          <th>Kasir</th>
          <th>Barang</th>
          <th>Harga Barang</th>
          <th>Total Harga</th>
          <th>Tanggal</th>
          <th>Opsi</th>
        </tr>

        <?php
		$data = mysqli_query($koneksi,"SELECT p.*, b.nama_barang, b.harga_jual, u.user_nama FROM penjualan p JOIN barang b ON p.id_barang = b.id_barang JOIN user u ON p.user_id = u.user_id ORDER BY p.id_jual DESC");

        $no=1;
        while($d=mysqli_fetch_array($data)){
        ?>
        <tr>
          <td><?php echo $no++; ?></td>
          <td><?php echo $d['user_nama']; ?></td>
          <td><?php echo $d['nama_barang']; ?></td>
          <td>Rp <?php echo number_format ($d['harga_jual'], 0, ',', '.'); ?></td>
		  <td>Rp <?php echo number_format($d['total_harga'], 0, ',', '.'); ?></td>
          <td><?php echo $d['tgl_jual']; ?></td>
          <td>
            <a href="penjualan_hapus.php?id=<?= $d['id_jual']; ?>"class="btn btn-danger btn-sm">Hapus</a>
          </td>
        </tr>
        <?php 
    	} 
    	?>
      </table>

    </div>
  </div>
</div>
