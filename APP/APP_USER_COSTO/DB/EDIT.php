<?php
include('../../../MASTER/include/verifyAPP.php');
if(isset($_POST['id']))
{
	$id =   $_POST['id'];

	include('../../../MASTER/config/conect.php');
	$sql="SELECT * FROM costo WHERE id = ".$id;
	$link->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	$consulta = $link->prepare($sql);
	$consulta->execute();
	while ($row = $consulta->fetch())
	{
		$sku = $row[1];
		$descripcion = $row[2];
		$rut =	$row[3];
		$nombre = $row[4];
		$costo = $row[5];
		$capacidad = $row[6];
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
                Editar Costo
            </span>
		</div>
	</div>
	<div class="portlet-body form">
		<form class="form-horizontal" role="form" name="editForm" id="editForm">
			<div class="form-body">
				<input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
				<div class="form-group">
					<label class="col-md-3 control-label">SKU</label>
					<div class="col-md-6">
						<input name="sku" id="sku" type="text" maxlength="50" class="form-control" onkeypress="return onlyNumbers(event)" value="<?php echo $sku ?>">
					</div>
					<div class="col-md-3"><div id="msgSku">&nbsp;</div></div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label">Descripci&oacute;n</label>
					<div class="col-md-6">
						<input name="descripcion" id="descripcion" type="text" maxlength="50" class="form-control" value="<?php echo $descripcion ?>">
					</div>
					<div class="col-md-3"><div id="msgDescripcion">&nbsp;</div></div>
				</div>
				<div class="form-group">
 					<label class="col-md-3 control-label">Rut</label>
					<div class="col-md-6">
						<input name="rut" id="rut" type="text" maxlength="50" class="form-control" onkeypress="return onlyNumbers(event)" value="<?php echo $rut ?>">
					</div>
					<div class="col-md-3"><div id="msgRut">&nbsp;</div></div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label">Nombre</label>
					<div class="col-md-6">
						<input name="nombre" id="nombre" type="text" maxlength="50" class="form-control" value="<?php echo $nombre ?>">
					</div>
					<div class="col-md-3"><div id="msgNombre">&nbsp;</div></div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label">Costo</label>
					<div class="col-md-6">
						<input name="costo" id="costo" type="text" maxlength="50" class="form-control" value="<?php echo $costo ?>">
					</div>
					<div class="col-md-3"><div id="msgCosto">&nbsp;</div></div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label">Capacidad</label>
					<div class="col-md-6">
						<input name="capacidad" id="capacidad" type="text" maxlength="50" class="form-control" value="<?php echo $capacidad ?>">
					</div>
					<div class="col-md-3"><div id="msgCapacidad">&nbsp;</div></div>
				</div>
			</div>
			<div class="form-actions">
				<div class="row">
					<div class="col-md-offset-3 col-md-9">
						<?php	echo "<a href=\"#\" onclick=\"cancel()\" class=\"btn btn-default\"><span>Volver</span></a>";	?>
						<?php echo '<input type="submit" name="Guardar" id="Guardar" value="Modificar Ranking"  class="btn btn-primary" />'; ?>
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




