<?php
	include('../../MASTER/include/verifyAPP.php');
	include ("../../../../lib/adodb/adodb.inc.php");
	include('../../MASTER/config/conect.php');	
 	
	$ID_US	= $vari[0];
	
	$SQL="EXEC [EERR_JERARQUIA_CENTROSCOSTOS] ".$ID_US.",4,".$_GET['id']." ";
	//echo $SQL; 
	$RES = $DB2->Execute($SQL); 
?>
<select name="CC[]" class="form-control input-sm" multiple="multiple" required>	
	<option value="">-- Seleccione --</option>
	<!-- <option value="-1"> Todos </option> -->
	<?php 
		foreach($RES as $k => $ROW)  {	 
		
		if($ROW[2] < 10 && $ROW[2] > 0)
		$CC = '0'.$ROW[2]; 
		else 
		$CC = $ROW[2]; 
	?>	
	<option value="<?php echo $CC; ?>">(<?php echo utf8_encode($CC); ?>) - <?php echo utf8_encode($ROW[0]); ?></option>
	<?php }?>	
</select> 