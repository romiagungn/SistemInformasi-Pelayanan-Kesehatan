<page backtop="10mm" backbottom="10mm" backleft="20mm" backright="20mm">
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
$mpdf=new mPDF('utf-8', 'A5'); // Create new mPDF Document
 
//Beginning Buffer to save PHP variables and HTML tags
ob_start();
?>
<!--sekarang Tinggal Codeing seperti biasanya. HTML, CSS, PHP tidak masalah.-->
<!--CONTOH Code START-->
<table style="width: 40%;border-collapse: collapse" border="1" align="center">
  <tr>
    <td align="center">
	<img style="width: 100%;" src="../../assets/img/greencare.png">
	<span>--------------------------------------------------------------------------------------------------------------------<span>
	
    <table width="700" border="0">
<?php
$data = mysql_fetch_array(mysql_query("SELECT * FROM t_pasien WHERE id_pasien='".$_GET['SIMPAN']."'"));
?>
      <tr>
        <td  align="left"><strong>Nomor</strong></td>
        <td width="40"  align="center"><strong>:</strong></td>
        <td   align="left"><strong><?php echo $data['id_pasien'];?> </strong></td>
        </tr>
		<tr>
        <td  align="left"><strong>Nama Pasien</strong></td>
        <td width="40"  align="center"><strong>:</strong></td>
        <td   align="left"><strong><?php echo $data['nama_pasien'];?> </strong></td>
        </tr>
		<tr>
        <td  align="left"><strong>Tempat, Tgl Lahir/Umur</strong></td>
        <td align="center"><strong>:</strong></td>
        <td  align="left"><strong> <?php echo $data['tempat_lahir'];?>, <?php echo $data['tgl_lahir'];?> / <?php echo $data['umur'];?> </strong></td>
        </tr>
		<tr>
        <td  align="left"><strong>Jenis Kelamin</strong></td>
        <td align="center"><strong>:</strong></td>
        <td  align="left"><strong> <?php echo $data['jenis_kelamin'];?> </strong></td>
        </tr>
		<tr><td align="center" colspan="6"><strong> Bawalah Kartu Ini Setiap Kali Berobat</strong></td></tr>

</table>
</td>
</tr>
</table>
</page>
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