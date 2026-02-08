<?php
include 'header_kasir.php';
include '../koneksi.php';
?>

<style>
.panel-dashboard {
    min-height: 160px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 15px;
    border: none;
}

.panel-dashboard .panel-body {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

.panel-primary {
    background: linear-gradient(135deg, #5a189a, #9d4edd);
    color: white;
}

.panel-info {
    background: linear-gradient(135deg, #7b2cbf, #c77dff);
    color: white;
}

.panel-success {
    background: linear-gradient(135deg, #3c096c, #9d4edd);
    color: white;
}

.panel-dashboard h2 {
    font-size: 36px;
    font-weight: bold;
    margin: 10px 0 5px;
}

.panel-dashboard i {
    margin-bottom: 10px;
}
</style>

<div class="container">

    <center>
        <h3 style="color:#9d4edd;">
            <b>Selamat Datang!</b> di Sistem Penjualan
        </h3>
    </center>

    <br><br>

    <div class="row">

        <div class="col-md-4">
            <div class="panel panel-primary text-center panel-dashboard">
                <div class="panel-body">
                    <i class="glyphicon glyphicon-file" style="font-size:40px;"></i>
                    <h2>
                        <?php
                        echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM penjualan"));
                        ?>
                    </h2>
                    <p>Total Transaksi</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="panel panel-info text-center panel-dashboard">
                <div class="panel-body">
                    <i class="glyphicon glyphicon-usd" style="font-size:40px;"></i>
                    <h2>
                        <?php
                        $total = mysqli_fetch_assoc(
                            mysqli_query($koneksi, "SELECT SUM(total_harga) AS total FROM penjualan")
                        );
                        echo "Rp " . number_format($total['total'] ?? 0);
                        ?>
                    </h2>
                    <p>Total Pendapatan</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="panel panel-success text-center panel-dashboard">
                <div class="panel-body">
                    <i class="glyphicon glyphicon-shopping-cart" style="font-size:40px;"></i>
                    <h2>
                        <?php
                        echo mysqli_num_rows(
                            mysqli_query($koneksi, "SELECT * FROM barang WHERE stok > 0")
                        );
                        ?>
                    </h2>
                    <p>Barang Tersedia</p>
                </div>
            </div>
        </div>

    </div>

    <br>

    <div class="panel panel-ungu">
        <div class="panel-heading panel-heading-ungu">
            <h4><b>Riwayat Penjualan Terakhir</b></h4>
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-ungu">
                <tr>
                    <th width="1%">NO</th>
                    <th>Invoice</th>
                    <th>Nama Kasir</th>
                    <th>Nama Barang</th>
                    <th>Harga Barang</th>
                    <th>Total Harga</th>
                    <th>Tanggal Jual</th>
                </tr>

                <?php
                $data = mysqli_query(
                    $koneksi,
                    "SELECT p.id_jual, p.total_harga, p.tgl_jual,
                            b.nama_barang, b.harga_jual,
                            u.user_nama
                     FROM penjualan p
                     JOIN barang b ON p.id_barang = b.id_barang
                     JOIN user u ON p.user_id = u.user_id
                     ORDER BY p.id_jual DESC
                     LIMIT 10"
                );

                $no = 1;
                while ($d = mysqli_fetch_array($data)) {
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td>INVOICE-<?php echo $d['id_jual']; ?></td>
                    <td><?php echo $d['user_nama']; ?></td>
                    <td><?php echo $d['nama_barang']; ?></td>
                    <td>Rp <?php echo number_format($d['harga_jual']); ?></td>
                    <td>Rp <?php echo number_format($d['total_harga']); ?></td>
                    <td><?php echo $d['tgl_jual']; ?></td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>

</div>
