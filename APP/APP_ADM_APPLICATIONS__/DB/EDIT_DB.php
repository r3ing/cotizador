<?php
include('../../../MASTER/include/verifyAPP.php');	
?>
<!-- BEGIN SAMPLE TABLE PORTLET-->
<div class="portlet light">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa fa-user font-blue-sharp"></i>
			<span class="caption-subject font-blue-sharp bold uppercase">MODIFICAR APLICACI&Oacute;N</span>
		</div>
		<div class="tools">
			<a href="javascript:;" class="collapse"></a> 
		</div>
	</div>
	<div class="portlet-body form">	
		<?php    
			if(isset($_POST['nombre']))
			{
		
				$id 		= 	$_POST['id'];
				$nombre 	= 	$_POST['nombre'];
				$ruta 		= 	$_POST['ruta'];
				$estado 	= 	$_POST['estado'];
				$tipo	 	=	$_POST['tipo'];
				$business 	= 	$_POST['business'];
				
				
				include('../../../MASTER/config/conect.php'); 
				$cons = "SELECT * FROM applications WHERE id = ".$id.""; 
				$link2->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ); 
				$consulta2 = $link2->prepare($cons); 
				$consulta2->execute(); 					
				while ($row = $consulta2->fetch()) 
				{
					$ruta1 .= $row[2];
				}
				$link2=null;
				$consulta2=null;
				
				
				$sql =  "UPDATE applications 
						 SET nombre = '".utf8_decode($nombre)."',ruta='".$ruta."',estado='".$estado."',tipo='".$tipo."', business='".$business."' 
						 WHERE id = ".$id; 
				$link->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ); 
				$consulta = $link->prepare($sql); 
				$consulta->execute(); 
				$link=null;
				$consulta=null;

				// rename('../../'.strtolower($ruta1).'', '../../'.strtolower($ruta).'');
				rename('../../'.strtoupper($ruta1).'', '../../'.strtoupper($ruta).'');

				
				echo '<div class="note note-success">';
					echo '<h4 class="block">Datos modificado con &eacute;xito!</h4>';
					echo '<p>';
						 echo 'Registro modificado exitosamente.';
					echo '</p>';
				echo '</div>'; 
				
				echo "<a href=\"#\" onclick=\"ventana_principal('11','../APP/APP_ADM_APPLICATIONS/index.php')\" class=\"btn default\">
						<span>Volver</span>
					  </a>";
			}
			else
			{
				echo '<div class="note note-danger">';
					echo '<h4 class="block">Error! Problemas de Comunicaci&oacute;n</h4>';
					echo '<p>';
						echo 'El registro no ha podido ser modificado.';
					echo '</p>';
				echo '</div>';
				echo "<a href=\"#\" onclick=\"ventana_principal('11','../APP/APP_ADM_APPLICATIONS/index.php')\" class=\"btn default\">
						<span>Volver</span>
					  </a>";
				exit();
			}
		?>
	</div>	
</div> 