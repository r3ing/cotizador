<?php 
	include('../../MASTER/include/verifyAPP.php'); 
	
	include ("../../../../lib/adodb/adodb.inc.php");
	include('../../MASTER/config/conect.php');		
	
	$id 		= $_GET["id"];  
	
	$SQL_ESC = 'SELECT * 
				FROM PPTO_Scenarios
				WHERE id = '.$id; 
	
    $RES_ESC = $DB2->Execute($SQL_ESC);
	foreach($RES_ESC as $k => $ROW_ESC)
	{
		$nom_escenario .= $ROW_ESC[2];
		$definicion .= $ROW_ESC[5];
	}
	 
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
									Escenario: <?php echo utf8_encode($nom_escenario); ?> 
								</span> 
							</div> 
						</div>
						<div class="portlet-body">    
							<!-- BEGIN EXAMPLE TABLE PORTLET-->
							<div class="portlet box blue-hoki">
								<div class="portlet-title">
									<div class="caption">
										<i class="fa fa-globe"></i> DEFINICI&Oacute;N
									</div> 
								</div>
								<div class="portlet-body">
									<?php
										echo utf8_encode($definicion); 
									?>	 
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