<?php
    include('../../MASTER/include/verifyAPP.php'); 
	
	$ID_US	= $vari[0]; 
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
<body style="width:98%">  
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
				<i class="fa fa-ban font-blue-sharp"></i>
				<span class="caption-subject font-blue-sharp bold uppercase">ELIMINAR</span>
			</div>
			<div class="tools">
				<a href="javascript:;" class="collapse"></a> 
			</div>
		</div>  
		<div class="portlet-body">	
			<?php
			if(isset($_POST['id']))
				{ 
					// $id_usuario = $_POST['id_usuario'];
					$id =   $_POST['id'];  
					 
					include('../../MASTER/config/conect.php');
					$SQL = "DELETE 
							FROM tiendas 
							WHERE id = '".$id."' "; 
					$link->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ); 
					$CONS = $link->prepare($SQL); 
					$CONS->execute(); 
					$link=null;
					$CONS=null;
					
			
					echo '<div class="note note-success">';
						echo '<h4 class="block">Datos Eliminados con &eacute;xito!</h4>';
						echo '<p>';
							 echo 'Registo de cantidad de docentes eliminado exitosamente.';
						echo '</p>';
					echo '</div>'; 
					
					echo '<a onclick="window.history.go(-1)" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Volver</a> ';
				}
				else
				{
					echo '<div class="note note-danger">';
						echo '<h4 class="block">Error! Problemas de Comunicaci&oacute;n</h4>';
						echo '<p>';
							echo 'El registro de cantidad de docentes no ha podido ser eliminado.';
						echo '</p>';
					echo '</div>';
					echo '<a onclick="window.history.go(-1)" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Volver</a> ';
					exit();
				}
			?>
		</div>
	</div>
	</div>
</div>
<?php 
	include ("../FOOTER.php");
?>   
</body> 
</html>  