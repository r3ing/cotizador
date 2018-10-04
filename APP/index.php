<?php
	include('../MASTER/include/verifyAPP.php');

	include('../MASTER/config/conect.php');
	$SQL="SELECT * FROM APPLICATIONS WHERE id = ".$_GET['application']." ";

    try {
        $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $consulta = $link->prepare($SQL);
        $consulta->execute();

        if ($consulta->rowCount() != 0) {

            while ($row = $consulta->fetch()) {
                ?>
                <iframe
                    src="../APP/<?php echo $row[2]; ?>/home.php?name_application=<?php echo utf8_encode($row[1]); ?>&tipo=<?php echo utf8_encode($row[4]); ?>"
                    width="100%" height="1000" frameborder="0"></iframe>
                <?php
            }
        }else{
            header('Location: ../index.php');
            //header("HTTP/1.0 404 Not Found");
        }
    }catch( PDOException $Exception ) {
        header('Location: ../index.php');
        //header("HTTP/1.0 404 Not Found");
    }
?>


