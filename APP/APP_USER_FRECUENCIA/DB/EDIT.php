<?php
include('../../../MASTER/include/verifyAPP.php');
if(isset($_POST['id']))
{
	$id =   $_POST['id'];

	include('../../../MASTER/config/conect.php');
	$sql="SELECT * FROM frecuencia WHERE id = ".$id;
	$link->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	$consulta = $link->prepare($sql);
	$consulta->execute();
	while ($row = $consulta->fetch())
	{
		$codigo				=	$row[1];
		$tienda				= 	$row[2];
		$despacho			= 	$row[3];
	}
}

?>
</br>
</br>
<div class="portlet portlet light bordered col-md-8 col-md-offset-2">
	<div class="portlet-title">
		<div class="caption blue">
			<i class="fa fa-table font-blue-sharp"></i>
            <span class="caption-subject font-blue-sharp bold uppercase">
                Editar Frecuencia
            </span>
			<!--<i class="fa fa-table font-blue-sharp"></i>Editar Frecuencia</div>-->
		</div>
	</div>
	<div class="portlet-body form">
		<form class="form-horizontal" role="form" name="editForm" id="editForm">
			<div class="form-body">
				<input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
				<div class="form-group">
 					<label class="col-md-3 control-label">C&oacute;digo</label>
					<div class="col-md-6">
						<input name="codigo" id="codigo" type="text" maxlength="50" class="form-control" value="<?php echo $codigo ?>">
					</div>
					<div class="col-md-3"><div id="msgCodigo">&nbsp;</div></div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label">Tienda</label>
					<div class="col-md-6">
						<input name="tienda" id="tienda" type="text" maxlength="50" class="form-control" value="<?php echo $tienda; ?>">
					</div>
					<div class="col-md-3"><div id="msgTienda">&nbsp;</div></div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label">Despacho</label>
					<div class="col-md-6">
						<input name="despacho" id="despacho" type="text" maxlength="50" class="form-control" value="<?php echo $despacho ?>">
					</div>
					<div class="col-md-3"><div id="msgDespacho">&nbsp;</div></div>
				</div>
			</div>
			<div class="form-actions">
				<div class="row">
					<div class="col-md-offset-3 col-md-9">
						<?php	echo "<a href=\"#\" onclick=\"cancel()\" class=\"btn btn-default\"><span>Volver</span></a>";	?>
						<?php echo '<input type="submit" name="Guardar" id="Guardar" value="Modificar Frecuencia"  class="btn btn-primary" />'; ?>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>

<script type="text/javascript">

	$('#editForm').on('submit', function(e){
		e.preventDefault();
		if(validateFrm()) {
			$('#result').hide();
			$('#loading').show();
			$.ajax({
				type: 'POST',
				url: 'DB/EDIT_DB.php',
				data: $(this).serialize(),
				success: function (data) {
					$('#result').html(data);
				},
				complete: function () {
					$('#loading').hide();
					$('#result').fadeIn('slow');
				}
			});
		}
	});

</script>




