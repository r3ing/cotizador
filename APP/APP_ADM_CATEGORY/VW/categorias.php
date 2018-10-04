<!-- BEGIN SAMPLE TABLE PORTLET-->
<div class="portlet light">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa fa-archive font-blue-sharp"></i>
			<span class="caption-subject font-blue-sharp bold uppercase">MANTENEDOR DE CATEGOR&Iacute;AS</span>
		</div>
		<div class="tools">
			<a href="javascript:;" class="collapse"></a> 
		</div>
	</div>
							
	<?php
		include('../../MASTER/config/conect.php');

		$SQL=" SELECT *
				FROM CATEGORY 
				ORDER BY id";
	  
		echo "<a href='#' onclick=\"app_categorias(1,0,'../APP/APP_ADM_CATEGORY/DB/ADD.php','vista_categorias')\" class='btn btn-circle btn-default'><i class='icon-plus'></i> Agregar Categor&iacute;a</a><br><br>";
		
		echo '<div class="portlet-body">';
		echo '<div class="table-scrollable">';
		echo '<table class="table table-bordered table-hover">';
			echo '<thead>';
				echo '<tr  class="info">';										 
					echo '<th>ID</th>';
					echo '<th>Nombre</th>';  
					echo '<th width="5%">&nbsp;</th>';								
					echo '<th width="5%">&nbsp;</th>'; 
				echo '</tr>';
			echo '</thead>';
			echo '<tbody>';
				$link->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
				$RES = $link->prepare($SQL);
				$RES->execute();
				foreach($RES as $k => $row) 
				{
					echo '<tr class="odd gradeX">';
					echo "<td>".$row[0]."</td> 
						  <td>".$row[1]."</td>";
					echo "<td>"; 
						if($row[2] == 1)
							echo '<i class="fa fa-check" style="color:#006600;"></i>'; 
						else 
							echo '<i class="fa fa-ban" style="color:#FF0000;"></i>'; 
					echo "</td>";
					echo "<td align ='center'>
							<a href='#' class='link' onclick=\"app_categorias(3,".$row[0].",'../APP/APP_ADM_CATEGORY/DB/EDIT.php','vista_categorias')\">
								<i class='fa fa-pencil' style='color:#0066FF;'></i>
							</a>
						  </td>"; 
					echo '</tr>';
				
				}
				$link = null;
				$RES = null;
			echo '</tbody>';
		echo '</table>';
		echo '</div>';
		echo '</div>';
	?>
</div>
<!-- END SAMPLE TABLE PORTLET-->
				