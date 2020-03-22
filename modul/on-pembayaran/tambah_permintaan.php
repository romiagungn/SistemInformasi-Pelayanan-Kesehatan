<?php
  /* Koneksi ke Database */
  session_start();
  mysql_connect("localhost","root");
  mysql_select_db("db_klinik");
  	  date_default_timezone_set('Asia/Jakarta');
  /*-------------------------------*/
function OtomatisID()
{
$querycount="SELECT count(id_permintaan) as LastID FROM permintaan";
$result=mysql_query($querycount) or die(mysql_error());
$row=mysql_fetch_array($result, MYSQL_ASSOC);
return $row['LastID'];
}

function FormatNoPermintaan($num) {
        $num=$num+1; 
		$bulan = date("m");
		$tahun = date("y");
		switch (strlen($num))
        {    
        case 1 : $NoTrans = "OP"."-".$bulan."-".$tahun."-"."000".$num; break;    
        case 2 : $NoTrans = "OP"."-".$bulan."-".$tahun."-"."00".$num; break;    
        case 3 : $NoTrans = "OP"."-".$bulan."-".$tahun."-"."0".$num; break;    
        default: $NoTrans = $num;       
        }          
        return $NoTrans;
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
     <!-- DataTimmePicker-->
    <link href="../../asset/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">	 
     <!-- TABLE STYLES-->
    <link href="../../assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
     <!-- FORM VALIDATOR-->	
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
                     <h2>Daftar Tambah Permintaan Pemesanan</h2>   
                        <h5>Silah isi dengan benar</h5>
                    </div>
                </div>
					<hr>
					<hr>
					
<!--konten-->    
    <div class="col-sm-12 col-md-12">
        <div class="well">
            <ul class="list-group">
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-md-4"><h4>Tambah Permintaan Pesanan Obat</h4></div>
                        <div class="col-md-3"></div>
                        <div class="col-md-2"></div>
                        <div class="col-md-3" align="right"><a href="lihat_permintaan.php" class="btn btn-info">Lihat Data Permintaan</a></div>
                    </div>
                </li>
				
                <li class="list-group-item">
				<?php    if((empty($_POST["destroy"])==FALSE)){
         session_destroy();

		}?>
                   <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
				   	   <div class="form-group">
                        <label class="control-label col-sm-3">No Permintaan :</label>
                            <div class="col-sm-3"> 
                                <input class="form-control" size="10" readonly type="text" name="Noper" value="<?php echo $LastID= FormatNoPermintaan(OtomatisID()); ?>" id="Noper">
                          </div>
                     <label class="control-label col-sm-3">Tanggal :</label>
                            <div class="col-sm-3"> 
                                <input class="form-control" size="10" readonly type="text" name="tanggal" value="<?php date_default_timezone_set("Asia/Jakarta");echo date("d-m-Y");?>" id="tanggal">
                          </div>
                      </div>
					  
					  <div class="form-group">
					  <label class="control-label col-sm-3">Nama Obat :</label>
					  <div class="col-sm-3"> 
					  <input type="hidden" class="form-control" name="id_obat" id="id_obat" readonly="" />
                        <input type="text" class="form-control" name="nama_obat" id="nama_obat" placeholder="Nama Obat" readonly="" />
						
                       </div>
					   <div class="col-sm-3">
					   <button type="button"size="10" class="btn btn-info" data-toggle="modal" data-target="#myModal"><b>Cari</b> <span class="glyphicon glyphicon-search"></span></button>
					  </div>
					  </div>
					 <div class="form-group"> 
					  	<label class="control-label col-sm-3">Supplier :</label>
                        <div class="col-sm-3">
						<input type="hidden" class="form-control" name="id_supplier" id="id_supplier" readonly="" />
                        <input class="form-control" size="10" type="text" name="nama_supplier" id="nama_supplier" placeholder="Nama Supplier">
                        </div>
					<div class="col-sm-3">
					   <button type="button"size="10" class="btn btn-info" data-toggle="modal" data-target="#myModal1"><b>Cari</b> <span class="glyphicon glyphicon-search"></span></button>
					  </div>
					</div>	
					  <div class="form-group">
                        <label class="control-label col-sm-3">Jumlah :</label>
                        <div class="col-sm-3"> 
                          <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Masukan Jumlah">
                   </div>
						<div class="col-sm-2" >
                          <button   size="10" type="submit" name="tambah" class="btn btn-primary">Tambah</button>
                        </div>
                      </div>
                    </form>
					
				<!--  Modals starts-->
                        <div class="panel-body">
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									<div class="modal-dialog" style="width:1000px">
									  <div class="modal-content">
										<div class="modal-header">
										  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										  <h4 class="modal-title" id="myModalLabel">Data Obat</h4>
								</div>
										<div class="modal-body">
										<table class="table table-striped table-bordered table-hover" id="dataTables-example">
										<thead>
                                        <tr>
											<th>ID Obat</th>
											<th>Nama Obat</th>
											<th>Jenis Obat</th>
											<th>Harga Obat</th>
											<th>Stok Obat Awal</th>
											<th>Stok Obat Akhir</th>
                                </tr>
										</thead>
							<tbody>
                                <?php
                                //Data mentah yang ditampilkan ke tabel    
                                mysql_connect('localhost', 'root', '');
                                mysql_select_db('db_klinik');
                                $query = mysql_query('SELECT * FROM t_obat WHERE stok_obat<=200');
                                while ($data = mysql_fetch_array($query)) {
                                    ?>
                                    <tr class="pilih" data-obat="<?php echo $data['id_obat']; ?>" nama-obat="<?php echo$data['nama_obat'];?>">
                                        <td><?php echo $data['id_obat']; ?></td>
                                        <td><?php echo $data['nama_obat']; ?></td>
										<td><?php echo $data['jenis_obat']; ?></td>
										<td><?php echo $data['harga_obat']; ?></td>
										<td><?php echo $data['stok_obat_awal']; ?></td>
										<td><?php echo $data['stok_obat']; ?></td>
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
                    <!--End Advanced Tables -->
					
						<!--  Modals starts-->
                        <div class="panel-body">
                            <div class="modal fade" id="myModal1" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									<div class="modal-dialog" style="width:1000px">
									  <div class="modal-content">
										<div class="modal-header">
										  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										  <h4 class="modal-title" id="myModalLabel">Data Obat</h4>
								</div>
										<div class="modal-body">
										<table class="table table-striped table-bordered table-hover" id="tabel_supplier">
										<thead>
                                        <tr>
											<th>ID Supplier</th>
											<th>Nama Supplier</th>
											<th>Alamat Supplier</th>
											<th>No Supplier</th>
                                </tr>
										</thead>
							<tbody>
                                <?php
                                //Data mentah yang ditampilkan ke tabel    
                                mysql_connect('localhost', 'root', '');
                                mysql_select_db('db_klinik');
                                $query1 = mysql_query('SELECT * FROM supplier');
                                while ($data2 = mysql_fetch_array($query1)) {
                                    ?>
                                    <tr class="pilih1" data-supplier="<?php echo $data2['id_supplier']; ?>" nama-supplier="<?php echo $data2['nama_supplier'];?>">
                                        <td><?php echo $data2['id_supplier']; ?></td>
                                        <td><?php echo $data2['nama_supplier']; ?></td>
										<td><?php echo $data2['alamat_supplier']; ?></td>
										<td><?php echo $data2['no_supplier']; ?></td>
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
                    <!--End Advanced Tables -->
	<?php
		
			include 'data_permintaan.php';
		
	
	?>		
			   </li>
            </ul>		    
            </div>
        </div>
<!-- end konten -->			
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
     <!-- MORRIS CHART SCRIPTS -->
     <script src="../../assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="../../assets/js/morris/morris.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="../../assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="../../assets/js/dataTables/dataTables.bootstrap.js"></script>
	<!-- DateTimePicker SCRIPTS -->
    <script type="text/javascript" src="../../asset/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
    <script type="text/javascript" src="../../asset/js/locales/bootstrap-datetimepicker.id.js" charset="UTF-8"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
   <script type="text/javascript">
            $(document).on('click', '.pilih', function (e) {
                document.getElementById("nama_obat").value = $(this).attr('nama-obat');
				document.getElementById("id_obat").value = $(this).attr('data-obat');
                $('#myModal').modal('hide');
            });
			

            $(function () {
                $("#dataTables-example").dataTable();
            });
        </script>
   <script type="text/javascript">
            $(document).on('click', '.pilih1', function (e) {
                document.getElementById("nama_supplier").value = $(this).attr('nama-supplier');
				document.getElementById("id_supplier").value = $(this).attr('data-supplier');
                $('#myModal1').modal('hide');
            });
			

            $(function () {
                $("#tabel_supplier").dataTable();
            });
        </script>
	<!-- CUSTOM SCRIPTS -->
    <script src="../../assets/js/custom.js"></script>
    <script type="text/javascript">
     $('.form_date').datetimepicker({
            language:  'id',
            weekStart: 1,
            todayBtn:  1,
      autoclose: 1,
      todayHighlight: 1,
      startView: 2,
      minView: 2,
      forceParse: 0
        });
    </script>

		
</body>
</html>