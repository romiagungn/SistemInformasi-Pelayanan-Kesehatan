<?php
  /* Koneksi ke Database */
  mysql_connect("localhost","root");
  mysql_select_db("db_klinik");
  	  date_default_timezone_set('Asia/Jakarta');
  /*-------------------------------*/
  function OtomatisID2()
  {
  $querycount="SELECT count(id_pasien) as LastID FROM t_pasien";
  $result=mysql_query($querycount) or die(mysql_error());
  $row=mysql_fetch_array($result, MYSQL_ASSOC);
  return $row['LastID'];
  }

  function FormatPasien($num) {
          $num=$num+1; 
      switch (strlen($num))
          {    
          case 1 : $No = "PS"."-"."00".$num; break;
          case 2 : $No = "PS"."-"."0".$num; break;
          case 3 : $No = "PS"."-"."".$num; break;
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
        <!-- CUSTOM STYLES-->
    <link href="../../assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
     <!-- TABLE STYLES-->
    <link href="../../assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
	<link rel="stylesheet" href="a../../ssets/Validator/css/formValidation.css"/>
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
font-size: 16px;"> <?php echo date("d-m-Y");?> - <?php echo $jam=date("H:i:s");	;?> &nbsp;Klinik Green Care Bandung &nbsp;<a href="./../../logout.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
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
                    </li>	
                </ul>
            </div>
        </nav>
		
		
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Proses Penginputan Data Pasien</h2>   
                        <h5>Silah cek dengan benar</h5>
                    </div>
                </div>
					
				
				<!--main content start-->
				  <section id="main-content">
					<section class="wrapper">

							 <form class="form-horizontal style-form" id="cetak" action="proses_tambahPasien.php" method="POST" ENCTYPE = "multipart/form-data">
								<blockquote>
								Data Pasien
								</blockquote>
								<div class="form-panel col-lg-12">
								<br>
								<div class="col-lg-12 main-chart">
								<div class="col-lg-4">
									<div class="form-group">
									  <label class="col-sm-4 control-label">ID Pasien</label>
										<div class="col-sm-8">
										  <input type="text" class="form-control" name="id_pasien" id="id_pasien" class="form-control span2 tip" readonly="readonly" value="<?php echo $LastID= FormatPasien(OtomatisID2()); ?>">
										</div>
									</div>
									<div class="form-group">
									  <label class="col-sm-4 control-label">Tanggal Lahir</label>
										<div class="col-sm-8">
										  <input type="date" value="date(dd-MM-yyyy)" class="form-control" name="tgl_lahir" id="tgl_lahir" onChange="fungsi_umur(this.value)">
										</div>
									</div>
									<div class="form-group">
									  <label class="col-sm-4 control-label">Agama</label>
										<div class="col-sm-8">
										  <select class="form-control" name="agama">
												<option>--- Pilih Agama ---</option>
                                                <option>Islam</option>
                                                <option>Kristen</option>
                                                <option>Budha</option>
                                                <option>Hindu</option>
                                                <option>Konghucu</option>
                                            </select>
										</div>
									</div>
									<div class="form-group">
									  <label class="col-sm-4 control-label">Status</label>
										<div class="col-sm-8">
										  <select class="form-control" name="status">
												<option>--- Pilih Status ---</option>
                                                <option>Belum Menikah</option>
                                                <option>Menikah</option>
                                            </select>
										</div>
									</div>
									<div class="form-group">
									  <label class="col-sm-4 control-label">Penjamin</label>
										<div class="col-sm-8">
										<input type="text" class="form-control" name="penjamin" id="penjamin">
										</div>
									</div>
								<div class="form-group">
											<label class="col-sm-5 control-label">Jenis Pembayaran</label>
											<div class="col-sm-7">
												<div class="radio">
													<label>
														<input type="radio" name="jenis_bayar" id="tunai" value="tunai" onclick="jenis()"/>Tunai
													</label>
												</div>
												<div class="radio">
													<label>
														<input type="radio" name="jenis_bayar" value="bpjs" id="bpjs" onclick="jenis()"/>BPJS
													</label>
												</div>
												<div class="radio">
													<label>
														<input type="radio" name="jenis_bayar" value="asuransi" id="asuransi" onclick="jenis()" />Asuransi
													</label>
												</div>
											</div>
										</div>
										
									<div class="form-group" id="tampil_bpjs">
									  <label class="col-sm-4 control-label">no bpjs</label>
										<div class="col-sm-8">
										  <input type="text" class="form-control" name="no_bpjs">
										</div>
									</div>
									<div class="form-group" id="tampil_asuransi">
									  <label class="col-sm-4 control-label">No Asuransi</label>
										<div class="col-sm-8">
										  <input type="text" class="form-control" name="no_asuransi">
										</div>
									</div>
									<div class="form-group" id="tampil_nama">
									  <label class="col-sm-5 control-label">Nama Perusahaan</label>
										<div class="col-sm-7">
										  <input type="text" class="form-control" name="nama_perusahaan">
										</div>
									</div>
									</div>
								
								<div class="col-lg-4">
									<div class="form-group">
									  <label class="col-sm-5 control-label">Nama Pasien</label>
										<div class="col-sm-7">
										  <input type="text" class="form-control" name="nama_pasien" id="nama_pasien">
										</div>
									</div>
									<div class="form-group">
									  <label class="col-sm-5 control-label">Umur</label>
										<div class="col-sm-7">
										  <input type="text" class="form-control" name="umur" id="umur" readonly="">
										</div>
									</div>
									<div class="form-group">
									  <label class="col-sm-5 control-label">No Telepon</label>
										<div class="col-sm-7">
										  <input type="text" class="form-control" name="no_hp" id="no_hp">
										</div>
									</div>
									<div class="form-group">
									  <label class="col-sm-5 control-label">Pekerjaan</label>
										<div class="col-sm-7">
										<input type="text" class="form-control" name="pekerjaan" id="pekerjaan">
										</div>
									</div>
									<div class="form-group">
									  <label class="col-sm-4 control-label">Alamat Kantor</label>
										<div class="col-sm-8">
										  <textarea class="form-control" rows="3" name="alamat_kantor" id="kantor"></textarea>
										</div>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="form-group">
									  <label class="col-sm-5 control-label">Jenis Kelamin</label>
										<div class="col-sm-7">
										  <select class="form-control" name="jenis_kelamin">
												<option> Pilih Jenis Kelamin </option>
                                                <option>Pria</option>
                                                <option>Wanita</option>
                                            </select>
										</div>
									</div>
									<div class="form-group">
									  <label class="col-sm-5 control-label">Tempat Lahir</label>
										<div class="col-sm-7">
										  <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir">
										</div>
									</div>
									<div class="form-group">
									  <label class="col-sm-4 control-label">Alamat</label>
										<div class="col-sm-8">
										  <textarea class="form-control" rows="3" name="alamat" id="alamat"></textarea>
										</div>
									</div>
								</div>
								</div>
								</div>
								
								<br>
								<br>
		
						<div class="form-panel col-lg-12">
						<div class="col-lg-12 main-chart">	
						<br>
						<br>
						<blockquote>
						Riwayat Pasien
						</blockquote>
							<div class="col-lg-6">
									<div class="form-group">
									  <label class="col-sm-6 control-label">Riwayat Penyakit Sebelumnya</label>
										<div class="col-sm-6">
										  <input type="text" class="form-control" name="rps" id="rps" class="form-control span2 tip">
										</div>
									</div>
									<div class="form-group">
									  <label class="col-sm-6 control-label">Alergi Obat</label>
										<div class="col-sm-6">
										  <input type="text" class="form-control" name="alergi_obat" id="alergi">
										</div>
									</div>
									<div class="form-group">
									  <label class="col-sm-6 control-label">Alergi Lainnya</label>
										<div class="col-sm-6">
										  <input type="text" class="form-control" name="alergi_lain" id="alergi">
										</div>
									</div>
								</div>
								<div class="col-lg-6">
								<div class="form-group">
									  <label class="col-sm-6 control-label">Riwayat Penyakit Keluarga</label>
										<div class="col-sm-6">
										  <input type="text" class="form-control" name="rpk" id="rpk" class="form-control span2 tip">
										</div>
									</div>
									<div class="form-group">
									  <label class="col-sm-5 control-label">Kebiasaan</label>
										<div class="col-sm-7">
										<input type="text" class="form-control" name="kebiasaan" id="kebiasaan" class="form-control span2 tip">
										</div>
									</div>
								</div>

								</div>
								</div>
						
							  <!--end-->
									<!--start-->
									<div class="form-panel col-lg-6">
									  <div class="col-lg-12 centered">
										<a href="pasien.php" type="button" class="btn btn-default">Kembali</a>
										<button type="submit" name="SIMPAN" value="SIMPAN" class="btn btn-primary">Simpan Tambah Data</button>
									  </div>
									</div>
									<!--end-->
							</form>    
					  </section>
				  </section>
				<!--main content end-->
				
				</div>
				</div>

    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="../../assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="../../assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="../../assets/js/jquery.metisMenu.js"></script>
	<script type="text/javascript" src="../../assets/Validator/js/formValidation.js"></script>
	<script type="text/javascript" src="../../assets/Validator/js/framework/bootstrap.js"></script>
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
                nama_pasien: {
                    validators: {
                        notEmpty: {
                            message: 'Kolom `nama Pasien` masih Kosong'
                        },
                    regexp: {
                        regexp: /^[a-zA-Z\s]+$/,
                        message: 'Kolom nama tidak boleh angka'
                    }
                    }
                },
				tgl_lahir: {
                    validators: {
                        notEmpty: {
                            message: 'Kolom `tanggal lahir` masih Kosong'
                        },
                    date: {
                        format: 'DD/MM/YYYY',
                        message: 'format tanggal DD/MM/YYYY'
                    }
                    }
                },
				umur: {
                    validators: {
                        notEmpty: {
                            message: 'Kolom `umur` masih Kosong'
                        }
                    }
                },
				tempat_lahir: {
                    validators: {
                        notEmpty: {
                            message: 'Kolom `tempat_lahir` masih Kosong'
                        }
                    }
                },
				jenis_kelamin: {
                    validators: {
                        notEmpty: {
                            message: 'Kolom `jenis_kelamin` belum dipilih'
                        }
                    }
                },
				agama: {
                    validators: {
                        notEmpty: {
                            message: 'Kolom `agama` belum dipilih'
                        }
                    }
                },
				no_hp: {
                    validators: {
                        notEmpty: {
                            message: 'Kolom `no hp` masih Kosong'
                        },
                    numeric: {
                        message: 'kolom hanya berupa angka'
                    }
                    }
                },
				alamat: {
                    validators: {
                        notEmpty: {
                            message: 'Kolom `alamat` masih Kosong'
                        }
                    }
                },
				alamat_kantor: {
                    validators: {
                        notEmpty: {
                            message: 'Kolom `alamat kantor` masih Kosong'
                        }
                    }
                },
				status: {
                    validators: {
                        notEmpty: {
                            message: 'Kolom `status` belum dipilih'
                        }
                    }
                },
				pekerjaan: {
                    validators: {
                        notEmpty: {
                            message: 'Kolom `pekerjaan` masih Kosong'
                        }
                    }
                },
				penjamin: {
                    validators: {
                        notEmpty: {
                            message: 'Kolom `penjamin` masih Kosong'
                        }
                    }
                },
				rps: {
                    validators: {
                        notEmpty: {
                            message: 'Kolom `rps` masih Kosong'
                        }
                    }
                },
				rpk: {
                    validators: {
                        notEmpty: {
                            message: 'Kolom `rpk` masih Kosong'
                        }
                    }
                },
				kebiasaan: {
                    validators: {
                        notEmpty: {
                            message: 'Kolom `kebiasaan` masih Kosong'
                        }
                    }
                }
            }
        })
});
</script>
<script type="text/javascript">
function fungsi_umur(tgl_lahir) {
   var year = new Date().getFullYear();
   var year1=tgl_lahir.substr(0,4);
  var umur =year-year1;
  document.getElementById('umur').value=umur;
}

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
