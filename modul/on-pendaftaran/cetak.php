<script>
    function popup(url) 
                        {
                         params  = 'fullscreen=yes';
                        

                         newwin=window.open(url,'windowname4', params);
                         if (window.focus) {newwin.focus()}
                         return false;
                        }
 </script>
 <?php
 $id_pasien=$_GET['id_pasien'];
 ?>
<script type="text/javascript">popup('cetak_KartuPasien.php?SIMPAN=<?php echo $id_pasien ?>');
document.location.href='pasien.php';
</script>