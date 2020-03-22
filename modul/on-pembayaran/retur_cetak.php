<html>
	<head>
		<link href="../../assets/css/bootstrap.css" rel="stylesheet">
		<link href="../../assets/css/lplpo.css" rel="stylesheet">
		<style type="text/css">		body {
				padding-top: 20px;
				padding-bottom: 40px;
				font-size: 0.7em;
			}
</style>
	</head>
	<body>
		<table align="center">
		<tr>
		<td width="100"><img width="60" src="../../assets/img/a.png"></td>
        <td width="10"></td>
        <td><h5>Laporan Retur Obat<br>Klinik GreenCare Bandung<br> Jln.Cipamokolan no.22</h5></td>
			</tr></table>
			
<?php
	mysql_connect("localhost","root");
	mysql_select_db("db_klinik");
include('../../fungsi/fungsi_tanggal.php');
?>

<?php
if($_GET["aksi"] && $_GET["nmr"]){
include('../../fungsi/conn.php');
$print3 = mysql_query("select * from retur where id_retur='".$_GET["nmr"]."'");
$printDb3 = mysql_fetch_assoc($print3);
$print = mysql_query("select * from detail_retur where id_retur='".$_GET["nmr"]."'");
}
?>			

<?php 
	/* Koneksi database*/
	mysql_connect("localhost","root");
	mysql_select_db("db_klinik");
	include('../../fungsi/conn.php');
	include '../../fungsi/paging.php'; //include pagination file
	
	//pagination variables
	$hal = (isset($_REQUEST['hal']) && !empty($_REQUEST['hal']))?$_REQUEST['hal']:1;
	$per_hal = 10; //berapa banyak blok
	$adjacents  = 10;
	$offset = ($hal - 1) * $per_hal;
	$reload="?";
	//Cari berapa banyak jumlah data*/
	$count_query   = mysql_query("SELECT COUNT(id_retur) AS numrows, id_retur,id_obat,jumlah,jumlah_retur FROM detail_retur where id_retur='".$_GET["nmr"]."'");
	if($count_query === FALSE) {
    die(mysql_error()); 
	}
	$row     = mysql_fetch_array($count_query);
	$numrows = $row['numrows']; //dapatkan jumlah data
	
	$total_hals = ceil($numrows/$per_hal);

	
	//jalankan query menampilkan data per blok $offset dan $per_hal
	$query = mysql_query("Select id_retur,id_obat,jumlah,jumlah_retur FROM detail_retur where id_retur='".$_GET["nmr"]."'");

?>
<table class="tabel5" border="0" style='text-align: left' align="center">
				<tr>
					<td align="left" width="100">NO Retur</td>
					<td align="center" width="10">:</td>
					<td align="left" width="130"><?php echo $printDb3["id_retur"];?></td>
				</tr>
				<tr>
					<td align="left" width="100">Tanggal Retur</td>
					<td align="center" width="10">:</td>
					<td align="left" width="130"><?php echo $tanggal= jin_date_str($printDb3['tanggal']);?></td>
				</tr>
				<tr>
					<td align="left" width="100">Klinik</td>
					<td align="center" width="10">:</td>
					<td align="left" width="130">Green Care Bandung</td>
				</tr>
				<tr>
					<td align="left" width="100">Kecamatan</td>
					<td align="center" width="10">:</td>
					<td align="left" width="130">Rancasari</td>
				</tr>
			</table>
			<br>
			<table class="tabel5" width="500" border="1" align="center">
				<tr>
					<td align="center" width="100">ID OBAT</td>
					<td align="center" width="100">NAMA OBAT</td>
					<td align="center" width="100">JENIS OBAT</td>					
					<td align="center" width="150">JUMLAH PENERIMAAN</td>
					<td align="center" width="100">JUMLAH RETUR</td>
				</tr>

				<?php while ($hasil=mysql_fetch_array($print)){
				$id_retur=$hasil['id_retur'];
				$id_obat=$hasil['id_obat'];
				$query2=mysql_query("select * from t_obat where id_obat='$id_obat'");
				$tampil2=mysql_fetch_array($query2);
				$nama_obat=$tampil2['nama_obat'];
				$jumlah=$hasil['jumlah'];
				$satuan=$tampil2['jenis_obat'];
				$jumlah2=$hasil['jumlah_retur'];					
				  ?>

				
				<tr>
					<td align="center"><?php echo $id_obat ?></td>
    				<td align="center"><?php echo $nama_obat ?></td>
					<td align="center"><?php echo $satuan ?></td>
					<td align="center"><?php echo $jumlah ?></td>
					<td align="center"><?php echo $jumlah2 ?></td>
				</tr>
			<?php
}
			?>


				</table><br>
			<table class="tabel5" width="500" align="CENTER">
			<tr>
			<td> Kepala Puskesmas 
			<br>
			<br>
			<br>
			<br>
			Dr.Hj.Lia Rostiaty ,Mh.Kes</td>
			</table>
			
			<?php echo paginate($reload, $hal, $total_hals, $adjacents);?>
			<p align='center'>
		<a href="peermintaan_cetak.php" cls='btn' onClick="window.print();return false"> <i class='icon-print'></i>Cetak </a>
			</p>
		</div>
	</body>
</html>
