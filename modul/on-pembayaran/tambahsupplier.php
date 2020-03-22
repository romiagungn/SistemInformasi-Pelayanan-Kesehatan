<?php
  /* Koneksi ke Database */
  mysql_connect("localhost","root");
  mysql_select_db("db_klinik");
  	  date_default_timezone_set('Asia/Jakarta');
  /*-------------------------------*/
  function OtomatisID2()
  {
  $querycount="SELECT count(id_supplier) as LastID FROM supplier";
  $result=mysql_query($querycount) or die(mysql_error());
  $row=mysql_fetch_array($result, MYSQL_ASSOC);
  return $row['LastID'];
  }

  function FormatObat($num) {
          $num=$num+1; 
      switch (strlen($num))
          {    
          case 1 : $No = "SP"."-"."00".$num; break;
          case 2 : $No = "SP"."-"."0".$num; break;
          case 3 : $No = "SP"."-"."".$num; break;
          default: $No = $num;       
          }          
          return $No;
  }
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
                                        <a href="lihat_obat.php">Lihat Obat</a>
                                    </li>
                                    <li>
                                        <a href="lihat_obatKadaluarsa.php">Lihat Obat yang Kadaluarsa</a>
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
                     <h2>Proses Penginputan Data Supplier</h2>   
                        <h5>Silah cek dengan benar</h5>
                    </div>
                </div>
					<hr>
					<hr>
					
			<!-- /. TAB SIDE  -->		
		<div class="col-md-12 col-sm-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Form Tambah Supplier
                        </div>
		  <section id="main-content">
			<section class="wrapper">
				&nbsp &nbsp <blockquote>
				Tambah Data Supplier
				</blockquote>						
				<form id="obat" class="form-horizontal row-fluid" action="proses_tambahSupplier.php" method="post">
					<div class="form-group">
						<label class="col-md-3 control-label">ID Supplier</label>
							<div class="col-md-4 inputGroupContainer">
								<div class="input-group">
								<input type="text" name="id_supplier" class="form-control" value="<?php echo $LastID= FormatObat(OtomatisID2()); ?>" readonly="">
								<span class="input-group-addon"><span class="glyphicon glyphicon-globe"></span></span>
								</div>
							</div>
						</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Nama Supplier</label>
							<div class="col-md-4 inputGroupContainer">
								<div class="input-group">
								<input type="text" name="nama_supplier" class="form-control" placeholder="Nama Supplier..">
								<span class="input-group-addon"><span class="glyphicon glyphicon-th-list"></span></span>
								</div>
							</div>
						</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Alamat Supplier</label>
							<div class="col-md-4 inputGroupContainer">
								<div class="input-group">
								<textarea class="form-control" rows="3" name="alamat_supplier" id="alamat_supplier" placeholder="Alamat Supplier.."></textarea>
								<span class="input-group-addon"><span class="glyphicon glyphicon-usd"></span></span>
								</div>
							</div>
						</div>
						
					<div class="form-group">
						<label class="col-md-3 control-label">No Telepon</label>
							<div class="col-md-4 inputGroupContainer">
								<div class="input-group">
								<input type="text" name="no_supplier" class="form-control" placeholder="No Telepon Supplier..">
								<span class="input-group-addon"><span class="glyphicon glyphicon-shopping-cart"></span></span>
								</div>
							</div>
						</div>
						<button type="submit" name="SIMPAN" value="SIMPAN" class="btn btn-primary">Tambah Data</button>
						<a href="supplier.php"  type="button" class="btn btn-danger">Kembali</a>
						<br><br>
					  </section>
				  </section>
				<!--main content end-->
			
                            </div>
                        </div>
                    </div>
                </div>
				<!-- /. END TAB SIDE  -->
				</div>

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
</body>
</html>