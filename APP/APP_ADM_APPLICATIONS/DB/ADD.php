<?php
	include('../../../MASTER/include/verifyAPP.php');
?>
<!-- BEGIN SAMPLE TABLE PORTLET-->
<div class="portlet light">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa fa-plus font-blue-sharp"></i>
			<span class="caption-subject font-blue-sharp bold uppercase">AGREGAR</span>
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
				<div class="col-md-6"><input name="nombre" id="nombre" type="text" onkeyup="createRoute();" maxlength="100" class="form-control"/></div>
				<div class="col-md-3"><div id="msgNombre">&nbsp;</div></div>
			</div>
			<div class="form-group"> 
				<label class="col-md-3 control-label">Ruta</label>
				<div class="col-md-6"><input name="ruta" id="ruta" type="text" maxlength="100" readonly class="form-control"/></div>
				<div class="col-md-3"><div id="msgRuta">&nbsp;</div></div>
			</div>
			<div class="form-group"> 
				<label class="col-md-3 control-label">Estado</label>
				<div class="col-md-6">
					<select name="estado" id="estado" class="form-control">
						<option value="0">Seleccione Estado</option>
						<option value="ON">ON</option>
						<option value="OFF">OFF</option>
					</select>
				</div>  
				<div class="col-md-3"><div id="msgEstado">&nbsp;</div></div>
			</div> 
			<div class="form-group"> 
				<label class="col-md-3 control-label">Tipo</label>
				<div class="col-md-6">
					<select name="tipo" id="tipo" class="form-control" onchange="createRoute();">
						<option value="0">Seleccione Tipo</option>
						<option value="ADM">ADM</option>
						<option value="USER">USER</option>
						<option value="ALL">ALL</option>
					</select>
				</div>  
				<div class="col-md-3"><div id="msgTipo">&nbsp;</div></div>
			</div> 
			<div class="form-group"> 
				<label class="col-md-3 control-label">Categor&iacute;a</label>
				<div class="col-md-6">
					<?php
						echo "<select name='category' id='category' class='form-control'>";
						echo "<option value='0'>Seleccionar Categor&iacute;a</option>";
                        include('../../../MASTER/config/conect.php');
                        $sql="  SELECT * FROM CATEGORY WHERE estado = 1 ORDER BY nombre";
                        $link->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
                        $consulta = $link->prepare($sql);
                        $consulta->execute();
                        while ($row = $consulta->fetch())
                        {
							echo "<option value='".$row[0]."'>".$row[1]."</option>";
						}
						echo "</select>";
					?>
				</div> 
				<div class="col-md-3"><div id="msgCategory">&nbsp;</div></div>  
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