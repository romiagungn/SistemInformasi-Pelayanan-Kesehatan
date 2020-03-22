<?php

    /* Koneksi ke Database */
	mysql_connect("localhost","root");
	mysql_select_db("db_klinik");
	include "conn.php";
	/* Simpan Permintaan */
	if(isset($_POST['SIMPAN']))
	{
	$id_supplier = $_POST['id_supplier'];
	$nama_supplier = $_POST['nama_supplier'];
	$alamat_supplier = $_POST['alamat_supplier'];
	$no_supplier = $_POST['no_supplier'];

			$insert = mysqli_query($koneksi, "INSERT INTO supplier (id_supplier, nama_supplier, alamat_supplier, no_supplier) 
			VALUES ('$id_supplier','$nama_supplier', '$alamat_supplier', '$no_supplier')") or die(mysqli_error());
				
				if ($insert ){

        
        echo"<script language='javascript'>
	                alert('Data Berhasil Masuk');
					document.location.href='supplier.php';
                </script>
            ";
        }else{
         echo"<script language='javascript'>
                   alert('Gagal');
				   document.location.href='supplier.php';
            	</script> ";
        }        
				}		
	?>