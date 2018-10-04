<?php 
	include('../../MASTER/include/verifyAPP.php');
	include ("../../../../lib/adodb/adodb.inc.php");
	include('../../MASTER/config/conect.php');	
 
	$ID_US	= $vari[0];
	
	$SQL="EXEC [EERR_JERARQUIA_CENTROSCOSTOS] ".$ID_US.",3,".$_GET['id']." ";
	$RES = $DB2->Execute($SQL); 
?>
<select name="IDP_CC" class="form-control input-sm" id=""  onchange="from(document.getElementsByName('IDP_CC').item('IDP_CC').value,'CC','CC.php')" required>	
	<option value="" disabled selected>-- Seleccione --</option>
	<?php foreach($RES as $k => $ROW)  {	 ?>
	<option value="<?php echo $ROW[1]; ?>"><?php echo utf8_encode($ROW[0]); ?></option>
	<?php }?>	
</select> 