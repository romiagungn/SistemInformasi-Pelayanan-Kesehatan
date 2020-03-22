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
	<link rel="stylesheet" href="../../assets/Validator/css/formValidation.css"/>
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
                     <h2>Daftar Obat Kadaluarsa</h2>   
                        <h5>Silah cek dengan benar</h5>
                    </div>
                </div>
					<hr>
					<hr>
					
			
				<!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             List Data Obat
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
									<thead bgcolor="#eeeeee" align="center">
                                        <tr>
                                        <th>ID Obat</th>
	                                    <th>Nama Obat</th>
                                        <th>Jenis Obat</th>
                                        <th>Jumlah Obat Masuk</th>
                                        <th>Stok Obat Akhir</th>
                                        <th>Tanggal Kadaluarsa</th>
                                        <th>Status</th>
										<th>hancurkan obat</th>
                                       </tr>
                                      </thead>
                                <tbody>
					<?php
						mysql_connect("localhost","root");
						mysql_select_db("db_klinik");
						date_default_timezone_set('Asia/Jakarta');
						include('fungsi_tanggal.php');
						$tanggal=date('Y-m-d');
						$SELECT=mysql_query("SELECT kadaluarsa FROM detail_penerimaan");
						$lihat=mysql_fetch_array($SELECT);
						if($SELECT){
						$kadaluarsa=$lihat['kadaluarsa'];
                        $query = "SELECT detail_penerimaan.*, t_obat.* FROM detail_penerimaan
									INNER JOIN t_obat ON detail_penerimaan.id_obat=t_obat.id_obat";
                        $sql = mysql_query($query);
                        ?>
                        <?php 
                        while ($hasil = mysql_fetch_array($sql))
                        {
                          $id_obat = $hasil ['id_obat'];
                          $nama_obat = $hasil ['nama_obat'];
                          $jenis_obat = $hasil['jenis_obat'];
                          $sisa = $hasil['sisa'];
                          $stok_obat = $hasil['stok_obat'];
                          $kadaluarsa = $hasil['kadaluarsa'];
						  $status='belum kadaluarsa';
									if ($kadaluarsa<=$tanggal){
										$status='kadaluarsa';
									}
						  ?>
	
                        <tr>
                          <td><?php echo $id_obat; ?></td>
                          <td><?php echo $nama_obat; ?></td>
                          <td><?php echo $jenis_obat; ?></td>
                          <td><?php echo $sisa; ?></td>
                          <td><?php echo $stok_obat; ?></td>
                          <td><?php echo jin_date_str($kadaluarsa); ?></td>
						  <?php
						  if($status=='belum kadaluarsa'){
							  echo"<td style='color:green;'><b>belum Kadaluarsa</b></td>
							  <td style='color:green;'><b>tidak ada</b></td>";
						  }
							   else{
							  echo"<td style='color:red;'><b>KADALUARSA</b></td>
							 <td><center> <a href='hancurkan_obat.php?id_obat=$id_obat&kadaluarsa=$kadaluarsa' class='btn btn-danger' title='Hancurkan obat ini $id_obat $kadaluarsa' onClick='return confirm('ANDA YAKIN AKAN MENGHANCURKAN OBAT INI ... ?')'><i class='glyphicon glyphicon-trash'></i></a> 
</center></td>";
							   }
						  ?>
                        </tr>
                        <?php
                        }
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
			<!--Akhir Page Kedua-->
			
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

	<!-- DATA TABLE SCRIPTS -->
    <script src="../../assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="../../assets/js/dataTables/dataTables.bootstrap.js"></script>
    <script>
		$(document).ready(function () {
			$('#dataTables-example').dataTable();
		});
    </script>
	      <!-- CUSTOM SCRIPTS -->
    <script src="../../assets/js/custom.js"></script>
		<script type="text/javascript" src="../assets/Validator/js/formValidation.js"></script>
	<script type="text/javascript" src="../assets/Validator/js/framework/bootstrap.js"></script>

</body>
</html>
<?php
if(isset($_GET['act'])){
$id_obat=$_GET['id_obat'];
$query=mysql_query("DELETE FROM t_obat WHERE id_obat='$id_obat'");
if($query ){
  echo"<script>
  alert('berhasil di hapus');
  document.location.href='obat.php';
  </script>";
}
else{
  mysql_error();
}


}
?>