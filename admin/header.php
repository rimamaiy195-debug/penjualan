<!DOCTYPE html>
<html>
<head>
	<title>Sistem Penjualan</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
	<script type="text/javascript" src="../assets/js/jquery.js"></script>
	<script type="text/javascript" src="../assets/js/bootstrap.js"></script>
</head>
<body style="background: #1a002b;">
	<?php
		session_start();

		if($_SESSION['user_status'] != "1"){
 		   header("location:../login.php");
 		   exit();
		}

	?>


	<nav class="navbar navbar-inverse" style="border-radius: 0px;">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="index.php">Sistem Penjualan</a>
			</div>
			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
					<li class="active"><a href="index.php"><i class="glyphicon glyphicon-home">Home</i></a></li>
					<li><a href="user.php"><i class="glyphicon glyphicon-user">User</i></a></li>
					<li><a href="penjualan.php"><i class="glyphicon glyphicon-shopping-cart">Penjualan</i></a></li>
					<li><a href="barang.php"><i class="glyphicon glyphicon-th-large">Barang</i></a></li>
					<li><a href="logout.php"><i class="glyphicon glyphicon-log-out">Log Out</i></a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right"><li><p class="navbar-text">Halo, <b><?php echo $_SESSION['username'];?></b>!</p></li>
				</ul>
			</div>
		</div>
	</nav>
</body>
</html>