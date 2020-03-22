<form method="post"enctype="multipart/form-data">
        <table class="table table-bordered" width="100%" border="0" cellspacing="0" cellpadding="0" class="responsive table table-striped table-bordered">
                            <tr style="background-color:#">
                            <th style="text-align:center">No.</th>
                            <th style="text-align:center">Kode Barang</th>
							<th style="text-align:center">Nama Barang</th>
							<th style="text-align:center">Stok Obat Awal</th>
							<th style="text-align:center">Stok Obat Akhir</th>
                            <th style="text-align:center">Jumlah Barang Pesanan</th>
                            <th style="text-align:center">ID Supplier</th>
                            <th style="text-align:center">Nama Supplier</th>
							<th style="text-align:center">aksi</th>
							</tr>
							
            <?php
            $awal=0;
            if (@$_POST["id_obat"]!=''){
                if (empty($_SESSION["isi"])==TRUE){
                    $_SESSION["isi"]=1;
                }else{
                    $_SESSION["isi"]++;
                }
                @$IdObat = $_POST['id_obat'];
                $tampil = mysql_fetch_array(mysql_query("select * from t_obat where  id_obat= '$IdObat'"));
                @$NamaObat= $tampil["nama_obat"];
                @$Stock=trim($_POST["jumlah"]);
				@$sisa=$tampil["stok_obat_awal"];
				@$optimum=$tampil["stok_obat"];
				@$supplier=trim($_POST["nama_supplier"]);
				@$id_supplier=trim($_POST["id_supplier"]);
                $_SESSION["akhir"][$_SESSION["isi"]]=array($IdObat,$NamaObat,$Stock,$sisa,$optimum,$supplier,$id_supplier);
            }
                @$awal = $_SESSION["isi"];   
                for ($i=0;$i<=$awal;$i++) {
                if (@$_SESSION['akhir'][$i][0]!=''){ ?>
                    <tr>
                            <td align="center"><?php echo $i?></td>
                            <td align="center"><?php echo @$_SESSION['akhir'][$i][0] ?></td>
                            <td align="center"><?php echo @$_SESSION['akhir'][$i][1] ?></td>
                            <td align="center"><?php echo @$_SESSION['akhir'][$i][3] ?></td>
                            <td align="center"><?php echo @$_SESSION['akhir'][$i][4] ?></td>
                            <td align="center"><?php echo @$_SESSION['akhir'][$i][2] ?></td>
                            <td align="center"><?php echo @$_SESSION['akhir'][$i][6] ?></td>
                            <td align="center"><?php echo @$_SESSION['akhir'][$i][5] ?></td>
						<td>
			<div class='btn-group' >
			<a href="?&aksi=hapus&nmr=<?php echo $i; ?>"  class="btn btn-xs btn-danger" title="Hapus Data Ini" onclick="return confirm('ANDA YAKIN AKAN MENGHAPUS DATA PENTING INI ... ?')"><i class="glyphicon glyphicon-trash"></i></a> 
	
		</div>
                            </td>
					
                    </tr>
                       
                    <?php }
                }
            ?>
           
           
            <tr>
            <td colspan='9' align="right">
			<div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" name="save" class="btn btn-primary">simpan</button>
                        </div>
            </td>
            </tr>           
     
                       
            </table>
			  </form>
				<?php
error_reporting(0);
	if($_GET["aksi"] && $_GET["nmr"]){
		 unset($_SESSION['akhir'][$_GET["nmr"]]);
		 $_SESSION["isi"]--;
			echo "<meta http-equiv='refresh' content='0; url=?'>";
	}
?>	
   	<?php
			if (isset($_POST['save'])){
			// Simpan ke Database
			include('conn.php');
            $tanggal = date("Y-m-d");
			$persetujuan=1;
			$LastID= FormatNoPermintaan(OtomatisID());
    		$sql = "insert into permintaan (id_permintaan,tanggal,persetujuan) values 
			('$LastID','$tanggal','$persetujuan')";
			mysql_query($sql);
			@$awal = $_SESSION['isi'];
    $j=0;
    while($j <= $awal){
        $IdObat = @$_SESSION['akhir'][$j][0];
        $Stok = @$_SESSION['akhir'][$j][2];
        $id_supplier = @$_SESSION['akhir'][$j][6];
		$status=1;
        if($IdObat!="" and $Stok!="" and $id_supplier!=""){
            $query = mysql_query("
                insert into detail_permintaan (id_permintaan,id_obat,jumlah,status,id_supplier)
                values('$LastID','$IdObat','$Stok','$status','$id_supplier')
            ");
          
        }
        $j++;
    }
    echo "<script type='text/javascript'>alert('Data berhasil disimpan')</script>";
    echo "<script>document.location.href='tambah_permintaan.php';</script>";
    unset($_SESSION['isi']);
    echo "".mysql_error();

			}
			?>
             