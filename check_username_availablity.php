<?php
sleep(1);
include('master/config/conect.php');
if($_REQUEST)
{
	$MCSQL="SELECT * FROM users WHERE user ='".$_POST['username']."'";
	// echo $MCSQL;
	$link->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ); 
	$MCC = $link->prepare($MCSQL); 
	$MCC->execute(); 
	if ($MCC->fetch() > 0)
	{
		echo 1;
	}
	else
	{
		echo 0;
	}	
}	
?>