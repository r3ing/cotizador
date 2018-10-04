<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption font-dark">
            <i class="icon-settings font-dark"></i>
            <span class="caption-subject bold uppercase">
                Mantenedor de Usuario / Aplicación
            </span>
        </div>
    </div>
    <div class="portlet-body">
	<?php
		include('../../MASTER/config/conect.php');
		 $sql=" SELECT t1.*
				FROM users t1
				WHERE t1.status = 'ON' ORDER BY forename"; 
				
		echo '<br />';
		
		echo '<table class="table table-striped table-bordered" id="sample_1">';
			echo '<thead>';
				echo '<tr class="info">';										 
					echo '<th>ID</th>';
					echo '<th>Nombre</th>';
					echo '<th>Usuario</th>';  
					echo '<th>Estado</th>';								
					echo '<th>&nbsp;</th>'; 
				echo '</tr>';
			echo '</thead>';
			echo '<tbody>';
				$link->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ); 
				$consulta = $link->prepare($sql); 
				$consulta->execute(); 
				while ($row = $consulta->fetch()) 
				{
					echo '<tr class="odd gradeX">';
					echo "<td>".$row[0]."</td>
						  <td>".$row[3]."&nbsp;".$row[4]."&nbsp;".$row[5]."</td>
						  <td>".$row[1]."</td> 
						  <td>".$row[9]."</td>   ";
					echo "<td align ='center'><a class='link' href='#' onclick=\"app_user_application(1,".$row[0].",'".$row[1]."','../APP/APP_ADM_USER_APPLICATION/VIEW/applications.php','vista_usuarios')\"><i class='fa fa-pencil' style='color:#0066FF;'></i></a></td>";

					echo '</tr>';
				
				}
				$consulta=null;
				$link = null;
			echo '</tbody>';
		echo '</table>';
	?>
    </div>
</div>