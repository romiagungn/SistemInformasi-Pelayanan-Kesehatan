<?php

	  date_default_timezone_set('Asia/Jakarta');

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
	<!-- date picker-->
    <link href="../../assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
<div class="row">
<div class="col-lg-10">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Laporan Pengeluaran Obat
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">  
                                    <form role="form" method="post" action="laporan_pengeluaranObat.php" target="_blank">
                                        <div class="form-group">
                                            <label>Pilih Periode Bulan</label>
                                            <input name="date1" class="form-control" id="date1" required="true" type="date">
                                        </div>
										<label>Sampai Dengan</label>
										<div class="form-group">
                                            <label>Pilih Periode Bulan Kedua</label>
                                            <input name="date2" class="form-control" id="date2" required="true" type="date">
                                        </div>

                                            <span class="input-group-btn">
                                                 <button type="submit" class="btn btn-primary" name="simpan">Cetak Laporan</button>
                                            </span>
                                        </div> 
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
     <!-- /. WRAPPER  -->
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
      <!-- Date PICKER -->  
<script type="text/javascript" src="../../assets/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="../../assets/js/locales/bootstrap-datetimepicker.id.js" charset="UTF-8"></script>
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
