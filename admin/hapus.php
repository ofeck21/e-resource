<?php
if (isset($_GET['hapus'])) {
	$id = $_GET['hapus'];
	$hapus = mysqli_query($con, "DELETE FROM users WHERE id_user='$id'");
	if ($hapus) {
		echo "<script>
		alert('Data berhasil di hapus !');
		location=(href='?dashboard');
		</script>";
	}else{
		echo "<script>
		alert('Data gagal di hapus !');
		location=(href='?dashboard');
		</script>";
	}
}
elseif (isset($_GET['hapus_dosen'])) {
	$id = $_GET['hapus_dosen'];
	$hapus_dosen = mysqli_query($con, "DELETE FROM dosen WHERE id_dosen='$id'");
	if($hapus_dosen){
		echo "<script>
		alert('Data berhasil di hapus !');
		location=(href='#page/dosen.php');
		</script>";
	}else{
		echo "<script>
		alert('Data gagal di hapus !');
		location=(href='#page/dosen.php');
		</script>";
	}
}
elseif (isset($_GET['hapus_mahasiswa'])) {
	$id = $_GET['hapus_mahasiswa'];
	$hapus_mahasiswa = mysqli_query($con, "DELETE FROM mahasiswa WHERE id_mahasiswa='$id'");
	if($hapus_mahasiswa){
		echo "<script>
		alert('Data berhasil di hapus !');
		location=(href='#page/mahasiswa.php');
		</script>";
	}else{
		echo "<script>
		alert('Data gagal di hapus !');
		location=(href='#page/mahasiswa.php');
		</script>";
	}
}elseif (isset($_GET['hapus_karyawan'])) {
	$id = $_GET['hapus_karyawan'];
	$hapus_karyawan = mysqli_query($con, "DELETE FROM karyawan WHERE id_karyawan='$id'");
	if($hapus_karyawan){
		echo "<script>
		alert('Data berhasil di hapus !');
		location=(href='#page/karyawan.php');
		</script>";
	}else{
		echo "<script>
		alert('Data gagal di hapus !');
		location=(href='#page/karyawan.php');
		</script>";
	}
}
?>