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
<table width="400" border="1" cellpadding="0">
  <thead>
  <tr>
  <td colspan="7">
    <h4 align="center">LAPORAN PENGELUARAN<br>KLINIK GREEN CARE BANDUNG</h4></td>
  </tr>
	</thead>
	<tbody>
  <tr>
    <td width="30"><div align="center"><b>No</b></div></td>
	<td width="150"><div align="center"><b>Nama Obat</b></div></td>
	<td width="100"><div align="center"><b>Jenis Obat</b></div></td>
	<td width="120"><div align="center"><b>Tanggal Obat Keluar</b></div></td>
	<td width="100"><div align="center"><b>Jumlah Obat Masuk</b></div></td>
	<td width="100"><div align="center"><b>Jumlah Obat Keluar</b></div></td>
	<td width="100"><div align="center"><b>Stok Akhir</b></div></td>
  </tr>
<?php
$query 	= mysql_query("SELECT detail_pembayaran.*, t_pembayaran.*, t_obat.* FROM detail_pembayaran
						INNER JOIN t_pembayaran ON detail_pembayaran.no_pembayaran=t_pembayaran.no_pembayaran
						INNER JOIN t_obat ON detail_pembayaran.id_obat=t_obat.id_obat
						where tanggal BETWEEN '".$_POST['date1']."' AND '".$_POST['date2']."'");
$no=1;
while($data=mysql_fetch_array($query))
{
	
?>

    <tr>
    <td width="30"><div align="center"><?php echo $no++;?></div></td>
    <td width="150"><div align="center"><?php echo $data['nama_obat']; ?></div></td>
    <td width="100"><div align="center"><?php echo $data['jenis_obat']; ?></div></td>
    <td width="120"><div align="center"><?php echo $data['tanggal']; ?></div></td>
    <td width="80"><div align="center"><?php echo $data['stok_obat_awal']; ?></div></td>
    <td width="80"><div align="center"><?php echo $data['jumlah']; ?></div></td>
    <td width="80"><div align="center"><?php echo $data['stok_obat']; ?></div></td>
  </tr>
<?php } ?>
</tbody>
<tfoot>
<tr>
	<td width="110" colspan="3"><div align="center"><b>(--Pimpinan--)</b></div></td>
</tr>

<tr>
	<td width="110" colspan="3"><div align="center"><b><br><br><br><br><br>(--Dr.Hj.Ita Rostiaty ,Mh.Kes--)</b></div></td>
</tr>
</tfoot>
</table>
</body>
</html>
<!-- Akhir halaman HTML yang akan di konvert -->
<?php
$filename="laporanPengeluaranObat.pdf"; //ubah untuk menentukan nama file pdf yang dihasilkan nantinya
//==========================================================================================================
//Copy dan paste langsung script dibawah ini,untuk mengetahui lebih jelas tentang fungsinya silahkan baca-baca tutorial tentang HTML2PDF
//==========================================================================================================
$content = ob_get_clean();
	$content = '<page style="font-family: freeserif">'.nl2br($content).'</page>';
	require_once(dirname(__FILE__).'./../../assets/html2pdf/html2pdf.class.php');
	try
	{
		$html2pdf = new HTML2PDF('P','A3','en', true, 'ISO-8859-15',array(10, 0, 20, 0));
		$html2pdf->setDefaultFont('Arial');
		$html2pdf->writeHTML($content, isset($_GET['vuehtml']));
		$html2pdf->Output($filename);
	}
	catch(HTML2PDF_exception $e) { echo $e; }
?>