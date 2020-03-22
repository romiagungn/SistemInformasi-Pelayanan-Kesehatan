<?php 
	mysql_connect("localhost","root");
	mysql_select_db("db_klinik");
?>

<?php
if($_GET["aksi"] && $_GET["nmr"]){
include('../../fungsi/conn.php');
$print = mysql_query("select * from permintaan where id_permintaan='".$_GET["nmr"]."'");
$printDb = mysql_fetch_assoc($print);
}
?>

<html>
	<head>
		<title>Permintaan</title>
		<!-- Le styles -->
		<link href="../../assets/css/bootstrap.css" rel="stylesheet">
		<link href="../../css/lplpo.css" rel="stylesheet">
		</style>
		<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<!-- Le fav and touch icons -->
	</head>
	<body>

<?php
require_once ('../../fungsi/conn.php');
$pg = '';
/*
 * PHP Code untuk mendapatkan halaman view masing masing tabel
 */

if(!isset($_GET['pg'])) {

	include ('permintaan_cetak.php');

} else {
	$pg = $_GET['pg'];
	$mod = $_GET['mod'];
	include $mod . '/' . $pg . ".php";
}?>

	</body>
</html>