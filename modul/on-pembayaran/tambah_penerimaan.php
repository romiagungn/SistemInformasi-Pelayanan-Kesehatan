<?php
  /* Koneksi ke Database */
  session_start();
  mysql_connect("localhost","root");
  mysql_select_db("db_klinik");
  include '../../fungsi/fungsi_tanggal.php';
  	  date_default_timezone_set('Asia/Jakarta');
  /*-------------------------------*/
function OtomatisID2()
{
$querycount="SELECT count(id_penerimaan) as LastID FROM penerimaan";
$result=mysql_query($querycount) or die(mysql_error());
$row=mysql_fetch_array($result, MYSQL_ASSOC);
return $row['LastID'];
}

function FormatNoPenerimaan($num) {
        $num=$num+1; 
		$bulan = date("m");
		$tahun = date("y");
		switch (strlen($num))
        {    
        case 1 : $NoTrans = "PE"."-".$bulan."-".$tahun."-"."000".$num; break;    
        case 2 : $NoTrans = "PE"."-".$bulan."-".$tahun."-"."00".$num; break;    
        case 3 : $NoTrans = "PE"."-".$bulan."-".$tahun."-"."0".$num;  break;  
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
                     <h2>Daftar Tambah Penerimaan Pesanan Obat</h2>   
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
                        <div class="col-md-3"><h4>Tambah Penerimaan</h4></div>
                        <div class="col-md-3"></div>
                        <div class="col-md-3"></div>
                        <div class="col-md-3" align="right"><a href="lihat_penerimaan.php" class="btn btn-info">Lihat Data Penerimaan</a></div>
                    </div>
                </li>
				
                <li class="list-group-item">
				<?php    if((empty($_POST["destroy"])==FALSE)){
         session_destroy();
		}?>
                   <form class="form-horizontal" role="form" method="POST">
					  <div class="form-group">
                        <label class="control-label col-sm-3"> <center>No Penerimaan </center></label> 
                            <div class="col-sm-3"> 
                                <input class="form-control" size="10" readonly type="text" name="Noper" value="<?php echo $LastID= FormatNoPenerimaan(OtomatisID2()); ?>" id="Noper">
                          </div>
                      </div>
					   
					   <div class="form-group">
                        <label class="control-label col-sm-3"><center>Tanggal </center></label>
                            <div class="col-sm-3"> 
                                <input class="form-control" size="10" readonly type="text" name="tanggal" value="<?php date_default_timezone_set("Asia/Jakarta");echo date("d-m-Y");?>" id="tanggal">
                          </div>
                      </div>
					  
					  <div class="form-group">
                        <label class="control-label col-sm-3"> <center>No Permintaan </center></label>
                        <div class="col-sm-3"> 
                          <input type="text" class="form-control" id="id_permintaan" name="id_permintaan" placeholder="No Permintaan">
                        </div>
						<div class="col-sm-3"> 
						<button type="submit" name="cari" class="btn btn-primary">cari</button>
						<button type="button"size="10" class="btn btn-info" data-toggle="modal" data-target="#myModal"><b>Cari</b> <span class="glyphicon glyphicon-search"></span></button>
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
										  <h4 class="modal-title" id="myModalLabel">Data Permintaan</h4>
								</div>
										<div class="modal-body">
										<table class="table table-striped table-bordered table-hover" id="dataTables-example">
										<thead>
                                        <tr>
											<th>ID Permintaan</th>
											<th>Tanggal Permintaan</th>
                                </tr>
										</thead>
							<tbody>
                                <?php
                                //Data mentah yang ditampilkan ke tabel    
                                mysql_connect('localhost', 'root', '');
                                mysql_select_db('db_klinik');
                                $query = mysql_query('SELECT * FROM permintaan');
                                while ($data = mysql_fetch_array($query)) {
                                    ?>
                                    <tr class="pilih" data-obat="<?php echo $data['id_permintaan']; ?>">
                                        <td><?php echo $data['id_permintaan']; ?></td>
                                        <td><?php echo $data['tanggal']; ?></td>
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
					
					<form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
					<table class="table table-bordered" width="50%" border="0" cellspacing="0" cellpadding="0" class="responsive table table-striped table-bordered">
                            <tr style="background-color:#">
                            <th style="text-align:center">No.</th>
							<th style="text-align:center">No Permintaan</th>
                            <th style="text-align:center">Kode Barang</th>
							<th style="text-align:center">Nama Barang</th>
							<th style="text-align:center">Nama Supplier</th>
                            <th style="text-align:center">Jumlah Barang</th>
							<th style="text-align:center">Kadaluarsa</th>
							<?php
							$awal=0;$sub=0;$total=0;
            if (@$_POST["id_permintaan"]!=''){
                @$Id = $_POST['id_permintaan'];
				$query=mysql_query("select * from detail_permintaan where  id_permintaan= '$Id' and status ='1'");
              			
		 while( $tampil = mysql_fetch_array($query)) {
                @$id_obat=$tampil["id_obat"];
                @$id_supplier=$tampil["id_supplier"];
				$query2=mysql_query("select nama_obat from t_obat where id_obat='$id_obat'");
				$tampil2=mysql_fetch_array($query2);
				$nama_obat=$tampil2['nama_obat'];
                @$jumlah=$tampil["jumlah"];
				$query3=mysql_query("select nama_supplier from supplier where id_supplier='$id_supplier'");
				$tampil3=mysql_fetch_array($query3);
				$nama_supplier=$tampil3['nama_supplier'];
				
				?>
                    <tr>
                            <div class="form-group">
							<div class="col-sm-3"> 
                            <td><center><input type="checkbox" name="id[]" value="<?php echo $id_obat; ?>"></td>
							<td><center><input type="hidden"  size="10"value="<?php echo $Id;  ?>" name="id_permintaan"><?php echo $Id;  ?></center></td>
                            <td><center><input type="hidden" size="4"value="<?php echo $id_obat;  ?>" name="id_obat"><?php echo $id_obat;  ?></center></td>
                            <td><center><input type="hidden" size="4"value="<?php echo $nama_obat;  ?>" name="nama_obat"><?php echo $nama_obat;  ?></center></td>
                            <td><center><input type="hidden" size="4"value="<?php echo $nama_supplier;  ?>" name="nama_obat"><?php echo $nama_supplier;  ?></center></td>
							<td><center><input type="text" size="4" value="<?php echo $jumlah;  ?>" name="jumlah[]"></td>
							<td><center>
							<div class="input-group date form_date col-sm-10" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                                <input class="form-control" name="kadaluarsa[]"  id="kadaluarsa" placeholder="<?php echo date("d-m-Y")?>" type="date">
								<span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                            </div>
							</center>
							</td>
                    </div>
					</div>
					</tr>
                      
                    <?php }
			}
			else{
				
			}
                
            ?>
			 
			</table>
			<button type="submit" name="save" class="btn btn-primary">simpan</button>
			</form>					
 			<?php
			if (isset($_POST['save'])){
			// Simpan ke Database
			mysql_connect("localhost","root");
			mysql_select_db("db_klinik");
			include('../../fungsi/conn.php');
            $tanggal = date("Y-m-d");
			$LastID= FormatNoPenerimaan(OtomatisID2());
    		$id_obat=$_POST['id'];
			$jumpil=count($id_obat);
			$id_permintaan=$_POST['id_permintaan'];
			$jumlah=$_POST['jumlah'];
			$kadaluarsa=$_POST['kadaluarsa'];
			
			
			$sql = "insert into penerimaan (id_penerimaan,tanggal) values 
			('$LastID','$tanggal')";
			mysql_query($sql);
	
	//$query=mysql_query("select * from detail_permintaan where  id_permintaan= '$id_permintaan' and id_obat='$id_obat'");
		// while( $tampil = mysql_fetch_array($query)) {
            //    @$id_obat2=$tampil["id_obat"];
              //  @$jumlah2=$tampil["jumlah"];
			  for($x=0;$x<$jumpil;$x++){
				  
		 $sql2 = "insert into detail_penerimaan (id_penerimaan,id_obat,jumlah,sisa,kadaluarsa) values 
			('$LastID','$id_obat[$x]','$jumlah[$x]','$jumlah[$x]','$kadaluarsa[$x]')";
			mysql_query($sql2);
		   $tampilid=mysql_fetch_array(mysql_query("select stok_obat from t_obat where id_obat='$id_obat[$x]'"));
            @$stok_jual2=$tampilid["stok_obat"];
            @$stok_jual3=$stok_jual2+$jumlah[$x];
			$status='2';
            $query3 = mysql_query("
                update detail_permintaan set status='$status' where id_obat='$id_obat[$x]' and id_permintaan='$id_permintaan'
            ");
			$query4= mysql_query("
                update t_obat set stok_obat='$stok_jual3', stok_obat_awal='$stok_jual3' where id_obat='$id_obat[$x]'
            ");
			  }
 		 // }
		 
		 if($sql && $sql2 && $query4 && $query3){
	echo "<script type='text/javascript'>alert('Data permintaan berhasil disimpan')</script>";	
	echo "<script type='text/javascript'>alert('Data detail permintaan berhasil disimpan')</script>";
 
	echo "<script type='text/javascript'>alert('status permintaan di update')</script>";
	echo "<script type='text/javascript'>alert('stok obat di update')</script>";	
 echo "<script>document.location.href='tambah_penerimaan.php';</script>";	
		 }
	
   	 
	
	}
			?>
                </li>
            </ul>
                
            
<!-- end konten -->			
			</div>			
		</div>
    </div>			
    </div>			
    </div>		
					
					
					
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
   <script type="text/javascript">
            $(document).on('click', '.pilih', function (e) {
				document.getElementById("id_permintaan").value = $(this).attr('data-obat');
                $('#myModal').modal('hide');
            });
			

            $(function () {
                $("#dataTables-example").dataTable();
            });
        </script>

	      <!-- CUSTOM SCRIPTS -->
    <script src="../../assets/js/custom.js"></script>	
</body>
</html>