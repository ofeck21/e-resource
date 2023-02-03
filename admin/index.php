<?php	
require_once "../config.php";
if (empty($_SESSION['eresource'])){
	header('location:../login.php');
}else{
	if($_SESSION['akses']==2){
		header('location:../user/dosen');
	}elseif($_SESSION['akses']==3){
		header('location:../user/mahasiswa');
	}elseif($_SESSION['akses']==4){
		header('location:../user/karyawan');
	}
}

$u = $_SESSION['eresource'];

$q = mysqli_query ($con, "SELECT * FROM users WHERE username='$u'");
$user = mysqli_fetch_assoc($q);

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<link rel="icon" type="img/icon" href="<?php echo PATH; ?>/assets/img/logo.png">
		<title>E-Resource - Unviersitas Islam Madura</title>
		<meta name="description" content="description">
		<meta name="author" content="DevOOPS">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="plugins/bootstrap/bootstrap.css" rel="stylesheet">
		<link href="plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet">
		<link href="css/fontawesome-all.css" rel="stylesheet">
		<!-- <link href='http://fonts.googleapis.com/css?family=Righteous' rel='stylesheet' type='text/css'> -->
		<link href="plugins/fancybox/jquery.fancybox.css" rel="stylesheet">
		<link href="plugins/fullcalendar/fullcalendar.css" rel="stylesheet">
		<link href="plugins/xcharts/xcharts.min.css" rel="stylesheet">
		<link href="plugins/select2/select2.css" rel="stylesheet">
		<link href="plugins/justified-gallery/justifiedGallery.css" rel="stylesheet">
		<link href="css/style_v1.css" rel="stylesheet">
		<link href="plugins/chartist/chartist.min.css" rel="stylesheet">
		
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
				<script src="http://getbootstrap.com/docs-assets/js/html5shiv.js"></script>
				<script src="http://getbootstrap.com/docs-assets/js/respond.min.js"></script>
		<![endif]-->
	</head>
<body>
<!--Start Header-->
<div id="screensaver">
	<canvas id="canvas"></canvas>
	<i class="fa fa-lock" id="screen_unlock"></i>
</div>
<div id="modalbox">
	<div class="devoops-modal">
		<div class="devoops-modal-header">
			<div class="modal-header-name">
				<span>Basic table</span>
			</div>
			<div class="box-icons">
				<a class="close-link">
					<i class="fa fa-times"></i>
				</a>
			</div>
		</div>
		<div class="devoops-modal-inner">
		</div>
		<div class="devoops-modal-bottom">
		</div>
	</div>
</div>
<header class="navbar">
	<div class="container-fluid expanded-panel">
		<div class="row">
			<div id="logo" class="col-xs-12 col-sm-2">
				<a href="<?php echo PATH; ?>/admin/">E-Resource</a>
			</div>
			<div id="top-panel" class="col-xs-12 col-sm-10">
				<div class="row">
					<div class="col-xs-8 col-sm-4">
				
					</div>
					<div class="col-xs-4 col-sm-8 top-panel-right">
						<ul class="nav navbar-nav pull-right panel-menu">
							<li class="dropdown">
								<a href="#" class="dropdown-toggle account" data-toggle="dropdown">
									<div class="avatar">
										<img src="../assets/img/logo.png" class="img-circle" alt="avatar" />
									</div>
									<i class="fa fa-angle-down pull-right"></i>
									<div class="user-mini pull-right">
										<span class="welcome"><?php echo $user['username']; ?></span>
										<span><?php echo $user['nama']; ?></span>
									</div>
								</a>
								<ul class="dropdown-menu">
									<li>
										<a class="ajax-link" href="page/profile.php">
											<i class="fa fa-user"></i>
											<span>Profile</span>
										</a>
									</li>
									<li>
										<a href="#">
											<i class="fa fa-cog"></i>
											<span>Settings</span>
										</a>
									</li>
									<li>
										<a href="../logout.php">
											<i class="fa fa-power-off"></i>
											<span>Logout</span>
										</a>
									</li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>
<!--End Header-->
<!--Start Container-->
<div id="main" class="container-fluid">
	<div class="row">
		<div id="sidebar-left" class="col-xs-2 col-sm-2">
			<ul class="nav main-menu">
				<li>
					<a href="page/dashboard.php" class="ajax-link">
						<i class="fa fa-home"></i>
						<span class="hidden-xs">Dashboard</span>
					</a>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle">
						<i class="fa fa-table"></i>
						 <span class="hidden-xs">Resource</span>
					</a>
					<ul class="dropdown-menu">
						<li><a class="ajax-link" href="page/dosen.php">Dosen</a></li>
						<li><a class="ajax-link" href="page/mahasiswa.php">Mahasiswa</a></li>
						<li><a class="ajax-link" href="page/karyawan.php">Karyawan</a></li>
					</ul>
				</li>
			</ul>
		</div>
		<!--Start Content-->
		<div id="content" class="col-xs-12 col-sm-10">
			<div class="preloader">
				<img src="img/devoops_getdata.gif" class="devoops-getdata" alt="preloader"/>
			</div>
			<div id="ajax-content"></div>
		</div>
		<!--End Content-->
		<div class="footer" style="">
			<small>E-Resource <br /> Universitas Islam Madura <br />Copyright &copy; 2018 </small>
		</div>
	</div>
</div>
<!--End Container-->

<!-- footer -->
<div class="footer" style="color:#fff; float: right; margin-right: 50px;">
	<small>Copyright &copy; 2018 - E-Resource - Universitas Islam Madura</small>
</div>

<!-- Modal tambah anggota-->
<div class="modal fade" id="tambahAnggota" role="dialog">
<div class="modal-dialog">

  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Tambah Anggota</h4>
    </div>
    <div class="modal-body">
      <form method="POST" action="">
      	<input type="text" name="koreg" placeholder="Kode Registrasi" class="form-control" required>
      	<br>
      	<input type="text" name="nama" placeholder="Nama Lengkap" class="form-control" required>
      	<br>
      	<select class="form-control" name="kategori" required>
      		<option value="">-- Pilih Kategori --</option>
      		<option value="2">Dosen</option>
      		<option value="3">Mahasiswa</option>
      		<option value="4">Karyawan</option>
      	</select>
    </div>
    <div class="modal-footer">
    	<input type="submit" name="simpan" value="TAMBAH" class="btn btn-success">
      </form>
    </div>
  </div>
  
</div>
</div>
<!-- end modal tambah anggota -->

<!-- Modal edit anggota-->
<div class="modal fade" id="editAnggota" role="dialog">
<div class="modal-dialog">

  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Edit Anggota</h4>
    </div>
    <div class="modal-body">
     	<div class="hasil-data"></div>
    </div>
    <div class="modal-footer">
    	<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
      </form>
    </div>
  </div>
  
</div>
</div>
<!-- end modal edit anggota -->

<!-- Modal edit dosen-->
<div class="modal fade" id="edit_dosen" role="dialog">
<div class="modal-dialog">

  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Edit Data Dosen</h4>
    </div>
    <div class="modal-body">
     	<div class="hasil-data"></div>
    </div>
    <div class="modal-footer">
    	<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
      </form>
    </div>
  </div>
  
</div>
</div>
<!-- end modal edit dosen -->

<!-- Modal edit mahasiswa-->
<div class="modal fade" id="edit_mahasiswa" role="dialog">
<div class="modal-dialog">

  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Edit Data Mahasiswa</h4>
    </div>
    <div class="modal-body">
     	<div class="hasil-data"></div>
    </div>
    <div class="modal-footer">
    	<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
      </form>
    </div>
  </div>
  
</div>
</div>
<!-- end modal edit mahasiswa -->

<!-- Modal edit karyawan-->
<div class="modal fade" id="edit_karyawan" role="dialog">
<div class="modal-dialog">

  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Edit Data Karyawan</h4>
    </div>
    <div class="modal-body">
     	<div class="hasil-data"></div>
    </div>
    <div class="modal-footer">
    	<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
      </form>
    </div>
  </div>
  
</div>
</div>
<!-- end modal edit karyawan -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!--<script src="http://code.jquery.com/jquery.js"></script>-->
<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="plugins/bootstrap/bootstrap.min.js"></script>
<script src="plugins/justified-gallery/jquery.justifiedGallery.min.js"></script>
<script src="plugins/tinymce/tinymce.min.js"></script>
<script src="plugins/tinymce/jquery.tinymce.min.js"></script>
<!-- All functions for this theme + document.ready processing -->
<script src="js/devoops.js"></script>

 <script type="text/javascript">
    $(document).ready(function(){
        $('#editAnggota').on('show.bs.modal', function (e) {
            var idx = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 'editing.php',
                data :  'idx='+ idx,
                success : function(data){
                $('.hasil-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });

     $(document).ready(function(){
        $('#edit_dosen').on('show.bs.modal', function (e) {
            var dosen = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 'editing.php',
                data :  'dosen='+ dosen,
                success : function(data){
                $('.hasil-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });

      $(document).ready(function(){
        $('#edit_mahasiswa').on('show.bs.modal', function (e) {
            var mahasiswa = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 'editing.php',
                data :  'mahasiswa='+ mahasiswa,
                success : function(data){
                $('.hasil-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });

      $(document).ready(function(){
        $('#edit_karyawan').on('show.bs.modal', function (e) {
            var karyawan = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 'editing.php',
                data :  'karyawan='+ karyawan,
                success : function(data){
                $('.hasil-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });
  </script>

</body>
</html>


<?php 
if (isset($_POST['simpan'])){
	$koreg 	= $_POST['koreg'];
	$nama 	= $_POST['nama'];
	$kateg 	= $_POST['kategori'];

	$query = "SELECT * FROM users WHERE koreg='$koreg'";
	$result = mysqli_query ($con, $query);
	$r = mysqli_num_rows($result);
	if ($r>0){
		echo "<script type=\"text/javascript\">alert('Kode Registrasi Sudah Digunakan.');</script>>";
	}else{

		$q =  "INSERT INTO users (koreg, nama, akses) VALUES ('$koreg', '$nama', $kateg)";

		if (mysqli_query ($con,$q)){
			echo "<script type=\"text/javascript\">alert('Data Berhasil Ditambahkan.');</script>>";
		}else{
			echo "<script type=\"text/javascript\">alert('Data Gagal	 Ditambahkan.');</script>>";
		}
	}

}

if (isset($_POST['update'])){
	$id 		= $_POST['id'];
	$koreg 		= $_POST['koreg'];
	$nama 		= $_POST['nama'];
	$username 	= $_POST['username'];
	$kateg 		= $_POST['kategori'];

	$query = "UPDATE users SET koreg='$koreg', nama='$nama', username='$username', akses='$kateg' WHERE id_user=$id ";

	if (mysqli_query ($con, $query)){
		echo "<script type=\"text/javascript\">alert('Data Berhasil Diubah.');</script>>";
	}else{
		echo "<script type=\"text/javascript\">alert('Data Gagal Diubah.');</script>>";
	}

}elseif (isset($_POST['update_dosen'])) {
	$id 		= $_POST['id'];
	$id_user 	= $_POST['id_user'];
	$nidn		= $_POST['nidn'];
	$nama 		= $_POST['nama'];
	$ttl 		= $_POST['ttl'];
	$alamat 	= $_POST['alamat'];
	$jabatan 	= $_POST['jabatan'];
	$status 	= $_POST['status'];

	$update_dosen = mysqli_query($con, "UPDATE dosen SET nidn='$nidn', ttl='$ttl', alamat='$alamat', jabatan='$jabatan', status='$status' WHERE id_dosen='$id' ");

	$edit_nama = mysqli_query($con, "UPDATE users SET nama='$nama' WHERE id_user='$id_user' ");

	if ($update_dosen AND $edit_nama) {
		echo "<script type=\"text/javascript\">alert('Data Dosen Berhasil Diubah.');</script>>";
	}else{
		echo "<script type=\"text/javascript\">alert('Data Dosen Gagal Diubah.');</script>>";
	}
}elseif (isset($_POST['update_mahasiswa'])) {
	$id 		= $_POST['id'];
	$id_user 	= $_POST['id_user'];
	$npm		= $_POST['npm'];
	$nama 		= $_POST['nama'];
	$ttl 		= $_POST['ttl'];
	$alamat 	= $_POST['alamat'];
	$fakultas 	= $_POST['fakultas'];
	$prodi	 	= $_POST['prodi'];
	$angkatan 	= $_POST['angkatan'];

	$update_mahasiswa = mysqli_query($con, "UPDATE mahasiswa SET npm='$npm', ttl='$ttl', alamat='$alamat', fakultas='$fakultas', prodi='$prodi', angkatan='$angkatan' WHERE id_mahasiswa='$id' ");

	$edit_nama = mysqli_query($con, "UPDATE users SET nama='$nama' WHERE id_user='$id_user' ");

	if ($update_mahasiswa AND $edit_nama) {
		echo "<script type=\"text/javascript\">alert('Data Mahasiswa Berhasil Diubah.');</script>>";
	}else{
		echo "<script type=\"text/javascript\">alert('Data Mahasiswa Gagal Diubah.');</script>>";
	}
}elseif (isset($_POST['update_karyawan'])) {
	$id 		= $_POST['id'];
	$id_user 	= $_POST['id_user'];
	$nama 		= $_POST['nama'];
	$ttl 		= $_POST['ttl'];
	$alamat 	= $_POST['alamat'];
	$jabatan 	= $_POST['jabatan'];

	$update_karyawan = mysqli_query($con, "UPDATE karyawan SET ttl='$ttl', alamat='$alamat', jabatan='$jabatan' WHERE id_karyawan='$id' ");

	$edit_nama = mysqli_query($con, "UPDATE users SET nama='$nama' WHERE id_user='$id_user' ");

	if ($update_karyawan AND $edit_nama) {
		echo "<script type=\"text/javascript\">alert('Data Karyawan Berhasil Diubah.');</script>>";
	}else{
		echo "<script type=\"text/javascript\">alert('Data Karyawan Gagal Diubah.');</script>>";
	}
}

require_once "hapus.php";
	
?>