<?php 
require_once 'config.php';

if (!empty($_SESSION['digilib'])) {
	if ($_SESSION['digiAkses'] !== 1) {
		header('location:user/');
	}else if ($_SESSION['digiAkses'] == 1) {
		header('location:admin/');
	}
}

if (isset($_POST['daftar'])) {
	$noreg = $_POST['noreg'];
	$nama = $_POST['nama'];
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$pass = md5($_POST['pass']);

	$cek = mysqli_query($con, "SELECT * FROM users WHERE koreg='$noreg'");
	$row = mysqli_fetch_assoc($cek);

	if(empty($noreg) || empty($nama) || empty($username) || empty($password) || empty($pass)){
		$error	=	'Tidak boleh ada form kosong!';
	}elseif ($password !== $pass) {
		$error	=	'Password harus sama!';
	}elseif(mysqli_num_rows($cek)>0){
		if ($row['reg']==0) {
			$sql = "UPDATE users SET nama='$nama', username='$username', password='$password', reg=1 WHERE id_user=$row[id_user] ";
			if (mysqli_query($con, $sql)) {
					$_SESSION['digilib']=$username;
					$_SESSION['digiAkses']=$row['akses'];
					header('location:user/');
			}else{
				$error = 'Pendaftaran Gagal !';
			}
		}else{
			$error = 'Pendaftaran Gagal, Anda pernah mendaftar sebelumnya!';
		}
	}else{
		$error = 'Nomor Registrasi tidak ditemukan';
	}

}

require_once 'template/header.php';
require_once 'template/menu.php';
?>

	<div class="content">
		<div class="wrapper">
			<div class="register">
				<div class="header">
					<h3>Pendaftaran</h3>
				</div>
				<br>
				<div class="reg-content">
					Silahkan isi form di bawah ini untuk melakukan pendaftaran !
					<hr><br>
					<form method="POST" action="" name="daftar">
						<input type="text" name="noreg" placeholder="Nomor Registrasi" >
						<input type="text" name="nama" placeholder="Nama Lengkap" >
						<input type="text" name="username" placeholder="Username" >
						<input type="password" name="password" placeholder="Password" >
						<input type="password" name="pass" placeholder="Password yang Sama" >
						<input type="submit" name="daftar" value="DAFTAR">
					</form>
				</div>
			</div>
			<?php if (isset($_POST['daftar']) && ($error) ) {
					echo "<p class='warning'>";
					echo $error;
					echo "</p>";
				 } ?>
		</div>
	</div>

<?php require_once 'template/footer.php'; ?>