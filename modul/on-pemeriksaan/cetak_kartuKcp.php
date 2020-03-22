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
	<img style="width: 70%;" src="../../assets/img/sakit.png">
	<span>--------------------------------------------------------------------------------------------------------------------------------------------------------------<span>
	
    <table width="700" border="0">
	<?php 
	mysql_connect("localhost","root");
	mysql_select_db("db_klinik");
	
	//$data = mysql_fetch_array(mysql_query("SELECT t_rekam.* FROM t_rekam WHERE id_rekam='".$_GET['SIMPAN']."'"));
	$data2 = mysql_fetch_array(mysql_query("SELECT t_rekam.*, t_daftar.*, t_dokter.*, t_pasien.* FROM t_rekam 
						inner join t_daftar ON t_rekam.id_daftar=t_daftar.id_daftar 
						INNER JOIN t_dokter ON t_daftar.id_dokter=t_dokter.id_dokter  
						INNER JOIN t_pasien ON t_daftar.id_pasien=t_pasien.id_pasien
						WHERE id_rekam='".$_GET['SIMPAN']."'"));
?>
      <tr>
        <td colspan="6" align="center"><br>KARTU CATATAN PENYAKIT</td>
        </tr>
        <tr><td colspan="4" align="right">No. RM : <?php echo $data2['id_pasien'];?></td></tr>
	<tr>
        <td width="244" align="left"><strong>1. Data Umum </strong></td>
      </tr>
      <tr>
        <td  align="left"><strong>Nama Pasien</strong></td>
        <td width="27"  align="center"><strong>:</strong></td>
        <td width="415"  align="left"><strong><?php echo $data2['nama_pasien'];?> </strong></td>
        </tr>
		<tr>
        <td  align="left"><strong>T.T.L</strong></td>
        <td align="center"><strong>:</strong></td>
        <td  align="left"><strong> <?php echo $data2['tempat_lahir'];?>/ <?php echo $data2['tgl_lahir'];?> / <?php echo $data2['umur'];?> </strong></td>
        </tr>
      <tr>
        <td  align="left"><strong>Jenis Kelamin</strong></td>
        <td align="center"><strong>:</strong></td>
        <td  align="left"><strong> <?php echo $data2['jenis_kelamin'];?> </strong></td>
        </tr>
      <tr>
        <td align="left"><strong>Status</strong></td>
        <td align="center"><strong>:</strong></td>
        <td align="left"><strong> <?php echo $data2['status'];?> </strong></td>
        </tr>
		<tr>
        <td align="left"><strong>Pekerjaan</strong></td>
        <td align="center"><strong>:</strong></td>
        <td align="left"><strong> <?php echo $data2['pekerjaan'];?> </strong></td>
        </tr>
		<tr>
        <td align="left"><strong>Alamat Rumah</strong></td>
        <td align="center"><strong>:</strong></td>
        <td align="left"><strong> <?php echo $data2['alamat'];?> </strong></td>
        </tr>
		<tr>
        <td align="left"><strong>Alamat Kantor</strong></td>
        <td align="center"><strong>:</strong></td>
        <td align="left"><strong> <?php echo $data2['alamat_kantor'];?> </strong></td>
        </tr>
		<tr>
        <td align="left"><strong>No. Telepon</strong></td>
        <td align="center"><strong>:</strong></td>
        <td align="left"><strong> <?php echo $data2['no_hp'];?> </strong></td>
        </tr>
		<tr>
        <td align="left"><strong>Penjamin</strong></td>
        <td align="center"><strong>:</strong></td>
        <td align="left"><strong> <?php echo $data2['penjamin'];?> </strong></td>
        </tr>
		

		<tr>
        <td width="244" align="left"><strong><br>2. Riwayat Penyakit</strong></td>
      </tr>
		<tr>
        <td align="left"><strong>RPD</strong></td>
        <td align="center"><strong>:</strong></td>
        <td align="left"><strong> <?php echo $data2['rps'];?> </strong></td>
        </tr>
		<tr>
        <td align="left"><strong>Riwayat Penyakit Sebelumnya</strong></td>
        <td align="center"><strong>:</strong></td>
        <td align="left"><strong> <?php echo $data2['rps'];?> </strong></td>
        </tr>
		<tr>
        <td align="left"><strong>Riwayat Penyakit Keluarga</strong></td>
        <td align="center"><strong>:</strong></td>
        <td align="left"><strong> <?php echo $data2['rpk'];?> </strong></td>
        </tr>
		<tr>
        <td align="left"><strong>Kebiasaan</strong></td>
        <td align="center"><strong>:</strong></td>
        <td align="left"><strong><?php echo $data2['kebiasaan'];?> </strong></td>
        </tr>      
		<tr>
        <td align="left"><strong>Alergi</strong></td>
        <td align="center"><strong>:</strong></td> 
		<td align="left"><strong>Obat :<?php echo $data2['alergi_obat'];?>............................. Lain-Lain : <?php echo $data2['alergi_lain'];?></strong></td>
        </tr>
      <tr>
        <td colspan="6"><br /></td>
        </tr>
      <tr>
        <td colspan="6">
                                <table width="100%" border="1">
                                    <thead>
                                        <tr>
                                            <th width="75"><div align="center">TGL</div></th>
                                            <th width="150"><div align="center">Pemeriksaan</div></th>
                                            <th width="35"><div align="center">B/L</div></th>
                                            <th width="35"><div align="center">K/L</div></th>
                                            <th width="100"><div align="center">Diagnosa</div></th>
											<th width="100"><div align="center">Tindakan</div></th>
											<th width="100"><div align="center">Rujukan</div></th>
											<th width="100">Pemeriksa</th>
                                        </tr>
                                    </thead>
                                    <tbody>

<tr>
		<tr>
        <td><strong><?php echo $data2['tgl_daftar'];?></strong></td>
        <td><strong><?php echo $data2['pemeriksaan'];?></strong></td>
        <td><strong></strong></td>
        <td><strong></strong></td>
        <td><strong><?php echo $data2['diagnosa'];?></strong></td>
        <td><strong><?php echo $data2['tindakan'];?></strong></td>
        <td><strong></strong></td>
        <td><strong><?php echo $data2['nama_dokter'];?></strong></td>
        </tr>
</tr>
</tbody>
          </table>
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