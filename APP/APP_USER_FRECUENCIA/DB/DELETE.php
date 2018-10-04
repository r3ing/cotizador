<?php
	include('../../../MASTER/include/verifyAPP.php');

	if(isset($_POST['id'])) {
		$id = $_POST['id'];

		include('../../../MASTER/config/conect.php');

		$link->beginTransaction();
		$sql = "DELETE FROM frecuencia WHERE id=" . $id;
		try{
			$link->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			$result = $link->prepare($sql);
			$result->execute();
			$link->commit();
			echo 1; //ok
		}catch (PDOException $Exception){
			//echo "Error... ".$Exception->getMessage();
			$link->rollBack();
			echo 0;//problemacon la db
		}
	}
	else{
		echo 0;
	}
?>
