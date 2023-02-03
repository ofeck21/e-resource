<?php  

require_once 'config.php';

if (!empty($_SESSION['eresource'])) {
	if ($_SESSION['akses'] == 1) {
		header('location:admin/');
	}else if ($_SESSION['akses'] == 2) {
		header('location:user/dosen/');
	}else if ($_SESSION['akses'] == 3) {
		header('location:user/mahasiswa/');
	}else if ($_SESSION['akses'] == 4) {
		header('location:user/karyawan/');
	}
}
$error = array();

if (isset($_POST['login'])) {

	$username = $_POST['username'];
	$password = md5($_POST['password']);

	if (empty($username) OR empty($password)) {
		$error = 'Username atau Password tidak boleh kosong.';
	}else {
		//select users
		$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
		$result = mysqli_query ($con, $query);
		$row = mysqli_fetch_assoc($result);

		if (mysqli_num_rows($result) > 0) {
			if ($row['akses']==1) {
				$_SESSION['eresource']=$row['username'];
				$_SESSION['akses']=$row['akses'];
				header('location:admin/');
			}elseif ($row['akses']==2) {
				$_SESSION['eresource']=$row['username'];
				$_SESSION['akses']=$row['akses'];
				header('location:user/dosen/');
			}elseif ($row['akses']==3) {
				$_SESSION['eresource']=$row['username'];
				$_SESSION['akses']=$row['akses'];
				header('location:user/mahasiswa/');
			}elseif ($row['akses']==4) {
				$_SESSION['eresource']=$row['username'];
				$_SESSION['akses']=$row['akses'];
				header('location:user/karyawan');
			}else{
				die('<h1>Akses ditolak.');
			}
		}else{
			$error = 'Login Gagal';
		}
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Login - Digital Library - Universitas Islam Madura</title>
	<link rel="icon" type="img/icon" href="assets/img/logo.png">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
	<div class="header">
		<div class="wrapper">
			<a href="<?php echo(PATH); ?>"><h1>E-Resource - Universitas Islam Madura</h1></a>
		</div>
	</div>
	<div class="content">
		<div class="login">
			<div class="login-header">
				<img src="assets/img/logo.png" width="90" class="logo">
				<h2>Login Area</h2>
			</div>
				<?php if (isset($_POST['login']) && !empty($error) ) {
					echo "<p class='warning wrapper'>";
					echo $error;
					echo "</p>";
				 } ?>
			<div class="login-content">
				<form method="POST" action="">
					<input type="text" name="username" placeholder="USERNAME" >
					<input type="password" name="password" placeholder="PASSWORD" >
					<input type="submit" name="login" value="LOGIN">
				</form>
			</div>
			<div class="login-footer">
				<a href="?lupa">Lupa Password ?</a><br>
				Belum Memiliki akun ? <a href="register.php">Daftar</a>
			</div>
		</div>
	</div>
	<div class="footer-login">
		<div class="container">
			 <small>Copyright &copy; 2018 - E-Resource - Universitas Islam Madura</small>
		</div>
	</div>
</body>
</html>