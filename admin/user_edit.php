<?php
    include 'header.php';
?>

<?php
    include '../koneksi.php';
?>

<div class="container">
    <div class="panel">
        <div class="panel-heading">
            <h4>Edit User</h4>
        </div>
        <div class="panel-body">
            


            <div class="col-md-9 col-md-offset-1">
                <a href="user.php" class="btn btn-sm btn-info pull-right">Kembali</a>
                <br>
                <br>
                <?php
                $id = $_GET['id'];

                $user = mysqli_query($koneksi,"select * from user where user_id='$id'");
                while ($d=mysqli_fetch_array($user)) {
                ?>
                <form method="post" action="user_update.php">
                    <input type="hidden" name="user_id" value="<?php echo $d['user_id']; ?>">

                    <div class="form-group">
                        <label>User</label>
                        <input type="text" class="form-control" name="user_nama" placeholder="Masukkan nama user .." required="required" value="<?php echo $d['user_nama']; ?>">
                    </div>

                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Masukkan username .." required="required" value="<?php echo $d['username']; ?>">
                    </div>

                    <br>

                    <div class="form-group alert alert-info">
                        <label>Status</label>
                        <select class="form-control" name="user_status" required="required">
                            <option <?php if($d['user_status']=="1"){echo "selected='selected'";} ?> value="1">Admin</option>
                            <option <?php if($d['user_status']=="2"){echo "selected='selected'";} ?> value="2">Kasir</option>
                        </select>
                    </div>

                    <input type="submit" class="btn btn-primary" value="Simpan">
                </form>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>