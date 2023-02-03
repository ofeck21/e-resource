<?php 

require_once 'config.php'; 

require_once 'template/header.php';
require_once 'template/menu.php';
require_once 'template/headline.php';
?>

<div class="content">
	<div class="wrapper">
		<center>
		<h2>Cari Resource</h2>
		<form method="GET" action="">
			<input type="text" name="id" class="cari" placeholder="Cari Resource">
			<input type="submit" name="cari" class="btn-cari" value="Cari">
		</form>
		</center>
	</div>
</div>

<?php require_once 'template/footer.php'; ?>

