
<?php 
require_once '../config.php';
if (empty($_SESSION['digilib'])) {
	header('location:../login.php');
}else{
	if ($_SESSION['digiAkses']==1) {
		header('location:../admin/');
	}
}

require_once '../template/header.php';
require_once '../template/menu.php';

$akses = mysqli_query($con, "SELECT * FROM akses WHERE id_akses = '$_SESSION[digiAkses]' ");
$row = mysqli_fetch_array($akses);

?>
<p align="center">silahkan login kembali dengan username : <b><?php echo $_SESSION['digilib']; ?></b><br>
sebagai <b><?php echo $row['jenis']; ?></b></p>
<a href="../logout.php">Keluar</a>
