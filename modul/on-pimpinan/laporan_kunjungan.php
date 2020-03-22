<?php
session_start();
ob_start();
	mysql_connect("localhost","root");
	mysql_select_db("db_klinik");
	date_default_timezone_set('Asia/Jakarta'); //buat koneksi ke database
?>
<html> <!-- Bagian halaman HTML yang akan konvert -->
<head>
<title>Laporan Kunjugan Pasien</title>
<style type="text/css">
td{
	padding-left: 5px;
	padding-right: 5px;
	padding-bottom:5px;
	padding-top:5px;
	border: 1px solid #E7F0CC;	
}	
</style>
</head>
<body>
<table width="800" border="1" cellpadding="0">
    <thead>
  <tr>
  <td colspan="15">
    <h4 align="center">LAPORAN KUNJUNGAN PASIEN<br>KLINIK GREEN CARE BANDUNG</h4></td>
  </tr>
</thead>
<tbody>
  <tr>
    <td width="80"><div align="center"><b>Tanggal</b></div></td>
    <td width="70"><div align="center"><b>No</b></div></td>
    <td width="100"><div align="center"><b>MEDREC</b></div></td>
    <td width="200"><div align="center"><b>Nama Pasien</b></div></td>
	<td width="80"><div align="center"><b>Umur</b></div></td>
	<td width="110"><div align="center"><b>Jenis Kelamin</b></div></td>
	<td width="110"><div align="center"><b>Alamat</b></div></td>
	<td width="110"><div align="center"><b>No.Telepon</b></div></td>
	<td width="110"><div align="center"><b>Diagnosa</b></div></td>
	<td width="110"><div align="center"><b>Jenis Bayar</b></div></td>
	<td width="110"><div align="center"><b>No.BPJS</b></div></td>
	<td width="110"><div align="center"><b>No.Asuransi</b></div></td>
	<td width="110"><div align="center"><b>Nama Perusahaan</b></div></td>
  </tr>
<?php
$jenis_kelamin = $_POST['jenis_kelamin'];
$query 	= mysql_query("SELECT t_rekam.*, t_daftar.*, t_dokter.*, t_pasien.* FROM t_rekam 
						inner join t_daftar ON t_rekam.id_daftar=t_daftar.id_daftar 
						INNER JOIN t_dokter ON t_daftar.id_dokter=t_dokter.id_dokter  
						INNER JOIN t_pasien ON t_daftar.id_pasien=t_pasien.id_pasien 
						WHERE jenis_kelamin='$jenis_kelamin' 
						AND tgl_daftar BETWEEN '".$_POST['date1']."' AND '".$_POST['date2']."'");
$no=1;
while($data=mysql_fetch_array($query))
{
	
?>
    <tr>
    <td width="80"><div align="center"><?php echo $data['tgl_daftar']; ?></div></td>
    <td width="30"><div align="center"><?php echo $no++;?></div></td>
    <td width="80"><div align="center"><?php echo $data['id_pasien']; ?></div></td>
    <td width="150"><div align="center"><?php echo $data['nama_pasien']; ?></div></td>
    <td width="80"><div align="center"><?php echo $data['umur']; ?></div></td>
    <td width="110"><div align="center"><?php echo $data['jenis_kelamin']; ?></div></td>
    <td width="110"><div align="center"><?php echo $data['alamat']; ?></div></td>
    <td width="110"><div align="center"><?php echo $data['no_hp']; ?></div></td>
    <td width="110"><div align="center"><?php echo $data['diagnosa']; ?></div></td>
    <td width="110"><div align="center"><?php echo $data['jenis_bayar']; ?></div></td>
    <td width="110"><div align="center"><?php echo $data['no_bpjs']; ?></div></td>
    <td width="110"><div align="center"><?php echo $data['no_asuransi']; ?></div></td>
    <td width="110"><div align="center"><?php echo $data['nama_perusahaan']; ?></div></td>
  </tr>
<?php } ?>
</tbody>
<tfoot>
<tr>
	<td width="110" colspan="13"><div align="center"><b>Pimpinan</b></div></td>
</tr>

<tr>
	<td width="110" colspan="13"><div align="center"><b><br><br><br><br><br>(--Dr.Hj.Ita Rostiaty ,Mh.Kes--)</b></div></td>
</tr>
</tfoot>
</table>
</body>
</html><!-- Akhir halaman HTML yang akan di konvert -->
<?php
$filename="laporan.pdf"; //ubah untuk menentukan nama file pdf yang dihasilkan nantinya
//==========================================================================================================
//Copy dan paste langsung script dibawah ini,untuk mengetahui lebih jelas tentang fungsinya silahkan baca-baca tutorial tentang HTML2PDF
//==========================================================================================================
$content = ob_get_clean();
	$content = '<page style="font-family: freeserif">'.nl2br($content).'</page>';
	require_once(dirname(__FILE__).'./../../assets/html2pdf/html2pdf.class.php');
	try
	{
		$html2pdf = new HTML2PDF('L','A3','en', true, 'ISO-8859-15',array(10, 0, 20, 0));
		$html2pdf->setDefaultFont('Arial');
		$html2pdf->writeHTML($content, isset($_GET['vuehtml']));
		$html2pdf->Output($filename);
	}
	catch(HTML2PDF_exception $e) { echo $e; }
?>