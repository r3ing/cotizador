<?php
    include('../../../MASTER/include/verifyAPP.php');
    include('../../../MASTER/config/conect.php');
    require '../../PLUGINS/PHPExcel/PHPExcel/IOFactory.php';

    $target_dir = '../../../MASTER/uploads/';

    if ($_FILES['file']['error'] == 0) {
        $allowed = array('xls','xlsx');
        $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
        if(in_array($ext,$allowed)){
            $target_file = $target_dir . utf8_decode(basename($_FILES["file"]["name"]));
        }else{
            unset($target_file);
            echo 3;//extension incorrecta
        }
    }else{
        unset($target_file);
        echo 0;//error al cargar el archivo
    }

    if ($target_file) {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            $uploads = true;
        } else {
            $uploads = false;
        }
    }

    if($uploads){

        $objExcel = PHPExcel_IOFactory::load($target_file);
        $objExcel->setActiveSheetIndex(0);
        $numRows = $objExcel->setActiveSheetIndex(0)->getHighestRow();

        $sql = "TRUNCATE TABLE costo;";

        for($i = 2; $i<=$numRows; $i++){
            $sku = $objExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();
            $descripcion = $objExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();
            $rut = $objExcel->getActiveSheet()->getCell('C'.$i)->getCalculatedValue();
            $nombre = $objExcel->getActiveSheet()->getCell('D'.$i)->getCalculatedValue();
            $costo = $objExcel->getActiveSheet()->getCell('E'.$i)->getCalculatedValue();
            $capacidad = $objExcel->getActiveSheet()->getCell('F'.$i)->getCalculatedValue();

            $sql = $sql . 'INSERT INTO costo(sku, descripcion, rut, nombre, costo, capacidad, saldo) VALUES("'.$sku.'", "'.$descripcion.'", "'.$rut.'", "'.$nombre.'", "'.$costo.'", "'.$capacidad.'","'.$capacidad.'");';
        }

        $link->beginTransaction();

        try{
            $link->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
            $result = $link->prepare($sql);
            $result->execute();
            $link->commit();
            echo 1; //ok

        }catch (PDOException $Exception){
            //echo "Error... ".$Exception->getMessage();
            $link->rollBack();
            echo 2;//problemacon la db
        }

    }else{
        echo 0;//error al cargar el archivo
    }


?>