<?php
	include('../../MASTER/include/verifyAPP.php');  	
	
	
	echo "<a href='#' onclick=\"app_business(1,0,'','../APP/APP_ADM_BUSINESS/DB/ADD.php','vista_business')\" class='btn btn-lg btn-primary'><i class='icon-plus'></i> Agregar Empresa</button></a><br><br>";
?>
<!-- BEGIN SAMPLE TABLE PORTLET-->
<div class="portlet light">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa fa-user font-blue-sharp"></i>
			<span class="caption-subject font-blue-sharp bold uppercase">Mantenedor de Empresa</span>
		</div>
		<div class="tools">
			<a href="javascript:;" class="collapse"></a> 
		</div>
	</div> 
	
	<?php 
		include('../../MASTER/config/conect.php');
		echo '<table class="table table-striped table-bordered" id="sample_1">';
			echo '<thead>';
				echo '<tr>';
					echo '<th class="head0">ID</th>';
					echo '<th class="head1">Nombre</th>';
					echo '<th class="head0">Ruta</th>';
					echo '<th class="head0">Estado</th>';
					echo '<th class="head0">Modificar</th>';
				echo '</tr>';
			echo '</thead>';  
			echo '<tbody>';
				$sql="SELECT * FROM business WHERE status = 'ON' ORDER BY business";
				$link->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ); 
				$consulta = $link->prepare($sql); 
				$consulta->execute(); 
				while ($row = $consulta->fetch()) 
				{
					echo '<tr class="odd gradeX">';
					echo "<td>".$row[0]."</td>
						  <td>".utf8_encode($row[1])."</td>
						  <td>".$row[2]."</td>
						  <td>".$row[3]."</td>
						  <td align ='center'>
							<a href='#' class='link' onclick=\"app_business(2,".$row[0].",'','../APP/APP_ADM_BUSINESS/DB/EDIT.php','vista_business')\">
							 <i class='fa fa-pencil' style='color:#0066FF;'></i>
							</a>
						  </td>";
					echo '</tr>';
				}
				$consulta=null;
				$link = null;
			echo '</tbody>';
		echo '</table>';
	?>
</div>
 
		 