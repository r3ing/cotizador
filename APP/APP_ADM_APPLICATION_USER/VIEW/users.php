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
			$nombre = $_POST['nombre']; 
			
			setlocale (LC_ALL, 'es_ES');
			setlocale (LC_ALL, 'es_MX');
	
			echo '<div class="title-bar white">';
				echo '<h4>Usuarios Asociados a : <b>'.strtoupper($nombre).'</b></h4>';
			echo '</div>';
			
			echo '<br />';
			echo '<div class="table-holder">';  
			  
			include('../../../MASTER/config/conect.php');
			$sql="SELECT t1.*
				  FROM users t1
				  WHERE t1.status = 'ON'";
			
			echo '<table class="table table-striped table-bordered" id="sample_1">';
			echo '<thead>';
				echo '<tr>';
					echo '<th class="head0">Seleccionar</th>';
					echo '<th class="head1">ID</th>';
					echo '<th class="head0">Nombre</th>';
					echo '<th class="head1">User</th>';
				echo '</tr>';
			echo '</thead>';  
			echo '<tbody>';
	
			$i=0;
			
			$link->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ); 
			$consulta = $link->prepare($sql); 
			$consulta->execute(); 
			$i=0;
			while ($row = $consulta->fetch()) 
			{
					$sel = '';
					$sql2 = '';
					$sql2 = "SELECT * FROM access WHERE id_usuario = ".$row[0]." AND id_aplicacion = ".$id;
					$link2->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ); 
					$consulta2 = $link2->prepare($sql2); 
					$consulta2->execute(); 
					while ($raw = $consulta2->fetch()) 
					{
						if($raw[2]<>0)
						{
							$sel = " checked ";
						}
					
					}
					$consulta2 = null;
					$raw=null;
					
					echo "<tr>
							<td><input type='checkbox' name='ck[".$i."]' id='ck[".$i."]' value='".$row[0]."' ".$sel."></td>
							<td>".$row[0]."</td>
							<td>".$row[3]."&nbsp;".$row[4]."&nbsp;".$row[5]."</td>
							<td>".$row[1]."</td>
						  </tr>";
					$i++;
			}
			$consulta=null;
			$link = null;
			$link2 = null;
			echo '</tbody>';
			echo "</table>";
			echo "<input type='hidden' name='cantidad' id='cantidad' value='".$i."'>";
				
				echo '<div class="form-actions">';
					echo '<div class="row">';
						echo '<div class="col-md-offset-3 col-md-9">';
								echo "<a href=\"#\" onclick=\"ventana_principal('11','../APP/APP_ADM_APPLICATION_USER/index.php')\" class=\"btn btn-default\"><span>Volver</span></a>&nbsp;&nbsp;";
								echo "<input type='button' name='Grabar' onclick=\"app_permisos_aplicacion(2,".$id.",'','../APP/APP_ADM_APPLICATION_USER/DB/EDIT.php','vista_usuarios')\" value='Actualizar' class='btn btn-primary'>&nbsp;";			
						echo '</div>';
					echo '</div>';
				echo '</div>'; 
				
			echo "</div>";
		echo "</div>";
		}
		else
		{
			echo "no Ingreso a la DB";
		}
	?>
    </div>
</div>