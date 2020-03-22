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
</head>
<body>
<table width="800" border="1" cellpadding="0">
  <tr>
  <td colspan="7">
    <h4 align="center">LAPORAN STOK OBAT<br>KLINIK GREEN CARE BANDUNG</h4></td>
  </tr>
  <tr>
    <td width="30"><div align="center"><b>No</b></div></td>
	<td width="150"><div align="center"><b>ID Obat</b></div></td>
	<td width="120"><div align="center"><b>Nama Obat</b></div></td>
	<td width="90"><div align="center"><b>Jenis Obat</b></div></td>
	<td width="100"><div align="center"><b>Harga Obat</b></div></td>
	<td width="110"><div align="center"><b>Stok Obat Awal</b></div></td>
	<td width="110"><div align="center"><b>Stok Obat Akhir</b></div></td>
  </tr>
<?php
$query 	= mysql_query("SELECT * FROM t_obat");
$no=1;
while($data=mysql_fetch_array($query))
{
	
?>
    <tr>
    <td width="30"><div align="center"><?php echo $no++;?></div></td>
    <td width="150"><div align="center"><?php echo $data['id_obat']; ?></div></td>
    <td width="120"><div align="center"><?php echo $data['nama_obat']; ?></div></td>
    <td width="100"><div align="center"><?php echo $data['jenis_obat']; ?></div></td>
    <td width="120"><div align="center"><?php echo $data['harga_obat']; ?></div></td>
    <td width="90"><div align="center"><?php echo $data['stok_obat_awal']; ?></div></td>
    <td width="110"><div align="center"><?php echo $data['stok_obat']; ?></div></td>
  </tr>
<?php } ?>
</table>
</body>
</html><!-- Akhir halaman HTML yang akan di konvert -->
<?php
$filename="laporanStokObat.pdf"; //ubah untuk menentukan nama file pdf yang dihasilkan nantinya
//==========================================================================================================
//Copy dan paste langsung script dibawah ini,untuk mengetahui lebih jelas tentang fungsinya silahkan baca-baca tutorial tentang HTML2PDF
//==========================================================================================================
$content = ob_get_clean();
	$content = '<page style="font-family: freeserif">'.nl2br($content).'</page>';
	require_once(dirname(__FILE__).'/../../assets/html2pdf/html2pdf.class.php');
	try
	{
		$html2pdf = new HTML2PDF('P','A2','en', true, 'ISO-8859-15',array(10, 0, 20, 0));
		$html2pdf->setDefaultFont('Arial');
		$html2pdf->writeHTML($content, isset($_GET['vuehtml']));
		$html2pdf->Output($filename);
	}
	catch(HTML2PDF_exception $e) { echo $e; }
?>