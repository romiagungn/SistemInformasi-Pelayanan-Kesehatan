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
                     <h2>Tampilan Data Pasien yang Sudah ada</h2>   
                        <h5>Silah cek dengan benar</h5>
                          <div class="pull-left">
                            <a href="tambahpasien.php" class="btn btn-sm btn-primary">Tambah Data</a>
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
                            List Data
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
									<thead bgcolor="#eeeeee" align="center">
                                        <tr>
                                        <th>ID Pasien</th>
	                                    <th>Nama </th>
                                        <th>Tanggal Lahir </th>
                                        <th>Tempat Lahir</th>
                                        <th>Jenis Kelamin </th>
                                        <th>Alamat </th>
	                                    <th> action</th> 
	  
                                       </tr>
                                      </thead>
                                <tbody>
						<?php
                        $query = "SELECT id_pasien, nama_pasien, tgl_lahir, tempat_lahir ,jenis_kelamin, alamat FROM t_pasien";
                        $sql = mysql_query($query);
                        ?>
                        <?php 
                        while ($hasil = mysql_fetch_array($sql))
                        {
                          $id_pasien = $hasil ['id_pasien'];
                          $nama_pasien = $hasil ['nama_pasien'];
                          $tgl_lahir = $hasil['tgl_lahir']; 
                          $tempat_lahir = $hasil['tempat_lahir'];
                          $jenis_kelamin = $hasil['jenis_kelamin'];
                          $alamat = $hasil['alamat'];
                          
                        ?>
                        <tr>
                          <td><?php echo $id_pasien; ?></td>
                          <td><?php echo $nama_pasien; ?></td>
                          <td><?php echo $tgl_lahir; ?></td>
                          <td><?php echo $tempat_lahir; ?></td>
                          <td><?php echo $jenis_kelamin; ?></td>
                          <td><?php echo $alamat; ?></td>
                          <td class="center">
                            <div class="centered">
                              <a href="editPasien.php?act=edit&id_pasien=<?php echo $id_pasien;?>" class="btn btn-success" title="Edit"><i class="glyphicon glyphicon-pencil"></i></a>
                              <a href="pasien.php?act=del&id_pasien=<?php echo $id_pasien;?>" class="btn btn-warning" title="Delete"><i class="glyphicon glyphicon-trash"></i></a>
                              <a href="cetak.php?id_pasien=<?php echo $id_pasien;?> " class="btn btn-info" title="Cetak Kartu Berobat"><i class="glyphicon glyphicon-print"></i></a>
                              <a href="cetak_kartuCP.php?act=cetak&id_pasien=<?php echo $id_pasien;?>" class="btn btn-danger" title="Cetak Kartu Catatan Penyakit"><i class="glyphicon glyphicon-print"></i></a>
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
            <div class="row">
                <div class="col-md-6">
                 
                </div>
            </div>
                <!-- /. ROW  -->
        </div>
               
    </div>
 
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
         <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>

</body>
</html>
<?php
if(isset($_GET['act'])){
$id_pasien=$_GET['id_pasien'];
$query=mysql_query("DELETE FROM t_pasien WHERE id_pasien='$id_pasien'");
if($query ){
  echo"<script>
  alert('berhasil di hapus');
  document.location.href='pasien.php';
  </script>";
}
else{
  mysql_error();
}


}
?>