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
						mysql_connect("localhost","root");
  						mysql_select_db("db_klinik");

						$data2 = mysql_fetch_array(mysql_query("SELECT t_daftar.*, t_pasien.*, t_dokter.* FROM t_daftar inner join t_dokter
						ON t_daftar.id_dokter=t_dokter.id_dokter INNER JOIN t_pasien ON t_daftar.id_pasien=t_pasien.id_pasien WHERE id_daftar='".$_GET['SIMPAN']."'"));
						
					?>
      <tr>
        <td  align="left"><strong>Nomor Antrian</strong></td>
        <td width="40"  align="center"><strong>:</strong></td>
        <td   align="left"><strong><?php echo $data2['antrian'];?> </strong></td>
        </tr>
		<tr>
        <td  align="left"><strong>ID Pasien</strong></td>
        <td width="40"  align="center"><strong>:</strong></td>
        <td   align="left"><strong><?php echo $data2['id_pasien'];?> </strong></td>
        </tr>
		<tr>
        <td  align="left"><strong>Nama Pasien</strong></td>
        <td width="40"  align="center"><strong>:</strong></td>
        <td   align="left"><strong><?php echo $data2['nama_pasien'];?> </strong></td>
        </tr>
		<tr>
        <td  align="left"><strong>Ruang Rawat</strong></td>
        <td align="center"><strong>:</strong></td>
        <td  align="left"><strong> <?php echo $data2['ruang_rawat'];?></strong></td>
        </tr>
		<tr>
        <td  align="left"><strong>Nama Dokter</strong></td>
        <td align="center"><strong>:</strong></td>
        <td  align="left"><strong> <?php echo $data2['nama_dokter'];?> </strong></td>
        </tr>
		<tr>
        <td  align="left"><strong>Tanggal Masuk</strong></td>
        <td width="40"  align="center"><strong>:</strong></td>
        <td   align="left"><strong><?php echo $data2['tgl_daftar'];?> </strong></td>
        </tr>
		<tr>
        <td  align="left"><strong>Jam Masuk</strong></td>
        <td width="40"  align="center"><strong>:</strong></td>
        <td   align="left"><strong><?php echo $data2['jam_daftar'];?> </strong></td>
        </tr>
		<tr><td align="center" colspan="6"><strong> Bawalah Kartu Ini & Serahkan Jika Telah Dipanggil</strong></td></tr>

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