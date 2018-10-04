<?php
	include('../../../MASTER/include/verifyAPP.php');
?>  
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption font-dark">
            <i class="icon-settings font-dark"></i>
            <span class="caption-subject bold uppercase">
                Mantenedor de Usuarios
            </span>
        </div>
    </div>
	<div class="portlet-body form">
		<form class="form-horizontal" role="form">
			<div class="form-body">
				<div class="form-group">
					<label class="col-md-3 control-label">Usuario</label>
					<div class="col-md-6"><input name="user" id="user" type="text" maxlength="50" class="form-control"></div>
					<div class="col-md-3"><div id="msgUser">&nbsp;</div></div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label">Contrase&ntilde;a</label>
					<div class="col-md-6"><input name="pass" id="pass" type="password" maxlength="50" class="form-control"></div>
					<div class="col-md-3"><div id="msgPass">&nbsp;</div></div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label">Nombre</label>
					<div class="col-md-6"><input name="forename" id="forename" type="text" maxlength="50" class="form-control"></div>
					<div class="col-md-3"><div id="msgForename">&nbsp;</div></div>
				</div> 
				<div class="form-group">
					<label class="col-md-3 control-label">Apellido Paterno</label>
					<div class="col-md-6"><input name="paternal" id="paternal" type="text" maxlength="50" class="form-control"></div>
					<div class="col-md-3"><div id="msgPaternal">&nbsp;</div></div>
				</div>  
				<div class="form-group">
					<label class="col-md-3 control-label">Apellido Materno</label>
					<div class="col-md-6"><input name="maternal" id="maternal" type="text" maxlength="50" class="form-control"></div>
					<div class="col-md-3"><div id="msgMaternal">&nbsp;</div></div>
				</div> 
				<div class="form-group">
					<label class="col-md-3 control-label">Celular</label>
					<div class="col-md-6"><input name="cellphone" id="cellphone" type="text" maxlength="11" class="form-control" placeholder="Ej. 56967891234 o 967891234" onkeypress="return onlyNumbers(event)"></div>
					<div class="col-md-3"><div id="msgCellphone">&nbsp;</div></div>
				</div>   
				<div class="form-group">
					<label class="col-md-3 control-label">Permisos</label>
					<div class="col-md-6">
						<select name="permits" id="permits" class="form-control" onchange="selectPermits();">
							<option value="0">Seleccionar Opci&oacute;n</option>
							<option value="1">Usuario B&aacute;sico</option>
							<!--<option value="2">2 - Usuario Medio</option>-->
							<option value="3">Administrador</option>
						</select>
					</div>
					<div class="col-md-3"><div id="msgPermits">&nbsp;</div></div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label">E-mail</label>
					<div class="col-md-6"><input name="email" id="email" type="text" maxlength="50" class="form-control"></div>
					<div class="col-md-3"><div id="msgEmail">&nbsp;</div></div>
				</div> 
				<div class="form-group">
					<label class="col-md-3 control-label">Estado</label>
					<div class="col-md-6">
						<select name="status" id="status" class="form-control">
							<option value="0">Seleccionar Opci&oacute;n</option>
							<option value="ON">ON</option>
							<option value="OFF">OFF</option>
						</select>
					</div>
					<div class="col-md-3"><div id="msgStatus">&nbsp;</div></div>
				</div>
			</div>
			<div class="form-actions">
				<div class="row">
					<div class="col-md-offset-3 col-md-9">
						<?php	echo "<a href=\"#\" onclick=\"ventana_principal('11','../APP/APP_ADM_USERS/index.php')\" class=\"btn btn-default\"><span>Volver</span></a>";	?>
						<input type="button" name="Guardar" id="Guardar" onclick="app_usuarios(2,0,'../APP/APP_ADM_USERS/DB/ADD_DB.php','vista_users')" value="Agregar Usuario"  class='btn btn-primary' style="width:auto;" />
					</div>
				</div>
			</div>
		</form>
	</div>
</div>