<?php
include 'header_kasir.php';
include '../koneksi.php';
?>

<div class="container">

    <center>
        <h3 style="color: #9d4edd;">
            <b>Selamat Datang!</b> di Sistem Penjualan
        </h3>
    </center>

    <br><br>

    <div class="panel panel-ungu">
        <div class="panel-heading panel-heading-ungu">
            <h4><b>Riwayat Penjualan Terakhir</b></h4>
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-ungu">
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
                $data = mysqli_query($koneksi,"SELECT p.id_jual, p.total_harga, p.tgl_jual, b.nama_barang, b.harga_jual, u.user_nama FROM penjualan p JOIN barang b ON p.id_barang = b.id_barang JOIN user u ON p.user_id = u.user_id ORDER BY p.id_jual DESC LIMIT 10");

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

</div>
