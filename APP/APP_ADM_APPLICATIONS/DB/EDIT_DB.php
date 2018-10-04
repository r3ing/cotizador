<?php
include('../../../MASTER/include/verifyAPP.php');	
error_reporting(E_ALL ^ E_NOTICE);
?>
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
	<div class="portlet-body form">	
		<?php    
			if(isset($_POST['nombre']))
			{
		
				$id 		= 	$_POST['id'];
				$nombre 	= 	$_POST['nombre'];
				$ruta 		= 	$_POST['ruta'];
				$estado 	= 	$_POST['estado'];
				$tipo	 	=	$_POST['tipo'];
				$category 	= 	$_POST['category'];				
				
				include('../../../MASTER/config/conect.php');
				$SQL1 = "SELECT * FROM APPLICATIONS WHERE id = ".$id."";
				$link->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
				$RES = $link->prepare($SQL1);
				$RES->execute();
				while($row = $RES->fetch())
				{
					$ruta1 .= $row[2];
				}

				$SQL =  "UPDATE APPLICATIONS SET nombre = '".trim($nombre)."',ruta='".$ruta."',estado='".$estado."',tipo='".$tipo."',category='".$category."' WHERE id = ".$id;
				$RES = $link->prepare($SQL);
				$RES->execute();
				$link = null;
				$RES = null;

				if(strcasecmp($ruta, $ruta1) !== 0) {
					rename('../../' . strtoupper($ruta1) . '', '../../' . strtoupper($ruta) . '');
				}
				
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