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
$mpdf=new mPDF('utf-8', 'A4-L'); // Create new mPDF Document
 
//Beginning Buffer to save PHP variables and HTML tags
ob_start();
?>
<!--sekarang Tinggal Codeing seperti biasanya. HTML, CSS, PHP tidak masalah.-->
<!--CONTOH Code START-->
<table border="1" align="center">
  <tr>
    <td width="596" align="center">
	<p><img src="../../assets/img/pembayaran.png" width="77%" height="94" style="width: 70%;">
	  </p>
	<p>-------------------------------------------------------------------------------------------------<span>
	  
	  </p>
	<table width="600" border="">
	  <?php 
	mysql_connect("localhost","root");
	mysql_select_db("db_klinik");
	
	$data = mysql_fetch_array(mysql_query("SELECT t_pembayaran.* FROM t_pembayaran WHERE no_pembayaran='".$_GET['SIMPAN']."'"));
	$data2 = mysql_fetch_array(mysql_query("SELECT detail_pembayaran.*, t_pembayaran.*, t_daftar.*, t_pasien.*,t_rekam.*, t_dokter.* FROM detail_pembayaran 
											INNER JOIN t_pembayaran ON detail_pembayaran.no_pembayaran=t_pembayaran.no_pembayaran 
											INNER JOIN t_daftar ON t_pembayaran.id_daftar=t_daftar.id_daftar 
											INNER JOIN t_pasien ON t_daftar.id_pasien=t_pasien.id_pasien
											INNER JOIN t_dokter ON t_daftar.id_dokter=t_dokter.id_dokter
											INNER JOIN t_rekam ON t_pembayaran.id_rekam=t_pembayaran.id_rekam
											WHERE detail_pembayaran.no_pembayaran='".$data['no_pembayaran']."'"));
	?>
	  
	  <tr>
        <td colspan="6" align="center"><strong><br>BUKTI PEMBAYARAN<strong></td>
        </tr>
        <tr>
		<td colspan="6" align="right"><strong><br>No. Pembayaran : <?php echo $data['no_pembayaran'];?></strong></td>
		</tr>

      <tr>
        <td colspan="6"><br /></td>
        </tr>
      <tr>
        <td colspan="6">
<table width="100%" border="" class="table">
<thead>
<tr>
	<td colspan="" width="136" align="left">Telah Diterima Dari </td>
	<td colspan="" width="79" align="center"> : </td>
	<td colspan="" width="155" align="left"><?php echo $data2['nama_pasien'];?> </td>
</tr>
<tr>
	<td colspan="" align="left">Total Biaya</td>
	<td colspan="" align="center"> : </td>
	<td colspan="" align="left">Rp. <?php echo $data2['total_biaya'];?></td>
</tr>
<?php
    $angka = $data2['total_biaya'];
    if ($angka)
    {
		?>
		<tr>
<td colspan="" align="left">Terbilang</td>
	<td colspan="" align="center"> : </td>
	<td colspan="" align="left"><?php echo ucwords(Terbilang($angka))." Rupiah";?></td>
</tr>
		<?php
    }
    function Terbilang($x)
    {
        $ambil = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
        if ($x < 12)
            return " " . $ambil[$x];
        elseif ($x < 20)
            return Terbilang($x - 10) . " belas";
        elseif ($x < 100)
            return Terbilang($x / 10) . " puluh" . Terbilang($x % 10);
        elseif ($x < 200)
            return " seratus" . Terbilang($x - 100);
        elseif ($x < 1000)
            return Terbilang($x / 100) . " ratus" . Terbilang($x % 100);
        elseif ($x < 2000)
            return " seribu" . Terbilang($x - 1000);
        elseif ($x < 1000000)
            return Terbilang($x / 1000) . " ribu" . Terbilang($x % 1000);
        elseif ($x < 1000000000)
            return Terbilang($x / 1000000) . " juta" . Terbilang($x % 1000000);
    }
    ?>
 
	
<tr>
	<td colspan="" align="left">Total Bayar </td>
	<td colspan="" align="center"> : </td>
	<td colspan="" align="left">Rp. <?php echo $data2['total_bayar'];?></td>
</tr>
<tr>
	<td colspan="" align="left">Kembalian</td>
	<td colspan="" align="center"> : </td>
	<td colspan="" align="left">Rp. <?php echo $data2['kembalian'];?></td>
</tr>

<tr>
	<td align="left" width="136"><strong><br><br>RESEP OBAT : </strong></td>
</tr>
<tr align="center">
<td colspan="" align="center">Nama Obat</td>
<td colspan="" align="center">Jumlah Obat</td>
<td colspan="" align="center"> Dosis Obat</td>
<td width="192" colspan="" align="left">Keterangan Pakai</td>
</tr>
<?php
mysql_connect("localhost","root");
	mysql_select_db("db_klinik");
$data_resep=mysql_query("SELECT detail_resep.*,t_obat.nama_obat FROM detail_resep INNER JOIN t_obat ON detail_resep.id_obat=t_obat.id_obat WHERE detail_resep.id_rekam='".$data['id_rekam']."'");
											while($resep=mysql_fetch_array($data_resep)){
												$id_resep_obat=$resep['id_obat'];
												$jumlah_resep_obat=$resep['jumlah_obat'];
												$satuan=$resep['satuan'];
												$dosis=$resep['dosis'];
												$nama_obat=$resep['nama_obat'];
												$keterangan_Pakai=$resep['keterangan_Pakai'];
											?>
<tr> &nbsp &nbsp
<td colspan="" align="center">|<?php echo $nama_obat?>|</td>
<td colspan="" align="center">|<?php echo $jumlah_resep_obat?>-<?php echo $satuan ?>|</td>
<td colspan="" align="center">|<?php echo $dosis?>|</td>
<td colspan="" align="left">|<?php echo $keterangan_Pakai?>|</td>
<?php }?>
</tr>
	

<tr>
	<td colspan="8" align="center"><br>Saran Dokter : <?php echo $data2['saran'];?> </td>
</tr>
<tr>
	<td align="right" colspan="8"><strong><br>Bandung, <?php echo $tgl;?></strong></td>
</tr>
	<br>
	<br>
	<br>	
</thead>

<tbody>
<tr>
	<td align="left">Yang Menyerahkan</td>
	<td colspan="6" align="right">Yang Menerima</td>
</tr>
<tr>
	<td align="left"><br><br><br><br>(--Dian Ratna--)</td>
	<td colspan="6" align="right"><br><br><br><br>(--<?php echo $data2['nama_pasien'];?>--)</td>
</tr>
</tbody>

          </table>
          </td>
        </tr>
</table>
</td>
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