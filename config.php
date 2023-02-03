<?php 
//error_reporting(0);
session_start();

define('PATH', 'http://localhost/ta/e-resource');
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DBNAME', 'e-resource');

$con = mysqli_connect( HOST, USER, PASS, DBNAME ) or die('Gagal Memuat Database : '.mysqli_connect_error());

$dosen = mysqli_query($con, "SELECT * FROM users WHERE akses = 2");
$jmldosen = mysqli_num_rows($dosen);

$mhs = mysqli_query($con, "SELECT * FROM users WHERE akses = 3");
$jmlmhs = mysqli_num_rows($mhs);

$kry = mysqli_query($con, "SELECT * FROM users WHERE akses = 4");
$jmlkry = mysqli_num_rows($kry);
?>