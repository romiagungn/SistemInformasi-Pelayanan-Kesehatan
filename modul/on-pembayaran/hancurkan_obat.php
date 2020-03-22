<?php
mysql_connect("localhost","root");
						mysql_select_db("db_klinik");
$id_obat=$_GET['id_obat'];
$kadaluarsa=$_GET['kadaluarsa'];
$data_detail_penerimaan=mysql_fetch_array(mysql_query("SELECT * FROM detail_penerimaan WHERE id_obat='$id_obat' AND kadaluarsa='$kadaluarsa'"));
$data_obat=mysql_fetch_array(mysql_query("SELECT * FROM t_obat WHERE id_obat='$id_obat'"));
$stok_obat=$data_obat['stok_obat'];
$sisa=$data_detail_penerimaan['sisa'];
$jumlah_akhir=$stok_obat-$sisa;
$sisa_akhir=0;
$update_obat=mysql_query("UPDATE t_obat SET stok_obat='$jumlah_akhir' WHERE id_obat='$id_obat'");
$update_detail=mysql_query("DELETE FROM detail_penerimaan WHERE id_obat='$id_obat' AND kadaluarsa='$kadaluarsa'");
if($update_detail){
	if($update_obat){
	echo"<script>
	alert('obat berhasil di ubah');
	</script>";	
	}
	else{
	echo"
	<script>
	alert('error');
	</script>";
	
	}
echo"<script>
	alert('obat berhasil di ubah');
	document.location.href='lihat_obatKadaluarsa.php';
	</script>";
	}
else{
echo"
<script>
	alert('error');
	</script>";
}
?>