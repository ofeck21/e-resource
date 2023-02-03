<?php 
require_once '../config.php';
if (empty($_SESSION['eresource'])) {
	header('location:../login.php');
}else{
	if ($_SESSION['akses']!=1) {
		header('location:../user/');
	}
}

require_once '../template/header.php';
echo $_SESSION['akses']; 
?>
<br>

<a href="../logout.php">Keluar</a>