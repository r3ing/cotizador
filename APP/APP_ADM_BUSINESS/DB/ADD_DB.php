<?php
include('../../../MASTER/include/verifyAPP.php');  
?>
<!-- BEGIN SAMPLE TABLE PORTLET-->
<div class="portlet light">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa fa-user font-blue-sharp"></i>
			<span class="caption-subject font-blue-sharp bold uppercase">AGREGAR NUEVA EMPRESA</span>
		</div>
		<div class="tools">
			<a href="javascript:;" class="collapse"></a> 
		</div>
	</div>
	<div class="portlet-body form">		
		<?php  
			if(isset($_POST['business']))
			{
				$business 	= 	$_POST['business']; 
				$website 	= 	$_POST['website'];
				$status 	= 	$_POST['status']; 
				
				include('../../../MASTER/config/conect.php'); 
				 
				$sql =  "INSERT INTO business(business,website,status) ";
				$sql = $sql."VALUES ('".utf8_decode($business)."','".$website."','".$status."')";
				$link->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ); 
				$consulta = $link->prepare($sql); 
				$consulta->execute(); 
				$link=null;
				$consulta=null; 
				
				echo '<div class="note note-success">';
					echo '<h4 class="block">Datos ingresados con &eacute;xito!</h4>';
					echo '<p>';
						 echo 'Registro ingresado exitosamente.';
					echo '</p>';
				echo '</div>'; 
				
				echo "<a href=\"#\" onclick=\"ventana_principal('11','../APP/APP_ADM_BUSINESS/index.php')\" class=\"btn default\">
						<span>Volver</span>
					  </a>";
			}
			else
			{
				echo '<div class="note note-danger">';
					echo '<h4 class="block">Error! Problemas de Comunicaci&oacute;n</h4>';
					echo '<p>';
						echo 'El registro no ha podido ser ingresado.';
					echo '</p>';
				echo '</div>';
				echo "<a href=\"#\" onclick=\"ventana_principal('11','../APP/APP_ADM_BUSINESS/index.php')\" class=\"btn default\">
						<span>Volver</span>
					  </a>";
				exit();
			}
		?>
	</div>
</div>