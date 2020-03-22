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
	$data2 = mysql_fetch_array(mysql_query("SELECT t_rekam.*, t_daftar.*,t_dokter.*, t_pasien.* FROM t_rekam 
											INNER JOIN t_daftar ON t_rekam.id_daftar=t_daftar.id_daftar 
											INNER JOIN t_dokter ON t_daftar.id_dokter=t_dokter.id_dokter 
											INNER JOIN t_pasien ON t_daftar.id_pasien=t_pasien.id_pasien
											WHERE id_rekam='".$_GET['SIMPAN']."'"));
?>
      <tr>
        <td colspan="6" align="center"><strong><br>SURAT RUJUKAN</strong></td>
        </tr>
	<tr>
        <td align="left"><strong>NOMOR : <?php echo $data2['id_pasien'];?></strong></td>
    </tr>
	<tr>
        <td width="244" align="left"><strong>Kepada Yth</strong></td>
    </tr>
	<tr>
        <td width="244" align="left"><strong>Ts.........................</strong></td>
    </tr>
	<tr>
        <td width="244" align="left"><strong>KLINIK/RS</strong></td>
    </tr>
	<tr>
        <td width="244" align="left"><strong>.................................</strong></td>
    </tr>
	  
	<br>  
	<br>  
	<tr>
        <td width="244" align="left"><strong>Dengan Hormat,</strong></td>
    </tr>
	<tr>
        <td width="244" colspan="6" align="left"><strong>Mohon pemeriksaan dan pengobatan / tindakan selanjutkan Pasien :</strong></td>
    </tr>
	  
    <tr>
        <td  align="left"><strong>Nama Pasien</strong></td>
        <td width="27"  align="center"><strong>:</strong></td>
        <td width="415"  align="left"><strong><?php echo $data2['nama_pasien'];?> </strong></td>
        </tr>
	<tr>
        <td  align="left"><strong>Umur</strong></td>
        <td align="center"><strong>:</strong></td>
        <td  align="left"><strong> <?php echo $data2['umur'];?></strong></td>
        </tr>
    <tr>
        <td  align="left"><strong>Alamat</strong></td>
        <td align="center"><strong>:</strong></td>
        <td  align="left"><strong> <?php echo $data2['alamat'];?> </strong></td>
        </tr>
    <tr>
        <td align="left"><strong>Keluhan Utama</strong></td>
        <td align="center"><strong>:</strong></td>
        <td align="left"><strong> <?php echo $data2['keluhan'];?> </strong></td>
        </tr>
	<tr>
        <td align="left"><strong>Pemeriksaan Fisik</strong></td>
        <td align="center"><strong>:</strong></td>
        <td align="left"><strong> <?php echo $data2['pemeriksaan'];?> </strong></td>
        </tr>
		
	<tr>
        <td width="244" align="left" colspan="6"><strong><br><br>Pemeriksaan penunjang diagnosa................................................................................ </strong></td>
    </tr>
	<tr>
        <td align="left"><strong>Diagnosa Sementara</strong></td>
        <td align="center"><strong>:</strong></td>
        <td align="left"><strong> <?php echo $data2['diagnosa'];?> </strong></td>
        </tr>
	<tr>
        <td align="left"><strong>Terapi yang telah diberikan</strong></td>
        <td align="center"><strong>:</strong></td>
        <td align="left"><strong> <?php echo $data2['tindakan'];?> </strong></td>
        </tr>
	<tr>
        <td width="244" align="left" colspan="6"><strong><br>Atas Ketersediaannya banyak Terima Kasih, serta mohon kami dapat informasi selanjutnya</strong></td>
    </tr>	
	<tr>
		<td align="right" colspan="6"><strong><br> Bandung, <?php echo $tgl; ?> </strong></td> 
	</tr>
	<tr>
		<td align="right" colspan="6"><strong> Salam Sejawat</strong></td> 
	</tr>
	<tr>
		<td align="right" colspan="6"><br><br><br><br>(<?php echo $data2['nama_dokter'];?>)</td> 
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