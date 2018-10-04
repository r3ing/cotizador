<?php 
	// include ("../../../../lib/adodb/adodb.inc.php");
	
	// ********************************************************************************************** // 
	// ***************************** STRING DE CONEXIÓN A MANAGEMENT ******************************** // 
	// ********************************************************************************************** // 
	
	$user ='ppto_ipchile';
	$pwd ='ppto.ipchile';
	$DB =& ADONewConnection('odbc_mssql');
	$dsn = "Driver={SQL Server};Server=192.168.51.209\bi_ppto;Database=management;";
	
	$DB->Connect($dsn,$user,$pwd); 	 
	/*
		$sql = "SELECT TOP 10 * FROM [GEC_STG].[dbo].Detalles";
		
		$result = $DB->Execute($sql);
		foreach($result as $k => $fila) {
			echo $fila[0];
		}
		$DB->Close();
	*/
	
	// ********************************************************************************************** // 
	// ***************************** STRING DE CONEXIÓN A PPTO_IPCHILE ****************************** // 
	// ********************************************************************************************** // 
	
	$user ='ppto_ipchile';
	$pwd ='ppto.ipchile';
	$DB2 =& ADONewConnection('odbc_mssql');
	$dsn = "Driver={SQL Server};Server=192.168.51.209\bi_ppto;Database=PPTO_IPCHILE;";
	
	$DB2->Connect($dsn,$user,$pwd); 
		
	
	// ********************************************************************************************** // 
	// ***************************** STRING DE CONEXIÓN A GESTIONTI ********************************* // 
	// ********************************************************************************************** //
	
	## Credenciales BD
	$user ='gestion_ti';
	$pwd ='gestion.ti';
												   
	## Crea instancia
	$DB3 = NewADOConnection('odbc_mssql');
	@$drv = "Driver={SQL Server Native Client 10.0};Server=192.168.51.127\piloto_bi;Database=GestionTI;";
	## Conecta
	$DB3->Connect($drv,$user,$pwd); 
 
	/* 
	$user ='gestion_ti';
	$pwd ='gestion.ti';
	$DB3 =& ADONewConnection('odbc_mssql');
	$dsn = "Driver={SQL Server};Server=192.168.51.127\piloto_bi;Database=GestionTI;";	
	$DB3->Connect($dsn,$user,$pwd); 	
	*/	
	
	// ********************************************************************************************** // 
	// *********************** STRING DE CONEXIÓN A GESTION COTIZACIONES***************************** // 
	// ********************************************************************************************** // 
	
	## Credenciales BD
	$user ='gestion_cotizaciones';
	$pwd ='gc.0512';
												   
	## Crea instancia
	$DB4 = NewADOConnection('odbc_mssql');
	@$drv = "Driver={SQL Server Native Client 10.0};Server=192.168.51.127\piloto_bi;Database=gestion_cotizaciones;";
	## Conecta
	$DB4->Connect($drv,$user,$pwd);
	
	
	// MySQL 
	/*public function conectar()
    {
        $this->conexion = mysql_connect('192.168.51.77','reportes','iP.2015*.*') or die("Lo sentimos, no se ha podido conectar con MySQL: " . mysql_error());                                       
        $this->db = mysql_select_db('wp_ipchile', $this->conexion) or die("Lo sentimos, no se ha podido conectar con la base datos: wp_ipchile");                                                               
        return true;
    }   */ 
?>