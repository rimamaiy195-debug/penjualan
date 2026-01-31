<?php
include 'header.php';
include '../koneksi.php';

$id = $_GET['id'];

$penjualan = mysqli_query($koneksi,"SELECT * FROM penjualan WHERE id_jual='$id_jual'");
$p = mysqli_fetch_array($penjualan);
?>

<div class="container">
<div class="panel">
<div class="panel-heading">
    <h4>Edit Penjualan</h4>
</div>

<div class="panel-body">

<form method="post" action="penjualan_update.php">

<input type="hidden" name="id_jual" value="<?php echo $p['id_jual']; ?>">

<div class="form-group">
    <label>Tanggal Jual</label>
    <input type="date" class="form-control" name="tgl_jual"
        value="<?php echo $p['tgl_jual']; ?>" required>
</div>

<br>

<table class="table table-bordered">
<tr>
    <th>Nama Barang</th>
    <th>Jumlah</th>
</tr>

<tr>
    <td><input type="text" class="form-control" name="nama_barang[]"></td>
    <td><input type="number" class="form-control" name="jumlah_jual[]"></td>
</tr>

<tr>
    <td><input type="text" class="form-control" name="nama_barang[]"></td>
    <td><input type="number" class="form-control" name="jumlah_jual[]"></td>
</tr>

</table>

<input type="submit" class="btn btn-primary" value="Simpan">

</form>

</div>
</div>
</div>
