<?php 	
	mysql_connect("localhost","root");
	mysql_select_db("db_klinik"); 
	  date_default_timezone_set('Asia/Jakarta');
$id_pasien = $_GET['id_pasien'];
$query=mysql_query("SELECT * FROM t_pasien WHERE id_pasien='$id_pasien'");
$data=mysql_fetch_array($query);

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sistem Informasi Pelayanan Kesehatan Klinik Green Care Bandung</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="../../assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="../../assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
   
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
font-size: 16px;"> <?php echo date("d-m-Y");?> - <?php echo $jam=date("H:i:s");	;?> &nbsp;Klinik Green Care Bandung &nbsp; <a href="./../../logout.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
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
                        <a class="active-menu" href="pasien.php"><i class="fa fa-qrcode fa-3x"></i> Data Pasien</a>
                    </li>
					<li>
                        <a  href="pendaftaran.php"><i class="glyphicon glyphicon-list fa-2x"></i> Data Pendaftaran</a>
                    </li>	
                </ul>
            </div>
        </nav> 
		
		
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Proses Pengeditan Data Pasien</h2>   
                        <h5>Silah edit dengan benar</h5>
                    </div>
                </div>
					<hr>
					<hr>
					
				
			<!--main content start-->
				  <section id="main-content">
					<section class="wrapper">

							 <form class="form-horizontal style-form" id="pasien" method="POST" ENCTYPE = "multipart/form-data">
								<blockquote>
								Data Pasien
								</blockquote>
								<div class="form-panel col-lg-12">
								<br>
								<div class="col-lg-12 main-chart">
								<div class="col-lg-4">
									<div class="form-group">
									  <label class="col-sm-4 control-label">ID Pasien</label>
										<div class="col-sm-8">
										  <input type="text" class="form-control" name="id_pasien" id="id_pasien" class="form-control span2 tip" readonly="readonly" value="<?php echo $data['id_pasien'];?>">
										</div>
									</div>
									<div class="form-group">
									  <label class="col-sm-4 control-label">Umur</label>
										<div class="col-sm-8">
										  <input type="text" class="form-control" name="umur" id="umur" value="<?php echo $data['umur'];?>">
										</div>
									</div>
									<div class="form-group">
									  <label class="col-sm-4 control-label">Agama</label>
										<div class="col-sm-8">
										  <select class="form-control" name="agama">
												<option><?php echo $data['agama'];?></option>
												<option>--- Pilih Agama ---</option>
                                                <option>Islam</option>
                                                <option>Kristen</option>
                                                <option>Budha</option>
                                                <option>Hindu</option>
                                                <option>Konghucu</option>
                                            </select>
										</div>
									</div>
									<div class="form-group">
									  <label class="col-sm-4 control-label">Status</label>
										<div class="col-sm-8">
										  <select class="form-control" name="status">
												<option><?php echo $data['status'];?></option>
												<option>--- Pilih Status ---</option>
                                                <option>Belum Menikah</option>
                                                <option>Menikah</option>
                                            </select>
										</div>
									</div>
									<div class="form-group">
									  <label class="col-sm-4 control-label">Penjamin</label>
										<div class="col-sm-8">
										<input type="text" class="form-control" name="penjamin" id="penjamin" value="<?php echo $data['penjamin'];?>">
										</div>
									</div>
										<div class="form-group">
											<label class="col-sm-5 control-label">Jenis Pembayaran</label>
											<div class="col-sm-7">
												<div class="radio">
													<label>
														<input type="radio" name="jenis_bayar" id="tunai" value="tunai" onclick="jenis()"/>Tunai
													</label>
												</div>
												<div class="radio">
													<label>
														<input type="radio" name="jenis_bayar" value="bpjs" id="bpjs" onclick="jenis()"/>BPJS
													</label>
												</div>
												<div class="radio">
													<label>
														<input type="radio" name="jenis_bayar" value="asuransi" id="asuransi" onclick="jenis()" />Asuransi
													</label>
												</div>
											</div>
										</div>
									<div class="form-group" id="tampil_bpjs">
									  <label class="col-sm-4 control-label">no bpjs</label>
										<div class="col-sm-8">
										  <input type="text" class="form-control" name="no_bpjs">
										</div>
									</div>
									<div class="form-group" id="tampil_asuransi">
									  <label class="col-sm-4 control-label">No Asuransi</label>
										<div class="col-sm-8">
										  <input type="text" class="form-control" name="no_asuransi">
										</div>
									</div>
									<div class="form-group" id="tampil_nama">
									  <label class="col-sm-5 control-label">Nama Perusahaan</label>
										<div class="col-sm-7">
										  <input type="text" class="form-control" name="nama_perusahaan">
										</div>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="form-group">
									  <label class="col-sm-5 control-label">Nama Pasien</label>
										<div class="col-sm-7">
										  <input type="text" class="form-control" name="nama_pasien" id="nama_pasien" value="<?php echo $data['nama_pasien'];?>">
										</div>
									</div>
									<div class="form-group">
									  <label class="col-sm-5 control-label">Tempat Lahir</label>
										<div class="col-sm-7">
										  <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" value="<?php echo $data['tempat_lahir'];?>">
										</div>
									</div>
									<div class="form-group">
									  <label class="col-sm-5 control-label">No Telepon</label>
										<div class="col-sm-7">
										  <input type="text" class="form-control" name="no_hp" id="no_hp" value="<?php echo $data['no_hp'];?>">
										</div>
									</div>
									<div class="form-group">
									  <label class="col-sm-5 control-label">Pekerjaan</label>
										<div class="col-sm-7">
										<input type="text" class="form-control" name="pekerjaan" id="pekerjaan" value="<?php echo $data['pekerjaan'];?>">
										</div>
									</div>
									<div class="form-group">
									  <label class="col-sm-4 control-label">Alamat Kantor</label>
										<div class="col-sm-8">
										  <textarea class="form-control" rows="3" name="alamat_kantor" id="kantor" value="<?php echo $data['alamat_kantor'];?>"><?php echo $data['alamat_kantor'];?></textarea>
										</div>
									</div>
								</div>
								<div class="col-lg-4">
								<div class="form-group">
									  <label class="col-sm-4 control-label">Tanggal Lahir</label>
										<div class="col-sm-8">
										  <input type="date" value="date(D-m-y)" class="form-control" name="tgl_lahir" id="tgl_lahir" value="<?php echo $data['tgl_lahir'];?>">
										</div>
									</div>
									<div class="form-group">
									  <label class="col-sm-5 control-label">Jenis Kelamin</label>
										<div class="col-sm-7">
										  <select class="form-control" name="jenis_kelamin">
												<option><?php echo $data['jenis_kelamin'];?></option>
												<option> Pilih Jenis Kelamin </option>
                                                <option>Pria</option>
                                                <option>Wanita</option>
                                            </select>
										</div>
									</div>
									<div class="form-group">
									  <label class="col-sm-4 control-label">Alamat</label>
										<div class="col-sm-8">
										  <textarea class="form-control" rows="3" name="alamat" id="alamat" value="<?php echo $data['alamat'];?>"><?php echo $data['alamat'];?></textarea>
										</div>
									</div>
								</div>
								</div>
								</div>
								
								<br>
								<br>
		
						<div class="form-panel col-lg-12">
						<div class="col-lg-12 main-chart">	
						<br>
						<br>
						<blockquote>
						Riwayat Pasien
						</blockquote>
							<div class="col-lg-6">
									<div class="form-group">
									  <label class="col-sm-6 control-label">Riwayat Penyakit Sebelumnya</label>
										<div class="col-sm-6">
										  <input type="text" class="form-control" name="rps" id="rps" class="form-control span2 tip" value="<?php echo $data['rps'];?>">
										</div>
									</div>
									<div class="form-group">
									  <label class="col-sm-6 control-label">Alergi Obat</label>
										<div class="col-sm-6">
										  <input type="text" class="form-control" name="alergi_obat" id="alergi" value="<?php echo $data['alergi_obat'];?>">
										</div>
									</div>
									<div class="form-group">
									  <label class="col-sm-6 control-label">Alergi Lainnya</label>
										<div class="col-sm-6">
										  <input type="text" class="form-control" name="alergi_lain" id="alergi" value="<?php echo $data['alergi_lain'];?>">
										</div>
									</div>
								</div>
								<div class="col-lg-6">
								<div class="form-group">
									  <label class="col-sm-6 control-label">Riwayat Penyakit Keluarga</label>
										<div class="col-sm-6">
										  <input type="text" class="form-control" name="rpk" id="rpk" class="form-control span2 tip" value="<?php echo $data['rpk'];?>">
										</div>
									</div>
									<div class="form-group">
									  <label class="col-sm-5 control-label">Kebiasaan</label>
										<div class="col-sm-7">
										<input type="text" class="form-control" name="kebiasaan" id="kebiasaan" class="form-control span2 tip" value="<?php echo $data['kebiasaan'];?>">
										</div>
									</div>
								</div>

								</div>
								</div>
						
							  <!--end-->
									<!--start-->
									<div class="form-panel col-lg-6">
									  <div class="col-lg-12 centered">
										<a href="pasien.php" type="button" class="btn btn-default">Kembali</a>
										<button type="submit" name="ubah" value="ubah" class="btn btn-primary">Edit Data</button>
									  </div>
									</div>
									<!--end-->
							</form>    
					  </section>
				  </section>
				<!--main content end-->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="../../assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="../../assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="../../assets/js/jquery.metisMenu.js"></script>
	<script type="text/javascript" src="../../assets/Validator/js/formValidation.js"></script>
	<script type="text/javascript" src="../../assets/Validator/js/framework/bootstrap.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	  $('#tampil_bpjs').hide();
 $('#tampil_asuransi').hide();
  $('#tampil_nama').hide();

});
 function jenis() {

 if (document.getElementById('tunai').checked) {
 $('#tampil_bpjs').hide();
 $('#tampil_asuransi').hide();
 $('#tampil_nama').hide();
 }
 else if (document.getElementById('bpjs').checked) {
 $('#tampil_bpjs').show();
 $('#tampil_asuransi').hide();
 $('#tampil_nama').hide();
 }
 else if (document.getElementById('asuransi').checked) {
	 $('#tampil_bpjs').hide();
 $('#tampil_asuransi').show();
 $('#tampil_nama').show();
 }
 
	
 }
 
</script>				
</body>
</html>				
				
<?php
include("conn.php");
    if(isset($_POST['ubah'])){
	$id_pasien = $_POST['id_pasien'];
	$nama_pasien = $_POST['nama_pasien'];
	$tgl_lahir = $_POST['tgl_lahir'];
	$umur = $_POST['umur'];
	$tempat_lahir = $_POST['tempat_lahir'];
	$jenis_kelamin = $_POST['jenis_kelamin'];
	$agama = $_POST['agama'];
	$no_hp = $_POST['no_hp'];
	$alamat = $_POST['alamat'];
	$status = $_POST['status'];
	$pekerjaan = $_POST['pekerjaan'];
	$rps = $_POST['rps'];
	$rpk = $_POST['rpk'];
	$alergi_obat = $_POST['alergi_obat'];
	$kebiasaan = $_POST['kebiasaan'];
	$alamat_kantor = $_POST['alamat_kantor'];
	$penjamin = $_POST['penjamin'];
	$alergi_lain = $_POST['alergi_obat'];
	$jenis_bayar = $_POST['jenis_bayar'];
	$no_bpjs=$_POST['no_bpjs'];
	$no_asuransi=$_POST['no_asuransi'];
	$nama_perusahaan=$_POST['nama_perusahaan'];

				//update k tabel peserta
				$query2="UPDATE t_pasien SET nama_pasien='$nama_pasien', tgl_lahir='$tgl_lahir', umur='$umur', tempat_lahir='$tempat_lahir',
											jenis_kelamin='$jenis_kelamin', agama='$agama', no_hp='$no_hp', alamat='$alamat', status='$status',
											pekerjaan='$pekerjaan', rps='$rps', rpk='$rpk', alergi_obat='$alergi_obat', kebiasaan='$kebiasaan',
											alamat_kantor='$alamat_kantor', penjamin='$penjamin', alergi_lain='$alergi_lain' 
											, jenis_bayar='$jenis_bayar', no_bpjs='$no_bpjs', no_asuransi='$no_asuransi', nama_perusahaan='$nama_perusahaan'WHERE id_pasien='$id_pasien'";
				$exec_p=mysql_query($query2)or die('error :'. mysqli_error($query2));


if( $exec_p){
            echo"   <script language='javascript'>
                            alert('Data Pasien Berhasil diubah');
                           document.location.href='pasien.php'
                        </script>";
            }else{
             echo"<script language='javascript'>
                       alert('Gagal');
                       document.location.href='pasien.php'
                    </script> ";
            }   
        }
?>
