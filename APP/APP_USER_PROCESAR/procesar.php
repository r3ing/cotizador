<?php
    include('../../MASTER/include/verifyAPP.php');
    include('../../MASTER/config/conect.php');

    //demanda insatisfecha
    $sql = "TRUNCATE TABLE demanda_insatisfecha;TRUNCATE TABLE demanda_satisfecha;UPDATE costo SET saldo = capacidad;";
    $sql = $sql . "INSERT INTO demanda_insatisfecha(sku, descripcion,diferencia)
	        (SELECT t1.sku, t1.descripcion_sku, SUM(t2.capacidad) - SUM(t1.cant_sol) AS diferencia FROM solicitud t1, costo t2
	        WHERE t1.sku = t2.sku
	        GROUP BY t1.sku, t1.descripcion_sku
	        HAVING diferencia < 0);";

    $link->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $result = $link->prepare($sql);
    $result->execute();


    $sql1 = "SELECT sku, SUM(cant_sol) FROM solicitud
            GROUP BY sku;";
    $result = $link->prepare($sql1);
    $result->execute();

    while($row = $result->fetch()){

        $sql3 = "SELECT t1.rut, MIN(t1.costo) FROM costo t1
	             WHERE t1.sku = ".$row[0]." AND
	                   t1.saldo > ".$row[1];
        $result3 = $link->prepare($sql3);
        $result3->execute();

        $rut = $result3->fetch();

        if(!empty($rut[0])) {

            $sql2 = "INSERT INTO demanda_satisfecha(sku,descripcion_sku,rut,provedor,costo,capacidad_entrega,capacodad_sugerida)
	                    (SELECT t1.sku, t1.descripcion, t1.rut, t1.nombre, MIN(t1.costo), t1.capacidad, " . $row[1] . " FROM costo t1
	                     WHERE t1.sku = " . $row[0] . " AND
	                     t1.saldo > " . $row[1] . ");";
            $result2 = $link->prepare($sql2);
            $result2->execute();

            $sql4 = "UPDATE costo SET saldo = saldo - " . $row[1] . " WHERE rut = " . $rut[0] . " AND sku = " . $row[0] . ";";
            $result4 = $link->prepare($sql4);
            $result4->execute();
        }
    }

    echo OK;




?>