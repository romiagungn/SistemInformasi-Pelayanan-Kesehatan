<?php

    /* Koneksi ke Database */
	mysql_connect("localhost","root");
	mysql_select_db("db_klinik");
	include "conn.php";
	/* Simpan Permintaan */
	if(isset($_POST['SIMPAN']))
	{
	$id_rekam = $_POST['id_rekam'];
	$id_daftar = $_POST['id_daftar'];
	$diagnosa = $_POST['diagnosa'];
	$tindakan = $_POST['tindakan'];
	$nama_obat = $_POST['nama_obat'];
	$idobat=$_POST['idobat'];
	$saran = $_POST['saran'];
	$pemeriksaan = $_POST['pemeriksaan'];
	$dosis = $_POST['dosis'];
	$banyak_obat = $_POST['banyak_obat'];
	$jumlah_obat=count($idobat);
	$keterangan_Pakai= $_POST['keterangan_Pakai'];
	$satuan= $_POST['satuan'];
	$id_pasien= $_POST['id_pasien'];

	$cek = mysqli_query($koneksi, "SELECT * FROM t_rekam WHERE id_rekam='$id_rekam'");
		if(mysqli_num_rows($cek) == 0){
			$insert = mysqli_query($koneksi, "INSERT INTO t_rekam (id_rekam, id_daftar,pemeriksaan,diagnosa, tindakan,saran, id_pasien) 
			VALUES ('$id_rekam','$id_daftar','$pemeriksaan','$diagnosa','$tindakan','$saran','$id_pasien')") or die(mysqli_error());
			for($i=0;$i<$jumlah_obat;$i++){
			$simpan_resep=mysql_query("INSERT INTO detail_resep (id_rekam,id_obat,jumlah_obat,satuan,keterangan_Pakai,dosis) VALUES('$id_rekam','$idobat[$i]','$banyak_obat[$i]','$satuan[$i]','$keterangan_Pakai','$dosis[$i]')");
			}
$UPDATE=mysqli_query($koneksi, "UPDATE t_proses SET p_pemeriksaan='Tuntas' WHERE id_daftar='$id_daftar'")or die(mysqli_error());
			
	if ($insert){
        echo"<script language='javascript'>
	                alert('Data Berhasil Masuk');
					document.location.href='rekammedis.php';
                </script>
            ";
        }else{
         echo"<script language='javascript'>
                   alert('Gagal');
	                document.location.href='rekammedis.php';
            	</script> ";
        }        
				}	
	}				
	?>					 