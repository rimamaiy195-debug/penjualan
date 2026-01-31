<?php
    include 'header.php';
    include '../koneksi.php'; 
?>

<div class="container">
    <br/>
    <br/>
    <br/>
    <div class="col-md-5 col-md-offset-3">
        <div class="panel">
            <div class="panel-heading">
                <h4>Tambah User Baru</h4>
            </div>
            <div class="panel-body">

                <form method="post" action="user_aksi.php">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="user_nama" placeholder="Masukkan nama ..">
                    </div>

                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Masukkan username ..">
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Masukkan password ..">
                    </div>

                    <div class="form-group alert alert-info">
                        <label>Status</label>
                        <select name="user_status">
                            <option value="1">Admin</option>
                            <option value="2">Kasir</option>
                        </select>
                    </div>

                    <br/>
                    <input type="submit" class="btn btn-primary" value="Simpan">
                </form>


            </div>
        </div>
    </div>
    
</div>