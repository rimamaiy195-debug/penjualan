<?php
	include '../koneksi.php';
	$id =$_POST['user_id'];
	$username 	=$_POST['username'];
	$nama	=$_POST['user_nama'];
	$status = $_POST['user_status'];

	mysqli_query($koneksi, "update user set username='$username', user_nama='$nama', user_status='$status' where user_id='$id'");

	echo "<script>alert('User Sudah Diubah'); window.location.href='user.php'</script>";

?>