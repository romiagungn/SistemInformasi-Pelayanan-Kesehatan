<?php
session_start();
session_unset('isi');
date_default_timezone_set('Asia/Jakarta');
?>

<!DOCTYPE>
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
                     <h2>Proses Tambah Pembayaran</h2>   
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               
			   
		<section id="main-content">
		<section class="wrapper">   
            <div class="row mt">
                <div class="col-lg-12">
                        <h3 class="panel-title"><i class="icon-user"></i> Data Pembayaran</h3> 
                        </div>
                        <div class="panel-body">
                        <form name="form1" id="form1" class="form-horizontal row-fluid" action="tambah_pembayaran2.php" method="GET" >
						<div class="form-panel col-lg-12">
						<div class="col-lg-12 main-chart">
						<br>
                            <div class="form-group">
                               <label class="col-sm-2" for="basicinput">ID Rekam Medis</label>
								  <div class="col-sm-6">
									  <input type="text" name="id_rekam" id="id_rekam" placeholder="" value="" readonly="readonly">     
									  <input type="button" value=" Cari Rekamedis" class="btn btn-primary  " data-toggle="modal" data-target="#myModal">
                                        </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2" for="basicinput">Antrian</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="antrian" id="antrian" readonly="" required>
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="col-sm-2" for="basicinput">ID Daftar</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="id_daftar" id="id_daftar" readonly="" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2" for="basicinput">Nama Pasien</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="nama_pasien" id="nama_pasien" readonly="" required>
                                            </div>
                                        </div>

                                       									
										<div class="form-group">
                                            <label class="col-sm-2" for="basicinput">Saran</label>
                                            <div class="col-sm-6">
                                               <textarea name="saran" class="form-control" id="saran" style="width:100%;" readonly="" required> </textarea>
                                            </div>
                                        </div>
										
                                        <br>
                                         <div class="form-group">
                                            <input type="submit" name="simpan" value="lanjut pembayaran" class="btn btn-success">
                                            </div>
                                        </div>
                                        </div>
                                        </div>
                             </form>
                         </div>
					</div>
				</section>	
				</section>	
				</div>
			</div>
                       

                    
                    <!-- Modal Data Rekam Medis -->        
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Data Rekamedis</h4>
                                        </div>
                                        <div class="modal-body">
                                          <table id="tabel_modal_rm" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Antrian</th>
                                    <th>ID Rekamedis</th>
                                    <th>Nama Obat</th>
                                    <th>Saran</th>
                                    <th>Tanggal Daftar</th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php
                                //Data mentah yang ditampilkan ke tabel    
                                mysql_connect('localhost', 'root', '');
                                mysql_select_db('db_klinik');
								$tanggal=date('Y-m-d');
								$query2=mysql_query("SELECT t_daftar.*, t_pasien.*, t_rekam.* FROM t_rekam 
													INNER JOIN t_daftar ON t_rekam.id_daftar=t_daftar.id_daftar
													INNER JOIN t_pasien ON t_daftar.id_pasien=t_pasien.id_pasien
													and t_daftar.tgl_daftar='$tanggal'");
								while($data2=mysql_fetch_array($query2)) {
								//	$data=mysql_fetch_array(mysql_query("SELECT * FROM t_daftar WHERE id_daftar='".$data2['id_daftar']."'"));
							//	$data=mysql_fetch_array(mysql_query("SELECT t_daftar.*, t_pasien.* FROM t_daftar 
																///	INNER JOIN t_pasien ON t_daftar.id_pasien=t_pasien.id_pasien
																//	WHERE id_daftar='".$data2['id_daftar']."'"));									
                                    ?>
                                    <tr class="pilih" id-rekam="<?php echo $data2['id_rekam'];  ?>" 
                                    id-daftar="<?php echo $data2['id_daftar'];?>"
									antrian="<?php echo $data2['antrian'];?>"
									saran="<?php echo $data2['saran']; ?>" 
									nama="<?php echo $data2['nama_pasien']; ?>">
									
                                        <td><?php echo $data2['antrian']; ?></td>
                                        <td><?php echo $data2['id_rekam']; ?></td>
                                        <td><?php echo $data2['nama_pasien']; ?></td>
                                        <td><?php echo $data2['saran']; ?></td>
                                        <td><?php echo $data2['tgl_daftar']; ?></td>
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
                <!-- END MODAL -->                           


 
        
  
                                          

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
     <script type="text/javascript">

            $('#myModal').on('click', '.pilih', function (e) {
                document.getElementById("id_rekam").value = $(this).attr('id-rekam');
                document.getElementById("id_daftar").value = $(this).attr('id-daftar');
                document.getElementById("antrian").value = $(this).attr('antrian');
                document.getElementById("nama_pasien").value = $(this).attr('nama');
			                document.getElementById("saran").value = $(this).attr('saran');
                $('#myModal').modal('hide');
            });

    $(document).ready(function() {
   $('#tabel_modal_rm').DataTable();
} );
        </script> 
         <!-- CUSTOM SCRIPTS -->
    <script src="../../assets/js/custom.js"></script>
      
 
     <script type="text/javascript">

            $('#modal_cari_obat').on('click', '.pilih', function (e) {
                document.getElementById("id_obat").value = $(this).attr('id-obat');
                document.getElementById("nama_obat").value = $(this).attr('nama-obat');
                document.getElementById("jenis_obat").value = $(this).attr('jenis-obat');
                document.getElementById("harga").value = $(this).attr('harga');
                document.getElementById("stok").value = $(this).attr('stok');
                $('#modal_cari_obat').modal('hide');
            });

    $(document).ready(function() {
   $('#tabel_modal_obat').DataTable();
} );
        </script>       
   

</body>
</html>
