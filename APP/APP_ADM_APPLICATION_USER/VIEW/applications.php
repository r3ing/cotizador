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
		include('../../MASTER/config/conect.php');
		 $sql="SELECT * FROM applications WHERE estado = 'ON'";
				
		echo '<br />';
		
		echo '<table class="table table-striped table-bordered" id="sample_1">';
			echo '<thead>';
				echo '<tr class="info">';
					echo '<th class="head0">ID</th>';
					echo '<th class="head1">Nombre</th>';
					echo '<th class="head0">Target</th>';
					echo '<th class="head1">Estado</th>';
					echo '<th class="head1">&nbsp;</th>';
				echo '</tr>';
			echo '</thead>';
			echo '<tbody>';
			$i=0;
			
				$link->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ); 
				$consulta = $link->prepare($sql); 
				$consulta->execute(); 
				while ($row = $consulta->fetch()) 
				{
					echo '<tr class="odd gradeX">';
						echo "<td>".$row[0]."</td>
							  <td>".$row[1]."</td>
							  <td>".$row[2]."</td>
							  <td>".$row[3]."</td>";
						echo "<td align ='center'><a class='link' href='#' onclick=\"app_permisos_aplicacion(1,".$row[0].",'".strtoupper($row[1])."','../APP/APP_ADM_APPLICATION_USER/VIEW/users.php','vista_usuarios')\"><i class='fa fa-pencil' style='color:#0066FF;'></i></a></td>";
					echo '</tr>';						
				}
				$consulta=null;
				$link = null;
				$link2s = null;
			echo '</tbody>';
		echo '</table>';
		echo "<input type='hidden' name='cantidad' id='cantidad' value='".$i."'>";
	?>
    </div>
</div>