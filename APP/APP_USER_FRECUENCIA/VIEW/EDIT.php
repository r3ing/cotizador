<?php
	include('../../../MASTER/include/verifyAPP.php');
	if(isset($_POST['id'])) {
		$id = $_POST['id'];
		try {
			include('../../../MASTER/config/conect.php');
			$sql = "SELECT * FROM frecuencia WHERE id = " . $id;
			$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$result = $link->prepare($sql);
			$result->execute();
			while ($row = $consulta->fetch()) {
				$frecuencia['data'][]= $row;
			}
			return json_encode($frecuencia);
		}catch (PDOException $Exception) {
			echo "Error... " . $Exception->getMessage();
		}

	}
?>
