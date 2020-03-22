<?php
    ob_start();
    include(dirname(__FILE__).'\cetak_kartuAntrian.php');
    $content = ob_get_clean();
    require_once('../../assets/html2pdf/html2pdf.class.php');
    try
    {
        $html2pdf = new HTML2PDF('L', 'A5', 'fr');
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        $html2pdf->Output('cetak_kartuAntrian.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
