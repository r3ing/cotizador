<?php
	include('../../MASTER/include/verifyAPP.php');
	include('../../MASTER/config/conect.php');

    $SQL="SELECT descripcion FROM menu WHERE aplicacion = ".$_GET['application']." ";
    $link->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $result = $link->prepare($SQL);
    $result->execute();
    $descp = $result->fetch();

	$SQL="SELECT * FROM APPLICATIONS WHERE id = ".$_GET['application']." ";
    $link->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $consulta = $link->prepare($SQL);
    $consulta->execute();
    while ($row = $consulta->fetch())
    {
?>
		<iframe src="../APP/<?php echo $row[2]; ?>/home.php?name_application=<?php echo utf8_encode($row[1]); ?>&tipo=<?php echo utf8_encode($row[4]); ?>&descripcion=<?php echo $descp[0]; ?>" width="100%" height="1000" frameborder="0"></iframe>
<?php 
	}
?>