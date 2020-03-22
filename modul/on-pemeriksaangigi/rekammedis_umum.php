			<!-- /. TAB SIDE  -->		
		<div class="col-md-12 col-sm-6">
		   <div class="panel panel-default">
				<div class="panel-heading">
					Form Rekam Medis Poli Umum
				   </div>
				   
				   
						<div class="panel-body">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#home" data-toggle="tab">Pemeriksaan</a>
								</li>
								<li class=""><a href="#profile" data-toggle="tab">List Hasil Pemeriksaan</a>
								</li>
							</ul>

			<!-- /page kesatu -->
				<div class="tab-content">
					<div class="tab-pane fade active in" id="home">
						<div class="row">
						  <div class="col-lg-12">
							<h1>Daftar Antrian Pemeriksaan Poli Umum</h1>             
						  </div>
						</div>
						
					<!-- /.row -->
						<div class="row">
						  <div class="col-lg-12">
							<div class="table-responsive">
							
							<?php
							$tanggal=date('Y-m-d');
							$tabel=mysql_query("SELECT t_daftar.*, t_pasien.*, t_dokter.*, t_proses.* FROM t_daftar inner join t_dokter 
							ON t_daftar.id_dokter=t_dokter.id_dokter inner join t_proses 
							ON t_daftar.id_daftar=t_proses.id_daftar inner join t_pasien
							ON t_daftar.id_pasien=t_pasien.id_pasien
							WHERE t_dokter.ruang_rawat='Poli Umum'");
							while ($data = mysql_fetch_array($tabel)){
								?>
							 <table class="table table-striped table-bordered table-hover">
							<thead>
							<tr>
							<th>Antrian</th>
							<th>ID Pasien</th>
							<th>Nama Pasien</th>
							<th>Ruang Rawat</th>
							<th>Tanggal Daftar</th>
							<th>Jam Masuk</th>
							<th>Proses Rekam</th>
							<th>Aksi</th>
							</tr>
							</thead>
							<tbody>
							  <tr>
							  <td><?php echo $data['antrian']; ?></td>
							  <td><?php echo $data['id_pasien']; ?></td>
							  <td><?php echo $data['nama_pasien']; ?></td>
							  <td><?php echo $data['nama_dokter']; ?>-<?php echo $data['ruang_rawat']; ?></td>
							  <td><?php echo $data['tgl_daftar']; ?></td>
							  <td><?php echo $data['jam_daftar']; ?></td>
							  <td><?php echo $data['p_pemeriksaan']; ?></td>
							  <td class="center">
									<div class="centered">
									<a href="tambahrekam.php?act=edit&id=<?php echo $data['id_daftar'];?>" class="btn btn-primary" title="Tambah Rekam Medis"><i class="fa fa-edit"></i> Rekam Medis</a>
									</td>
								</div>
							</tr>
							</tbody>
							</table>
							  <?php
							  }
							  ?>
							</div>
						  </div>         
						</div>
						<!-- /end row -->
					</div>
					<!-- /akhir page kesatu -->
					
					<!-- /page kedua -->
					<div class="tab-pane fade" id="profile">
						<div class="row">
						  <div class="col-lg-12">
							<h1>List Hasil Pemeriksaan</h1>             
						  </div>
						</div>
						
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
	                                    <th>ID pasien</th>
	                                    <th>Nama Pasien</th>
	                                    <th>Ruang Rawat</th>
                                        <th>Hasil Diagnosa</th>
                                        <th>Tindakan Dokter</th>
                                        <th>Saran</th>
	                                    <th>action</th>
                                       </tr>
                                      </thead>
                                <tbody>
						<?php
                        $query ="SELECT t_rekam.*, t_daftar.*, t_dokter.*, t_pasien.* FROM t_rekam 
						inner join t_daftar ON t_rekam.id_daftar=t_daftar.id_daftar 
						INNER JOIN t_dokter ON t_daftar.id_dokter=t_dokter.id_dokter  
						INNER JOIN t_pasien ON t_daftar.id_pasien=t_pasien.id_pasien
						WHERE t_dokter.ruang_rawat='Poli Umum'";
                        $sql = mysql_query($query);
                        ?>
                        <?php 
                        while ($hasil = mysql_fetch_array($sql))
                        {
                          $id_rekam = $hasil ['id_rekam'];
                          $id_pasien = $hasil ['id_pasien'];
                          $nama_pasien = $hasil ['nama_pasien'];
                          $ruang_rawat = $hasil ['ruang_rawat'];
                          $diagnosa = $hasil['diagnosa'];
                          $tindakan = $hasil['tindakan'];
                          $saran = $hasil['saran'];
                          
                        ?>
                        <tr>
                          <td><?php echo $id_pasien; ?></td>
                          <td><?php echo $nama_pasien; ?></td>                       
                          <td><?php echo $ruang_rawat; ?></td>                       
                          <td><?php echo $diagnosa; ?></td>
                          <td><?php echo $tindakan; ?></td>
                          <td><?php echo $saran; ?></td>
                          <td class="center">
                            <div class="centered">
						    <a href="editRekam.php?act=edit&id=<?php echo $hasil['id_rekam'];?>" class="btn btn-primary" title="Edit"><i class="fa fa-edit"></i></a>
						    <a href="rekammedis.php?act=del&id_rekam=<?php echo $id_rekam;?>" class="btn btn-warning" title="Delete"><i class="glyphicon glyphicon-trash"></i></a>							  
						    <a href="cetak_kcp.php?id_rekam=<?php echo $id_rekam;?>" class="btn btn-info" title="Cetak Kartu Catatan Penyakit"><i class="glyphicon glyphicon-print"></i></a>
						    <a href="cetakrujuk.php?act=edit&id_rekam=<?php echo $id_rekam;?>" class="btn btn-danger" title="Surat Rujukan"><i class="glyphicon glyphicon-plus"></i></a>
							<a href="cetaksuratSakit.php?act=edit&id_rekam=<?php echo $id_rekam;?>" class="btn btn-danger" title="Surat Sakit"><i class="glyphicon glyphicon-envelope"></i></a>
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
				<!-- /akhir page kedua -->
					
						</div>
					</div>
				</div>
			</div>
<?php
if(isset($_GET['act'])){
$id_rekam=$_GET['id_rekam'];
$query=mysql_query("DELETE FROM t_rekam WHERE id_rekam='$id_rekam'");
$query2=mysql_query("DELETE FROM detail_resep WHERE id_rekam='$id_rekam'");
if($query & $query2){
  echo"<script>
  alert('berhasil di hapus');
  document.location.href='rekammedis.php';
  </script>";
}
else{
  mysql_error();
}


}
?>