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
	
	$count_query   = mysql_query("SELECT COUNT(id_penerimaan) AS numrows, id_penerimaan, tanggal FROM penerimaan");
	if($count_query === FALSE) {
    die(mysql_error()); 
	}
	$row     = mysql_fetch_array($count_query);
	$numrows = $row['numrows']; //dapatkan jumlah data
	
	$total_hals = ceil($numrows/$per_hal);

	
	//jalankan query menampilkan data per blok $offset dan $per_hal
	$query = mysql_query("Select id_penerimaan, tanggal FROM penerimaan GROUP BY id_penerimaan LIMIT $offset,$per_hal");
?>
<table  class="table table-bordered" width="100%" border="0" cellspacing="0" cellpadding="0" class="responsive table table-striped table-bordered">
<thead bgcolor="white">
  <tr>
    <td><center>No Penerimaan</center></td> 
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
	<td><?php echo $result['id_penerimaan']; ?></td>
    <td><?php echo $tanggal; ?></td>
	<td>
	<center>
		<div class='btn-group'>
			<a href="detail_penerimaan.php?aksi=lihat&nmr=<?php echo $result['id_penerimaan']; ?>" class="btn btn-xs btn-info" title='lihat detail penerimaan'> <i class="glyphicon glyphicon-file"></i> </a>
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