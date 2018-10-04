<?php
include('../../../MASTER/include/verifyAPP.php');
?>
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption font-dark">
            <i class="icon-settings font-dark"></i>
            <span class="caption-subject bold uppercase">
                Mantenedor de Menú
            </span>
        </div>
    </div>
	<div class="portlet-body form">
		<?php	
		if(isset($_POST['idpadre']))
		{
			$nombre     	= $_POST['nombre'];
			$descripcion    = $_POST['descripcion'];
			$idpadre    	= $_POST['idpadre'];
			$permisos  	 	= $_POST['permisos'];
			$aplicacion     = $_POST['aplicacion'];
			$activo      	= $_POST['activo'];
			$ubicacion      = $_POST['ubicacion'];
			$evento    		= $_POST['evento'];
			$id 			= $_POST['id'];

			include('../../../MASTER/config/conect.php');
			$sql = "UPDATE menu SET nombre= '".trim($nombre)."',
									descripcion = '".trim($descripcion)."',
									permisos = '".utf8_decode($permisos)."',
									aplicacion='".utf8_decode($aplicacion)."',
									activo='".utf8_decode($activo)."',
									ubicacion='".utf8_decode($ubicacion)."'
					WHERE id = ".$id;
			
			
			$link->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ); 
			$consulta = $link->prepare($sql); 
			$consulta->execute(); 
			$link=null;
			$consulta=null; 
			echo '<div class="note note-success">';
				echo '<h4 class="block">Datos modificados con &eacute;xito!</h4>';
				echo '<p>';
					 echo 'Cambios realizados exitosamente.';
				echo '</p>';
			echo '</div>'; 
			
			echo "<a href=\"#\" onclick=\"ventana_principal('11','../APP/APP_ADM_MENU/index.php')\" class=\"btn default\">
					<span>Volver</span>
				  </a>";   
		}
		else
		{
			echo '<div class="note note-danger">';
				echo '<h4 class="block">Error! Problemas de Comunicaci&oacute;n</h4>';
				echo '<p>';
					echo 'Los cambios no han sido realizados.';
				echo '</p>';
			echo '</div>';
			echo "<a href=\"#\" onclick=\"ventana_principal('11','../APP/APP_ADM_MENU/index.php')\" class=\"btn default\">
					<span>Volver</span>
				  </a>";
		}
		?>
	</div>
</div>