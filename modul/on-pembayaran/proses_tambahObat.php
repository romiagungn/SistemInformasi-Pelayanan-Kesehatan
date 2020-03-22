<?php

    /* Koneksi ke Database */
	mysql_connect("localhost","root");
	mysql_select_db("db_klinik");
	include "conn.php";
	/* Simpan Permintaan */
	if(isset($_POST['SIMPAN']))
	{
	$id_obat = $_POST['id_obat'];
	$nama_obat = $_POST['nama_obat'];
	$jenis_obat = $_POST['jenis_obat'];
	$satuan = $_POST['satuan'];
	$harga_obat = $_POST['harga_obat'];
	$stok_obat = $_POST['stok_obat'];

			$insert = mysqli_query($koneksi, "INSERT INTO t_obat (id_obat, nama_obat, jenis_obat,satuan, harga_obat, stok_obat, stok_obat_awal) 
			VALUES ('$id_obat','$nama_obat', '$jenis_obat', '$satuan', '$harga_obat', '$stok_obat','$stok_obat')") or die(mysqli_error());
				
				if ($insert ){

        
        echo"<script language='javascript'>
	                alert('Data Berhasil Masuk');
					document.location.href='index.php';
                </script>
            ";
        }else{
         echo"<script language='javascript'>
                   alert('Gagal');
				   document.location.href='index.php';
            	</script> ";
        }        
				}		
	?>