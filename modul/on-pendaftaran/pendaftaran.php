<!DOCTYPE html>
<?php  
	mysql_connect("localhost", "root");
	mysql_select_db("db_klinik");
	  date_default_timezone_set('Asia/Jakarta');
?>
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
                        <a  href="pasien.php"><i class="fa fa-qrcode fa-3x"></i> Data Pasien</a>
                    </li>
					<li>
                        <a class="active-menu" href="pendaftaran.php"><i class="glyphicon glyphicon-list fa-2x"></i> Data Pendaftaran</a>
                    </li>
					
                </ul>
            </div>
        </nav>
		
		
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Tampilan Data Pendaftaran Pasien yang Sudah ada</h2>   
                        <h5>Silah cek dengan benar</h5>
                          <div class="pull-left">
                            <a href="tambahpendaftaran.php" class="btn btn-sm btn-primary">Tambah Data</a>
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
                             List Data Pendaftaran
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
									<thead bgcolor="#eeeeee" align="center">
                                        <tr>
                                        <th>ID Pasien</th>
                                        <th>Keluhan</th>
                                        <th>Ruang Rawat </th>
                                        <th>Jenis Bayar</th>
                                        <th>Tanggal Masuk</th>
                                        <th>Jam Masuk</th>
                                        <th>Nomor antrian</th>
	                                    <th>action</th> 
	  
                                       </tr>
                                      </thead>
                                <tbody>
						<?php
						$tanggal=date('Y-m-d');
                        $query = "SELECT t_daftar.*, t_dokter.*, t_pasien.* FROM t_daftar 
                                  INNER JOIN t_dokter ON t_daftar.id_dokter=t_dokter.id_dokter
                                  INNER JOIN t_pasien ON t_daftar.id_pasien=t_pasien.id_pasien
								  and t_daftar.tgl_daftar='$tanggal'";
                        $sql = mysql_query($query);
                        ?>
                        <form action="admin_proses.php" method="post" ENCTYPE = "multipart/form-data"></td>
                        <?php 
                        while ($hasil = mysql_fetch_array($sql))
                        {
						              $id_daftar = $hasil ['id_daftar'];
                          $id_pasien = $hasil ['id_pasien'];
                          $keluhan = $hasil['keluhan'];
                          $id_dokter = $hasil['id_dokter'];
                          $jenis_bayar = $hasil['jenis_bayar'];
            						  $tgl_daftar = $hasil['tgl_daftar'];
            						  $jam_daftar = $hasil['jam_daftar'];
            						  $antrian = $hasil['antrian'];
            						  $nama_dokter = $hasil['nama_dokter'];
            						  $ruang_rawat = $hasil['ruang_rawat'];
						  
                          
                        ?>
                        <tr>

                          <td><?php echo $id_pasien; ?></td>
                          <td><?php echo $keluhan; ?></td>
                          <td><?php echo $nama_dokter; ?>-<?php echo $ruang_rawat; ?></td>
                          <td><?php echo $jenis_bayar; ?></td>
                          <td><?php echo $tgl_daftar; ?></td>
                          <td><?php echo $jam_daftar; ?></td>
                          <td><?php echo $antrian; ?></td>
                          <td class="center">
                            <div class="centered">
                              <a href="pendaftaran.php?act=del&id_daftar=<?php echo $id_daftar;?>" class="btn btn-warning" title="Delete"><i class="glyphicon glyphicon-trash"></i></i> Hapus</a>
                            </div>
                            </td>
                        </tr>
                          
                        <?php

                        }
                        ?>
                        </form>
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
            <div class="row">
                <div class="col-md-6">
                 
                </div>
            </div>
                <!-- /. ROW  -->
        </div>
               
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
     <!-- /. WRAPPER  -->

    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="../../assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="../../assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="../../assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->

     <!-- DATA TABLE SCRIPTS -->
  <script src="../../assets/datatables/js/jquery-1.11.2.min.js"></script>
  <script src="../../assets/js/bootstrap.js"></script>
  <script src="../../assets/datatables/jquery.dataTables.js"></script>
  <script src="../../assets/datatables/dataTables.bootstrap.js"></script>
  <link rel="stylesheet" href="../../assets/asset/datatables/dataTables.bootstrap.css">
       <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
	 


</body>
</html>
<?php
if(isset($_GET['act'])){
$id_daftar=$_GET['id_daftar'];
$query=mysql_query("DELETE FROM t_daftar WHERE id_daftar='$id_daftar'");
$query2=mysql_query("DELETE FROM t_proses WHERE id_daftar='$id_daftar'");
if($query ){
  echo"<script>
  alert('berhasil di hapus');
  document.location.href='pendaftaran.php';
  </script>";
}
else{
  mysql_error();
}


}
?>