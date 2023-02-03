<?php require_once "../../config.php"; ?>
<!--Start Breadcrumb-->
<div class="row">
	<div id="breadcrumb" class="col-xs-12">
		<a href="#" class="show-sidebar">
			<i class="fa fa-bars"></i>
		</a>
		<ol class="breadcrumb pull-left">
			<li><a href="index.php">Home</a></li>
			<li><a href="#">Dashboard</a></li>
		</ol>
	</div>
</div>
<!--End Breadcrumb-->
<!--Start Dashboard 1-->
<div id="dashboard-header" class="row">
	<div class="clearfix visible-xs"></div>
	<div class="col-xs-12 col-sm-8 col-md-7 pull-right">
		<div class="row">
			<div class="col-xs-4">
				<div class="sparkline-dashboard" id="sparkline-1"></div>
				<div class="sparkline-dashboard-info">
					<i class="fa fa-usd"></i><?php echo "$jmldosen"; ?>
					<span class="txt-primary">DOSEN</span>
				</div>
			</div>
			<div class="col-xs-4">
				<div class="sparkline-dashboard" id="sparkline-2"></div>
				<div class="sparkline-dashboard-info">
					<i class="fa fa-usd"></i><?php echo "$jmlmhs"; ?>
					<span class="txt-info">MAHASISWA</span>
				</div>
			</div>
			<div class="col-xs-4">
				<div class="sparkline-dashboard" id="sparkline-3"></div>
				<div class="sparkline-dashboard-info">
					<i class="fa fa-usd"></i><?php echo "$jmlkry"; ?>
					<span>KARYAWAN</span>
				</div>
			</div>
		</div>
	</div>
</div>
<!--End Dashboard 1-->
<!--Start Dashboard 2-->
<div class="row-fluid">
	
	<div id="dashboard_tabs" class="col-xs-12 col-sm-10">
		<!--Start Dashboard Tab 1-->
		<div id="dashboard-overview" class="row" style="visibility: visible; position: relative;">
			<div id="ow-marketplace" class="col-sm-12 col-md-12">
				<div id="ow-setting">
					<a href="#"><i class="fa fa-plus" data-toggle="modal" data-target="#tambahAnggota"></i></a>
				</div>
				<h4 class="page-header">Data Anggota</h4>
				<table id="ticker-table" class="table m-table table-bordered table-hover table-heading">
					<thead>
						<tr>
							<th>No</th>
							<th>Kode Registrasi</th>
							<th>Nama Lengkap</th>
							<th>Username</th>
							<th>Kategori</th>
							<th>Registrasi</th>
						</tr>
					</thead>
					<tbody>
						<?php
							
							$no=1;
							$query = mysqli_query($con, "SELECT * FROM users WHERE akses != 1 ORDER BY id_user DESC");
							while($row = mysqli_fetch_assoc($query)){
							echo "<tr>
							<td>$no</td>
							<td>$row[koreg]</td>
							<td >$row[nama]</td>
							<td >$row[username]</td>
							<td >";
								if($row['akses'] == 2){
									echo "Dosen";
								}elseif($row['akses'] == 3){
									echo "Mahasiswa";
								}elseif($row['akses'] == 4){
									echo "Karyawan";
								}
							echo "</td>
							<td >";

								if($row['reg']==1){
								echo "<span class='btn-success' style='padding: 3px 5px;'>Sudah</span>";
								}else{
								echo "<span class='btn-danger' style='padding: 3px 5px;'>Belum</span>";
								}
							echo " <span class='pull-right'><a href='#editAnggota' title='Ubah' data-toggle='modal' data-id=".$row['id_user']."><i class='fa fa-edit'></i></a> | <a href='?hapus=$row[id_user]' onclick='return confirm(\"Apa anda yakin akan menghapus data ini ?\");' title='Hapus'><i class='fa fa-times alert-danger'></i></a></span></td>
							</tr>";
							$no++;
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
		<!--End Dashboard Tab 1-->
	<div class="clearfix"></div>
</div>
<!--End Dashboard 2 -->
<div style="height: 40px;"></div>
<script type="text/javascript">
// Array for random data for Sparkline
var sparkline_arr_1 = SparklineTestData();
var sparkline_arr_2 = SparklineTestData();
var sparkline_arr_3 = SparklineTestData();
$(document).ready(function() {
	// Make all JS-activity for dashboard
	DashboardTabChecker();
	// Load Knob plugin and run callback for draw Knob charts for dashboard(tab-servers)
	LoadKnobScripts(DrawKnobDashboard);
	// Load Sparkline plugin and run callback for draw Sparkline charts for dashboard(top of dashboard + plot in tables)
	LoadSparkLineScript(DrawSparklineDashboard);
	// Load Morris plugin and run callback for draw Morris charts for dashboard
	LoadMorrisScripts(MorrisDashboard);
	// Load Springy plugin and run callback for draw network map for dashboard
	LoadSpringyScripts(SpringyNetmap);
	// Make beauty hover in table
	$("#ticker-table").beautyHover();
	// Run script for stock block
	CreateStockPage();
});
</script>


