<?php 
	error_reporting(E_ALL ^ E_NOTICE);
	if (isset($_REQUEST['N1'])) 	{	$N1 		= $_REQUEST['N1'];		} else {	$N1 = "";		} 
	if (isset($_REQUEST['N2'])) 	{	$N2 		= $_REQUEST['N2'];		} else {	$N2 = "";		} 
	if (isset($_REQUEST['IDP_CC'])) {	$IDP_CC 	= $_REQUEST['IDP_CC'];	} else {	$IDP_CC = "";	} 
	if (isset($_REQUEST['agno'])) 	{	$agno		= $_REQUEST['agno'];	} else {	$agno = "";		} 
	if (isset($_REQUEST['CC'])) 	{	$ccosto		= $_REQUEST['CC'];		} else {	$ccosto = "";	} 
	if (isset($_REQUEST['meses'])) 	{	$checkbox	= $_REQUEST['meses'];	} else {	$checkbox = "";	} 
	
 	for ($j = 0; $j<sizeof($ccosto); $j++) {
	 $CC .= $ccosto[$j].','; 
	}
	
	for ($i = 0; $i<sizeof($checkbox); $i++) {
		$months = $checkbox[$i].','; 
	 
		if ($months == '01,02,03,04,05,06,07,08,09,10,11,12,')
		$meses .= 'Todos';  
		else 
		$meses .= $months; 		
	}
?>
<iframe src="../APP_USER_PPTO_EERR_WEB/EERR_RES.php?N1=<?php echo $N1; ?>&N2=<?php echo $N2; ?>&IDP_CC=<?php echo $IDP_CC; ?>&CC=<?php echo substr($CC,0,-1); ?>&agno=<?php echo $agno; ?>&meses=<?php echo substr($meses,0,-1); ?>" width="100%" height="770" frameborder="0"></iframe>