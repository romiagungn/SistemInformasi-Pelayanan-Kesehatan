<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Free Bootstrap Admin Template : Binary Admin</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body>
    <div class="container">
        <div class="row text-center  ">
            <div class="col-md-12">
                <br /><br />
                <h2> Halaman Register Klinik GreenCare Bandung</h2>
               
                <h5>( Register Dirimu untuk Mendapatkan access )</h5>
                 <br />
            </div>
        </div>
         <div class="row">
               
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                        <strong>  User baru ? Register Disini</strong>  
                            </div>
                            <div class="panel-body">
                                <form class="form-login" action="register.php" method="post">
<br/>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-circle-o-notch"  ></i></span>
                                            <input type="text" class="form-control" name="nama" placeholder="Nama Anda" />
                                        </div>
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                            <input type="text" class="form-control" name="username" placeholder="Username" />
                                        </div>
                                         <div class="form-group input-group">
														<span class="input-group-addon">LU</span>
															<select class="form-control" name="level_user">
																<option selected align="center">Pilih Akses Login</option>
																<option>pendaftaran</option>
																<option>pemeriksaan</option>
																<option>pembayaran</option>
																<option>pimpinan</option>
															</select>
												</div>
                                      <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input type="password" class="form-control" name="password" placeholder="Enter Password" />
                                        </div>
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input type="password" class="form-control" placeholder="Ulangi Password" />
                                        </div>
                                     
                                     <button class="btn btn-theme btn-block" type="submit" name="login" value="login"><i class="fa fa-lock"></i>REGISTER</button>
                                    <hr />
                                    Sudah Register Akun ?  <a href="login.php" >Login Disini</a>
                                    </form>
                            </div>
                           
                        </div>
                    </div>
        </div>
    </div>
     <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
</body>
</html>



<?php

    /* Koneksi ke Database */
	mysql_connect("localhost","root");
	mysql_select_db("db_klinik");
	include "conn.php";
	/* Simpan Permintaan */
	if(isset($_POST['login']))
	{
	$nama = $_POST['nama'];
	$username = $_POST['username'];
	$level_user = $_POST['level_user'];
	$password = $_POST['password'];

			$insert = mysqli_query($koneksi, "INSERT INTO t_user (nama, username, level_user, password) 
			VALUES ('$nama','$username', '$level_user', '$password')") or die(mysqli_error());
				
				if ($insert ){

        
        echo"<script language='javascript'>
	                alert('Data Berhasil Masuk');
					document.location.href='login.php';
                </script>
            ";
        }else{
         echo"<script language='javascript'>
                   alert('Gagal');
				   document.location.href='login.php';
            	</script> ";
        }        
				}		
	?>