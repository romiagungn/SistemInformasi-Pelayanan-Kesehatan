<?php 	
	mysql_connect("localhost","root");
	mysql_select_db("db_klinik"); 
	  date_default_timezone_set('Asia/Jakarta');
$id = $_GET['id'];
$query=mysql_query("SELECT t_rekam.*, t_daftar.*, t_pasien.*, t_dokter.* FROM t_rekam 
					inner join t_daftar ON t_rekam.id_daftar=t_daftar.id_daftar
					INNER JOIN t_pasien ON t_daftar.id_pasien=t_pasien.id_pasien  
					INNER JOIN t_dokter ON t_daftar.id_dokter=t_dokter.id_dokter");
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
                        <a  href="index.php"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                    </li>
                     <li>
                        <a  href="proses.php"><i class="fa fa-desktop fa-3x"></i> Lihat Proses</a>
                    </li>
					<li>
                        <a class="active-menu" href="rekammedis.php"><i class="fa fa-sitemap fa-3x"></i>Rekam Medis<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="?pages=umum"><i class="fa fa-heart"></i>RM Poli Umum</a>
                            </li>
                            <li>
                                <a href="?pages=gigi"><i class="fa fa-plus-square"></i>RM Poli Gigi</a>
                            </li>
                        </ul>
                      </li>
                </ul>
            </div>
        </nav>
		
		
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Proses Penginputan Data Obat</h2>   
                        <h5>Silah cek dengan benar</h5>
                    </div>
                </div>
					<hr>
					<hr>
	
	<!-- /. TAB SIDE  -->		
		<div class="col-md-12 col-sm-6">
			<div class="panel panel-default">
				<div class="panel-heading">
					Form Edit Obat
				</div>
				
		<section id="main-content">
			<section class="wrapper">
				<blockquote>
				Edit Data Rekam Medis Pasien
				</blockquote>
				<form id="editObat" class="form-horizontal row-fluid" method="post">
					<div class="form-group">
						<label class="col-md-3 control-label">ID Rekam</label>
							<div class="col-md-4 inputGroupContainer">
								<div class="input-group">
								<input type="text" name="id_obat" class="form-control" value="<?php echo $data['id_rekam'];?>" readonly="">
								<span class="input-group-addon"><span class="glyphicon glyphicon-globe"></span></span>
								</div>
							</div>
						</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Nama Pasien</label>
							<div class="col-md-4 inputGroupContainer">
								<div class="input-group">
								<input type="text" name="nama_pasien" class="form-control" value="<?php echo $data['nama_pasien'];?>" readonly="">
								<span class="input-group-addon"><span class="glyphicon glyphicon-globe"></span></span>
								</div>
							</div>
						</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Keluhan</label>
							<div class="col-md-4 inputGroupContainer">
								<div class="input-group">
								<input type="text" name="keluhan" class="form-control" value="<?php echo $data['keluhan'];?>" readonly="">
								<span class="input-group-addon"><span class="glyphicon glyphicon-globe"></span></span>
								</div>
							</div>
						</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Ruang Rawat</label>
							<div class="col-md-4 inputGroupContainer">
								<div class="input-group">
								<input type="text" name="ruang_rawat" class="form-control" value="<?php echo $data['nama_dokter']; ?>-<?php echo $data['ruang_rawat']; ?>" readonly="">
								<span class="input-group-addon"><span class="glyphicon glyphicon-globe"></span></span>
								</div>
							</div>
						</div>
<blockquote>
Hasil Pemeriksaan Dokter
</blockquote>					
	
					<div class="form-group">
						<label class="col-md-3 control-label">Pemeriksaan Fisik</label>
							<div class="col-md-4 inputGroupContainer">
								<div class="input-group">
								<input type="text" name="pemeriksaan" class="form-control" value="<?php echo $data['pemeriksaan'];?>">
								<span class="input-group-addon"><span class="glyphicon glyphicon-globe"></span></span>
								</div>
							</div>
						</div>
						<div class="form-group">
						<label class="col-md-3 control-label">Hasil Diagnosa</label>
							<div class="col-md-4 inputGroupContainer">
								<div class="input-group">
								<input type="text" name="diagnosa" class="form-control" value="<?php echo $data['diagnosa'];?>">
								<span class="input-group-addon"><span class="glyphicon glyphicon-globe"></span></span>
								</div>
							</div>
						</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Tindakan Dokter</label>
							<div class="col-md-4 inputGroupContainer">
								<div class="input-group">
								<textarea class="form-control" rows="3" name="tindakan" value="<?php echo $data['tindakan'];?>"><?php echo $data['tindakan'];?></textarea>
								<span class="input-group-addon"><span class="glyphicon glyphicon-globe"></span></span>
								</div>
							</div>
						</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Resep Obat</label>
							<div class="col-md-7 inputGroupContainer">
								<div class="input-group">
								<textarea class="form-control" rows="4" name="resep_obat" value="<?php echo $data['resep_obat'];?>"><?php echo $data['resep_obat'];?></textarea>
								<span class="input-group-addon">Aturan Pengisian<br>|jumlah obat|,|Nama Obat|,|Dosis|</span>
								</div>
							</div>
						</div>				
					<div class="form-group">
						<label class="col-md-3 control-label">Saran Dokter</label>
							<div class="col-md-4 inputGroupContainer">
								<div class="input-group">
								<input type="text" name="saran" class="form-control" value="<?php echo $data['saran'];?>">
								<span class="input-group-addon"><span class="glyphicon glyphicon-globe"></span></span>
								</div>
							</div>
						</div>
					<div class="form-group">	
						<div class="form-panel col-lg-6">
						  <div class="col-lg-12 centered">
							<a href="rekammedis.php" type="button" class="btn btn-default">Kembali</a>
							<button type="submit" name="ubah" value="ubah" class="btn btn-primary">Ubah Data</button>
						  </div>
						</div>
					</div>
					</form>
				</section>	
			</section>
					</div>
				</div>
			<!-- /. END TAB SIDE  -->	
				</div>
			</div>
			<!-- /. END NAV SIDE  -->
		</div>
<!-- /. END WARPPHER SIDE  -->

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
    <script>
		$(document).ready(function () {
			$('#dataTables-example').dataTable();
		});
    </script>
</body>
</html>
<?php
include("conn.php");
    if(isset($_POST['ubah'])){
	$id_rekam = $_POST['id_rekam'];
	$pemeriksaan = $_POST['pemeriksaan'];
	$diagnosa = $_POST['diagnosa'];
	$tindakan = $_POST['tindakan'];
	$resep_obat = $_POST['resep_obat'];
	$saran = $_POST['saran'];
		
				//update k tabel rekam
				$query2="UPDATE t_rekam SET pemeriksaan='$pemeriksaan', diagnosa='$diagnosa', tindakan='$tindakan',resep_obat='$resep_obat',
							saran='$saran' WHERE id_rekam='$id_rekam'";
				$exec_p=mysql_query($query2)or die('error :'. mysqli_error($query2));


if( $exec_p){
            echo"   <script language='javascript'>
                            alert('Data Rekam Medis Pasien Berhasil diubah');
                           document.location.href='rekammedis.php'
                        </script>";
            }else{
             echo"<script language='javascript'>
                       alert('Gagal');
                       document.location.href='rekammedis.php'
                    </script> ";
            }   
        }
?>