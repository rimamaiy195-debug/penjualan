<!DOCTYPE html>
<html>
<head>
    <title>Invoice Penjualan</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
    <script type="text/javascript" src="../assets/js/jquery.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap.js"></script>
</head>
<body>
<?php
    session_start();
    if ($_SESSION['status'] != "login") {
        header("location:../index.php?pesan=belum_login");
    }

    include '../koneksi.php';
?>

<div class="container">
    <div class="col-md-10 col-md-offset-1">

    <?php
    $id = $_GET['id'];
    $penjualan = mysqli_query($koneksi,"SELECT p.*, b.nama_barang, b.harga_jual, u.user_nama FROM penjualan p JOIN barang b ON p.id_barang = b.id_barang JOIN user u ON p.user_id = u.user_id WHERE p.id_jual='$id'");
    while($p = mysqli_fetch_array($penjualan)){
    ?>

        <center>
            <h2>INVOICE PENJUALAN</h2>
        </center>

        <a href="penjualan_invoice_cetak.php?id=<?php echo $id; ?>" 
           target="_blank" 
           class="btn btn-primary pull-right">
           <i class="glyphicon glyphicon-print"></i> CETAK
        </a>

        <br><br>

        <table class="table">
            <tr>
                <th width="25%">No. Invoice</th>
                <th>:</th>
                <td>INVOICE-<?php echo $p['id_jual']; ?></td>
            </tr>
            <tr>
                <th>Tanggal Penjualan</th>
                <th>:</th>
                <td><?php echo $p['tgl_jual']; ?></td>
            </tr>
            <tr>
                <th>Nama Kasir</th>
                <th>:</th>
                <td><?php echo $p['user_nama']; ?></td>
            </tr>
        </table>

        <br>

        <h4 class="text-center">Detail Barang</h4>
        <table class="table table-bordered table-striped">
            <tr>
                <th>Nama Barang</th>
                <th>Harga Satuan</th>
                <th>Total Harga</th>
            </tr>
            <tr>
                <td><?php echo $p['nama_barang']; ?></td>
                <td>Rp <?php echo number_format($p['harga_jual']); ?></td>
                <td>Rp <?php echo number_format($p['total_harga']); ?></td>
            </tr>
        </table>

        <br>
        <p class="text-right">
            <b>Total Bayar :</b> 
            Rp <?php echo number_format($p['total_harga']); ?>
        </p>

        <br>
        <p class="text-center">
            <i>" Terima kasih atas pembelian Anda "</i>
        </p>

    <?php } ?>

    </div>
</div>

</body>
</html>
