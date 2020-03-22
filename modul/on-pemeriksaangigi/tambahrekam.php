<?php
  /* Koneksi ke Database */
  mysql_connect("localhost","root");
  mysql_select_db("db_klinik");
  	  date_default_timezone_set('Asia/Jakarta');
  /*-------------------------------*/
  function OtomatisID2()
  {
  $querycount="SELECT count(id_rekam) as LastID FROM t_rekam";
  $result=mysql_query($querycount) or die(mysql_error());
  $row=mysql_fetch_array($result, MYSQL_ASSOC);
  return $row['LastID'];
  }

  function FormatRekam($num) {
          $num=$num+1; 
      switch (strlen($num))
          {    
          case 1 : $No = "MEDREC"."-"."00".$num; break;
          case 2 : $No = "MEDREC"."-"."0".$num; break;
          case 3 : $No = "MEDREC"."-"."".$num; break;
          default: $No = $num;       
          }          
          return $No;
  }
?>
<?php
$id = $_GET['id'];
$query=mysql_query("SELECT t_daftar.*, t_pasien.*, t_dokter.* FROM t_daftar, t_pasien, t_dokter 
				WHERE  t_daftar.id_daftar='$id' 
				AND t_daftar.id_dokter=t_dokter.id_dokter
				AND t_daftar.id_daftar='$id' 
				AND t_daftar.id_pasien=t_pasien.id_pasien");
$data=mysql_fetch_array($query);

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
    <link href="../../assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
	<link rel="stylesheet" href="../../assets/Validator/css/formValidation.css"/>
</head>
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
                        <a  href="index.php"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                    </li>
                     <li>
                        <a  href="proses.php"><i class="fa fa-desktop fa-3x"></i> Lihat Proses</a>
                    </li>
					<li>
                        <a class="active-menu" href="rekammedis.php"><i class="fa fa-sitemap fa-3x"></i>Rekam Medis<span class="fa arrow"></span></a>
                      </li>		
                </ul>
            </div>
        </nav>
		
		<div id="page-wrapper">
			<div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Proses Penginputan Data Hasil Pemeriksaan Pasien</h2>   
                        <h5>Silah cek dengan benar</h5>
                    </div>
                </div>
					<hr>
					<hr>
					
		<!-- /. TAB SIDE  -->		
		<div class="col-md-12 col-sm-6">
		   <div class="panel panel-default">
				<div class="panel-heading">
					Form Tambah Rekam Medis
				   </div>
<!-- /. ROW  -->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="panel-group" id="accordion">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="collapsed">History Pasien Berobat</a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse" style="height: 0px;">
                                        <div class="panel-body">
                            			<!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
									<thead bgcolor="#eeeeee" align="center">
                                        <tr>
	                                    <th>ID pasien</th>
	                                    <th>Nama Pasien</th>
	                                    <th>Tanggal Berobat</th>
	                                    <th>Ruang Rawat</th>
                                        <th>Hasil Diagnosa</th>
                                        <th>Tindakan Dokter</th>
                                        <th>Nama Obat</th>
                                        <th>Jumlah Obat</th>
                                        <th>Dosis Pemakaian</th>
                                       </tr>
                                      </thead>
                                <tbody>
						<?php
						$tanggal=date('Y-m-d');
                        $query ="SELECT t_rekam.*, t_daftar.*, t_dokter.*, t_pasien.*,detail_resep.*, t_obat.* FROM t_rekam 
						inner join t_daftar ON t_rekam.id_daftar=t_daftar.id_daftar 
						INNER JOIN t_dokter ON t_daftar.id_dokter=t_dokter.id_dokter  
						INNER JOIN t_pasien ON t_daftar.id_pasien=t_pasien.id_pasien
						INNER JOIN detail_resep ON t_rekam.id_rekam=detail_resep.id_rekam
						INNER JOIN t_obat ON detail_resep.id_obat=t_obat.id_obat
						WHERE t_rekam.id_pasien='".$_GET['id_pasien']."'";
                        $sql = mysql_query($query);
                        ?>
                        <?php 
                        while ($hasil = mysql_fetch_array($sql))
                        {
                          $id_rekam = $hasil ['id_rekam'];
                          $id_pasien = $hasil ['id_pasien'];
                          $nama_pasien = $hasil ['nama_pasien'];
                          $tgl_daftar = $hasil ['tgl_daftar'];
                          $ruang_rawat = $hasil ['ruang_rawat'];
                          $diagnosa = $hasil['diagnosa'];
                          $tindakan = $hasil['tindakan'];
                          $nama_obat = $hasil['nama_obat'];
                          $jumlah_obat = $hasil['jumlah_obat'];
                          $satuan = $hasil['satuan'];
                          $dosis = $hasil['dosis'];
                          
                        ?>
                        <tr>
                          <td><?php echo $id_pasien; ?></td>
                          <td><?php echo $nama_pasien; ?></td>                       
                          <td><?php echo $tgl_daftar; ?></td>                       
                          <td><?php echo $ruang_rawat; ?></td>                       
                          <td><?php echo $diagnosa; ?></td>
                          <td><?php echo $tindakan; ?></td>
                          <td><?php echo $nama_obat; ?></td>
                          <td><?php echo $jumlah_obat; ?> <?php echo $satuan; ?></td>
                          <td><?php echo $dosis; ?></td>
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
                        </div>
                    </div>
                </div>
            </div>
                    <!-- /. ROW  -->				   
				   
				   
			<div class="panel-body">				
			<form id="cetak" class="form-horizontal row-fluid" action="proses_tambahRekam.php" method="post">
<blockquote>
Data Pasien <div class="text-right"  style=color:BLUE><?php echo $data['id_pasien'] ?></div>
</blockquote>			
					<div class="form-group">
						<label class="col-md-3 control-label">ID pasien</label>
							<div class="col-md-4 inputGroupContainer">
								<div class="input-group">
								<input type="hidden" name="id_rekam" class="form-control" id="id_rekam" value="<?php echo $LastID= FormatRekam(OtomatisID2()); ?>" readonly="">
								<input type="hidden" name="id_daftar" class="form-control" value="<?php echo $data['id_daftar'] ?>">
								<input type="text" name="id_pasien" class="form-control" value="<?php echo $data['id_pasien'] ?>" readonly="">
								<span class="input-group-addon"><span class="glyphicon glyphicon-sort-by-order"></span></span>
								</div>
							</div>
						</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Nama Pasien</label>
							<div class="col-md-4 inputGroupContainer">
								<div class="input-group">
								<input type="text" name="nama" class="form-control" value="<?php echo $data['nama_pasien'];?>" readonly="">
								<span class="input-group-addon"><span class="fa fa-user-md"></span></span>
								</div>
							</div>
						</div>				
					<div class="form-group">
						<label class="col-md-3 control-label">Keluhan</label>
							<div class="col-md-4 inputGroupContainer">
								<div class="input-group">
								<input type="text" name="keluhan" class="form-control" value="<?php echo $data['keluhan'];?>" readonly="">
								<span class="input-group-addon"><span class="fa fa-medkit"></span></span>
								</div>
							</div>
						</div>				
					<div class="form-group">
						<label class="col-md-3 control-label">Ruang Rawat</label>
							<div class="col-md-4 inputGroupContainer">
								<div class="input-group">
								<input type="text" name="ruang_rawat" class="form-control" value="<?php echo $data['nama_dokter']; ?>-<?php echo $data['ruang_rawat']; ?>" readonly="">
								<span class="input-group-addon"><span class="fa fa-hospital-o"></span></span>
								</div>
							</div>
						</div>
<blockquote>
Hasil Pemeriksaan Dokter
</blockquote>					
	
					<div class="form-group">
						<label class="col-md-3 control-label">Pemeriksaan Fisik</label>
							<div class="col-md-4 inputGroupContainer">
								<div class="input-group">
								<select name='pemeriksaan' class="form-control">
								<option value=''>Pilih Pemeriksaan Fisik</option>
								<option value='Inspeksi'>Inspeksi &nbsp &nbsp(pemeriksaan dengan menggunakan indra penglihatan)</option>
								<option value='Palpasi'>Palpasi &nbsp &nbsp(pemeriksaan secara perabaan dan penekanan tubuh)</option>
								<option value='Perkusi'>Perkusi  &nbsp &nbsp (pemeriksaan mendengarkan bunyi bagian tubuh)</option>
								<option value='Auskultasi'>Auskultasi &nbsp &nbsp (pemeriksaan dengan bunyi didalam organ tubuh)</option>
								</select>						
			
								<span class="input-group-addon"><span class="fa fa-stethoscope"></span></span>
								</div>
							</div>
						</div>
						<div class="form-group">
						<label class="col-md-3 control-label">Hasil Diagnosa</label>
							<div class="col-md-4 inputGroupContainer">
								<div class="input-group">
								<input type="text" name="diagnosa" class="form-control" placeholder="Hasil Diagnosa..">
								<span class="input-group-addon"><span class="fa fa-stethoscope"></span></span>
								</div>
							</div>
						</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Tindakan Dokter</label>
							<div class="col-md-4 inputGroupContainer">
								<div class="input-group">
								<textarea class="form-control" rows="3" name="tindakan" placeholder="Terapi Tindakan Dokter.."></textarea>
								<span class="input-group-addon"><span class="glyphicon glyphicon-link"></span></span>
								</div>
							</div>
						</div>					
					<div class="form-group">
						<label class="col-md-3 control-label">Saran Dokter</label>
							<div class="col-md-4 inputGroupContainer">
								<div class="input-group">
								<input type="text" name="saran" class="form-control" placeholder="Saran Dokter..">
								<span class="input-group-addon"><span class="fa fa-comments"span></span>
								</div>
							</div>
						</div>
<blockquote>
Pemilihan Obat
</blockquote>		
<table class="table" id="tab_logic">
	<a id="add_row" class="btn btn-default pull-left">tambah resep</a><a id='delete_row' class="btn btn-default">Delete resep</a>
<tr>
<th>No</th>
<th>Obat</th>
<th>jumlah Obat</th>
<th>Satuan Obat</th>
<th>Dosis Obat</th>
<th>Keterangan Pakai</th>
</tr>
<tr id="addr0">
<td>1</td>
<td>				
<input type='hidden' name='idobat[]' id='idobat0'>
<input type="text" class="form-control" rows="2" name="nama_obat[]" id="nama_obat0" placeholder="Nama Obat.." readonly="true">
<button type="button" class="btn btn-primary " data-toggle="modal" data-target="#myModal"><i class="glyphicon glyphicon-search"></i>Find</button>								
</td>
<td>			
	<input type="text" name="banyak_obat[]" class="form-control" placeholder="Jumlah Obat..">
</td>
<td>
<input type="text" class="form-control" rows="2" name="satuan[]" id="satuan0" placeholder="Satuan Obat.." readonly="true">
</td>
<td>						
					<select name='dosis[]' class="form-control">
						<option value='1 x 1 per hari'>1 x 1 per hari</option>
						<option value='2 x 1 per hari'>2 x 1 per hari</option>
						<option value='3 x 1 per hari'>3 x 1 per hari</option>
						<option value='4 x 1 per hari'>4 x 1 per hari</option>
						</select>						
						</td>
						<td>
						<input type="text" name="keterangan_Pakai" class="form-control" placeholder="keterangan pakai..">
						</td>
						</tr>
						 <tr id='addr1'></tr>
						</table>
									<div class="form-panel col-lg-6">
									  <div class="col-lg-12 centered">
										<a href="rekammedis.php" type="button" class="btn btn-default">Kembali</a>
										<button type="submit" name="SIMPAN" value="SIMPAN" class="btn btn-primary">Simpan Tambah Data</button>
									  </div>
									</div>
							</form>
								</div>
							</div>
						</div>

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
										<table class="table table-striped table-bordered table-hover" id="obat1">
										<thead>
                                        <tr>
											<th>ID Obat</th>
											<th>Nama Obat</th>
											<th>Jenis Obat</th>
											<th>Satuan Obat</th>
											<th>Harga Obat</th>
											<th>Stok Obat Awal</th>
											<th>Stok Obat Akhir</th>
										 </tr>
										</thead>
							<tbody>
									  <?php
									  
										mysql_connect('localhost', 'root', '');
										mysql_select_db('db_klinik');
										$query = mysql_query('SELECT id_obat, nama_obat, jenis_obat,satuan, harga_obat, stok_obat_awal, stok_obat from t_obat ');
									  while ($data = mysql_fetch_array($query)) {
									  ?>
									  <tr class="pilih0" ip0="<?php echo $data['id_obat']; ?>" np0="<?php echo $data['nama_obat']; ?>" sp0="<?php echo $data['satuan']; ?>">
										<td><?php echo $data['id_obat']; ?></td>
										<td><?php echo $data['nama_obat']; ?></td>
										<td><?php echo $data['jenis_obat']; ?></td>
										<td><?php echo $data['satuan']; ?></td>
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
					  <div class="panel-body">
                            <div class="modal fade" id="myModal1" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									<div class="modal-dialog" style="width:1000px">
									  <div class="modal-content">
										<div class="modal-header">
										  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										  <h4 class="modal-title" id="myModalLabel">Data Obat</h4>
								</div>
										<div class="modal-body">
										<table class="table table-striped table-bordered table-hover" id="obat2">
										<thead>
                                        <tr>
											<th>ID Obat</th>
											<th>Nama Obat</th>
											<th>Jenis Obat</th>
											<th>Satuan Obat</th>
											<th>Harga Obat</th>
											<th>Stok Obat Awal</th>
											<th>Stok Obat Akhir</th>
										 </tr>
										</thead>
							<tbody>
									  <?php
									  
										mysql_connect('localhost', 'root', '');
										mysql_select_db('db_klinik');
										$query = mysql_query('SELECT id_obat, nama_obat, jenis_obat,satuan, harga_obat, stok_obat_awal, stok_obat from t_obat ');
									  while ($data = mysql_fetch_array($query)) {
									  ?>
									  <tr class="pilih1" ip1="<?php echo $data['id_obat']; ?>" np1="<?php echo $data['nama_obat']; ?>" sp1="<?php echo $data['satuan']; ?>">
										<td><?php echo $data['id_obat']; ?></td>
										<td><?php echo $data['nama_obat']; ?></td>
										<td><?php echo $data['jenis_obat']; ?></td>
										<td><?php echo $data['satuan']; ?></td>
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
					  <div class="panel-body">
                            <div class="modal fade" id="myModal2" tabindex="-3" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									<div class="modal-dialog" style="width:1000px">
									  <div class="modal-content">
										<div class="modal-header">
										  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										  <h4 class="modal-title" id="myModalLabel">Data Obat</h4>
								</div>
										<div class="modal-body">
										<table class="table table-striped table-bordered table-hover" id="obat3">
										<thead>
                                        <tr>
											<th>ID Obat</th>
											<th>Nama Obat</th>
											<th>Jenis Obat</th>
											<th>Satuan Obat</th>
											<th>Harga Obat</th>
											<th>Stok Obat Awal</th>
											<th>Stok Obat Akhir</th>
										 </tr>
										</thead>
							<tbody>
									  <?php
									  
										mysql_connect('localhost', 'root', '');
										mysql_select_db('db_klinik');
										$query = mysql_query('SELECT id_obat, nama_obat, jenis_obat,satuan, harga_obat, stok_obat_awal, stok_obat from t_obat ');
									  while ($data = mysql_fetch_array($query)) {
									  ?>
									  <tr class="pilih2" ip2="<?php echo $data['id_obat']; ?>" np2="<?php echo $data['nama_obat']; ?>" sp2="<?php echo $data['satuan']; ?>">
										<td><?php echo $data['id_obat']; ?></td>
										<td><?php echo $data['nama_obat']; ?></td>
										<td><?php echo $data['jenis_obat']; ?></td>
										<td><?php echo $data['satuan']; ?></td>
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
					<div class="panel-body">
                            <div class="modal fade" id="myModal3" tabindex="-4" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									<div class="modal-dialog" style="width:1000px">
									  <div class="modal-content">
										<div class="modal-header">
										  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										  <h4 class="modal-title" id="myModalLabel">Data Obat</h4>
								</div>
										<div class="modal-body">
										<table class="table table-striped table-bordered table-hover" id="obat4">
										<thead>
                                        <tr>
											<th>ID Obat</th>
											<th>Nama Obat</th>
											<th>Jenis Obat</th>
											<th>Satuan Obat</th>
											<th>Harga Obat</th>
											<th>Stok Obat Awal</th>
											<th>Stok Obat Akhir</th>
										 </tr>
										</thead>
							<tbody>
									  <?php
									  
										mysql_connect('localhost', 'root', '');
										mysql_select_db('db_klinik');
										$query = mysql_query('SELECT id_obat, nama_obat, jenis_obat,satuan, harga_obat, stok_obat_awal, stok_obat from t_obat ');
									  while ($data = mysql_fetch_array($query)) {
									  ?>
									  <tr class="pilih3" ip3="<?php echo $data['id_obat']; ?>" np3="<?php echo $data['nama_obat']; ?>" sp3="<?php echo $data['satuan']; ?>">
										<td><?php echo $data['id_obat']; ?></td>
										<td><?php echo $data['nama_obat']; ?></td>
										<td><?php echo $data['jenis_obat']; ?></td>
										<td><?php echo $data['satuan']; ?></td>
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
                     <!-- End Modals-->
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
     <!-- DATA TABLE SCRIPTS -->
    <script src="../../assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="../../assets/js/dataTables/dataTables.bootstrap.js"></script>
     <!-- Validator SCRIPTS -->	
	<script type="text/javascript" src="../../assets/Validator/js/formValidation.js"></script>
	<script type="text/javascript" src="../../assets/Validator/js/framework/bootstrap.js"></script>
	<script type="text/javascript">
  $(document).ready(function(){
      var i=1;
     $("#add_row").click(function(){
		 if(i>=4){
			 alert('Maksimal Penginputan Obat Hanya 4');
     	 }
		 else{
	 $('#addr'+i).html("<td>"+ (i+1) +"</td><td><input type='hidden' class='form-control' name='idobat[]' id='idobat"+i+"'>"
	 +"<input name='nama_obat[]' class='form-control' id='nama_obat"+i+"' type='text' placeholder='Nama Obat...' readonly='true'  />" 
	 +"<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#myModal"+i+"'>"
	 +"<i class='glyphicon glyphicon-search'></i>Find</button></td>"
	 +"<td><input  name='banyak_obat[]' class='form-control' type='text' placeholder='Jumlah Obat..'  class='span8' ></td>"
	 +"<td><input  name='satuan[]' class='form-control' type='text' id='satuan"+i+"' placeholder='Satuan Obat..' readonly='true'></td>"
	 +"<td>"	
	 +"<select name='dosis[]' class='form-control'><option value='1 x 1 per hari'>1 x 1 per hari</option>"
		+"<option value='2 x 1 per hari'>2 x 1 per hari</option>"
		+"<option value='3 x 1 per hari'>3 x 1 per hari</option>"
		+"<option value='4 x 1 per hari'>4 x 1 per hari</option>"
		+"</select>			</td>"
		+"<td>"
		+"<input type='text' name='keterangan_Pakai' class='form-control' placeholder='keterangan pakai..'>"
		+"<td>");

      $('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
		i++; 	 
		 }
      
  });
     $("#delete_row").click(function(){
    	 if(i>1){
		 $("#addr"+(i-1)).html('');
		 i--;
		 }
	 });

});
     $(document).on('click', '.pilih0', function (e) {
		 document.getElementById("idobat0").value = $(this).attr('ip0');
		document.getElementById("nama_obat0").value = $(this).attr('np0');
		document.getElementById("satuan0").value = $(this).attr('sp0');
        $('#myModal').modal('hide');
    });
    $(function () {
        $("#obat1").dataTable();
    });
	 $(document).on('click', '.pilih1', function (e) {
		 document.getElementById("idobat1").value = $(this).attr('ip1');
		document.getElementById("nama_obat1").value = $(this).attr('np1');
		document.getElementById("satuan1").value = $(this).attr('sp1');
        $('#myModal1').modal('hide');
    });
    $(function () {
        $("#obat2").dataTable();
    });
	 $(document).on('click', '.pilih2', function (e) {
		 document.getElementById("idobat2").value = $(this).attr('ip2');
		document.getElementById("nama_obat2").value = $(this).attr('np2');
		document.getElementById("satuan2").value = $(this).attr('sp2');
        $('#myModal2').modal('hide');
    });
   $(function () {
        $("#obat3").dataTable();
    });
	 $(document).on('click', '.pilih3', function (e) {
		 document.getElementById("idobat3").value = $(this).attr('ip3');
		document.getElementById("nama_obat3").value = $(this).attr('np3');
		document.getElementById("satuan3").value = $(this).attr('sp3');
        $('#myModal3').modal('hide');
    });
   $(function () {
        $("#obat4").dataTable();
    });
	</script>
	<script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
	<!--End Datatables -->	
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
                pemeriksaan: {
                    validators: {
                        notEmpty: {
                            message: 'Kolom `hasil pemeriksaan` belum diisi'
                        }
                    }
                },
				diagnosa: {
                    validators: {
                        notEmpty: {
                            message: 'Kolom `hasil diagnosa` belum diisi'
                        }
                    }
                },
				tindakan: {
                    validators: {
                        notEmpty: {
                            message: 'Kolom `tindakan` belum diisi'
                        }
                    }
                },
				resep_obat: {
                    validators: {
                        notEmpty: {
                            message: 'Kolom `resep obat` belum diisi'
                        }
                    }
                },
				saran: {
                    validators: {
                        notEmpty: {
                            message: 'Kolom `saran`belum diisi'
                        }
                    }
                }
            }
        })
});
</script>	
		</body>
	</html>
			 