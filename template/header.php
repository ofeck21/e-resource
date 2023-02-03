<!DOCTYPE html>
<html>
<head>
	<title>E-Resource - Universitas Islam Madura</title>
	<link rel="icon" type="img/icon" href="<?php echo PATH; ?>/assets/img/logo.png">
	<link rel="stylesheet" type="text/css" href="<?php echo PATH; ?>/assets/css/style.css">
	<script>
	function validasi_daftar() {
	    var password = document.forms["daftar"]["password"].value;
	    var pass = document.forms["daftar"]["pass"].value;
	    if (password != pass) {
	        alert("Password Harus Sama");
	        return false;
	    }
	}
	</script>
</head>
<body>
	<div class="line">
		<div class="wrapper">
			<div class="masuk">
				<a href="login.php">Login Anggota</a>
			</div>
		</div>
	</div>
	<div class="header">
		<div class="wrapper">
			<a href="<?php echo(PATH); ?>"><h1>E-Resource - Universitas Islam Madura</h1></a>
		</div>
	</div>