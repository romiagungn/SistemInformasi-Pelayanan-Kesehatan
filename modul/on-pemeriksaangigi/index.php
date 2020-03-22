<?php
session_start();
/**
 * Jika Tidak login atau sudah login tapi bukan sebagai admin
 * maka akan dibawa kembali kehalaman login atau menuju halaman yang seharusnya.
 */
if ( !isset($_SESSION['user_login']) || 
    ( isset($_SESSION['user_login']) && $_SESSION['user_login'] != 'pemeriksaangigi' ) ) {
 
 header('location:./../../login.php');
 exit();
}
	  date_default_timezone_set('Asia/Jakarta');
?>
<?php
include "conn.php";
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
                        <a href="rekammedis.php"><i class="fa fa-sitemap fa-3x"></i>Rekam Medis<span class="fa arrow"></span></a>
                      </li>	
                </ul>
            </div>
        </nav>  
		
		
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
		<?php
		mysql_connect("localhost", "root");
		mysql_select_db("db_klinik");
		$query = "SELECT * FROM t_user WHERE level_user='pemeriksaan'";
        $sql = mysql_query($query);
		?>
		<?php 
		while ($hasil = mysql_fetch_array($sql))
		{
		  $nama = $hasil ['nama'];                         
        ?>	
                     <h2>Selamat Datang <?php echo $nama; ?> Di Halaman Pemeriksaan Poli Gigi</h2>   
                        <h5>Sistem Informasi Pelayanan Kesehatan </h5>
		<?php } ?>
<div class="form-group">
<label class="col-md-12" align="center"><h3><br>KLinik Green Care</h3></label>
<label class="col-md-12" align="center"><h3>Alamat : Jl.Cipamokolan no.22, Rancasari, Kota Bandung, Jawa Barat ,Indonesia</h3></label>
<label class="col-md-12" align="center"><h3>Pendaftaran dibuka setiap hari (senin-sabtu ) : jam 08:00 – 19:00</h3></label>
<label class="col-md-12" align="center"><h3>HUBUNGI KLINIK GREEN CARE 022 7563115</h3></label>
</div>
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
			
 <?php
if(isset($_GET['pages'])){ 
if($_GET['pages']=="lap1"){
	include "laporan.php";
	}
else if($_GET['pages']=="lap2"){
	include "laporan1.php";
	}
}
?>
                 <!-- /. ROW  -->        
                 <!-- /. ROW  -->           
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
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
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
