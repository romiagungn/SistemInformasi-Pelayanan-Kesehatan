<?php 
	/* Koneksi database*/
	  mysql_connect("localhost","root");
  mysql_select_db("db_klinik");
	include('../../fungsi/conn.php');
	include '../../fungsi/paging.php'; //include pagination file
	include '../../fungsi/fungsi_tanggal.php';
	//pagination variables
	$hal = (isset($_REQUEST['hal']) && !empty($_REQUEST['hal']))?$_REQUEST['hal']:1;
	$per_hal = 20; //berapa banyak blok
	$adjacents  = 20;
	$offset = ($hal - 1) * $per_hal;
	$reload="?";
	//Cari berapa banyak jumlah data*/
	
	$count_query   = mysql_query("SELECT COUNT(id_permintaan) AS numrows, id_permintaan,tanggal FROM permintaan");
	if($count_query === FALSE) {
    die(mysql_error()); 
	}
	$row     = mysql_fetch_array($count_query);
	$numrows = $row['numrows']; //dapatkan jumlah data
	
	$total_hals = ceil($numrows/$per_hal);

	
	//jalankan query menampilkan data per blok $offset dan $per_hal
	$query = mysql_query("Select permintaan.id_permintaan,permintaan.tanggal,permintaan.persetujuan,detail_permintaan.status 
							FROM permintaan ,detail_permintaan where permintaan.id_permintaan=detail_permintaan.id_permintaan  
							GROUP BY id_permintaan LIMIT $offset,$per_hal");

?>
<table  class="table table-bordered" width="100%" border="0" cellspacing="0" cellpadding="0" class="responsive table table-striped table-bordered">
<thead bgcolor="white">
 
  <tr>
	<td><center>No Permintaan</center></td>  
	<td><center>Tanggal</center></td>
	<td><center>Status</center></td>
	<td><center>persetujuan</center></td>
	<td><center>Aksi</center></td> 
    </tr>
  </thead>
  
<?php
while($result = mysql_fetch_array($query)){
	
$tanggal= jin_date_str($result['tanggal']);
$ijin=$result['persetujuan'];
$status=$result['status'];
$persetujuan='null';
$stat='null';
if($ijin==1){
	$persetujuan="belum di setujui";
}
if($ijin==2){
	$persetujuan="di setujui";
}
if($status==1){
	$stat="diminta";
}
if($status==2){
	$stat="diterima";
}
?>
<tr>
	<td><center><?php echo $result['id_permintaan'];?></center></td>
	<td><center><?php echo $tanggal;?></center></td>
	<td><center><?php echo $stat;?></center></td>
	<td><center><?php echo $persetujuan;?></center></td>
	<td>
	<center>
		<div class='btn-group'>
			<a href="?&aksi=hapus&nmr=<?php echo $result['id_permintaan']; ?>" class="btn btn-xs btn-danger" title="Hapus Data Ini" onclick="return confirm('ANDA YAKIN AKAN MENGHAPUS DATA PENTING INI ... ?')"><i class="glyphicon glyphicon-trash"></i></a> 
			<a href="edit_permintaan.php?aksi=edit&nmr=<?php echo $result['id_permintaan']; ?>" class="btn btn-xs btn-success" title='lihat Detail Permintaan'> <i class="glyphicon glyphicon-file"></i> </a>
<?php 
if ($ijin==1){
?>		   
		   <a href="" class="btn btn-xs btn-danger" title='belum bisa print'> <i class="glyphicon glyphicon-print"></i> </a>
<?php
}
if($ijin==2){
?>			   
<a href="print_permintaan.php?aksi=print&nmr=<?php echo $result['id_permintaan']; ?>" target="_blank" class="btn btn-xs btn-info" title='Print Permintaan ini'> <i class="glyphicon glyphicon-print"></i> </a>
<?php }
?>		
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
		$del = "DELETE FROM permintaan WHERE id_permintaan='".$_GET["nmr"]."'";
		$delDb = mysql_query($del,$conn) or die("Error hapus data ".mysql_error());
		$del2 = "DELETE FROM detail_permintaan WHERE id_permintaan='".$_GET["nmr"]."'";
		$delDb2 = mysql_query($del2,$conn) or die("Error hapus data ".mysql_error());
		if($delDb && $delDb2){
			echo "<meta http-equiv='refresh' content='0; url=?'>";
		}
	}
}
?>

