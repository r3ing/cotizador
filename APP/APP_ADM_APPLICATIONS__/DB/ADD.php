<?php
	include('../../../MASTER/include/verifyAPP.php');
?>
<!-- BEGIN SAMPLE TABLE PORTLET-->
<div class="portlet light">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa fa-user font-blue-sharp"></i>
			<span class="caption-subject font-blue-sharp bold uppercase">AGREGAR NUEVA APLICACI&Oacute;N</span>
		</div>
		<div class="tools">
			<a href="javascript:;" class="collapse"></a> 
		</div>
	</div>
	<div class="portlet-body form">
		<form class="form-horizontal" role="form">
		<div class="form-body">
			<div class="form-group">
				<label class="col-md-3 control-label">Nombre</label> 
				<div class="col-md-6"><input name="nombre" id="nombre" type="text" maxlength="100" class="form-control"/></div>
				<div class="col-md-3"><div id="msgNombre">&nbsp;</div></div>
			</div>
			<div class="form-group"> 
				<label class="col-md-3 control-label">Ruta</label>
				<div class="col-md-6"><input name="ruta" id="ruta" type="text" maxlength="100"  class="form-control"/></div>
				<div class="col-md-3"><div id="msgRuta">&nbsp;</div></div>
			</div>
			<div class="form-group"> 
				<label class="col-md-3 control-label">Estado</label>
				<div class="col-md-6">
					<select name="estado" id="estado" class="form-control">
						<option value="0">-- Seleccione Estado --</option>
						<option value="ON">ON</option>
						<option value="OFF">OFF</option>
					</select>
				</div>  
				<div class="col-md-3"><div id="msgEstado">&nbsp;</div></div>
			</div> 
			<div class="form-group"> 
				<label class="col-md-3 control-label">Tipo</label>
				<div class="col-md-6">
					<select name="tipo" id="tipo" class="form-control">
						<option value="0">-- Seleccione Tipo --</option>
						<option value="ADM">ADM</option>
						<option value="USER">USER</option>
					</select>
				</div>  
				<div class="col-md-3"><div id="msgTipo">&nbsp;</div></div>
			</div>
		</div>
		<div class="form-actions">
			<div class="row">
				<div class="col-md-offset-3 col-md-9">
					<?php	echo "<a href=\"#\" onclick=\"ventana_principal('11','../APP/APP_ADM_APPLICATIONS/index.php')\" class=\"btn btn-default\"><span>Volver</span></a>";	?>
					<input type="button" name="Guardar" id="Guardar" onclick="app_aplicaciones(3,0,'','../APP/APP_ADM_APPLICATIONS/DB/ADD_DB.php','vista_aplicaciones')" value="Agregar Aplicaci&oacute;n" class='btn btn-primary'/> 
				</div>
			</div>
		</div>
		
		<div class="clearfix"></div>
			
		</form>			
</div>