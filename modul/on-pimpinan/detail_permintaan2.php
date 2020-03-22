<?php
	mysql_connect("localhost","root");
	mysql_select_db("db_klinik");
?>

<?php
if($_GET["aksi"] && $_GET["nmr"]){
include('../../fungsi/conn.php');

include '../../fungsi/paging.php'; //include pagination file
	include '../../fungsi/fungsi_tanggal.php';
	//pagination variables
	$hal = (isset($_REQUEST['hal']) && !empty($_REQUEST['hal']))?$_REQUEST['hal']:1;
	$per_hal = 10; //berapa banyak blok
	$adjacents  = 20;
	$offset = ($hal - 1) * $per_hal;
	$reload="?";
	//Cari berapa banyak jumlah data*/
	
	$count_query   = mysql_query("SELECT COUNT(id_permintaan) AS numrows FROM detail_permintaan where id_permintaan='".$_GET["nmr"]."'");
	if($count_query === FALSE) {
    die(mysql_error()); 
	}
	$row     = mysql_fetch_array($count_query);
	$numrows = $row['numrows']; //dapatkan jumlah data
	
	$total_hals = ceil($numrows/$per_hal);

$edit = mysql_query("select * from detail_permintaan where id_permintaan='".$_GET["nmr"]."'");

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
                        <a class="active-menu" href="index.php"><i class="fa fa-dashboard fa-3x"></i>Laporan</a>
                    </li>
                     <li>
                        <a  href="proses.php"><i class="fa fa-desktop fa-3x"></i> Lihat Proses</a>
                    </li>
										<li>
                        <a href="#"><i class="fa fa-sitemap fa-3x"></i>Obat<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
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
                                <a href="#">Permintaan<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="lihat_permintaan2.php">Data Permintaan Belum di ACC</a>
                                    </li>
                                    <li>
                                        <a href="lihat_permintaan3.php">Data Permintaan Sudah di ACC</a>
                                    </li>

                                </ul>
                            </li>
							<li>
                                <a href="#">Penerimaan<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
										<a href="lihat_penerimaan2.php">Lihat Data Penerimaan</a>
                                    </li>
                                </ul>
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
                     <h2>Daftar Permintaan Belum Di ACC</h2>   
                        <h5>Silah Cek dengan benar</h5>
                    </div>
                </div>
					<hr>
					<hr>
        
    <!--konten-->    
    <div class="col-sm-12 col-md-12">
        <div class="well">
            <ul class="list-group">
                <li class="list-group-item active">
                    <div class="row">
                        <div class="col-md-3"><h4>Detail Permintaan</h4></div>
                        <div class="col-md-3"></div>
                        <div class="col-md-3"></div>
                        <div class="col-md-3" align="right"><a href="lihat_permintaan3.php" class="btn btn-info">Lihat Data Permintaan</a></div>
                    </div>
                </li>
				<li>
				<form>
				<table  class="table table-bordered" width="100%" border="0" cellspacing="0" cellpadding="0" class="responsive table table-striped table-bordered">
				<tr>
				<th> NO Permintaan</th>
				<th>Kode Obat</th>
				<th>Nama Obat</th>
				<th>Sisa Stok</th>
				<th>Jumlah di minta </th>
				</tr>
				<?php while ($hasil=mysql_fetch_array($edit)){
					$id_permintaan=$hasil['id_permintaan'];
					$id_obat=$hasil['id_obat'];
					$query2=mysql_query("select * from t_obat where id_obat='$id_obat'");
					$tampil2=mysql_fetch_array($query2);
					$nama_obat=$tampil2['nama_obat'];
					$sisa=$tampil2['stok_obat'];
					$jumlah=$hasil['jumlah'];					
				  ?>
				<tr>
				<td> <?php echo $id_permintaan?> </td>
				<td><?php echo $id_obat?></td>
				<td><?php echo $nama_obat?></td>
				<td><?php echo $sisa?></td>
				<td><?php echo $jumlah?></td>
				</tr>
				<?php }
				?>
				</table>
					<?php
echo paginate($reload, $hal, $total_hals, $adjacents);
?>
				</form>
				
				</li>
           </ul>
                
            
            </div>
        </div>
    </div>
    <!--end konten--> 
    
    </div>
    </div>
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
    <script src="../../assets/js/custom.js"></script>    
</body>
</html>