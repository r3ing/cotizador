<?php
include('../../../MASTER/include/verifyAPP.php');  
?>
<!-- BEGIN SAMPLE TABLE PORTLET-->
<div class="portlet light">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa fa-plus font-blue-sharp"></i>
			<span class="caption-subject font-blue-sharp bold uppercase">AGREGAR</span>
		</div>
		<div class="tools">
			<a href="javascript:;" class="collapse"></a> 
		</div>
	</div>
	<div class="portlet-body form">		
		<?php  
			if(isset($_POST['nombre']))
			{
				$nombre 		= 	$_POST['nombre'];
				$ruta 			= 	$_POST['ruta'];
				$estado 		= 	$_POST['estado'];
				$tipo 			= 	$_POST['tipo'];
				$category		= 	$_POST['category'];

				if(!file_exists ('../../'.strtoupper($ruta))){

                	include('../../../MASTER/config/conect.php');
				 
					$SQL =  "INSERT INTO APPLICATIONS(nombre,ruta,estado,tipo,category) ";
					$SQL = $SQL."VALUES ('".trim($nombre)."','".$ruta."','".$estado."','".$tipo."','".$category."')";

                	$link->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
                	$consulta = $link->prepare($SQL);
                	$consulta->execute();
                	$link=null;
                	$consulta=null;
				
					mkdir('../../'.strtoupper($ruta).'', 0777, true);
				
					$srcfileindex='../../INDEX_IFRAME.php';
					$dstfileindex='../../'.strtoupper($ruta).'/index.php';
					copy($srcfileindex, $dstfileindex);
				
					$srcfilehome='../../HOME_IFRAME.php';
					$dstfilehome='../../'.strtoupper($ruta).'/home.php';
					copy($srcfilehome, $dstfilehome);

				
					echo '<div class="note note-success">';
						echo '<h4 class="block">Datos ingresados con &eacute;xito!</h4>';
						echo '<p>';
							echo 'Registro ingresado exitosamente.';
						echo '</p>';
					echo '</div>';
				
					echo "<a href=\"#\" onclick=\"ventana_principal('11','../APP/APP_ADM_APPLICATIONS/index.php')\" class=\"btn default\">
						<span>Volver</span>
					  </a>";
				}else{
					echo '<div class="note note-danger">';
					echo '<h4 class="block">Error! Problemas de Comunicaci&oacute;n</h4>';
					echo '<h4 class="block">Ruta Existente.</h4>';
					echo '<p>';
					echo 'El registro no ha podido ser ingresado.';
					echo '</p>';
					echo '</div>';
					echo "<a href=\"#\" onclick=\"ventana_principal('11','../APP/APP_ADM_APPLICATIONS/index.php')\" class=\"btn default\">
						<span>Volver</span>
					  </a>";
					exit();
				}
			}
			else
			{
				echo '<div class="note note-danger">';
					echo '<h4 class="block">Error! Problemas de Comunicaci&oacute;n</h4>';
					echo '<p>';
						echo 'El registro no ha podido ser ingresado.';
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