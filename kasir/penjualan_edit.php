<?php
include 'header_kasir.php';
include '../koneksi.php';

$id = isset($_GET['id']) ? $_GET['id'] : '';

if($id == ''){
    echo "ID tidak ditemukan";
    exit;
}

$penjualan = mysqli_query($koneksi, 
"SELECT p.id_jual, p.tgl_jual, p.user_id, p.id_barang,
        u.user_nama, b.nama_barang
 FROM penjualan p
 LEFT JOIN user u ON p.user_id = u.user_id
 LEFT JOIN barang b ON p.id_barang = b.id_barang
 WHERE p.id_jual = '$id'");

$d = mysqli_fetch_assoc($penjualan);

$kasir = mysqli_query($koneksi, "SELECT * FROM user WHERE user_status = 2");
$barang = mysqli_query($koneksi, "SELECT * FROM barang");
?>

<div class="container">
    <div class="panel">
        <div class="panel-heading">
            <h4>Edit Penjualan</h4>
        </div>
        <div class="panel-body">

            <a href="penjualan.php" class="btn btn-sm btn-info pull-right">Kembali</a>
            <br><br>

            <form method="post" action="penjualan_update.php">

                <input type="hidden" name="id_jual" value="<?php echo $d['id_jual']; ?>">

                <div class="form-group">
                    <label>Kasir</label>
                    <select name="user_id" class="form-control" required>
                        <?php while($k = mysqli_fetch_array($kasir)){ ?>
                            <option value="<?php echo $k['user_id']; ?>"
                                <?php if($k['user_id'] == $d['user_id']) echo "selected"; ?>>
                                <?php echo $k['user_nama']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Barang</label>
                    <select name="id_barang" class="form-control" required>
                        <?php while($b = mysqli_fetch_array($barang)){ ?>
                            <option value="<?php echo $b['id_barang']; ?>"
                                <?php if($b['id_barang'] == $d['id_barang']) echo "selected"; ?>>
                                <?php echo $b['nama_barang']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                  <label>Jumlah Jual</label>
                  <input type="number" name="jumlah" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Tanggal</label>
                    <input type="date" class="form-control" name="tgl_jual"
                           value="<?php echo $d['tgl_jual']; ?>" required>
                </div>

                <input type="submit" class="btn btn-primary" value="Simpan">

            </form>

        </div>
    </div>
</div>
