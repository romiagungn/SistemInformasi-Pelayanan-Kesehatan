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
 $id_rekam=$_GET['id_rekam'];
 ?>
<script type="text/javascript">popup('cetak_kartuRujukan.php?SIMPAN=<?php echo $id_rekam ?>');
document.location.href='rekammedis.php';
</script>