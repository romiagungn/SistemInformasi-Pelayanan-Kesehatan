<?php
function OtomatisID4()
{
$querycount="SELECT count(id_retur) as LastID FROM retur";
$result=mysql_query($querycount) or die(mysql_error());
$row=mysql_fetch_array($result, MYSQL_ASSOC);
return $row['LastID'];
}

function Formatret($num) {
        $num=$num+1;
		$bulan = date("m");
		$tahun = date("y");
		switch (strlen($num))
        {    
        case 1 : $NoTrans = "RET"."-".$bulan."-".$tahun."-"."000".$num; break;    
        case 2 : $NoTrans = "RET"."-".$bulan."-".$tahun."-"."00".$num; break;    
        case 3 : $NoTrans = "RET"."-".$bulan."-".$tahun."-"."0".$num;  break;    
        default: $NoTrans = $num;       
        }          
        return $NoTrans;
}
?> 
