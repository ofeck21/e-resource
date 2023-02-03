<?php require_once "../../config.php"; ?>
<div class="row">
	<div id="breadcrumb" class="col-xs-12">
		<a href="#" class="show-sidebar">
			<i class="fa fa-bars"></i>
		</a>
		<ol class="breadcrumb pull-left">
			<li><a href="#">Resource</a></li>
			<li><a href="#">Mahasiswa</a></li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<i class="fa fa-usd"></i>
					<span>Data Mahasiswa</span>
				</div>
				<div class="box-icons">
					<a class="collapse-link">
						<i class="fa fa-chevron-up"></i>
					</a>
					<a class="expand-link">
						<i class="fa fa-expand"></i>
					</a>
					<a class="close-link">
						<i class="fa fa-times"></i>
					</a>
				</div>
				<div class="no-move"></div>
			</div>
			<div class="box-content no-padding">
				<table class="table table-bordered table-striped table-hover table-heading table-datatable" id="datatable-1">
					<thead>
						<tr>
							<th>No</th>
							<th>NPM</th>
							<th>Nama</th>
							<th>Tetala</th>
							<th>Alamat</th>
							<th>Fakultas</th>
							<th>Prodi</th>
							<th>Angkatan</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
					<?php
						$no=1;
						$tampil=mysqli_query($con, "SELECT * FROM mahasiswa ORDER BY id_mahasiswa DESC");
						while($row=mysqli_fetch_array($tampil))
						{
							$nama=$row['id_user'];
							$pilih=mysqli_query($con, "SELECT * FROM users WHERE id_user='$nama' ");
							$row_pilih=mysqli_fetch_array($pilih);

							$fakultas=$row['fakultas'];
							$pilih_fak=mysqli_query($con, "SELECT * FROM fakultas WHERE id_fakultas='$fakultas' ");
							$row_fak=mysqli_fetch_array($pilih_fak);

							$prodi=$row['prodi'];
							$pilih_prodi=mysqli_query($con, "SELECT * FROM prodi WHERE id_prodi='$prodi' ");
							$row_prodi=mysqli_fetch_array($pilih_prodi);

							echo "<tr>
									<td>$no</td>
									<td>$row[npm]</td>
									<td>$row_pilih[nama]</td>
									<td>$row[ttl]</td>
									<td>$row[alamat]</td>
									<td>$row_fak[fakultas]</td>
									<td>$row_prodi[prodi]</td>
									<td>$row[angkatan]</td>
									<td>
										<span class='pull-right'><a href='#edit_mahasiswa' title='Ubah' data-toggle='modal' data-id=".$row['id_mahasiswa']."><i class='fa fa-edit'></i></a> <a href='?hapus_mahasiswa=$row[id_mahasiswa]' onclick='return confirm(\"Apa anda yakin akan menghapus data ini ?\");' title='Hapus'><i class='fa fa-times alert-danger'></i></a>
										</span>
									</td>
								</tr>";
							$no++;
						}
					?>
					<tfoot>
						<tr>
							<th>No</th>
							<th>NPM</th>
							<th>Nama</th>
							<th>Tetala</th>
							<th>Alamat</th>
							<th>Fakultas</th>
							<th>Prodi</th>
							<th>Angkatan</th>
							<th></th>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
// Run Datables plugin and create 3 variants of settings
function AllTables(){
	TestTable1();
	TestTable2();
	TestTable3();
	LoadSelect2Script(MakeSelect2);
}
function MakeSelect2(){
	$('select').select2();
	$('.dataTables_filter').each(function(){
		$(this).find('label input[type=text]').attr('placeholder', 'Search');
	});
}
$(document).ready(function() {
	// Load Datatables and run plugin on tables 
	LoadDataTablesScripts(AllTables);
	// Add Drag-n-Drop feature
	WinMove();
});
</script>