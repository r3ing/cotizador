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
				<i class="fa fa-pencil font-blue-sharp"></i>
				<span class="caption-subject font-blue-sharp bold uppercase">MODIFICAR</span>
			</div>
			<div class="tools">
				<a href="javascript:;" class="collapse"></a> 
			</div>
		</div>  
		<div class="portlet-body">	
			<?php  
				if(isset($_POST['Guardar']))
				{   
					$id				=	$_POST['id'];  
					$cod_tienda			= $_POST['cod_tienda'];  
					$nombre_tienda		= $_POST['nombre_tienda'];  
					$zona_tienda		= $_POST['zona_tienda'];  
					$cluster_tienda		= $_POST['cluster_tienda'];
					$jefe_tienda		= $_POST['jefe_tienda'];
					$anexo_jefe			= $_POST['anexo_jefe'];
					$mail_jefe			= $_POST['mail_jefe'];  
					$estado 			= $_POST['estado']; 
					$changeUser 		= $ID_US;
					$changeDate			= 'NOW()';
					 
		  			include('../../MASTER/config/conect.php');		
					$SQL = "UPDATE tiendas SET											
										cod_tienda			= 	'".$cod_tienda."'
										, nombre_tienda		= 	'".$nombre_tienda."'
										, zona_tienda		= 	'".$zona_tienda."'
										, cluster_tienda 	=	'".$cluster_tienda."' 
										, jefe_tienda	 	=	'".$jefe_tienda."' 
										, anexo_jefe	 	=	'".$anexo_jefe."' 
										, mail_jefe		 	=	'".$mail_jefe."' 
										, estado 			=	'".$estado."'
										, changeUser 		=	'".$changeUser."'
										, changeDate		= 	".$changeDate."
							WHERE id ='".$id."' " ;	
				 
					$link->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ); 
					$CONS = $link->prepare($SQL); 
					$CONS->execute(); 
					$link=null;
					$CONS=null;
					
					echo '<div class="note note-success">';
						echo '<h4 class="block">Datos ingresados con &eacute;xito!</h4>';
						echo '<p>';
							 echo 'Registro ingresado exitosamente.';
						echo '</p>';
					echo '</div>'; 
					
					echo '<a onclick="window.history.go(-2)" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Volver</a> ';
				}
				else
				{
					echo '<div class="note note-danger">';
						echo '<h4 class="block">Error! Problemas de Comunicaci&oacute;n</h4>';
						echo '<p>';
							echo 'El registro no ha podido ser ingresado.';
						echo '</p>';
					echo '</div>';
					echo '<a onclick="window.history.go(-2)" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Volver</a> ';
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