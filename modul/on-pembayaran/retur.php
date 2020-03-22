<?php 
	/* Koneksi database*/
	  mysql_connect("localhost","root");
	mysql_select_db("db_klinik");
	include('../../fungsi/conn.php');
	include '../../fungsi/paging.php'; //include pagination file
	
	//pagination variables
	$hal = (isset($_REQUEST['hal']) && !empty($_REQUEST['hal']))?$_REQUEST['hal']:1;
	$per_hal = 20; //berapa banyak blok
	$adjacents  = 20;
	$offset = ($hal - 1) * $per_hal;
	$reload="?";
	//Cari berapa banyak jumlah data*/
	
	$count_query   = mysql_query("SELECT COUNT(id_retur) AS numrows, id_retur, tanggal FROM retur");
	if($count_query === FALSE) {
    die(mysql_error()); 
	}
	$row     = mysql_fetch_array($count_query);
	$numrows = $row['numrows']; //dapatkan jumlah data
	
	$total_hals = ceil($numrows/$per_hal);

	
	//jalankan query menampilkan data per blok $offset dan $per_hal
	$query = mysql_query("Select id_retur, tanggal FROM retur GROUP BY id_retur LIMIT $offset,$per_hal");
?>
<table width="100%" border="1" cellspacing="0" cellpadding="0" class="responsive table table-striped table-bordered">
<thead bgcolor="white">
  <tr>
    <td><center>No Retur</center></td> 
	<td><center>Tanggal</center></td> 
	<td><center>Aksi</center></td> 
    </tr>
  </thead>
  
<?php
include '../../fungsi/fungsi_tanggal.php';
while($result = mysql_fetch_array($query)){
$tanggal= jin_date_str($result['tanggal']);
?>
<tr >
	<td><center><?php echo $result['id_retur']; ?></center></td>
    <td><center><?php echo $tanggal; ?></center></td>
	<td>
	<center>
		<div class='btn-group'>
			<a href="detail_retur.php?aksi=edit&nmr=<?php echo $result['id_retur']; ?>" class="btn btn-xs btn-info" title='lihat detail retur'><i class="glyphicon glyphicon-file"></i></a>
			<a href="print_retur.php?aksi=print&nmr=<?php echo $result['id_retur']; ?>" target="_blank" class="btn btn-xs btn-info" title='Print Permintaan ini'> <i class="glyphicon glyphicon-print"></i> </a>
		</div>
		</center>
	</td>
 </tr>
<?php
}
?>
</table>
<?php
echo paginate($reload, $hal, $total_hals, $adjacents);
?>

<?php
error_reporting(0);
if($_GET){
	if($_GET["aksi"] && $_GET["nmr"]){
		$del = "DELETE FROM retur WHERE id_retur='".$_GET["nmr"]."'";
		$del2 = "DELETE FROM detail_retur WHERE id_retur='".$_GET["nmr"]."'";
		$delDb = mysql_query($del,$conn) or die("Error hapus data ".mysql_error());
		$delDb2 = mysql_query($del2,$conn) or die("Error hapus data ".mysql_error());
		if($delDb && $delDb2){
			echo "<meta http-equiv='refresh' content='0; url=?'>";
		}
	}
}
?>

