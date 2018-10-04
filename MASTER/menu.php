<!-- ***************************************************** MENU PRINCIPAL ********************************************************* -->
<?php
include('config/conect.php');
$SQL_US = "SELECT * FROM users WHERE id = ".$vari[0]."";
$link->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
$CONS_US = $link->prepare($SQL_US);
$CONS_US->execute();
$RU = $CONS_US->fetch();

if ($RU[7] == 1)
{
	echo '<br>';
	echo '<li class="heading"><h3 class="uppercase">NAVEGACIÓN</h3></li>';

	// $SQL1 = "SELECT id_aplicacion FROM access WHERE id_usuario = 2 ";

	$SQL1 = "SELECT id_aplicacion FROM access WHERE id_usuario = ".$vari[0]." ";

	$link->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	$CONS1 = $link->prepare($SQL1);
	$CONS1->execute();
	while ($R1 = $CONS1->fetch())
	{
		$sql_id_aplicacion .= $R1["id_aplicacion"].',';
	}

	$SQL2 = "SELECT idpadre FROM menu WHERE aplicacion IN (".substr($sql_id_aplicacion,0,-1).") ";
	$link->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	$CONS2 = $link->prepare($SQL2);
	$CONS2->execute();

	while ($R2 = $CONS2->fetch())
	{
		$sql_id_padre .= $R2["idpadre"].',';
	}


	$sql_inc = "   AND t1.id IN  (SELECT id
				FROM
				(
				SELECT * FROM menu WHERE aplicacion IN (".substr($sql_id_aplicacion,0,-1).")
				union ALL
				SELECT * FROM menu WHERE  id IN (".substr($sql_id_padre,0,-1).")
				) AS bb)
				";


	include('config/conect.php');
	// MENU SIN DESPLEGABLE
	$SQL3 = "SELECT t1.id,t1.nombre,t1.idpadre,t1.permisos,t3.ruta,t2.val,t3.id FROM
						menu t1 LEFT JOIN (SELECT *,'submenu' AS val FROM menu) AS t2
						ON t1.id = t2.idpadre
						LEFT JOIN applications t3 ON t1.aplicacion = t3.id
						WHERE t1.ubicacion=1 /*AND t1.idpadre = 0*/ AND t1.activo = 'ON'  ".$sql_inc."
						GROUP BY t1.id,t1.nombre,t1.idpadre,t1.permisos,t1.aplicacion,t2.val,t3.ruta,t3.id
						ORDER BY t1.nombre ASC";


	$link->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	$CONS3 = $link->prepare($SQL3);
	$CONS3->execute();
	while ($R3 = $CONS3->fetch())
	{
		if ($R3[5] =="submenu")
		{
			// SUB MENU
			/*
            $SQL4=" SELECT t1.id,t1.descripcion,t1.idpadre,t1.permisos,t3.ruta,t2.val,t3.id
                    FROM menu t1 LEFT JOIN (SELECT *,'submenu' AS val FROM menu) AS t2
                    ON t1.id = t2.idpadre
                    LEFT JOIN applications t3 ON t1.aplicacion = t3.id
                    WHERE t1.idpadre = ".$R3[0]." AND t1.activo = 'ON'  ".$sql_inc."
                    GROUP BY t1.id,t1.descripcion,t1.idpadre,t1.permisos,t1.aplicacion,t2.val, t3.ruta,t3.id
                    ORDER BY t1.descripcion ASC";
            */
			$SQL4=" SELECT t1.id,t1.nombre,t1.idpadre,t1.permisos,t3.ruta,t2.val,t3.id
					FROM menu t1 LEFT JOIN (SELECT *,'submenu' AS val FROM menu) AS t2
					ON t1.id = t2.idpadre
					LEFT JOIN applications t3 ON t1.aplicacion = t3.id
					WHERE t1.idpadre = ".$R3[0]." AND t1.activo = 'ON'  ".$sql_inc."  ";
			$link2->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			$CONS4 = $link2->prepare($SQL4);
			$CONS4->execute();
			while ($R4 = $CONS4->fetch())
			{
				if ($R4[5] =="")
				{
					echo "<li class='nav-item '><a href='index.php?application=".$R4[6]."' class='nav-link nav-toggle'><i class='icon-folder'></i><span class='title'> ".$R4[1]."</span></a></li>";
				}
				else
				{
					echo '<li class="nav-item  "><a href="javascript:;" class="nav-link nav-toggle"><i class="icon-folder"></i><span class="title"> '.$R4[1].'</span><span class="arrow"></span></a>';
					if ($R4[5] =="submenu")
					{
						echo '<ul class="sub-menu">';
						$SQL5=" SELECT t1.id,t1.nombre,t1.idpadre,t1.permisos,t3.ruta,t2.val,t3.id
								FROM menu t1 LEFT JOIN (SELECT *,'submenu' AS val FROM menu) AS t2
								ON t1.id = t2.idpadre
								LEFT JOIN applications t3 ON t1.aplicacion = t3.id
								WHERE t1.idpadre = ".$R4[0]." AND t1.activo = 'ON'  ".$sql_inc."
								GROUP BY t1.id,t1.nombre,t1.idpadre,t1.permisos,t1.aplicacion,t2.val, t3.ruta,t3.id
								ORDER BY t1.nombre ASC";
						$link2->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
						$CONS5 = $link2->prepare($SQL5);
						$CONS5->execute();
						while ($R5 = $CONS5->fetch())
						{
							echo "<li class='nav-item '><a href='index.php?application=".$R5[6]."' class='nav-link'>".$R5[1]."</a></li>";
						}
						echo '</ul>';
					}
				}
				$class = "";
				$click = "";
			}
			$CONS4=null;
		}
	} // FIN WHILE
	$link = null;
	$link2 = null;
	$link3 = null;
	$consulta = null;
}
else
	if ($RU[7] == 3)
	{
		echo '<br>';
		echo '<li class="heading"><h3 class="uppercase">NAVEGACIÓN USUARIOS</h3></li>';
		// $SQL1 = "SELECT id_aplicacion FROM access WHERE id_usuario = 2 ";

		$SQL1 = "SELECT id_aplicacion FROM access WHERE id_usuario = ".$vari[0]." ";

		$link->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		$CONS1 = $link->prepare($SQL1);
		$CONS1->execute();
		while ($R1 = $CONS1->fetch())
		{
			$sql_id_aplicacion .= $R1["id_aplicacion"].',';
		}

		$SQL2 = "SELECT idpadre FROM menu WHERE aplicacion IN (".substr($sql_id_aplicacion,0,-1).") ";
		$link->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		$CONS2 = $link->prepare($SQL2);
		$CONS2->execute();

		while ($R2 = $CONS2->fetch())
		{
			$sql_id_padre .= $R2["idpadre"].',';
		}


		$sql_inc = "   AND t1.id IN  (SELECT id
				FROM
				(
				SELECT * FROM menu WHERE aplicacion IN (".substr($sql_id_aplicacion,0,-1).")
				union ALL
				SELECT * FROM menu WHERE  id IN (".substr($sql_id_padre,0,-1).")
				) AS bb)
				";

		include('config/conect.php');
		// MENU SIN DESPLEGABLE
		$SQL3 = "SELECT t1.id,t1.nombre,t1.idpadre,t1.permisos,t3.ruta,t2.val,t3.id FROM
						menu t1 LEFT JOIN (SELECT *,'submenu' AS val FROM menu) AS t2
						ON t1.id = t2.idpadre
						LEFT JOIN applications t3 ON t1.aplicacion = t3.id
						WHERE t1.ubicacion=1 AND t1.idpadre = 0 AND t1.activo = 'ON'  ".$sql_inc."
						GROUP BY t1.id,t1.nombre,t1.idpadre,t1.permisos,t1.aplicacion,t2.val,t3.ruta,t3.id
						ORDER BY t1.nombre ASC";


		echo '<li class="nav-item"><a href="index.php"><i class="icon-home"></i><span class="title">Dashboard</span></a></li>';
		$link->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		$CONS3 = $link->prepare($SQL3);
		$CONS3->execute();
		while ($R3 = $CONS3->fetch())
		{
			// MENU PRINCIPAL
			if ($R3[5] =="")	{ echo "<li class='nav-item '><a href='index.php?application=".$R3[6]."'><i class='icon-folder'></i><span class='title'>".$R3[1]."</span></a></li>"; }
			else {

				echo '<li class="nav-item ">';
				echo '<a href="javascript:;" class="nav-link nav-toggle">
			  <i class="icon-folder"></i>';
				echo '<span class="title">'.$R3[1].'</span> <span class="arrow"></span>';
				echo '</a>';



				if ($R3[5] =="submenu")
				{
					// SUB MENU
					echo '<ul class="sub-menu">';
					/*
                    $SQL4=" SELECT t1.id,t1.descripcion,t1.idpadre,t1.permisos,t3.ruta,t2.val,t3.id
                            FROM menu t1 LEFT JOIN (SELECT *,'submenu' AS val FROM menu) AS t2
                            ON t1.id = t2.idpadre
                            LEFT JOIN applications t3 ON t1.aplicacion = t3.id
                            WHERE t1.idpadre = ".$R3[0]." AND t1.activo = 'ON'  ".$sql_inc."
                            GROUP BY t1.id,t1.descripcion,t1.idpadre,t1.permisos,t1.aplicacion,t2.val, t3.ruta,t3.id
                            ORDER BY t1.descripcion ASC";
                    */
					$SQL4=" SELECT t1.id,t1.nombre,t1.idpadre,t1.permisos,t3.ruta,t2.val,t3.id
						FROM menu t1 LEFT JOIN (SELECT *,'submenu' AS val FROM menu) AS t2
						ON t1.id = t2.idpadre
						LEFT JOIN applications t3 ON t1.aplicacion = t3.id
						WHERE t1.idpadre = ".$R3[0]." AND t1.activo = 'ON'  ".$sql_inc."  ";
					$link2->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
					$CONS4 = $link2->prepare($SQL4);
					$CONS4->execute();
					while ($R4 = $CONS4->fetch())
					{
						if ($R4[5] =="")
						{
							echo "<li class='nav-item '><a href='index.php?application=".$R4[6]."'>".$R4[1]."</a></li>";
						}
						else
						{
							echo '<li class="nav-item"><a href="javascript:;" class="nav-link nav-toggle">'.$R4[1].' <span class="arrow"></span></a>';
							if ($R4[5] =="submenu")
							{
								echo '<ul class="sub-menu">';
								$SQL5=" SELECT t1.id,t1.nombre,t1.idpadre,t1.permisos,t3.ruta,t2.val,t3.id
									FROM menu t1 LEFT JOIN (SELECT *,'submenu' AS val FROM menu) AS t2
									ON t1.id = t2.idpadre
									LEFT JOIN applications t3 ON t1.aplicacion = t3.id
									WHERE t1.idpadre = ".$R4[0]." AND t1.activo = 'ON'  ".$sql_inc."
									GROUP BY t1.id,t1.nombre,t1.idpadre,t1.permisos,t1.aplicacion,t2.val, t3.ruta,t3.id
									ORDER BY t1.nombre ASC";
								$link2->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
								$CONS5 = $link2->prepare($SQL5);
								$CONS5->execute();
								while ($R5 = $CONS5->fetch())
								{
									echo "<li class=' '><a href='index.php?application=".$R5[6]."'>".$R5[1]."</a></li>";
								}
								echo '</ul>';
							}
							echo '</li>';
						}
						$class = "";
						$click = "";
					}
					$CONS4=null;
					echo '</ul>'; // SUB MENU::END
					echo '</li>'; // MENU PRINCIPAL::END
				}
			} // FIN ELSE MENU
		} // FIN WHILE
		$link = null;
		$link2 = null;
		$link3 = null;
		$consulta = null;
		?>


		<!-- ***************************************************** MENU ADMINISTRADOR ********************************************************* -->
		<?php

		include('config/conect.php');


		$SQL10 = "SELECT * FROM users WHERE id = ".$vari[0];
		$link->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		$CONS10 = $link->prepare($SQL10);
		$CONS10->execute();
		$RU = $CONS10->fetch();
		if ($RU[7] == 3)
		{
			echo '<br>';
			echo '<li class="heading"><h3 class="uppercase">Administrador</h3></li>';
		}



		$SQL6 = " SELECT id_aplicacion FROM access WHERE id_usuario = ".$vari[0]." ";
		$link->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		$CONS6 = $link->prepare($SQL6);
		$CONS6->execute();

		while ($R6 = $CONS6->fetch()) {
			$sql_id_aplicacion .= $R6["id_aplicacion"].',';
		}

		$SQL7 = "SELECT idpadre FROM menu WHERE aplicacion IN (".substr($sql_id_aplicacion,0,-1).") ";
		$link->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		$CONS7 = $link->prepare($SQL7);
		$CONS7->execute();

		while ($R7 = $CONS7->fetch()) {
			$sql_id_padre .= $R7["idpadre"].',';
		}

		$sql_inc = "   AND t1.id IN  (SELECT id
					FROM
					(
					SELECT * FROM menu WHERE aplicacion IN (".substr($sql_id_aplicacion,0,-1).")
					union ALL
					SELECT * FROM menu WHERE  id IN (".substr($sql_id_padre,0,-1).") AND idpadre = 0
					) AS bb)
					";

		// MENU SIN DESPLEGABLE
		$SQL8 = "SELECT t1.id,t1.nombre,t1.idpadre,t1.permisos,t3.ruta,t2.val,t3.id,t3.ruta FROM
						menu t1 LEFT JOIN (select *,'submenu' AS val FROM menu) AS t2
						ON t1.id = t2.idpadre
						LEFT JOIN applications t3 ON t1.aplicacion = t3.id
						WHERE t1.ubicacion=2 AND t1.idpadre = 0 AND t1.activo = 'ON' ".$sql_inc."
						GROUP BY t1.id,t1.nombre,t1.idpadre,t1.permisos,t1.aplicacion,t2.val,t3.ruta,t3.id ORDER BY t1.nombre";


		$link->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		$CONS8 = $link->prepare($SQL8);
		$CONS8->execute();
		while ($R8 = $CONS8->fetch())
		{
			// MENU PRINCIPAL
			if ($R8[5] =="")	{ echo "<li class='nav-item'><a href='index.php?application=".$R8[6]."'><i class='icon-folder'></i><span class='title'>".$R8[1]."</span> <span class='arrow'></span></a></li>"; }

			else {
				echo '<li class="nav-item">';
				echo '<a href="javascript:;" class="nav-link nav-toggle">
			  <i class="icon-folder"></i>';
				echo '<span class="title">'.$R8[1].'</span>';
				echo '<span class="arrow"></span>';
				echo "</a>";


				if ($R8[5] =="submenu")
				{
					// SUB MENU
					echo '<ul class="sub-menu">';
					/*
					$SQL9=" SELECT t1.id,t1.nombre,t1.idpadre,t1.permisos,t3.ruta,t2.val,t3.id,t3.ruta FROM
						menu t1 LEFT JOIN (SELECT *,'submenu' AS val FROM menu) AS t2
						ON t1.id = t2.idpadre
						LEFT JOIN applications t3 ON t1.aplicacion = t3.id
						WHERE t1.idpadre = ".$R8[0]." AND t1.activo = 'ON'  ".$sql_inc."
						GROUP BY t1.id,t1.descripcion,t1.idpadre,t1.permisos,t1.aplicacion,t2.val,t3.ruta,t3.id";
					*/
					$SQL9=" SELECT t1.id,t1.nombre,t1.idpadre,t1.permisos,t3.ruta,t2.val,t3.id,t3.ruta FROM
						menu t1 LEFT JOIN (SELECT *,'submenu' AS val FROM menu) AS t2
						ON t1.id = t2.idpadre
						LEFT JOIN applications t3 ON t1.aplicacion = t3.id
						WHERE t1.idpadre = ".$R8[0]." AND t1.activo = 'ON'  ".$sql_inc." ";

					$link2->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
					$CONS9 = $link2->prepare($SQL9);
					$CONS9->execute();
					while ($R9 = $CONS9->fetch())
					{
						if ($R9[5] =="submenu")
						{
							$class =" class='dir'";
						}
						else
						{
							$click = " href='index.php?application=".$R9[6]."' ";
						}

						echo "<li class='nav-item'><a ".$click."  ".$class.">".$R9[1]."</a></li>";
						$class = "";
						$click = "";
					}
					$CONS9=null;
					echo '</ul>'; // SUB MENU::END
					echo '</li>'; // MENU PRINCIPAL::END

				}
			} // FIN ELSE MENU
		} // FIN WHILE
		echo '</li>';
		$link = null;
		$link2 = null;
		$link3 = null;
		$consulta = null;
	} // FIN VALIDACION ADMINISTRADOR
?>
