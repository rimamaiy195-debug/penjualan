<?php

include '../koneksi.php';

$username = $_POST['username'];
$password = md5($_POST['password']);
$nama = $_POST['user_nama'];
$status = $_POST['user_status'];

mysqli_query($koneksi, "insert into user values ('','$username', '$password', '$nama', '$status')");

echo "<script>alert('User berhasil ditambahkan'); window.location.href='user.php'</script>";
?>