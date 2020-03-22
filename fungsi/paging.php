<style>
.pagin {
padding: 10px 0;
font:bold 11px/30px arial, serif;
}
.pagin * {
padding: 2px 6px;
color:#0A7EC5;
margin: 2px;
border-radius:3px;
}
.pagin a {
		border:solid 1px #8DC5E6;
		text-decoration:none;
		background:#F8FCFF;
		padding:6px 7px 5px;
}

.pagin span, a:hover, .pagin a:active,.pagin span.current {
		color:#FFFFFF;
		background:-moz-linear-gradient(top,#B4F6FF 1px,#63D0FE 1px,#58B0E7);
		    
}
.pagin span,.current{
	padding:8px 7px 7px;
}
.content{
	padding:10px;
	font:bold 12px/30px gegoria,arial,serif;
	border:1px dashed #0686A1;
	border-radius:5px;
	background:-moz-linear-gradient(top,#E2EEF0 1px,#CDE5EA 1px,#E2EEF0);
	margin-bottom:10px;
	text-align:left;
	line-height:20px;
}
.outer_div{
	margin:auto;
	width:600px;
}
#loader{
	position: absolute;
	text-align: center;
	top: 75px;
	width: 100%;
	display:none;
}

</style>
<?php
function paginate($reload, $hal, $thals, $adjacents) {
	$prevlabel = "&lsaquo; Prev";
	$nextlabel = "Next &rsaquo;";
	$out = '<div class="pagin green">';

	

	if($hal==1) {
		$out.= "<span>$prevlabel</span>";
	} else if($hal==2) {
		$out.= "<a href='".$reload."&hal=".($hal-1)."'>$prevlabel</a>";
	}else {
		$out.= "<a href='".$reload."&hal=".($hal-1)."'>$prevlabel</a>";

	}
	
	
	if($hal>($adjacents+1)) {
		$out.= "<a href='".$reload."&hal=1'>1</a>";
	}
	
	if($hal>($adjacents+2)) {
		$out.= "...\n";
	}

	

	$pmin = ($hal>$adjacents) ? ($hal-$adjacents) : 1;
	$pmax = ($hal<($thals-$adjacents)) ? ($hal+$adjacents) : $thals;
	for($i=$pmin; $i<=$pmax; $i++) {
		if($i==$hal) {
			$out.= "<span>$i</span>";
		}else if($i==1) {
			$out.= "<a href='".$reload."&hal=$i'>$i</a>";
		}else {
			$out.= "<a href='".$reload."&hal=$i'>$i</a>";
		}
	}

	

	if($hal<($thals-$adjacents-1)) {
		$out.= "...\n";
	}

	

	if($hal<($thals-$adjacents)) {
		$out.= "<a href='".$reload."&hal=$thals'>$thals</a>";
	}

	

	if($hal<$thals) {
		$out.= "<a href='".$reload."&hal=".($hal+1)."'>$nextlabel</a>";
	}else {
		$out.= "<span>$nextlabel</span>";
	}
	$out.= "</div>";
	return $out;
}
?>