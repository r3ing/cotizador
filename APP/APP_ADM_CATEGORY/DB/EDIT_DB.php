<?php
include('../../../master/include/verifyAPP.php');	
?>
<div class="portlet light">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa fa-pencil font-blue-sharp"></i>
			<span class="caption-subject font-blue-sharp bold uppercase">MODIFICAR</span>
		</div>
		<div class="tools">
			<a href="javascript:;" class="collapse"> </a> 
		</div>
	</div>
	<div class="portlet-body">	
			<?php    
				if(isset($_POST['id']))
				{        
					$id 				= 	$_POST['id']; 
					$nombre 			= 	$_POST['nombre']; 
					$estado				= 	$_POST['estado'];
					
					$SQL = "UPDATE CATEGORY SET nombre 				=	 '".trim($nombre)."',
												estado				=	 '".utf8_decode($estado)."' ";
					$SQL = $SQL."WHERE id = ".$id;
					
					include('../../../master/config/conect.php');
					$link->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
					$RES = $link->prepare($SQL);
					$RES->execute();
					$link = null;
					$RES = null;
					
					echo '<div class="note note-success">';
						echo '<h4 class="block">Datos modificados con &eacute;xito!</h4>';
						echo '<p>';
							 echo 'Registro modificado exitosamente.';
						echo '</p>';
					echo '</div>'; 
					
					echo "<a href=\"#\" onclick=\"ventana_principal('11','../APP/APP_ADM_CATEGORY/index.php')\" class=\"btn default\">
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
					echo "<a href=\"#\" onclick=\"ventana_principal('11','../APP/APP_ADM_CATEGORY/index.php')\" class=\"btn default\">
							<span>Volver</span>
						  </a>";
					exit();
				}
			?>
		</div>
</div> 