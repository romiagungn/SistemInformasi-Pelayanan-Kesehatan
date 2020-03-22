<?php
	date_default_timezone_set("Asia/Jakarta");
	$jam = date("H:i:s");
	$tgl = date('d-m-Y');
	
	mysql_connect('localhost','root','');  
    mysql_select_db('db_klinik');

?>
 <?php
 // Define relative path from this script to mPDF
 $nama_dokumen='Kartu Catatan Penyakit'; //Beri nama file PDF hasil.
define('_MPDF_PATH','../../MPDF57/');
include(_MPDF_PATH . "mpdf.php");
$mpdf=new mPDF('utf-8', 'A4'); // Create new mPDF Document
 
//Beginning Buffer to save PHP variables and HTML tags
ob_start();
?>
<!--sekarang Tinggal Codeing seperti biasanya. HTML, CSS, PHP tidak masalah.-->
<!--CONTOH Code START-->
<table border="1" align="center">
  <tr>
    <td align="center">
	<img style="width: 100%;" src="../../assets/img/sakit.png">
	<span>--------------------------------------------------------------------------------------------------------------------------------------------------------------<span>
	
    <table width="700" border="0">
<?php 
$data2 = mysql_fetch_array(mysql_query("SELECT t_rekam.*, t_daftar.*, t_dokter.*, t_pasien.* FROM t_rekam 
										inner join t_daftar ON t_rekam.id_daftar=t_daftar.id_daftar
										inner join t_dokter ON t_daftar.id_dokter=t_dokter.id_dokter 										
										INNER JOIN t_pasien ON t_daftar.id_pasien=t_pasien.id_pasien
										WHERE id_rekam='".$_GET['SIMPAN']."'"));
?>
      <tr>
        <td colspan="6" align="center"><strong><br>SURAT KETERANGAN SAKIT</strong></td>
        </tr>
	<tr>
        <td width="244" align="left" colspan="6"><strong>Yang Bertanda tangan dibawah ini, Dokter mengerangkan Bahwa :</strong></td>
    </tr>
	  
	<br>  
	<br>  
	  
    <tr>
        <td  align="left" colspan="2"><strong>Nama Pasien</strong></td>
        <td align="center"><strong>:</strong></td>
        <td align="left"><strong><?php echo $data2['nama_pasien'];?> </strong></td>
        <td align="right"><strong>Jenis Kelamin</strong></td>
		<td align="center"><strong>:</strong></td>
        <td align="right"><strong><?php echo $data2['jenis_kelamin'];?></strong></td>
        </tr>
		<tr>
        <td  align="left" colspan="2"><strong>T.T.L</strong></td>
        <td align="center"><strong>:</strong></td>
        <td  align="left"><strong> <?php echo $data2['tempat_lahir'];?>, <?php echo $data2['tgl_lahir'];?></strong></td>
		<td align="right" ><strong>Umur </strong></td>
		<td align="center"><strong>:</strong></td>
        <td align="right"><strong><?php echo $data2['umur'];?> thn</strong></td>
        </tr>
		<tr>
        <td  align="left" colspan="2"><strong>Alamat</strong></td>
        <td align="center"><strong>:</strong></td>
        <td  align="left" width="244"><strong> <?php echo $data2['alamat'];?></strong></td>
        </tr>

	<tr>
        <td width="244" align="left" colspan="6"><strong><br>Sehubungan Dengan Penyakit yang dideritanya, maka penderita harus diizinkan beristirahat/tidak berkerja berat selama (......................)hari</strong></td>
    </tr>
	<tr>
	<td width="244" align="left" colspan="6"><strong><br>Mulai Tanggal <?php echo $tgl; ?> s/d tanggal .......................................
	</strong></td>
	</tr>
	<tr>
		<td align="right" colspan="6"><strong><br> Bandung, <?php echo $tgl; ?> </strong></td> 
	</tr>
	<tr>
		<td align="right" colspan="6"><strong> Pemeriksa</strong></td> 
	</tr>
	<tr>
		<td align="right" colspan="6"><br><br><br><br><strong>(<?php echo $data2['nama_dokter'];?>)</strong></td> 
	</tr>
      <tr>
        <td colspan="6"><br /></td>
        </tr>
      <tr>
        <td colspan="6">
</table>

          </td>
</td>
</tr>
</tr>
</table>
<?php
$stylesheet = file_get_contents('../../assets/js/dataTables/bootstrap.min.css');
$mpdf->WriteHTML($stylesheet,1);
$html = ob_get_contents(); //Proses untuk mengambil hasil dari OB.. ob_end_clean(); 
//Here convert the encode for UTF-8, if you prefer the ISO-8859-1 just change for $mpdf->WriteHTML($html);
ob_end_clean();
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output($nama_dokumen.".pdf" ,'I');
exit;
?>