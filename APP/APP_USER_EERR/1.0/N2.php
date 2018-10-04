<?php 
	error_reporting(0); 
	
	include('../../MASTER/include/verifyAPP.php');	
	include("../../../../lib/adodb/adodb.inc.php");
	include('../../MASTER/config/conect.php');	
    
	$ID_US	= $vari[0]; 
	
	$SQL="EXEC [EERR_JERARQUIA_CENTROSCOSTOS] ".$ID_US.",2,".$_GET['id']." ";
	
	//echo $SQL;
	$RES = $DB2->Execute($SQL); 
?>
<select name="N2" class="form-control input-sm" id="" onchange="from(document.getElementsByName('N2').item('N2').value,'N3','N3.php')" required>	
	<option value="" disabled selected>-- Seleccione --</option>
	<?php foreach($RES as $k => $ROW)  {	 ?>
	<option value="<?php echo $ROW[1]; ?>"><?php echo utf8_encode($ROW[0]); ?></option>
	<?php }?>	
</select>