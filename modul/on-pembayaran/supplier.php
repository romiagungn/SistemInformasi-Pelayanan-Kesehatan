<?php
session_start();
/**
 * Jika Tidak login atau sudah login tapi bukan sebagai admin
 * maka akan dibawa kembali kehalaman login atau menuju halaman yang seharusnya.
 */
if ( !isset($_SESSION['user_login']) || 
    ( isset($_SESSION['user_login']) && $_SESSION['user_login'] != 'pembayaran' ) ) {
 
 header('location:./../../login.php');
 exit();
}
	  date_default_timezone_set('Asia/Jakarta');
?>
<?php
	mysql_connect("localhost", "root");
	mysql_select_db("db_klinik");
	  date_default_timezone_set('Asia/Jakarta');
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
                        <a  href="index.php"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                    </li>
                     <li>
                        <a  href="proses.php"><i class="fa fa-desktop fa-3x"></i> Lihat Proses</a>
                    </li>
					<li>
                        <a class="active-menu" href="supplier.php"><i class="fa fa-desktop fa-3x"></i>Data Supplier</a>
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
                     <h2>Tampilan Data Supplier</h2>   
                        <h5>Silah cek dengan benar</h5>
                          <div class="pull-left">
                            <a href="tambahsupplier.php" class="btn btn-sm btn-primary">Tambah Data</a>
                            </div>
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
                
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            List Data Supplier
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
									<thead bgcolor="#eeeeee" align="center">
                                        <tr>
                                        <th>ID Supplier</th>
	                                    <th>Nama Supplier</th>
                                        <th>Alamat Perusahaan</th>
                                        <th>No Telepon</th>
	                                    <th> action</th> 
	  
                                       </tr>
                                      </thead>
                                <tbody>
						<?php
                        $query = "SELECT id_supplier, nama_supplier, alamat_supplier, no_supplier FROM supplier";
                        $sql = mysql_query($query);
                        ?>
                        <?php 
                        while ($hasil = mysql_fetch_array($sql))
                        {
                          $id_supplier = $hasil ['id_supplier'];
                          $nama_supplier = $hasil ['nama_supplier'];
                          $alamat_supplier = $hasil['alamat_supplier']; 
                          $no_supplier = $hasil['no_supplier'];
                          
                        ?>
                        <tr>
                          <td><?php echo $id_supplier; ?></td>
                          <td><?php echo $nama_supplier; ?></td>
                          <td><?php echo $alamat_supplier; ?></td>
                          <td><?php echo $no_supplier; ?></td>
                          <td class="center">
                            <div class="centered">
                              <a href="editPasien.php?act=edit&id_pasien=<?php echo $id_pasien;?>" class="btn btn-success" title="Edit"><i class="glyphicon glyphicon-pencil"></i></a>
                              <a href="supplier.php?act=del&id_supplier=<?php echo $id_supplier;?>" class="btn btn-warning" title="Delete"><i class="glyphicon glyphicon-trash"></i></a>
							   </div>
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
                    <!--End Advanced Tables -->
            </div>
            </div>            
            </div>
            </div>
                <!-- /. ROW  -->
                 <!-- /. ROW  -->        
                 <!-- /. ROW  -->           
    </div>
             <!-- /. PAGE INNER  -->
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
    <script src="../../assets/js/custom.js"></script>
    
   
</body>
</html>
<?php
if(isset($_GET['act'])){
$id_supplier=$_GET['id_supplier'];
$query=mysql_query("DELETE FROM supplier WHERE id_supplier='$id_supplier'");
if($query ){
  echo"<script>
  alert('berhasil di hapus');
  document.location.href='supplier.php';
  </script>";
}
else{
  mysql_error();
}


}
?>