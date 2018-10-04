<?php 
	include('../../MASTER/include/verifyAPP.php'); 
	
	include ("../../../../lib/adodb/adodb.inc.php");
	include('../../MASTER/config/conect.php');		
	
	error_reporting(E_ALL ^ E_NOTICE);
	
	$id_usuario	= $vari[0]; 
	
	if (isset($_REQUEST['agno'])) 		{	$agno 		= $_REQUEST['agno'];		} else {	$agno 		= "";	} 
	if (isset($_REQUEST['meses'])) 		{	$meses 		= $_REQUEST['meses'];		} else {	$meses 		= "";	} 
	
	
	if (isset($_REQUEST['scenario'])) 	{	$scenario 	= $_REQUEST['scenario'];	} else {	$scenario 	= "";	} 
	if (isset($_REQUEST['ctacble'])) 	{	$ctacble 	= $_REQUEST['ctacble'];		} else {	$ctacble 	= "";	} 
	if (isset($_REQUEST['CC'])) 		{	$ccosto 	= $_REQUEST['CC'];			} else {	$ccosto 	= "";	} 
	
	if (isset($_REQUEST['nivel'])) 		{	$nivel	 	= $_REQUEST['nivel'];		} else {	$nivel 		= "";	} 
	if (isset($_REQUEST['idpadre'])) 	{	$idpadre 	= $_REQUEST['idpadre'];		} else {	$idpadre 	= "";	} 
	
	if (isset($_REQUEST['sede'])) 		{	$id_cc_sede	= $_REQUEST['sede'];			} else {	$id_cc_sede	= "";	} 
 
	
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
	
	if ($id_cc_sede != '')
	{
		$SQL_SEDE = 'SELECT name 
					FROM PPTO_CentroCosto
					WHERE id ='.$id_cc_sede; 
		$RES_SEDE = $DB2->Execute($SQL_SEDE);
		
		// echo $SQL_SEDE; 
		foreach($RES_SEDE as $k => $ROW_SEDE)
		{
			$name_sede .= $ROW_SEDE[0];
		}
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
											$SQL_PIVOT = "EXEC [EERR_TOTAL_CONSOLIDADO_PIVOT_SEARCH] ".$agno.", '".$meses."', '".$idpadre."', '".$ccosto."', ".$scenario.", '".$cuenta."', ".$nivel." , ".$id_usuario." , '".$name_sede."' "; 
											$RES_PIVOT = $DB2->Execute($SQL_PIVOT);
											//echo $SQL_PIVOT;
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
												<?php 
													$RED = 'style="color:#FF0000;"'; 
													$BLACK = 'style="color:#000000;"';
													
													if ($row[9] < 0)		$C1 = $RED; 
													else if ($row[9] >= 0)	$C1 = $BLACK;
													
													if ($row[10] < 0)		$C2 = $RED; 
													else if ($row[10] >= 0)	$C2 = $BLACK;
													
													if ($row[11] < 0)		$C3 = $RED; 
													else if ($row[11] >= 0)	$C3 = $BLACK;
													
													if ($row[12] < 0)		$C4 = $RED; 
													else if ($row[12] >= 0)	$C4 = $BLACK;
													
													if ($row[13] < 0)		$C5 = $RED; 
													else if ($row[13] >= 0)	$C5 = $BLACK;
													
													if ($row[14] < 0)		$C6 = $RED; 
													else if ($row[14] >= 0)	$C6 = $BLACK;
													
													if ($row[15] < 0)		$C7 = $RED; 
													else if ($row[15] >= 0)	$C7 = $BLACK;
													
													if ($row[16] < 0)		$C8 = $RED; 
													else if ($row[16] >= 0)	$C8 = $BLACK;
													
													if ($row[17] < 0)		$C9 = $RED; 
													else if ($row[17] >= 0)	$C9 = $BLACK;
													
													if ($row[18] < 0)		$C10 = $RED; 
													else if ($row[18] >= 0)	$C10 = $BLACK;
													
													if ($row[19] < 0)		$C11 = $RED; 
													else if ($row[19] >= 0)	$C11 = $BLACK;
													
													if ($row[20] < 0)		$C12 = $RED; 
													else if ($row[20] >= 0)	$C12 = $BLACK;
												?>												
												<td <?php echo $C1; ?>><div style="float:right"><?php echo number_format($row[9], 0, ".", "."); ?></div></td>
												<td <?php echo $C2; ?>><div style="float:right"><?php echo number_format($row[10], 0, ".", "."); ?></div></td>
												<td <?php echo $C3; ?>><div style="float:right"><?php echo number_format($row[11], 0, ".", "."); ?></div></td>
												<td <?php echo $C4; ?>><div style="float:right"><?php echo number_format($row[12], 0, ".", "."); ?></div></td>
												<td <?php echo $C5; ?>><div style="float:right"><?php echo number_format($row[13], 0, ".", "."); ?></div></td>
												<td <?php echo $C6; ?>><div style="float:right"><?php echo number_format($row[14], 0, ".", "."); ?></div></td>
												<td <?php echo $C7; ?>><div style="float:right"><?php echo number_format($row[15], 0, ".", "."); ?></div></td>
												<td <?php echo $C8; ?>><div style="float:right"><?php echo number_format($row[16], 0, ".", "."); ?></div></td>
												<td <?php echo $C9; ?>><div style="float:right"><?php echo number_format($row[17], 0, ".", "."); ?></div></td>
												<td <?php echo $C10; ?>><div style="float:right"><?php echo number_format($row[18], 0, ".", "."); ?></div></td>
												<td <?php echo $C11; ?>><div style="float:right"><?php echo number_format($row[19], 0, ".", "."); ?></div></td>
												<td <?php echo $C12; ?>><div style="float:right"><?php echo number_format($row[20], 0, ".", "."); ?></div></td> 
												
												<?php $total = $row[9]+$row[10]+$row[11]+$row[12]+$row[13]+$row[14]+$row[15]+$row[16]+$row[17]+$row[18]+$row[19]+$row[20]; ?>
												
												<?php 
													if ($total < 0)			$CT = $RED; 
													else if ($total >= 0)	$CT = $BLACK;
												?>
												<td <?php echo $CT; ?>><div style="float:right"><b><?php echo number_format($total, 0, ".", "."); ?></b></div></td> 
												
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
												<?php 
													$RED = 'style="color:#FF0000;"'; 
													$BLACK = 'style="color:#000000;"';
													
													if ($T01 < 0)	$CT1 = $RED;	else if ($T01 >= 0)		$CT1 = $BLACK;													
													if ($T02 < 0)	$CT2 = $RED; 	else if ($T02 >= 0)		$CT2 = $BLACK;													
													if ($T03 < 0)	$CT3 = $RED; 	else if ($T03 >= 0)		$CT3 = $BLACK;													
													if ($T04 < 0)	$CT4 = $RED; 	else if ($T04 >= 0)		$CT4 = $BLACK;													
													if ($T05 < 0)	$CT5 = $RED; 	else if ($T05 >= 0)		$CT5 = $BLACK;													
													if ($T06 < 0)	$CT6 = $RED; 	else if ($T06 >= 0)		$CT6 = $BLACK;													
													if ($T07 < 0)	$CT7 = $RED; 	else if ($T07 >= 0)		$CT7 = $BLACK;													
													if ($T08 < 0)	$CT8 = $RED; 	else if ($T08 >= 0)		$CT8 = $BLACK;													
													if ($T09 < 0)	$CT9 = $RED; 	else if ($T09 >= 0)		$CT9 = $BLACK;													
													if ($T10 < 0)	$CT10 = $RED; 	else if ($T10 >= 0)		$CT10 = $BLACK;													
													if ($T11 < 0)	$CT11 = $RED; 	else if ($T11 >= 0)		$CT11 = $BLACK;													
													if ($T12 < 0)	$CT12 = $RED; 	else if ($T12 >= 0)		$CT12 = $BLACK;
												?>	
												<td <?php echo $CT1; ?>><div style="float:right"><b><?php echo number_format($T01, 0, ".", "."); ?></b></div></td>
												<td <?php echo $CT2; ?>><div style="float:right"><b><?php echo number_format($T02, 0, ".", "."); ?></b></div></td>
												<td <?php echo $CT3; ?>><div style="float:right"><b><?php echo number_format($T03, 0, ".", "."); ?></b></div></td>
												<td <?php echo $CT4; ?>><div style="float:right"><b><?php echo number_format($T04, 0, ".", "."); ?></b></div></td>
												<td <?php echo $CT5; ?>><div style="float:right"><b><?php echo number_format($T05, 0, ".", "."); ?></b></div></td>
												<td <?php echo $CT6; ?>><div style="float:right"><b><?php echo number_format($T06, 0, ".", "."); ?></b></div></td>
												<td <?php echo $CT7; ?>><div style="float:right"><b><?php echo number_format($T07, 0, ".", "."); ?></b></div></td>
												<td <?php echo $CT8; ?>><div style="float:right"><b><?php echo number_format($T08, 0, ".", "."); ?></b></div></td>
												<td <?php echo $CT9; ?>><div style="float:right"><b><?php echo number_format($T09, 0, ".", "."); ?></b></div></td>
												<td <?php echo $CT10; ?>><div style="float:right"><b><?php echo number_format($T10, 0, ".", "."); ?></b></div></td>
												<td <?php echo $CT11; ?>><div style="float:right"><b><?php echo number_format($T11, 0, ".", "."); ?></b></div></td>
												<td <?php echo $CT12; ?>><div style="float:right"><b><?php echo number_format($T12, 0, ".", "."); ?></b></div></td>
												<?php 
													$TG = 0; 
													$TG = $T01+$T02+$T03+$T04+$T05+$T06+$T07+$T08+$T09+$T10+$T11+$T12; 
													if ($TG < 0)			$CTG = $RED; 
													else if ($TG >= 0)		$CTG = $BLACK;
												?>
												<td <?php echo $CTG; ?>>
													<div style="float:right">
													<b>
													<?php 
														$TG = 0; 
														$TG = $T01+$T02+$T03+$T04+$T05+$T06+$T07+$T08+$T09+$T10+$T11+$T12; 
														echo number_format($TG, 0, ".", ".");
													?>
													</b>
													</div>
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