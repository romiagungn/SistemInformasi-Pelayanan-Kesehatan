<?php
session_start();
include('fungsi_tanggal.php');
?>

<!DOCTYPE>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sistem Informasi Pelayanan Kesehatan Klinik Green Care Bandung</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="../../assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="../../assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="../../assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
     <!-- TABLE STYLES-->
    <link href="../../assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Green Care</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"><?php echo date("d-m-Y");?> - <?php echo $jam=date("H:i:s");	;?> &nbsp;Klinik Green Care Bandung &nbsp;<a href="./../../logout.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
          <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="../../assets/img/find_user.png" class="user-image img-responsive"/>
					</li>
                    <li>
                        <a href="index.php"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                    </li>
                     <li>
                        <a  href="proses.php"><i class="fa fa-desktop fa-3x"></i> Lihat Proses</a>
                    </li>
					<li>
                        <a  href="supplier.php"><i class="fa fa-desktop fa-3x"></i>Data Supplier</a>
                    </li>					
                    <li>
                        <a href="#"><i class="fa fa-sitemap fa-3x"></i>Obat<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="tambah_obat.php">Tambah Obat</a>
                            </li>
                            <li>
                                <a href="#">List Daftar Obat<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                     <li>
                                        <a href="lihat_obat.php">List Daftar Obat</a>
                                    </li>
                                    <li>
                                        <a href="lihat_obatKadaluarsa.php">List Daftar Obat Kadaluarsa</a>
                                    </li>

                                </ul>
                            </li>
							<li>
                                <a href="#">Retur Obat<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="retur_obat.php">Retur Obat</a>
                                    </li>
                                    <li>
                                        <a href="lihat_retur.php">Lihat Retur Obat</a>
                                    </li>

                                </ul>
                            </li>
							<li>
                                <a href="#">Penerimaan Obat<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="tambah_penerimaan.php">Tambah Data Penerimaan</a>
                                    </li>
                                    <li>
                                        <a href="lihat_penerimaan.php">List Data Penerimaan</a>
                                    </li>

                                </ul>
                               
                            </li>
							<li>
                                <a href="#">Permintaan Obat<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="tambah_permintaan.php">Tambah Data Permintaan</a>
                                    </li>
                                    <li>
                                        <a href="lihat_permintaan.php">List Data Permintaan</a>
                                    </li>

                                </ul>
                               
                            </li>
                        </ul>
                      </li>  
                    <li>
                        <a class="active-menu" href="pembayaran.php"><i class="fa fa-edit fa-3x"></i> Pembayaran </a>
                    </li>	
                </ul>
            </div>
        </nav> 
        <!-- /. NAV SIDE  -->

 

        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Proses Tambah Pembayaran</h2>   
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />

		<section id="main-content">
		<section class="wrapper">   
            <div class="row mt">
                <div class="col-lg-12">
					<h3 class="panel-title"><i class="icon-user"></i> Data Pembayaran</h3>
                        </div>
                        <div class="panel-body">
                        <form name="form1" id="FormBayar" class="form-horizontal row-fluid" action="" method="POST" ENCTYPE = "multipart/form-data">
						<div class="form-panel col-lg-12">
						<div class="col-lg-12 main-chart">
						<br>
										<div class="form-group">
                                            <label class="col-sm-2" for="basicinput">ID Rekam Medis</label>
                                            <div class="col-sm-6">
                                             <input type="text" class="form-control" name="id_rekam" id="id_rekam" value="<?php echo $_GET['id_rekam'] ?>" required readonly>
                                        </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2" for="basicinput">Antrian</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="antrian" id="antrian" 
                                                value="<?php echo $_GET['antrian'] ?>" required readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2" for="basicinput">ID Daftar</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="id_daftar" id="id_daftar" 
                                                value="<?php echo $_GET['id_daftar'] ?>" required readonly>
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="col-sm-2" for="basicinput">Nama Pasien</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="nama_pasien" id="nama_pasien" 
                                                value="<?php echo $_GET['nama_pasien'] ?>" required readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2" for="basicinput">Saran</label>
                                            <div class="col-sm-6">
                                               <textarea name="saran" class="form-control" id="saran" style="width:100%;" readonly><?php echo 
                                             $_GET['saran'] ?> </textarea>
                                            </div>
                                        </div>
										 <div class="form-group">
                                            <label class="col-sm-2" for="basicinput">Resep Obat</label>
                                            <div class="col-sm-6">
											</div>
											</div>
											 <div class="form-group">
                                            
                                            <div class="col-sm-10">
                                               <table class="table table-bordered">
											   <tr>
											   <td><div align="center">No</div></td>
											   <td><div align="center">Nama Obat</div></td>
											   <td><div align="center">Jumlah Obat</div></td>
											   <td><div align="center">Kadaluarsa</div></td>
											   <td><div align="center">Dosis Pemakaian</div></td>
											   <td><div align="center">Harga</div></td>
											   <td><div align="center">Subtotoal</div></td>
											   </tr>
											   <?php
											   mysql_connect('localhost', 'root', '');
												mysql_select_db('db_klinik');
											$data_resep=mysql_query("SELECT detail_resep.*,t_obat.* FROM detail_resep INNER JOIN t_obat ON detail_resep.id_obat=t_obat.id_obat WHERE detail_resep.id_rekam='".$_GET['id_rekam']."'");
											for($i=0;$i<$resep=mysql_fetch_array($data_resep);$i++){
												$no=1+$i;
												$id_resep_obat=$resep['id_obat'];
												$tanggal=date('Y/m/d');
												$data_kadaluarsa=mysql_fetch_array(mysql_query("SELECT * FROM detail_penerimaan WHERE id_obat='$id_resep_obat' AND kadaluarsa>='$tanggal'"));
												$kadaluarsa=$data_kadaluarsa['kadaluarsa'];
												$jumlah_resep_obat=$resep['jumlah_obat'];
												$dosis=$resep['dosis'];
												$nama_obat=$resep['nama_obat'];
												$harga=$resep['harga_obat'];
												$sub=$jumlah_resep_obat*$harga;
												
											?><tr>
											<td><input type="hidden" name="id_obat[]" value="<?php echo $id_resep_obat?>">
											<input type="hidden" name="jumlah_obat[]" value="<?php echo $jumlah_resep_obat?>">
											<input type="hidden" name="kadaluarsa[]" value="<?php echo $kadaluarsa?>">
											<div align="center"><?php echo $no?></div></td>
											  <td><div align="center"><?php echo $nama_obat?></div></td>
											   <td><div align="center"><?php echo $jumlah_resep_obat?></div></td>
											   					   <td><div align="center"><?php echo jin_date_str($kadaluarsa)?></div></td>
											   <td><div align="center"><?php echo $dosis?></div></td>
											   <td><div align="center"><?php echo $harga?></div></td>
											    <td><div align="center"><input readonly type="text" name='sub[]' id="p<?php echo$no;?>" value='<?php echo $sub?>'  class="items"></div></td>
												 </tr>
											   <?php
											}?>
											 <tr>
                                        <th colspan='6'><center>Total Biaya Obat </center></th>
                                        <th><div align="center">
                                            <input type='text' name='total' id='total' readonly></div>
                                        </th>
                                        </tr>
                                        <tr>
                                        <th colspan='6'><center>Biaya Periksa</center></th>
                                        <th><div align="center"><input type='text' name='b_periksa' id='b_periksa' 
                                        value='20000' readonly/></div></th>
                                        </tr>
                                         <tr>
                                        <th colspan='6'><center>Total Biaya</center></th>
                                        <th><div align="center"><input type='text' name='total_biaya' id='total_biaya' 
                                        value='' onkeyup='rubah()' readonly></div></th>
										 </tr>
										 <tr>
                                         <th colspan='6'><center>Total Bayar</center></th>
                                        <th><div align="center"><input type='text' name='total_bayar' id='total_bayar' onkeyup='rubah()'> 
										<p id='error'></p></th></div></tr>
										<tr>
										 <th colspan='6'><center>Kembalian</center></th>
                                        <th><div align="center"><input type='text' name='kembalian' id='kembalian' 
                                         readonly></div></th>
                                        </tr>
											   </table>
											   
											   </div>
                                        </div>
                                 <div class="control-group">
                                 <div class="controls">
                                               <input type="submit" id="bayar" name="simpan" value="Input Pembayaran" class="btn btn-success" style="margin-left: 800px;">
                                            </div>
                                        </div>
                                        </div>
                                        </div>
                             </form>    
</div>
</div>
   </section>                    
   </section>      
</div>
</div>
</div>
  
                                          

    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="../../assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="../../assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="../../assets/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="../../assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="../../assets/js/dataTables/dataTables.bootstrap.js"></script>
     <script type="text/javascript">
            $('#modal_cari_obat').on('click', '.pilih', function (e) {
                document.getElementById("id_obat").value = $(this).attr('id-obat');
                document.getElementById("nama_obat").value = $(this).attr('nama-obat');
                document.getElementById("jenis_obat").value = $(this).attr('jenis-obat');
                document.getElementById("harga").value = $(this).attr('harga');
                document.getElementById("stok").value = $(this).attr('stok');
                $('#modal_cari_obat').modal('hide');
            });

    $(document).ready(function() {
   $('#tabel_modal_obat').DataTable();
} );
</script>
         <!-- CUSTOM SCRIPTS -->
    <script src="../../assets/js/custom.js"></script>
<script>
function getItems(){
 var items = new Array();
 var itemCount = document.getElementsByClassName("items");
 var total = 0;
 var biaya_periksa=20000;

 var id= '';
 for(var i = 0; i < itemCount.length; i++)
 {
   id = "p"+(i+1);
   total = total +  parseInt(document.getElementById(id).value);
 }
document.getElementById('total').value = total;
var total_biaya=total+biaya_periksa;
document.getElementById('total_biaya').value = total_biaya;
return total;
}
getItems();
</script>

<script>
function rubah() {
	var a = parseInt($("#total_biaya").val());
	var b = parseInt($("#total_bayar").val());
	var result = parseInt(b) - parseInt(a) ;
		if  (b < a)
			{
				document.getElementById('error').innerHTML="<strong>Pembayaran Kurang</strong>";
				document.getElementById('kembalian').value = result;
				document.getElementById('bayar').disabled=true;
			}
		else
			{
				$("#kembalian").val(b-a);
				document.getElementById('error').innerHTML="<strong></strong>";
				document.getElementById('kembalian').value = result;
				document.getElementById('bayar').disabled=false;
			}	
}
</script>

</body>
</html>

<?php
mysql_connect('localhost', 'root', '');
mysql_select_db('db_klinik');
include("conn.php");

if(isset($_POST['simpan'])){
$tanggal=date("Y-m-d");
date_default_timezone_set('Asia/Jakarta');
$jam=date("H:i:s");
$total_biaya=$_POST['total_biaya'];
$total_bayar=$_POST['total_bayar'];
$kembalian=$_POST['kembalian'];


		//KODE OTOMATIS
    $nourut = mysql_query("SELECT no_pembayaran FROM t_pembayaran ORDER BY no_pembayaran DESC LIMIT 0,1");
    $data = mysql_fetch_array($nourut);
    $kodeawal=substr($data['no_pembayaran'],5,3)+1;
        if($kodeawal<10){
            $kode='00'.$kodeawal;
        }elseif($kodeawal > 9 && $kodeawal <=99){
            $kode='0'.$kodeawal;
        }else{
            $kode=001;
        }
    $c=$kode; 
    $nopem = "PEM"."-".$c;
	
$id_daftar=$_POST['id_daftar'];
$id_rekam=$_POST['id_rekam'];
$query="INSERT INTO t_pembayaran (no_pembayaran,tanggal,jam_keluar,id_daftar,id_rekam) VALUES ('$nopem','$tanggal','$jam','$id_daftar','$id_rekam')";
$sql=mysql_query($query);
$id_obat=$_POST['id_obat'];
$jumlah_obat=$_POST['jumlah_obat'];
$banyak_id=count($id_obat);
$kadaluarsa=$_POST['kadaluarsa'];
 
for($i=0;$i<$banyak_id;$i++){
    
        $query2="INSERT INTO detail_pembayaran (no_pembayaran, id_obat, jumlah, total_biaya, total_bayar, kembalian) VALUES 
        ('$nopem','$id_obat[$i]','$jumlah_obat[$i]','$total_biaya', '$total_bayar', '$kembalian')";
		$sql2=mysql_query($query2);
		
        $query3=mysql_query("SELECT * FROM t_obat WHERE id_obat='$id_obat[$i]'");
        $data2=mysql_fetch_array($query3);
        $jumlah_awal=$data2['stok_obat'];
        $jumlah_akhir=$jumlah_awal-$jumlah_obat[$i];
        $query4=mysql_query("UPDATE t_obat SET stok_obat='$jumlah_akhir' WHERE id_obat='$id_obat[$i]'");
		
		$query_detail_penerimaan=mysql_query("SELECT * FROM detail_penerimaan WHERE id_obat='$id_obat[$i]' AND kadaluarsa='$kadaluarsa[$i]'");
        $data_detail_pnerimaan=mysql_fetch_array($query_detail_penerimaan);
        $jumlah_sisa_awal=$data_detail_pnerimaan['sisa'];
        $jumlah_sisa_akhir=$jumlah_sisa_awal-$jumlah_obat[$i];
        $query9=mysql_query("UPDATE detail_penerimaan SET sisa='$jumlah_sisa_akhir' WHERE kadaluarsa='$kadaluarsa[$i]' AND id_obat='$id_obat[$i]'") or die(mysqli_error());
		

$query5=mysqli_query($koneksi, "UPDATE t_proses SET p_pembayaran='Tuntas' WHERE id_daftar='$id_daftar'")or die(mysqli_error());
}
if($sql && $sql2 && $query4 && $query5 && $query9){
echo "<script type='text/javascript'>alert('Data berhasil disimpan')</script>";
    echo "<script>document.location.href='pembayaran.php';</script>";
    echo "".mysql_error();
}
else{
	echo "eror".mysql_error();
	
}
}

?>
