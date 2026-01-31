<!DOCTYPE html>
<html>
<head>
	<title>Sistem Penjualan</title>
	<link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>

<div class="d-flex justify-content-center align-items-center vh-100">
	<div class="col-md-4">

		<h2 class="text-center mb-4">Sistem Penjualan</h2>

		<?php
		if (isset($_GET['pesan'])) {
			if($_GET['pesan'] == "gagal") {
				echo "<div class='alert alert-danger'>Login Gagal! Username atau Password SALAH!</div>";
			}elseif ($_GET['pesan'] == "logout") {
				echo "<div class='alert alert-info'>Anda Telah Berhasil Logout</div>";
			}elseif ($_GET['pesan'] == "belum_login") {
				echo "<div class='alert alert-danger'>Anda harus login untuk mengakses halaman admin</div>";
			}
		}
		?>

		<form method="post" action="login.php">
			<div class="card p-4 shadow">
				<div class="mb-3">
					<label>Username</label>
					<input type="text" class="form-control" name="username">
				</div>
				<div class="mb-3">
					<label>Password</label>
					<input type="password" class="form-control" name="password">
				</div>
				<button class="btn btn-primary w-100">Log In</button>
			</div>
		</form>

	</div>
</div>

</body>
</html>
