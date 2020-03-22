<?php

    /* Koneksi ke Database */
	mysql_connect("localhost","root");
	mysql_select_db("db_klinik");
	include "conn.php";
	/* Simpan Permintaan */
	if(isset($_POST['SIMPAN']))
	{
	$id_pasien = $_POST['id_pasien'];
	$nama_pasien = $_POST['nama_pasien'];
	$tgl_lahir = $_POST['tgl_lahir'];
	$umur = $_POST['umur'];
	$tempat_lahir = $_POST['tempat_lahir'];
	$jenis_kelamin = $_POST['jenis_kelamin'];
	$agama = $_POST['agama'];
	$no_hp = $_POST['no_hp'];
	$alamat = $_POST['alamat'];
	$status = $_POST['status'];
	$pekerjaan = $_POST['pekerjaan'];
	$rps = $_POST['rps'];
	$rpk = $_POST['rpk'];
	$alergi_obat = $_POST['alergi_obat'];
	$kebiasaan = $_POST['kebiasaan'];
	$alamat_kantor = $_POST['alamat_kantor'];
	$penjamin = $_POST['penjamin'];
	$alergi_lain = $_POST['alergi_obat'];
	$jenis_bayar = $_POST['jenis_bayar'];
	$no_bpjs=$_POST['no_bpjs'];
	$no_asuransi=$_POST['no_asuransi'];
	$nama_perusahaan=$_POST['nama_perusahaan'];

	

	$cek = mysqli_query($koneksi, "SELECT * FROM t_pasien WHERE id_pasien='$id_pasien'");
		if(mysqli_num_rows($cek) == 0){
			$insert = mysqli_query($koneksi, "INSERT INTO t_pasien (id_pasien, nama_pasien, tgl_lahir, umur, tempat_lahir, jenis_kelamin, agama, no_hp, alamat, status, pekerjaan, rps, rpk, alergi_obat , kebiasaan, alamat_kantor, penjamin, alergi_lain, jenis_bayar, no_bpjs, no_asuransi, nama_perusahaan) 
			VALUES ('$id_pasien','$nama_pasien', '$tgl_lahir', '$umur', '$tempat_lahir', '$jenis_kelamin', '$agama', '$no_hp', '$alamat', '$status', '$pekerjaan', '$rps', '$rpk', '$alergi_obat', '$kebiasaan', '$alamat_kantor', '$penjamin', '$alergi_lain','$jenis_bayar','$no_bpjs','$no_asuransi','$nama_perusahaan')") or die(mysqli_error());
				
				if ($insert ){

        
        echo"<script language='javascript'>
	                alert('Data Berhasil Masuk');
	                document.location.href='pasien.php';
                </script>
            ";
        }else{
         echo"<script language='javascript'>
                   alert('Gagal');
	                document.location.href='pasien.php';
            	</script> ";
        }        
				}		

	}
	?>