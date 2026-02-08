<?php
include 'header.php';
include '../koneksi.php';

$barang = mysqli_query($koneksi,"SELECT * FROM barang");
$user   = mysqli_query($koneksi,"SELECT * FROM user WHERE user_status = 2");
?>

<div class="container">
  <div class="panel">
    <div class="panel-heading">
      <h4>Tambah Penjualan</h4>
    </div>

    <div class="panel-body">

      <form method="post" action="penjualan_aksi.php">

        <div class="form-group">
          <label>Kasir</label>
          <select name="user_id" class="form-control" required>
            <option value="">-- Pilih Kasir --</option>
            <?php while($u=mysqli_fetch_array($user)){ ?>
              <option value="<?= $u['user_id']; ?>">
                <?= $u['user_nama']; ?>
              </option>
            <?php } ?>
          </select>
        </div>

        <div class="form-group">
          <label>Barang</label>
          <select name="id_barang" class="form-control" required>
            <option value="">-- Pilih Barang --</option>
            <?php while($b=mysqli_fetch_array($barang)){ ?>
              <option value="<?= $b['id_barang']; ?>">
                <?= $b['nama_barang']; ?> (Stok: <?= $b['stok']; ?>)
              </option>
            <?php 
            } 
            ?>
          </select>
        </div>

        <div class="form-group">
          <label>Jumlah Jual</label>
          <input type="number" name="jumlah" class="form-control" required>
        </div>

        <div class="form-group">
          <label>Tanggal</label>
          <input type="date" name="tgl_jual" class="form-control" required>
        </div>

        <input type="submit" value="Simpan" class="btn btn-primary">
      </form>

    </div>
  </div>
</div>
