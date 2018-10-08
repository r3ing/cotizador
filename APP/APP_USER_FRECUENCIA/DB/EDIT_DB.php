<?php
include('../../../MASTER/include/verifyAPP.php');	
?>
<div class="portlet light bordered">
	<div class="portlet-body">
			<?php
				if(isset($_POST['id']))
				{        
					$id 				= 	$_POST['id'];
					$codigo	 			= 	$_POST['codigo'];
					$tienda 			= 	$_POST['tienda'];
					$despacho			= 	$_POST['despacho'];
					
					$sql = "UPDATE frecuencia SET codigo  =	'".trim($codigo)."',
												  tienda  = '".trim($tienda)."',
												despacho  = '".trim($despacho)."'";
					$sql = $sql." WHERE id = ".$id;
					
					include('../../../MASTER/config/conect.php');  
					$link->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ); 
					$consulta = $link->prepare($sql);
					$consulta->execute();

					echo '<div class="note note-success">';
						echo '<h4 class="block">Datos modificados con &eacute;xito!</h4>';
						echo '<p>';
							 echo 'Registro modificado exitosamente.';
						echo '</p>';
					echo '</div>'; 
					
					echo "<a href=\"#\" onclick=\"cancel()\" class=\"btn default\">
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
					echo "<a href=\"#\" onclick=\"cancel()\" class=\"btn default\">
							<span>Volver</span>
						  </a>";
					exit();
				}
			?>
		</div>
</div> 