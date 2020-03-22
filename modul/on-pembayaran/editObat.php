<?php 	
	mysql_connect("localhost","root");
	mysql_select_db("db_klinik"); 
	  date_default_timezone_set('Asia/Jakarta');
$id= $_GET['id'];
$query=mysql_query("SELECT * FROM t_obat WHERE id_obat='$id'");
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
    <link href="../../assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
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
                        <a class="active-menu" href="index.php"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
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
                        <a  href="pembayaran.php"><i class="fa fa-edit fa-3x"></i> Pembayaran </a>
                    </li>	
                </ul>
            </div>
        </nav>  
		
		<!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Proses Pengeditan Data Obat</h2>   
                        <h5>Silah edit dengan benar</h5>
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
				Edit Data Obat
				</blockquote>						
				<form id="editObat" class="form-horizontal row-fluid" method="post">
					<div class="form-group">
						<label class="col-md-3 control-label">ID Obat</label>
							<div class="col-md-4 inputGroupContainer">
								<div class="input-group">
								<input type="text" name="id_obat" class="form-control" value="<?php echo $data['id_obat'];?>" readonly="">
								<span class="input-group-addon"><span class="glyphicon glyphicon-globe"></span></span>
								</div>
							</div>
						</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Nama Obat</label>
							<div class="col-md-4 inputGroupContainer">
								<div class="input-group">
								<input type="text" name="nama_obat" class="form-control" value="<?php echo $data['nama_obat'];?>">
								<span class="input-group-addon"><span class="glyphicon glyphicon-th-list"></span></span>
								</div>
							</div>
						</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Jenis Obat</label>
							<div class="col-md-4 selectContainer">
								<div class="input-group">
									<span class="input-group-addon"><span class="glyphicon glyphicon-tags"></span></span>
										<select class="form-control" name="jenis_obat">
											<option value="<?php echo $data['jenis_obat'];?>" selected><?php echo $data['jenis_obat'];?></option>
											<option>Pilih Jenis Obat</option>
											<option>Obat Kapsul</option>
											<option>Obat Tablet</option>
											<option>Obat Cair</option>
										</select>
									</div>
								</div>
							</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Satuan Obat</label>
							<div class="col-md-4 selectContainer">
								<div class="input-group">
									<span class="input-group-addon"><span class="glyphicon glyphicon-tags"></span></span>
										<select class="form-control" name="satuan">
											<option selected>Pilih Satuan Obat</option>
											<option value="<?php echo $data['satuan'];?>" selected><?php echo $data['satuan'];?></option>
											<option value="strip">Strip</option>
											<option value="botol">Botol</option>
										</select>
									</div>
								</div>
							</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Harga Obat</label>
							<div class="col-md-4 inputGroupContainer">
								<div class="input-group">
								<input type="text" name="harga_obat" class="form-control" value="<?php echo $data['harga_obat'];?>">
								<span class="input-group-addon"><span class="glyphicon glyphicon-usd"></span></span>
								</div>
							</div>
						</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Stok Obat</label>
							<div class="col-md-4 inputGroupContainer">
								<div class="input-group">
								<input type="text" name="stok_obat" class="form-control" value="<?php echo $data['stok_obat'];?>">
								<span class="input-group-addon"><span class="glyphicon glyphicon-shopping-cart"></span></span>
								</div>
							</div>
						</div>
						<a href="index.php" type="button" class="btn btn-default">Kembali</a>
						<button type="submit" name="ubah" value="ubah" class="btn btn-primary">Simpan Edit</button>
						</form>
					  </section>
				  </section>
				  
				  
				  </div>
				</div>
			  </div>
			</div>
		</body>
		</html>
    <!-- JQUERY SCRIPTS -->
    <script src="../../assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="../../assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="../../assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="../../assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="../../assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="../../assets/js/custom.js"></script>
<?php
include("conn.php");
    if(isset($_POST['ubah'])){
        $id_obat=$_POST['id_obat'];
        $nama_obat=$_POST['nama_obat'];
		$jenis_obat=$_POST['jenis_obat'];
		$harga_obat=$_POST['harga_obat'];
		$stok_obat=$_POST['stok_obat'];
		
				//update k tabel peserta
				$query2="UPDATE t_obat SET nama_obat='$nama_obat', jenis_obat='$jenis_obat',harga_obat='$harga_obat',
							stok_obat='$stok_obat' WHERE id_obat='$id_obat'";
				$exec_p=mysql_query($query2)or die('error :'. mysqli_error($query2));


if( $exec_p){
            echo"   <script language='javascript'>
                            alert('Data Obat Berhasil diubah');
                           document.location.href='index.php'
                        </script>";
            }else{
             echo"<script language='javascript'>
                       alert('Gagal');
                       document.location.href='index.php'
                    </script> ";
            }   
        }
?>