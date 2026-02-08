<?php 
  include 'header_kasir.php'; 
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
          <th>Invoice</th>
          <th>Kasir</th>
          <th>Barang</th>
          <th>Jumlah Jual</th>
          <th>Harga Barang</th>
          <th>Total Harga</th>
          <th>Tanggal</th>
          <th>Opsi</th>
        </tr>

        <?php
        $data = mysqli_query($koneksi,"SELECT p.id_jual, p.jumlah, p.total_harga, p.tgl_jual, b.nama_barang, b.harga_jual, u.user_nama FROM penjualan p JOIN barang b ON p.id_barang = b.id_barang JOIN user u ON p.user_id = u.user_id ORDER BY p.id_jual DESC");
        $no=1;
        while($d=mysqli_fetch_array($data)){
        ?>
        <tr>
          <td><?php echo $no++; ?></td>
          <td>INVOICE-<?php echo $d['id_jual']; ?></td>
          <td><?php echo $d['user_nama']; ?></td>
          <td><?php echo $d['nama_barang']; ?></td>
          <td><?php echo $d['jumlah']; ?></td>
          <td>Rp <?php echo number_format ($d['harga_jual'], 0, ',', '.'); ?></td>
      <td>Rp <?php echo number_format($d['total_harga'], 0, ',', '.'); ?></td>
          <td><?php echo $d['tgl_jual']; ?></td>
          <td>
            <a href="penjualan_invoice.php?id=<?php echo $d['id_jual']; ?>" target="_blank" class="btn btn-sm btn-warning">Invoice</a>
            <a href="penjualan_edit.php?id=<?php echo $d['id_jual']; ?>" class="btn btn-sm btn-info">Edit</a>
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
