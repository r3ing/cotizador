<?php 
include('../../../MASTER/config/conect.php'); 

$id = $_POST['id'];
$nombre = $_POST['nombre'];


$sql = "SELECT * FROM menu WHERE idpadre = ".$id."";  

echo '<h4>'.$nombre.'</h4>';
echo '<br>';

$link->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ); 
$consulta = $link->prepare($sql); 
$consulta->execute(); 
echo '<table class="table table-striped table-bordered" id="sample_1">';
	echo '<thead>';
		echo '<tr>';
			echo '<th class="head0">Nombre</th>';
			echo '<th class="head0">Activo</th>';
			echo '<th class="head0">&nbsp;</th>';
			echo '<th class="head0">&nbsp;</th>';
		echo '</tr>';
	echo '</thead>';
	echo '<tbody>';
while ($row = $consulta->fetch()) 
{ 
    echo '<tr class="odd gradeX">';
		echo "<td><a href='#' class='link'\">".$row[1]."</a></td>";
		echo "<td>".$row[5]."</td>";
   	 	echo "<td width='5%'>
				<a class='link' onclick=\"app_menu_base(4,'".$row[1]."Raiz Padre',".$row[0].",'../APP/APP_ADM_MENU/DB/EDIT.php','principal')\">
					<i class='fa fa-pencil' style='color:#0066FF;'></i>
				</a>
			  </td>";
    	echo "<td width='5%'>
				<a class='link' onclick=\"app_menu_base(3,'".$row[1]."',".$row[0].",'../APP/APP_ADM_MENU/DB/EDIT.php','principal')\">
					<i class='fa fa-times' style='color:#FF0000;'></i>
			    </a>
			  </td>";
	echo '</tr>';

}    
$consulta=null;
$link = null;
	echo '</tbody>';
echo '</table>';

echo "<br>";
echo "<a href='#' onclick=\"app_menu_base(1,'".$nombre."',".$id.",'../APP/APP_ADM_MENU/DB/ADD.php','principal')\" class='btn btn-lg btn-primary'><i class='fa fa-plus'></i> Agregar</a>";
?>