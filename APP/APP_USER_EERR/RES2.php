<?php 
	ini_set('display_errors', 'off');
	error_reporting(E_ALL ^ E_NOTICE);
	if (isset($_REQUEST['sedes'])) 	{	$sedes 		= $_REQUEST['sedes'];	} else {	$sedes = "";	} 
	if (isset($_REQUEST['ccosto'])) {	$ccosto		= $_REQUEST['ccosto'];	} else {	$ccosto = "";	}  
	if (isset($_REQUEST['agno'])) 	{	$agno		= $_REQUEST['agno'];	} else {	$agno = "";		}  
	if (isset($_REQUEST['meses'])) 	{	$meses		= $_REQUEST['meses'];	} else {	$meses = "";	} 
	
	 
	for ($i=0; $i<sizeof($sedes); $i++) {
		$sede .= $sedes[$i].','; 
		// echo "<br> Sedes " . $i . ": " . $sedes[$i];    
	} 
	 
	for ($i=0; $i<sizeof($ccosto); $i++) {
		$CC .= $ccosto[$i].','; 
		//echo "<br> CC_Origen " . $i . ": " . $ccosto[$i];    
	}  
	
	for ($i=0; $i<sizeof($meses); $i++) {
		$months .= $meses[$i].',';
		
		/*
		if ($months == '-1,')
		$mes .= 'Todos';  
		else 
		$mes .= $months; 		 
		*/
		//echo "<br> Meses " . $i . ": " . $meses[$i];    
	} 
	
	//$agno = $_POST["agno"];
	//echo '<br> A&Ntilde;O: '.$agno; 
	
	/*
	include ("../../../../lib/adodb/adodb.inc.php");
	include('../../MASTER/config/conect.php');	 
	$SQL="SELECT *
		  FROM PPTO_IPCHILE..PPTO_CentroCosto
		  WHERE id =". $sedes;
	$RES = $DB2->Execute($SQL); 
//	echo $SQL; 
	foreach($RES as $k => $ROW)  { 
		if (trim($ROW[2]) == '2108')
			$sede .= $N2; 
		else 
			$sede .= $N1;  
	} 
	*/ 
?> 
<iframe src="../APP_USER_PPTO_EERR_WEB/EERR_RES2.php?sede=<?php echo substr($sede,0,-1);; ?>&CC=<?php echo substr($CC,0,-1); ?>&agno=<?php echo $agno; ?>&meses=<?php echo substr($months,0,-1); ?>" width="100%" height="1000" frameborder="0"></iframe>