<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
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
                     <h2>Tampilan Data Pembayaran Pasien yang Sudah ada</h2>                     
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">

                       
                        <div class="panel-heading">
                        <h3 class="panel-title"><i class="icon-user"></i> Data Pasien</h3> 
                        </div>
                        <div class="panel-body">
                        <a href="tambah_pembayaran.php"><input type="button" class="btn btn-sm btn-primary"  value="Tambah Pembayaran" ></a>
                                    <table id="tabel_bayar" class="table table-bordered table-hover"><br>  
	                                   <thead bgcolor="#eeeeee" align="center">
                                       <br>  
                                       <tr>
                                        <th>ID Pembayaran</th>
                                        <th>Nama Pasien</th>
	                                    <th>Tanggal Keluar</th>
	                                    <th>Jam Keluar</th>
                                        <th>aksi</th>
                                       </tr>
                                      </thead>
                                      <tbody>
                                      <?php
									  $tanggal=date('Y-m-d');
                                      include"koneksi.php";
                                      $query=mysql_query("SELECT t_pembayaran.*, t_daftar.*, t_pasien.* from t_pembayaran
													     INNER JOIN t_daftar on t_pembayaran.id_daftar=t_daftar.id_daftar
														 INNER JOIN t_pasien on t_daftar.id_pasien=t_pasien.id_pasien");
                                      while ($data=mysql_fetch_array($query)){
                                        ?>
                                      <tr>
                                      <td><?php echo $data['no_pembayaran'];?></td>
                                      <td><?php echo $data['nama_pasien'];?></td>
                                      <td><?php echo $data['tanggal'];?></td>
                                      <td><?php echo $data['jam_keluar'];?></td>
                                      <td>
									<a href="detail_pembayaran.php?nmr=<?php echo $data['no_pembayaran']; ?>" class="btn btn-info" title='lihat detail penerimaan'><i class="glyphicon glyphicon-tasks"></i></a>
									<a href="cetak_bayar.php?no_pembayaran=<?php echo $data['no_pembayaran'];?>" class="btn btn-info" title="Cetak Kartu Catatan Penyakit"><i class="glyphicon glyphicon-print"></i></a>
									<a href="?&aksi=hapus&nmr=<?php echo $data['no_pembayaran']; ?>" class="btn btn-info" title="Hapus Data Ini" onclick="return confirm('ANDA YAKIN AKAN MENGHAPUS DATA PENTING INI ... ?')"><i class="glyphicon glyphicon-trash"></i></a> 
									</td>
                                      </tr>
<?php
}
?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            </div>
                            </div>                            
                    
                                    
                            </div>
                            
                        </div>
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
     <!-- DATA TABLE SCRIPTS -->
    <script src="../../assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="../../assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
  $(document).ready(function() {
		  $(document).ready(function () {
                $('#tabel_bayar').dataTable();
            });
    </script>
   
</body>
</html>
<?php
if($_GET){
	if($_GET["act"]){
		$del = "DELETE FROM t_pembayaran WHERE no_pembayaran='".$_GET["nmr"]."'";
		$del2 = "DELETE FROM detail_pembayaran WHERE no_pembayaran='".$_GET["nmr"]."'";
		$delDb = mysql_query($del,$conn) or die("Error hapus data ".mysql_error());
		$delDb2 = mysql_query($del2,$conn) or die("Error hapus data ".mysql_error());
		if($delDb && $delDb2){
			echo "<meta http-equiv='refresh' content='0; url=?'>";
		}
	}
}
?>