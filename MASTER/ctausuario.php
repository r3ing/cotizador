<!-- ***************************************************** MENU CUENTA DE USUARIO ********************************************************* -->
<?php  
// echo $vari[0];

include('config/conect.php');
// MENU SIN DESPLEGABLE
$cons1 = " SELECT id_aplicacion FROM access WHERE id_usuario = ".$vari[0]." ";

$link->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
$consulta = $link->prepare($cons1);
$consulta->execute();
while ($ext = $consulta->fetch())
{
    $sql_id_aplicacion .= $ext["id_aplicacion"].',';
}


$cons2 = " SELECT idpadre FROM menu WHERE aplicacion IN (".substr($sql_id_aplicacion,0,-1).") ";

$link->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
$consulta = $link->prepare($cons2);
$consulta->execute();
while ($extrae = $consulta->fetch())
{
    $sql_id_padre .= $extrae["idpadre"].',';
}

 $sql_inc = "   AND t1.id IN  (SELECT id 
                FROM
                (
                SELECT * FROM menu WHERE aplicacion IN (".substr($sql_id_aplicacion,0,-1).")
                union ALL
                SELECT * FROM menu WHERE  id IN (".substr($sql_id_padre,0,-1).") AND idpadre = 0
                ) AS bb)
                ";
				
				// CORREGIR NUMERO DE APLICACIONES CON SUBSTR()
include('config/conect.php');
// MENU SIN DESPLEGABLE
$sql = "SELECT t1.id,t1.descripcion,t1.idpadre,t1.permisos,t3.ruta,t2.val,t3.id FROM 
                    menu t1 LEFT JOIN (select *,'submenu' AS val FROM menu) AS t2
                    ON t1.id = t2.idpadre
                    LEFT JOIN applications t3 ON t1.aplicacion = t3.id 
                    WHERE t1.ubicacion=3 AND t1.idpadre = 0 AND t1.activo = 'ON'  ".$sql_inc." 
                    GROUP BY t1.id,t1.descripcion,t1.idpadre,t1.permisos,t1.aplicacion,t2.val ORDER BY t1.descripcion";

$link->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ); 
$consulta = $link->prepare($sql); 
$consulta->execute(); 
while ($row = $consulta->fetch()) 
{ 	    
	if ($row[5] =="submenu")
	{ 
		// SUB MENU
		$sql2=" SELECT t1.id,t1.descripcion,t1.idpadre,t1.permisos,t3.ruta,t2.val,t3.id FROM 
				menu t1 LEFT JOIN (SELECT *,'submenu' AS val FROM menu) AS t2
				ON t1.id = t2.idpadre
				LEFT JOIN applications t3 ON t1.aplicacion = t3.id 
				WHERE t1.idpadre = ".$row[0]." AND t1.activo = 'ON' ".$sql_inc." 
				GROUP BY t1.id,t1.descripcion,t1.idpadre,t1.permisos,t1.aplicacion,t2.val";
 
		$link2->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ); 
		$consulta2 = $link2->prepare($sql2); 
		$consulta2->execute(); 
		while ($raw = $consulta2->fetch()) 
		{                 
			if ($raw[5] =="submenu")
			{
				$class =" class='dir'";                    
			}
			else
			{
				$click = " href='index.php?application=".$raw[6]."' ";
			}
			
			echo "<li><a ".$click."  ".$class."> <i class='icon-user'></i> ".$raw[1]."</a></li>";
			$class = "";              
			$click = "";
		}
		$consulta2=null;
		echo '<li class="divider"></li>';
		//echo '<li><a href="include/out.php"><i class="icon-key"></i> Salir</a></li>';
	}
} // FIN WHILE
echo '<li><a href="include/out.php"><i class="icon-key"></i> Salir</a></li>';

$link = null; 
$link2 = null; 
$link3 = null; 
$consulta = null; 
?>