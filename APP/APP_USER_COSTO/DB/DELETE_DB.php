<?php
include('../../../MASTER/include/verifyAPP.php');
?>
<div class="portlet light bordered">
	<div class="portlet-body">
			<?php
			if(isset($_POST['id']))
				{
					$id = $_POST['id'];
					
					include('../../../MASTER/config/conect.php');
					$sql = "DELETE FROM costo WHERE id=" . $id;
					$link->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ); 
					$consulta = $link->prepare($sql); 
					$consulta->execute();
			
					echo '<div class="note note-success">';
						echo '<h4 class="block">Datos Eliminados con &eacute;xito!</h4>';
						echo '<p>';
							 echo 'Registo eliminado exitosamente.';
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
							echo 'El registro no ha podido ser eliminado.';
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