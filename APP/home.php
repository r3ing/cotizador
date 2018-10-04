<?php
    include('../../MASTER/include/verifyAPP.php'); 
	
	$ID_US	= $vari[0]; 
	
	$name_application 	= $_GET['name_application']; 
	$tipo 				= $_GET['tipo']; 
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
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body style="width:98%; background: white !important;">
<script type="text/javascript">
	var nuevoalias = jQuery.noConflict();
	nuevoalias(document).ready(function() {
	   // alert("Si salgo es que no hay conflicto!!!");
	});
</script> 
<!-- BEGIN PAGE CONTENT--> 
<div class="row">
	<div class="col-md-12">
		<!-- BEGIN SAMPLE TABLE PORTLET-->
		<div class="portlet light">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-bars font-blue-sharp"></i>
					<span class="caption-subject font-blue-sharp bold uppercase">
						<?php 
							if(trim($tipo) == 'ADM')	echo 'MANTENEDOR - '; 
							else 				echo '';  
							
							if ($name_application != '')	echo $name_application; 
							else 							echo ''; 
						?>
					</span>
				</div>
				<div class="tools">
					<a href="javascript:;" class="collapse"></a> 
				</div>
			</div> 
			
			<div class="portlet-body">
				<!-- *********************************************** BEGIN CONTENIDO *********************************************** -->
				
				<!-- *********************************************** END   CONTENIDO *********************************************** -->
			</div> 
		</div>
		<!-- END SAMPLE TABLE PORTLET-->
						
	</div>
</div>
<?php 
	include ("../FOOTER.php");
?>
</body> 
</html>