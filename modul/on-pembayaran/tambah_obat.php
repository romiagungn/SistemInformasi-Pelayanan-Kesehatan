<?php
  /* Koneksi ke Database */
  mysql_connect("localhost","root");
  mysql_select_db("db_klinik");
  	  date_default_timezone_set('Asia/Jakarta');
  /*-------------------------------*/
  function OtomatisID2()
  {
  $querycount="SELECT count(id_obat) as LastID FROM t_obat";
  $result=mysql_query($querycount) or die(mysql_error());
  $row=mysql_fetch_array($result, MYSQL_ASSOC);
  return $row['LastID'];
  }

  function FormatObat($num) {
          $num=$num+1; 
      switch (strlen($num))
          {    
          case 1 : $No = "OB"."-"."00".$num; break;
          case 2 : $No = "OB"."-"."0".$num; break;
          case 3 : $No = "OB"."-"."".$num; break;
          default: $No = $num;       
          }          
          return $No;
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
                     <h2>Proses Penginputan Data Obat</h2>   
                        <h5>Silah cek dengan benar</h5>
                    </div>
                </div>
					<hr>
					<hr>
					
			<!-- /. TAB SIDE  -->		
		<div class="col-md-12 col-sm-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Form Obat
                        </div>
		  <section id="main-content">
			<section class="wrapper">
				&nbsp &nbsp <blockquote>
				Tambah Data Obat
				</blockquote>						
				<form id="obat" class="form-horizontal row-fluid" action="proses_tambahObat.php" method="post">
					<div class="form-group">
						<label class="col-md-3 control-label">ID Obat</label>
							<div class="col-md-4 inputGroupContainer">
								<div class="input-group">
								<input type="text" name="id_obat" class="form-control" value="<?php echo $LastID= FormatObat(OtomatisID2()); ?>" readonly="">
								<span class="input-group-addon"><span class="glyphicon glyphicon-globe"></span></span>
								</div>
							</div>
						</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Nama Obat</label>
							<div class="col-md-4 inputGroupContainer">
								<div class="input-group">
								<input type="text" name="nama_obat" class="form-control" placeholder="Nama Obat..">
								<span class="input-group-addon"><span class="glyphicon glyphicon-th-list"></span></span>
								</div>
							</div>
						</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Jenis Obat</label>
							<div class="col-md-4 selectContainer">
								<div class="input-group">
									<span class="input-group-addon"><span class="glyphicon glyphicon-tags"></span></span>
										<select class="form-control" name="jenis_obat">
											<option selected>Pilih Jenis Obat</option>
											<option>Kapsul</option>
											<option>Tablet</option>
											<option>Cair</option>
										</select>
									</div>
								</div>
							</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Satuan Obat</label>
							<div class="col-md-4 selectContainer">
								<div class="input-group">
									<span class="input-group-addon"><span class="glyphicon glyphicon-tags"></span></span>
										<select class="form-control" name="satuan">
											<option selected>Pilih Satuan Obat</option>
											<option value="strip">Strip</option>
											<option value="botol">Botol</option>
										</select>
									</div>
								</div>
							</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Harga Obat</label>
							<div class="col-md-4 inputGroupContainer">
								<div class="input-group">
								<input type="text" name="harga_obat" class="form-control" placeholder="Harga Obat..">
								<span class="input-group-addon"><span class="glyphicon glyphicon-usd"></span></span>
								</div>
							</div>
						</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Stok Obat</label>
							<div class="col-md-4 inputGroupContainer">
								<div class="input-group">
								<input type="text" name="stok_obat" class="form-control" placeholder="Stok Obat yang ada.." value="0" readonly="true">
								<span class="input-group-addon"><span class="glyphicon glyphicon-shopping-cart"></span></span>
								</div>
							</div>
						</div>
						<button type="submit" name="SIMPAN" value="SIMPAN" class="btn btn-primary">Save changes</button>
					  </section>
				  </section>
				<!--main content end-->
			
                            </div>
                        </div>
                    </div>
                </div>
				<!-- /. END TAB SIDE  -->
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
<!-- Konfig #formEdit -->
<script type="text/javascript">
$(document).ready(function() {
     function adjustIframeHeight() {
        var $body   = $('body'),
                $iframe = $body.data('iframe.fv');
        if ($iframe) {
            // Adjust the height of iframe
            $iframe.height($body.height());
        }
    }
  $('#obat')
        .formValidation({
            framework: 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
           excluded: ':disabled',
            fields: {
                nama_obat: {
                    validators: {
                        notEmpty: {
                            message: 'Kolom `nama obat` masih Kosong'
                        },
                    regexp: {
                        regexp: /^[a-zA-Z\s]+$/,
                        message: 'Kolom nama obat tidak boleh angka'
                    }
                    }
                },
				jenis_obat: {
                    validators: {
                        notEmpty: {
                            message: 'Kolom `jenis obat` belum dipilih'
                        }
                    }
                },
				harga_obat: {
                    validators: {
                        notEmpty: {
                            message: 'Kolom `harga obat` masih Kosong'
                        },
                    numeric: {
                        message: 'Kolom harga harus angka saja'
                    }
                    }
                }
            }
        })
});
</script>
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