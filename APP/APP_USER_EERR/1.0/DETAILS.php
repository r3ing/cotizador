<?php 
	include('../../MASTER/include/verifyAPP.php'); 
	
	include ("../../../../lib/adodb/adodb.inc.php");
	include('../../MASTER/config/conect.php');		
	
	$id_usuario	= $vari[0]; 
	
	$agno 		= $_GET["agno"]; 
	$scenario	= $_GET["scenario"];
	$ctacble	= $_GET["ctacble"];	
	$nivel 		= $_GET["nivel"]; 
	$nom_escenario="";
	$cuenta="";
	
	$SQL_ESC = 'SELECT descripcion 
				FROM PPTO_Scenarios
				WHERE id = '.$scenario; 
	
    $RES_ESC = $DB2->Execute($SQL_ESC);
	foreach($RES_ESC as $k => $ROW_ESC)
	{
		$nom_escenario .= $ROW_ESC[0];
	}
	
	$SQL_CTA = 'SELECT descripcion 
				FROM PPTO_CuentaContable
				WHERE id = '.$ctacble;  
	
	$RES_CTA = $DB2->Execute($SQL_CTA); 
	foreach($RES_CTA as $k => $ROW_CTA)
	{
		$cuenta .= $ROW_CTA[0]; 
	}
	
	/*
	$SQL_CTAS = "SELECT CodigoCuentaJerEERR 
				FROM VW_CUENTASCONTABLES 
				WHERE EERR_Nivel".$nivel." = '".$cuenta."'"; 
	$RES_CTAS = $DB2->Execute($SQL_CTAS); 
	
	foreach($RES_CTAS as $k => $ROW_CTAS) 
	{
		$cuentas .= "'".$ROW_CTAS[0]."'".','; 
	}
	*/
?>
<!DOCTYPE html> 
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD --> 
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /> 
<head>
	<?php 
		include ("../HEAD.php");
	?>  
	<link rel="stylesheet" type="text/css" href="../../MASTER/assets/global/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css"/>
	<link rel="stylesheet" type="text/css" href="../../MASTER/assets/global/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css"/>
	<link rel="stylesheet" type="text/css" href="../../MASTER/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/> 
</head>
<!-- END HEAD --> 
<body> 
<!-- BEGIN CONTENT --> 
<div class="page-content">  
	<!-- BEGIN PAGE CONTENT-->
	<div class="row" style="width:100%">
		<div class="col-md-12">
			<!-- BEGIN PAGE CONTENT INNER -->  
			<div class="row"> 	
				<div class="col-md-12 col-sm-12">
					<!-- BEGIN PORTLET -->
					<div class="portlet light ">
						<div class="portlet-title">
							<div class="caption caption-md">
								<i class="icon-bar-chart theme-font-color hide"></i>
								<span class="caption-subject theme-font-color bold uppercase">
									<u><?php echo utf8_encode($cuenta);  ?></u> (Escenario: <?php echo $nom_escenario; ?> | A&ntilde;o: <?php echo $agno; ?>)
								</span> 
							</div> 
						</div>
						<div class="portlet-body">    
							<!-- BEGIN EXAMPLE TABLE PORTLET-->
							<div class="portlet box blue-hoki">
								<div class="portlet-title">
									<div class="caption">
										<i class="fa fa-globe"></i> DETALLES
									</div>
									<div class="tools">
									</div>
								</div>
								<div class="portlet-body">
									<table class="table table-striped table-bordered table-hover" id="sample_1" style="font-size:11px;">
										<thead>
											<tr class="info" style="font:bold;">	 	
												<td>CUENTA CONTABLE</td>
												<td>DESC. CTA. CBLE.</td>
												<td>SEDE</td>
												<td>DESC. SEDE</td>
												<td>CENTRO DE COSTO</td> 
												<td>DESC. CCOSTO</td>
												<td>DESCRIPCI&Oacute;N</td>
												<td>JUSTIFICACI&Oacute;N</td>
												<td>ENERO</td>
												<td>FEBRERO</td>
												<td>MARZO</td>
												<td>ABRIL</td>
												<td>MAYO</td>
												<td>JUNIO</td>
												<td>JULIO</td>
												<td>AGOSTO</td>
												<td>SEPTIEMBRE</td>
												<td>OCTUBRE</td>
												<td>NOVIEMBRE</td>
												<td>DICIEMBRE</td>
												<td><b>TOTAL</b></td>
											</tr> 
										</thead>
										<tbody> 
										<?php 
											include ("../../../../lib/adodb/adodb.inc.php");
											include('../../MASTER/config/conect.php');
											$SQL_PIVOT = "EXEC EERR_TOTAL_CONSOLIDADO_PIVOT ".$agno.", ".$scenario.", '".$cuenta."', ".$nivel.", ".$id_usuario." "; 
											$RES_PIVOT = $DB2->Execute($SQL_PIVOT);
											// echo $SQL_PIVOT;  
											$total	= 0; 
											$T01 	= 0; 
											$T02 	= 0; 
											$T03 	= 0; 
											$T04 	= 0; 
											$T05 	= 0; 
											$T06 	= 0; 
											$T07 	= 0; 
											$T08 	= 0; 
											$T09 	= 0; 
											$T10 	= 0; 
											$T11 	= 0; 
											$T12 	= 0; 
											foreach($RES_PIVOT as $k => $row) 
											{
										?>
											<tr style="color:#000000;"> 		
												<td><?php echo utf8_encode($row[0]); ?></td>
												<td><?php echo utf8_encode($row[1]); ?></td>
												<td><?php echo utf8_encode($row[2]); ?></td>
												<td><?php echo utf8_encode($row[3]); ?></td>
												<td><?php echo utf8_encode($row[4]); ?></td>
												<td><?php echo utf8_encode($row[5]); ?></td> 
												<td><?php echo utf8_encode($row[7]); ?></td>
												<td><?php echo utf8_encode($row[8]); ?></td>
												<td><?php echo number_format($row[9], 0, ".", "."); ?></td>
												<td><?php echo number_format($row[10], 0, ".", "."); ?></td>
												<td><?php echo number_format($row[11], 0, ".", "."); ?></td>
												<td><?php echo number_format($row[12], 0, ".", "."); ?></td>
												<td><?php echo number_format($row[13], 0, ".", "."); ?></td>
												<td><?php echo number_format($row[14], 0, ".", "."); ?></td>
												<td><?php echo number_format($row[15], 0, ".", "."); ?></td>
												<td><?php echo number_format($row[16], 0, ".", "."); ?></td>
												<td><?php echo number_format($row[17], 0, ".", "."); ?></td>
												<td><?php echo number_format($row[18], 0, ".", "."); ?></td>
												<td><?php echo number_format($row[19], 0, ".", "."); ?></td>
												<td><?php echo number_format($row[20], 0, ".", "."); ?></td> 
												<?php $total = $row[9]+$row[10]+$row[11]+$row[12]+$row[13]+$row[14]+$row[15]+$row[16]+$row[17]+$row[18]+$row[19]+$row[20]; ?>
												
												<td><b><?php echo number_format($total, 0, ".", "."); ?></b></td> 
												
												<?php
													$T01 += $row[9]; 
													$T02 += $row[10]; 
													$T03 += $row[11]; 
													$T04 += $row[12]; 
													$T05 += $row[13]; 
													$T06 += $row[14]; 
													$T07 += $row[15]; 
													$T08 += $row[16]; 
													$T09 += $row[17]; 
													$T10 += $row[18]; 
													$T11 += $row[19]; 
													$T12 += $row[20]; 
												?>
											</tr>
										<?php 
											}
											$DB2->Close(); 
										?> 
											<tr class="success">
												<td><b><h3>TOTAL</h3></b></td>
												<td>&nbsp;</td>
												<td>&nbsp;</td>
												<td>&nbsp;</td>
												<td>&nbsp;</td>
												<td>&nbsp;</td>
												<td>&nbsp;</td>
												<td>&nbsp;</td>
												<td><b><?php echo number_format($T01, 0, ".", "."); ?></b></td>
												<td><b><?php echo number_format($T02, 0, ".", "."); ?></b></td>
												<td><b><?php echo number_format($T03, 0, ".", "."); ?></b></td>
												<td><b><?php echo number_format($T04, 0, ".", "."); ?></b></td>
												<td><b><?php echo number_format($T05, 0, ".", "."); ?></b></td>
												<td><b><?php echo number_format($T06, 0, ".", "."); ?></b></td>
												<td><b><?php echo number_format($T07, 0, ".", "."); ?></b></td>
												<td><b><?php echo number_format($T08, 0, ".", "."); ?></b></td>
												<td><b><?php echo number_format($T09, 0, ".", "."); ?></b></td>
												<td><b><?php echo number_format($T10, 0, ".", "."); ?></b></td>
												<td><b><?php echo number_format($T11, 0, ".", "."); ?></b></td>
												<td><b><?php echo number_format($T12, 0, ".", "."); ?></b></td>
												<td>
													<b>
													<?php 
														$TG = 0; 
														$TG = $T01+$T02+$T03+$T04+$T05+$T06+$T07+$T08+$T09+$T10+$T11+$T12; 
														echo number_format($TG, 0, ".", ".");
													?>
													</b>
												</td>
											</tr>
										</tbody> 
									</table>
								</div>
							</div>
							<!-- END EXAMPLE TABLE PORTLET--> 
						</div>
					</div>
					<!-- END PORTLET-->
				</div>
			</div>  
			<!-- END PAGE CONTENT INNER --> 
		</div>
	</div>
	<!-- END PAGE CONTENT-->
</div> 
<!-- END CONTENT --> 


<?php 
	include ("../FOOTER.php");
?> 
</body>
<!-- END BODY --> 
</html>