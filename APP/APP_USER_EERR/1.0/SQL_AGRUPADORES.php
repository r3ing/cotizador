<?php  
	if($row[6] == 9)
	{
		$SQL_AGR = "SELECT name
					FROM PPTO_CuentaContable 
					WHERE idpadre = ".$row[0];  
	}
	if($row[6] == 8)
	{
		$SQL_AGR = "SELECT name
					FROM PPTO_CuentaContable
					WHERE idpadre IN (
							SELECT id
							FROM PPTO_CuentaContable
							WHERE idpadre = ".$row[0]."
							)"; 
	}
	if($row[6] == 7)
	{
		$SQL_AGR = "SELECT name
					FROM PPTO_CuentaContable
					WHERE idpadre IN (
							SELECT id
							FROM PPTO_CuentaContable
							WHERE idpadre IN (
									SELECT id
									FROM PPTO_CuentaContable
									WHERE idpadre = ".$row[0]."
									)
							)"; 
	}
	if($row[6] == 6)
	{
		$SQL_AGR = "SELECT name
					FROM PPTO_CuentaContable
					WHERE idpadre IN (
							SELECT id
							FROM PPTO_CuentaContable
							WHERE idpadre IN (
									SELECT id
									FROM PPTO_CuentaContable
									WHERE idpadre IN (
													SELECT id
													FROM PPTO_CuentaContable
													WHERE idpadre = ".$row[0]."
													)
									)
							) "; 
	}
	if($row[6] == 5)
	{
		$SQL_AGR = "SELECT name
					FROM PPTO_CuentaContable
					WHERE idpadre IN (
							SELECT id
							FROM PPTO_CuentaContable
							WHERE idpadre IN (
									SELECT id
									FROM PPTO_CuentaContable
									WHERE idpadre IN (
													SELECT id
													FROM PPTO_CuentaContable
													WHERE idpadre IN (
																	SELECT id
																	FROM PPTO_CuentaContable
																	WHERE idpadre = ".$row[0]."
																	)
													)
									)
							)"; 
	}
	if($row[6] == 4)
	{
		$SQL_AGR = "SELECT name
					FROM PPTO_CuentaContable
					WHERE idpadre IN (
							SELECT id
							FROM PPTO_CuentaContable
							WHERE idpadre IN (
									SELECT id
									FROM PPTO_CuentaContable
									WHERE idpadre IN (
													SELECT id
													FROM PPTO_CuentaContable
													WHERE idpadre IN (
																	SELECT id
																	FROM PPTO_CuentaContable
																	WHERE idpadre IN (
																					SELECT id
																					FROM PPTO_CuentaContable
																					WHERE idpadre = ".$row[0]."
																					)
																	)
													)
									)
							)"; 
	}
	if($row[6] == 3)
	{
		$SQL_AGR = "SELECT name
					FROM PPTO_CuentaContable
					WHERE idpadre IN (
							SELECT id
							FROM PPTO_CuentaContable
							WHERE idpadre IN (
									SELECT id
									FROM PPTO_CuentaContable
									WHERE idpadre IN (
													SELECT id
													FROM PPTO_CuentaContable
													WHERE idpadre IN (
																	SELECT id
																	FROM PPTO_CuentaContable
																	WHERE idpadre IN (
																					SELECT id
																					FROM PPTO_CuentaContable
																					WHERE idpadre IN (
																									SELECT id
																									FROM PPTO_CuentaContable
																									WHERE idpadre = ".$row[0]."
																									)
																					)
																	)
													)
									)
							)"; 
	}
	 
	/*
	$SQL_AGR = "SELECT NAME8
				FROM dbo.VW_EERR_JERARQUIA_CUENTASCONTABLES
				WHERE IDPADRE_NIVEL".$row[6]." = ".$row[0]; 
	*/
	$SQL_AGR= "SELECT  R2.NIVEL1, R2.ID_NIVEL1, R1.scenario, SUM(R1.valor) AS total
FROM
(
	SELECT * FROM VW_EERR_PPTO_DETALLES_TOTAL
) R1
FULL OUTER JOIN (
	SELECT NIVEL1, ID_NIVEL1, NAME8
	FROM dbo.VW_EERR_JERARQUIA_CUENTASCONTABLES
	GROUP BY NIVEL1, ID_NIVEL1, NAME8

	UNION ALL 

	SELECT NIVEL2, ID_NIVEL2, NAME8
	FROM dbo.VW_EERR_JERARQUIA_CUENTASCONTABLES
	GROUP BY NIVEL2, ID_NIVEL2, NAME8
	
	UNION ALL 

	SELECT NIVEL3, ID_NIVEL3, NAME8
	FROM dbo.VW_EERR_JERARQUIA_CUENTASCONTABLES
	GROUP BY NIVEL3, ID_NIVEL3, NAME8
	
	UNION ALL 

	SELECT NIVEL4, ID_NIVEL4, NAME8
	FROM dbo.VW_EERR_JERARQUIA_CUENTASCONTABLES
	GROUP BY NIVEL4, ID_NIVEL4, NAME8
	
	UNION ALL 
	
	SELECT NIVEL5, ID_NIVEL5, NAME8
	FROM dbo.VW_EERR_JERARQUIA_CUENTASCONTABLES
	GROUP BY NIVEL5, ID_NIVEL5, NAME8
	
	UNION ALL 
	
	SELECT NIVEL6, ID_NIVEL6, NAME8
	FROM dbo.VW_EERR_JERARQUIA_CUENTASCONTABLES
	GROUP BY NIVEL6, ID_NIVEL6, NAME8
	
	UNION ALL 
	
	SELECT NIVEL7, ID_NIVEL7, NAME8
	FROM dbo.VW_EERR_JERARQUIA_CUENTASCONTABLES
	GROUP BY NIVEL7, ID_NIVEL7, NAME8
) R2 ON R2.NAME8 = R1.CuentaContable 
GROUP BY R2.NIVEL1, R2.ID_NIVEL1, R1.scenario ";
	$RES_AGR = $DB2->Execute($SQL_AGR); 
	//$total = 0; 
	foreach($RES_AGR as $k => $ROW_AGR) 
	{																													
		 
			if ($ROW_AGR[1] == $row[0] && $e[0] == $ROW_AGR[2])
			{
				if ($ROW_AGR[3] < 0)		$color = 'style="color:#FF0000;"'; 
				else if ($ROW_AGR[3] > 0)	$color = 'style="color:#000000;"';
						
				echo '<a '.$color.' href="details.php?agno='.$agno.'&scenario='.$e[0].'&ctacble='.$row[0].'&nivel='.$row[6].'" rel="modal:open">'; 
				echo number_format($ROW_AGR[3], 0, ".", "."); 	
				echo '</a>'; 
			} 																												
	}	
	
?>