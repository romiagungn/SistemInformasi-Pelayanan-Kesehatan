<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sistem Informasi Pelayanan Kesehatan Klinik Green Care Bandung</title>
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

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      
	  <div id="login-page">
	  	<div class="container" >
	  		<?php
			    if (isset($_GET['error'])) : ?>
			        <div class="alert alert-warning alert-dismissible" role="alert">
			          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			            <span aria-hidden="true">&times;</span>
			          </button>
			          <strong>Warning!</strong> <?=base64_decode($_GET['error']);?>
			        </div>
		    <?php endif;?>
			<div class="row text-center ">
            <div class="col-md-12" >
			<br>
			<br>
				<img width="150" src="assets/img/a.png">
                <h2 style='color:#9999ff'>Klinik Greencare Bandung Login Site</h2>
                 <br />
            </div>
        </div>
		<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1" >
                        <div class="panel panel-default">
                            <div class="panel-heading" style='background-color:'>
                        <strong >Form Login Klinik</strong>  
                            </div>
							
		      <form class="form-login" action="check-login.php" method="post">
				<div class="panel-body" style='background-color:'>
		        <div class="login-wrap">
				<br>
		            <div class="form-group input-group">
						<span class="input-group-addon" style='background-color:'><i class="fa fa-tag"  ></i></span>
						<input type="text" class="form-control" name="username" placeholder="Your Username " autofocus/>
					</div>
					 <div class="form-group input-group">
						<span class="input-group-addon" style='background-color:'><i class="fa fa-lock"  ></i></span>
						<input type="password" class="form-control" name="password"  placeholder="Your Password" />
					</div>
                <br>
										<div class="form-group">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" /> Remember me
                                            </label>
                                        </div>
		            <button class="btn btn-theme btn-block" type="submit" name="login" ><i class="fa fa-lock" ></i>SIGN IN</button>
					<hr />
		        </div>
		        </div>
		      </form>	

			  
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
	
    <script src="assets/js/jquery.backstretch.min.js"></script>
	<!-- <script>
		$.backstretch("assets/img/Green.jpg", {speed: 500})
	</script> !-->
</body>
</html>
