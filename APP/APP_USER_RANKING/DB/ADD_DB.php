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

        $sql = "TRUNCATE TABLE ranking;";

        for($i = 2; $i<=$numRows; $i++){
            $rut = $objExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();
            $nombre = $objExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();
            $sku = $objExcel->getActiveSheet()->getCell('C'.$i)->getCalculatedValue();
            $descripcion = $objExcel->getActiveSheet()->getCell('D'.$i)->getCalculatedValue();
            $ranking_ns = $objExcel->getActiveSheet()->getCell('E'.$i)->getCalculatedValue();

            $sql = $sql . 'INSERT INTO ranking(rut, nombre, sku, descripcion, ranking_ns) VALUES("'.$rut.'", "'.$nombre.'", "'.$sku.'", "'.$descripcion.'", "'.$ranking_ns.'");';
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