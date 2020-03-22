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
 $no_pembayaran=$_GET['no_pembayaran'];
 ?>
<script type="text/javascript">popup('cetak_kartuPembayaran.php?SIMPAN=<?php echo $no_pembayaran ?>');
document.location.href='pembayaran.php';
</script>