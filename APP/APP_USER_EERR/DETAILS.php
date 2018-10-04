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
									<u><?php echo utf8_encode($cuenta);  ?></u> (Escenario: Ajustado | A&ntilde;o: 2018)
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
											<tr style="color:#000000;"> 		
												<td>000-827-938</td>
												<td>Ingresos</td>
												<td>Santiago</td>
												<td>R. Metropolitana</td>
												<td>234</td>
												<td>Ingresos de Clientes</td>
												<td>Clientes o deudores por ventas</td>
												<td>000-827-938 - Clientes o deudores por ventas</td>
                                                <td>$24.984.873</td>
                                                <td>$82.837.827</td>
                                                <td>$23.454.657</td>
                                                <td>$23.343.567</td>
                                                <td>$24.984.873</td>
                                                <td>$82.837.827</td>
                                                <td>$23.454.657</td>
                                                <td>$23.343.567</td>
                                                <td>$24.984.873</td>
                                                <td>$82.837.827</td>
                                                <td>$23.454.657</td>
                                                <td>$23.343.567</td>
                                                <td><b>$2.394.938.038</b></td>
                                            </tr>
                                            <tr style="color:#000000;">
                                                <td>000-827-938</td>
                                                <td>Ingresos</td>
                                                <td>Santiago</td>
                                                <td>R. Metropolitana</td>
                                                <td>234</td>
                                                <td>Ingresos de Clientes</td>
                                                <td>Clientes o deudores por ventas</td>
                                                <td>000-827-938 - Clientes o deudores por ventas</td>
                                                <td>$24.984.873</td>
                                                <td>$82.837.827</td>
                                                <td>$23.454.657</td>
                                                <td>$23.343.567</td>
                                                <td>$24.984.873</td>
                                                <td>$82.837.827</td>
                                                <td>$23.454.657</td>
                                                <td>$23.343.567</td>
                                                <td>$24.984.873</td>
                                                <td>$82.837.827</td>
                                                <td>$23.454.657</td>
                                                <td>$23.343.567</td>
                                                <td><b>$2.394.938.038</b></td>
                                            </tr>
											<tr class="success">
												<td><b><h3>TOTAL</h3></b></td>
												<td>&nbsp;</td>
												<td>&nbsp;</td>
												<td>&nbsp;</td>
												<td>&nbsp;</td>
												<td>&nbsp;</td>
												<td>&nbsp;</td>
												<td>&nbsp;</td>
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