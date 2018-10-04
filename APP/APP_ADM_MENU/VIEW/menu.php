<?php
// include('../../inet/config/verifica_aplicacion.php');	
include('../../MASTER/config/conect.php');  
$sql = "SELECT * FROM menu WHERE idpadre = 0 ORDER BY ubicacion ASC";  

$link->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ); 
$consulta = $link->prepare($sql); 
$consulta->execute();
 
echo '<table class="table table-striped table-bordered" id="sample_1">';
	echo '<thead>';
		echo '<tr>';
			echo '<th>Nombre</th>';
			echo '<th>Activo</th>';
			echo '<th>&nbsp;</th>';
			echo '<th>&nbsp;</th>';
		echo '</tr>';
	echo '</thead>';
	echo '<tbody>';
while ($row = $consulta->fetch()) 
{ 
	echo '<tr>';
	echo "<td>
			<a href='#' class='link' onclick=\"app_menu_base(5,'".$row[1]."','".$row[0]."','../APP/APP_ADM_MENU/VIEW/submenu.php','submenu')\"><span style='color:#666666;'>".$row[1]."</span></a>
		  </td>";
	echo "<td>".$row[5]."</td>";
	echo "<td width='5%'>
			<a class='link' onclick=\"app_menu_base(4,'Raiz Padre',".$row[0].",'../APP/APP_ADM_MENU/DB/EDIT.php','principal')\">
				<i class='fa fa-pencil' style='color:#0066FF;'></i>
			</a>
		  </td>";
	echo "<td width='5%'>
			<a class='link' onclick=\"app_menu_base(3,'Raiz Padre',".$row[0].",'../APP/APP_ADM_MENU/DB/EDIT.php','principal')\">
				<i class='fa fa-times' style='color:#FF0000;'></i>
			</a>
		  </td>";
	echo '</tr>';
}    
	echo '</tbody>';
echo '</table>';
$consulta=null;
$link = null;
echo '<br>'; 

echo "<a href='#' onclick=\"app_menu_base(1,'Raiz Padre',0,'../APP/APP_ADM_MENU/DB/ADD.php','principal')\" class='btn btn-lg btn-primary'><i class='fa fa-plus'></i> Agregar</a>";
?>