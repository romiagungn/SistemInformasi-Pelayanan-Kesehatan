<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Free Bootstrap Admin Template : Binary Admin</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="../../assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="../../assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="../../assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="../../assets/css/custom.css" rel="stylesheet" />
     <!-- DataTimmePicker-->
    <link href="../../asset/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">	
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
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
                     <h2>Daftar List Penerimaan Pesanan Obat</h2>    
                        <h5>Silah cek dengan benar</h5>
                    </div>
                </div>
					<hr>
					<hr>
        
    <!--konten-->    
    <div class="col-sm-12 col-md-12">
        <div class="well">
            <ul class="list-group">
                <li class="list-group-item ">
                    <div class="row">
                        <div class="col-md-4"><h4>Daftar Penerimaan</h4></div>
                        <div class="col-md-3"></div>
                        <div class="col-md-2"></div>
						<div class="col-md-3" align="right"><a href="tambah_penerimaan.php" class="btn btn-info">Tambah Penerimaan</a></div>
                    </div>
                </li>
				<li class="list-group-item">
                    <div class="row">
						<div class="col-md-12"><?php include("penerimaan.php");?></div></div>
				</li>
            </div>
        </div>
    </div>
<!-- end konten -->			
			</div>			
		</div>
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
 	<!-- CUSTOM SCRIPTS -->
    <script src="../../assets/js/custom.js"></script>
	<!--js-->
    <script type="text/javascript" src="../../asset/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
    <script type="text/javascript" src="../../asset/js/locales/bootstrap-datetimepicker.id.js" charset="UTF-8"></script>



		
</body>
</html>