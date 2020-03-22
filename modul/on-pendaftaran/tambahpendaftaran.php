<?php
  /* tanggal */
  include "fungsi_tanggal.php";
  mysql_connect("localhost","root");
	mysql_select_db("db_klinik");
include"conn.php";
 $hari_ini=jin_date_sql(date("Y-m-d"));
  date_default_timezone_set('Asia/Jakarta');
	$jam=date("H:i:s");		
?>
<?php
  /* Koneksi ke Database */
  mysql_connect("localhost","root");
  mysql_select_db("db_klinik");
  /*-------------------------------*/
  function OtomatisID2()
  {
  $querycount="SELECT count(id_daftar) as LastID FROM t_daftar";
  $result=mysql_query($querycount) or die(mysql_error());
  $row=mysql_fetch_array($result, MYSQL_ASSOC);
  return $row['LastID'];
  }

  function FormatPendaftaran($num) {
          $num=$num+1; 
      switch (strlen($num))
          {    
          case 1 : $No = "DF"."-"."00".$num; break;
          case 2 : $No = "DF"."-"."0".$num; break;
          case 3 : $No = "DF"."-"."".$num; break;
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
font-size: 16px;"> <?php echo date("d-m-Y");?> - <?php echo $jam=date("H:i:s");	;?> &nbsp;Klinik Green Care Bandung &nbsp; <a href="./../../logout.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
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
                     <h2>Proses Penginputan Data Pendaftaran Pasien</h2>   
                        <h5>Silah cek dengan benar</h5>
                    </div>
                </div>
                 <hr />
                <hr />
				
				
							<!--main content start-->
				  <section id="main-content">
					<section class="wrapper">
					  <h3><i class="glyphicon glyphicon-file"></i> Data &raquo; Pendaftaran</h3>
						<div class="row mt">
						  <div class="col-lg-12">
							<form class="form-horizontal style-form" id="cetak" action="proses_tambahPendaftaran.php" method="POST" ENCTYPE = "multipart/form-data">
							  <div class="form-panel col-lg-12">
												   
								<button type="Reset" class="btn btn-danger">Reset</button>
								<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="glyphicon glyphicon-search"></i>Find</button>                        
							  <br>		
							  <div class="col-lg-12 main-chart">
							  <div class="form-group">
									  <div class="col-sm-6">
										<input type="hidden" class="form-control" name="id_daftar" value="<?php echo $LastID= FormatPendaftaran(OtomatisID2()); ?>" readonly="true">
																				</div>
									</div>
									<div class="form-group">
									  <label class="col-sm-2 control-label">ID Pasien</label>
										<div class="col-sm-6">
										  <input type="text" class="form-control" name="id_pasien" id="id_pasien" readonly="true">
										</div>
									</div>
									<div class="form-group">
									  <label class="col-sm-2 control-label">Nama Pasien</label>
										<div class="col-sm-6">
										  <input type="text" class="form-control" name="nama_pasien" id="nama_pasien" readonly="true">
										</div>
									</div>
									<div class="form-group">
									  <label class="col-sm-2 control-label">Alamat</label>
										<div class="col-sm-6">
										  <textarea class="form-control" rows="3" name="alamat" id="alamat" readonly="true"></textarea>
										</div>
									</div>
									<div class="form-group">
									  <label class="col-sm-2 control-label">Keluhan</label>
										<div class="col-sm-6">
										  <textarea class="form-control" rows="3" name="keluhan" id="keluhan"></textarea>
										</div>
									</div>
									<div class="form-group">
									  <label class="col-sm-2 control-label">Ruang Rawat</label>
										<div class="col-sm-6">
										  <select class="form-control" name="id_dokter">
											<option>--- Pilih Ruang Rawat ---</option>
												<?php
												$query = mysql_query("SELECT id_dokter, nama_dokter, ruang_rawat FROM t_dokter");
												  if(mysql_num_rows($query) != 0){
													while($row = mysql_fetch_array($query)){
													$id_dokter = strip_tags($row['id_dokter']);
													$nama_dokter = strip_tags($row['nama_dokter']);
													$ruang_rawat = strip_tags($row['ruang_rawat']);
													?>
													<option value ="<?php echo $id_dokter ; ?>"><?php echo $ruang_rawat  ; ?>&nbsp-&nbsp<?php echo $nama_dokter; ?></option>
												<?php
												  }
												}
												?>
										</select>
										</div>
									</div>
									<div class="form-group">
									  <label class="col-sm-2 control-label">Tanggal Daftar</label>
										<div class="col-sm-6">
										  <input type="text" class="form-control" name="tgl_daftar" value="<?php echo $hari_ini;?>">
										</div>
									</div>
									<div class="form-group">
									  <label class="col-sm-2 control-label">Jam Daftar</label>
										<div class="col-sm-6">
										  <input type="text" class="form-control" name="jam" value="<?php echo $jam;?>">
										</div>
									</div>								
								</div>
							  </div>
							  <!--start-->
									<div class="form-panel col-lg-6">
									  <div class="col-lg-12 centered">
										<button type="Reset" name="reset" value="Reset" class="btn btn-danger">Reset</button>
										<a href="pendaftaran.php" type="button" class="btn btn-default">Kembali</a>
										<button type="submit" name="SIMPAN" value="SIMPAN" class="btn btn-primary">Simpan Tambah Data</button>
									  </div>
									</div>
									<!--end-->
							</form>    
						  </div><!-- col-lg-12-->       
						</div><!-- /row -->
					  </section>
				  </section>
				<!--main content end-->
				
				<!--  Modals starts-->
                        <div class="panel-body">
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									<div class="modal-dialog" style="width:1000px">
									  <div class="modal-content">
										<div class="modal-header">
										  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										  <h4 class="modal-title" id="myModalLabel">Data Pasien</h4>
								</div>
										<div class="modal-body">
										<table class="table table-striped table-bordered table-hover" id="dataTables-example">
										<thead>
                                        <tr>
											<th>ID Pasien</th>
											<th>Nama Pasien</th>
											<th>Tanggal Lahir</th>
											<th>Tempat Lahir</th>
											<th>Jenis Kelamin</th>
											<th>agama</th>
											<th>No Telepon</th>
											<th>alamat</th>
											<th>Jenis Pembayaran</th>
										 </tr>
										</thead>
							<tbody>
									  <?php
									  
										mysql_connect('localhost', 'root', '');
										mysql_select_db('db_klinik');
										$query = mysql_query('SELECT id_pasien, nama_pasien, tgl_lahir, tempat_lahir, jenis_kelamin, agama, no_hp, alamat, jenis_bayar from t_pasien ');
									  while ($data = mysql_fetch_array($query)) {
									  ?>
									  <tr class="pilih" ip="<?php echo $data['id_pasien']; ?>" np="<?php echo $data['nama_pasien']; ?>" tl="<?php echo $data['tgl_lahir']; ?>" tpt="<?php echo $data['tempat_lahir']; ?>" jp="<?php echo $data['jenis_kelamin']; ?>" ag="<?php echo $data['agama']; ?>" nh="<?php echo $data['no_hp']; ?>" al="<?php echo $data['alamat']; ?>">
										<td><?php echo $data['id_pasien']; ?></td>
										<td><?php echo $data['nama_pasien']; ?></td>
										<td><?php echo $data['tgl_lahir']; ?></td>
										<td><?php echo $data['tempat_lahir']; ?></td>
										<td><?php echo $data['jenis_kelamin']; ?></td>
										<td><?php echo $data['agama']; ?></td>
										<td><?php echo $data['no_hp']; ?></td>
										<td><?php echo $data['alamat']; ?></td>
										<td><?php echo $data['jenis_bayar']; ?></td>
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
                     <!-- End Modals-->

                    </div>
					</div>
					</div>


    <!-- JQUERY SCRIPTS -->
    <script src="../../assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="../../assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="../../assets/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="../../assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="../../assets/js/dataTables/dataTables.bootstrap.js"></script>
	<script type="text/javascript" src="../../assets/Validator/js/formValidation.js"></script>
	<script type="text/javascript" src="../../assets/Validator/js/framework/bootstrap.js"></script>
	<script type="text/javascript">

     $(document).on('click', '.pilih', function (e) {
        document.getElementById("id_pasien").value = $(this).attr('ip');
		document.getElementById("nama_pasien").value = $(this).attr('np');
		document.getElementById("alamat").value = $(this).attr('al');
        $('#myModal').modal('hide');
    });
    $(function () {
        $("#lookup").dataTable();
    });
	</script>
	<script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
	<!--End Datatables -->
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
  $('#cetak')
        .formValidation({
            framework: 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
           excluded: ':disabled',
            fields: {
                keluhan: {
                    validators: {
                        notEmpty: {
                            message: 'Kolom `keluhan` masih Kosong'
                        },
                    regexp: {
                        regexp: /^[a-zA-Z\s]+$/,
                        message: 'kolom keluhan harus diisi dengan huruf saja'
                    }
                    }
                },
				id_dokter: {
                    validators: {
                        notEmpty: {
                            message: 'Kolom `ruang rawat` belum dipilih'
                        }
                    }
                },
				jenis_bayar: {
                    validators: {
                        notEmpty: {
                            message: 'Jenis Pembayaran belum dipilih'
                        }
                    }
                }
            }
        })
});
</script>
<script type="text/javascript">
$(document).ready(function(){
	  $('#tampil_bpjs').hide();
 $('#tampil_asuransi').hide();
  $('#tampil_nama').hide();

});
 function jenis() {

 if (document.getElementById('tunai').checked) {
 $('#tampil_bpjs').hide();
 $('#tampil_asuransi').hide();
 $('#tampil_nama').hide();
 }
 else if (document.getElementById('bpjs').checked) {
 $('#tampil_bpjs').show();
 $('#tampil_asuransi').hide();
 $('#tampil_nama').hide();
 }
 else if (document.getElementById('asuransi').checked) {
	 $('#tampil_bpjs').hide();
 $('#tampil_asuransi').show();
 $('#tampil_nama').show();
 }
 
	
 }
 
</script>
</body>
</html>
