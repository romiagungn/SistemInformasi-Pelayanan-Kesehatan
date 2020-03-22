	<script>
    function popup(url) 
                        {
                         params  = 'fullscreen=yes';
                        

                         newwin=window.open(url,'windowname4', params);
                         if (window.focus) {newwin.focus()}
                         return false;
                        }
 </script>
 <?php
    /* Koneksi ke Database */
	
	/* Simpan Permintaan */
	if(isset($_POST['SIMPAN'])) {
		mysql_connect("localhost","root");
	mysql_select_db("db_klinik");
	include "conn.php";	
	  date_default_timezone_set('Asia/Jakarta');
	$id_daftar = $_POST['id_daftar'];
	$id_pasien = $_POST['id_pasien'];
	$keluhan = $_POST['keluhan'];
	$id_dokter = $_POST['id_dokter'];
	$tgl_daftar = date("Y-m-d");

 $hari_ini=date("Y-m-d");
 	$jam=date("H:i:s");		
    $query="SELECT count(id_daftar) as antri from t_daftar where tgl_daftar='$hari_ini' AND id_dokter='D001'";
	$query2=mysql_query("SELECT * FROM t_daftar  WHERE id_daftar IN(SELECT MAX(id_daftar) FROM t_daftar)");
$result=mysql_query($query) or die(mysql_error());
$data=mysql_fetch_array($result);
$data2=mysql_fetch_array($query2);
$q_antrian_gigi=mysql_query("SELECT count(id_daftar) as antri from t_daftar where tgl_daftar='$hari_ini' AND id_dokter='D002'");
$data_antrian_gigi=mysql_fetch_array($q_antrian_gigi);
$antri_umum=$data['antri'];
$tanggal_antri=$data2['tgl_daftar'];
$antrian_gigi=$data_antrian_gigi['antri'];
$antrian=0;
if($tanggal_antri== $hari_ini)
{
if($id_dokter=='D001'){
	$antrian=$antri_umum+1;
}
if($id_dokter=='D002'){
$antrian=$antrian_gigi+1;	
}
}
else
{
	$antrian=1;
}

	
			$insert = mysql_query("INSERT INTO t_daftar (id_daftar, id_pasien, keluhan, id_dokter, tgl_daftar, jam_daftar ,antrian) VALUES ('$id_daftar', '$id_pasien', '$keluhan', '$id_dokter', '$tgl_daftar', '$jam' ,'$antrian')") or die(mysql_error());
			
				$insert2=mysql_query("INSERT INTO t_proses (id_daftar , p_pendaftaran,p_pemeriksaan , p_pembayaran) 
				VALUES ('$id_daftar','Tuntas','Menunggu','Menunggu')") or die(mysql_error());
			
				if ($insert & $insert2){

        
        echo"<script language='javascript'>
	                alert('Data Berhasil Masuk');
	                popup('cetak_prosesAntrian.php?SIMPAN=".$id_daftar."');
	                document.location.href='pendaftaran.php';
                </script>
            ";
        }else{
         echo"<script language='javascript'>
                   alert('Gagal');
                   document.location.href='pendaftaran.php';
            	</script> ";
        }        
				}		
	?>