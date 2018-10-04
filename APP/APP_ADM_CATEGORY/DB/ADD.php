<?php
	include('../../../master/include/verifyAPP.php');
?>  
<div class="portlet light">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa fa-plus font-blue-sharp"></i>
			<span class="caption-subject font-blue-sharp bold uppercase">AGREGAR</span>
		</div>
		<div class="tools">
			<a href="javascript:;" class="collapse"> </a> 
		</div>
	</div>
	<div class="portlet-body form">
		<form class="form-horizontal" role="form">
			<div class="form-body"> 
				<div class="form-group">
					<label class="col-md-3 control-label">Nombre</label>
					<div class="col-md-6"><input name="nombre" id="nombre" type="text" maxlength="50" class="form-control"></div>
					<div class="col-md-3"><div id="msgNombre">&nbsp;</div></div>
				</div>  
				<div class="form-group">
					<label class="col-md-3 control-label">Estado</label>
					<div class="col-md-6">
						<select name="estado" id="estado" class="form-control">
							<option value="0">Seleccionar Opci&oacute;n</option>
							<option value="1">ON</option>
							<option value="0">OFF</option>
						</select>
					</div>
					<div class="col-md-3"><div id="msgEstado">&nbsp;</div></div>
				</div> 
			</div>
			<div class="form-actions">
				<div class="row">
					<div class="col-md-offset-3 col-md-9">
						<?php	echo "<a href=\"#\" onclick=\"ventana_principal('11','../APP/APP_ADM_CATEGORY/index.php')\" class=\"btn btn-default\"><span>Volver</span></a>";	?>
						<input type="button" name="Guardar" id="Guardar" onclick="app_categorias(2,0,'../APP/APP_ADM_CATEGORY/DB/ADD_DB.php','vista_categorias')" value="Agregar"  class='btn btn-primary' style="width:auto;" />
					</div>
				</div>
			</div>
		</form>
	</div>
</div>