<?php 
include('../../MASTER/include/verifyAPP.php'); 
include ("../../../../lib/adodb/adodb.inc.php");
include('../../MASTER/config/conect.php');
$SQL = "EXEC [EERR_TOTAL_CONSOLIDADO_PIVOT] 2016, 1, 'Ingresos Matricula.', 8"; 
$RES_PIVOT = $DB2->Execute($SQL);
//echo $SQL;  
foreach($RES_PIVOT as $k => $row) 
{
?>
<tr style="color:#000000;"> 		
	<td><?php echo utf8_encode($row[0]); ?></td>
	<td><?php echo utf8_encode($row[1]); ?></td>
	<td><?php echo utf8_encode($row[2]); ?></td>
	<td><?php echo utf8_encode($row[3]); ?></td>
	<td><?php echo utf8_encode($row[4]); ?></td>
	<td><?php echo utf8_encode($row[5]); ?></td>
	<td><?php echo utf8_encode($row[6]); ?></td>
	<td><?php echo utf8_encode($row[7]); ?></td>
	<td><?php echo utf8_encode($row[8]); ?></td>
	<td><?php echo number_format($row[9], 0, ".", "."); ?></td>
	<td><?php echo number_format($row[10], 0, ".", "."); ?></td>
	<td><?php echo number_format($row[11], 0, ".", "."); ?></td>
	<td><?php echo number_format($row[12], 0, ".", "."); ?></td>
	<td><?php echo number_format($row[13], 0, ".", "."); ?></td>
	<td><?php echo number_format($row[14], 0, ".", "."); ?></td>
	<td><?php echo number_format($row[15], 0, ".", "."); ?></td>
	<td><?php echo number_format($row[16], 0, ".", "."); ?></td>
	<td><?php echo number_format($row[17], 0, ".", "."); ?></td>
	<td><?php echo number_format($row[18], 0, ".", "."); ?></td>
	<td><?php echo number_format($row[19], 0, ".", "."); ?></td>
	<td><?php echo number_format($row[20], 0, ".", "."); ?></td> 
</tr>
<?php 
}
$DB2->Close(); 
?> 