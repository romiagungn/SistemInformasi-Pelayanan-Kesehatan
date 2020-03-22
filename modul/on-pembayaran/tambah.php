<?php
  /* Koneksi ke Database */
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
        case 1 : $NoTrans = "OR"."-".$bulan."-".$tahun."-"."000".$num; break;    
        case 2 : $NoTrans = "OR"."-".$bulan."-".$tahun."-"."00".$num; break;    
        case 3 : $NoTrans = "OR"."-".$bulan."-".$tahun."-"."0".$num; break;    
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
    <div class="col-sm-9 col-md-9">
        <div class="well">
            <ul class="list-group">
                <li class="list-group-item active">
                    <div class="row">
                        <div class="col-md-3"><h4>Tambah Permintaan</h4></div>
                        <div class="col-md-3"></div>
                        <div class="col-md-3"></div>
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
					  <table class="table 5" width="100%" border="0" cellspacing="0" cellpadding="0" class="responsive table table-striped table-bordered">
                            <tr style="background-color:#E8DEBD">
                            <th style="text-align:center">No.</th>
                            <th style="text-align:center">Kode Barang</th>
							<th style="text-align:center">Nama Barang</th>
							<th style="text-align:center">optimum</th>
							<th style="text-align:center">sisa Barang</th>
                            <th style="text-align:center">Jumlah Barang</th>
							<th style="text-align:center">aksi</th>
                            <th style="text-align:center" hidden>ID Barang</th>
              </tr>         
            </table>
					  <div class="form-group">
					  <div class="col-sm-3" >
                          <button   size="10" type="submit" name="tambah" class="btn btn-primary">Tambah</button>
					  </div>
					 </div>
                    </form>
			   </li>
            </ul>		    
            </div>
        </div>
						
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
      <!-- CUSTOM SCRIPTS -->
    <script src="../../assets/js/custom.js"></script>
	<!-- DateTimePicker SCRIPTS -->
    <script type="text/javascript" src="../../asset/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
    <script type="text/javascript" src="../../asset/js/locales/bootstrap-datetimepicker.id.js" charset="UTF-8"></script>
	<!-- DATA TABLE SCRIPTS -->
    <script src="../../assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="../../assets/js/dataTables/dataTables.bootstrap.js"></script>
    <script>
		$(document).ready(function () {
			$('#dataTables-example').dataTable();
		});
    </script>
		<script type="text/javascript" src="../assets/Validator/js/formValidation.js"></script>
	<script type="text/javascript" src="../assets/Validator/js/framework/bootstrap.js"></script>

</body>
</html>