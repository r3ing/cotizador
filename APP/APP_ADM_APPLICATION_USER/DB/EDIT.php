<?php
include('../../../MASTER/include/verifyAPP.php');	
?>
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption font-dark">
            <i class="icon-settings font-dark"></i>
            <span class="caption-subject bold uppercase">
                Mantenedor de Aplicación / Usuario
            </span>
        </div>
    </div>
    <div class="portlet-body">
	<?php    
		if(isset($_POST['id']))
		{
			$id = $_POST['id'];
			$texto = $_POST['texto'];
			$sql_in = str_replace("|",",", substr($texto,0,strlen($texto)-1));
			
			$sql = "DELETE FROM access WHERE id_aplicacion = ".$id." ;"  ;
			
			$cursor = explode("|",$texto);
			
			foreach($cursor as $v)
			{
				if(!empty($v))
				{
					$sql= $sql."INSERT INTO access(id_usuario,id_aplicacion) VALUES (".$v.",".$id.") ;";
				}
				
			}
	
			include('../../../MASTER/config/conect.php');  
			$link->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ); 
			$consulta = $link->prepare($sql); 
			$consulta->execute(); 
			$link=null;
			$consulta=null;
			
			echo '<div class="note note-success">';
				echo '<h4 class="block">Datos modificados con &eacute;xito!</h4>';
				echo '<p>';
					 echo 'Registro modificado exitosamente.';
				echo '</p>';
			echo '</div>'; 
			
			echo "<a href=\"#\" onclick=\"ventana_principal('11','../APP/APP_ADM_APPLICATION_USER/index.php')\" class=\"btn default\">
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
			echo "<a href=\"#\" onclick=\"ventana_principal('11','../APP/APP_ADM_APPLICATION_USER/index.php')\" class=\"btn default\">
					<span>Volver</span>
				  </a>";
			exit();
		}
	?>
    </div>
</div>