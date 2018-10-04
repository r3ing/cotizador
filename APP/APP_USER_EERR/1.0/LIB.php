<?php 
	$cfg->dbhost = '192.168.51.209\bi_ppto';
	$cfg->dbuser = 'ppto_ipchile';
	$cfg->dbpass = 'ppto.ipchile';
	$cfg->dbselect = 'PPTO_IPCHILE';
	
function get_sql_adoDb($sql){
	include ("../../../../lib/adodb/adodb.inc.php");
	GLOBAL $cfg;
	$server		= $cfg->dbhost;
	$usuariobd	= $cfg->dbuser;
	$clavebd	= $cfg->dbpass  ;
	$bda		= $cfg->dbselect ;	
	$user    	= $usuariobd;
	$pwd    	= $clavebd;
	$db        	= NewADOConnection('odbc_mssql');
	//$db->debug = true;
	$dsn = "Driver={SQL Server};Server=$server;Database=$bda;";
	$db->Connect($dsn,$user,$pwd);		
	$rs= $db->Execute("$sql");	
	$resultado=array();
	while (!$rs->EOF) {
		$resultado[]=($rs->fields);
		$rs->MoveNext();
	}	
	$db -> Close();
	return $resultado;
} 
?>