<?php
	include('../../../MASTER/include/verifyAPP.php');
	if (isset($_POST['app']))
    {
        $app = $_POST['app'];
        $nombre = $_POST['nombre'];
        $id = $_POST['id'];
        $evento = $_POST['evento'];
    }
    else
    {
        echo "No se recibieron parametros. exit:";
        exit;
    }
?>
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption font-dark">
            <i class="icon-settings font-dark"></i>
            <span class="caption-subject bold uppercase">
                Mantenedor de Menú
            </span>
        </div>
    </div>
	<div class="portlet-body form">

	<?php 
		echo "<h3>Agregar Men&uacute; en: ".$nombre."</h3>"; 
		
		// print "<div class='etiqueta'>";
		if($evento == 'padre' )
		{
			echo "<h3>Agregar Men&uacute; en: ".$nombre."</h3>";
		}
		if($evento == 'hijo1' )
		{
			echo "<h3>Agregar Men&uacute; en: ".$nombre."</h3>";
		}
	?> 
			
	<form class="form-horizontal" role="form">
		<div class="form-body">
			<div class="form-group">
				<label class="col-md-3 control-label">Nombre</label>
				<div class="col-md-6"><input name="nombre" id="nombre" type="text" maxlength="50" class="form-control"  /></div>
				<div class="col-md-3"><div id="msgName">&nbsp;</div></div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label">Descripci&oacute;n</label>
				<div class="col-md-6"><input name="descripcion" id="descripcion" type="text" maxlength="100" class="form-control"  /></div>
				<div class="col-md-3"><div id="msgDescripcion">&nbsp;</div></div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label">Padre</label>
				<div class="col-md-6"><input name="antecesor" id="antecesor" type="text" maxlength="30" class="form-control" value="<?php print $nombre; ?>" readonly/></div>
				<div class="col-md-3"><div id="msgFather">&nbsp;</div></div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label">Permisos</label>
				<div class="col-md-6">
					<select name="permisos" id="permisos" class="form-control">
						<option value="0">Seleccionar Opci&oacute;n</option>
						<option value="1">1 - Usuario B&aacute;sico</option>
						<option value="2">2 - Usuario Medio</option>
						<option value="3">3 - Administrador</option>
					</select>
				</div>  
				<div class="col-md-3"><div id="msgPermissions">&nbsp;</div></div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label">Aplicaci&oacute;n</label>
				<div class="col-md-6">
					<?php
						echo "<select name='aplicacion' id='aplicacion' class='form-control'>";
						echo "<option value='0'>Seleccionar Aplicaci&oacute;n</option>";
						include('../../../MASTER/config/conect.php');
						$sql="	SELECT t1.id, t1.nombre 
								FROM applications t1 WHERE t1.estado = 'ON'
							 ";
						$link->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ); 
						$consulta = $link->prepare($sql); 
						$consulta->execute(); 
						while ($row = $consulta->fetch()) 
						{
							echo "<option value='".$row[0]."'>".$row[2].' - '.$row[1]."</option>";
						}
						$consulta=null;
						$link = null;
						echo "</select>";
					?>
				</div>
				<div class="col-md-3"><div id="msgApplication">&nbsp;</div></div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label">Activo</label>
				<div class="col-md-6">
					<select name="activo" id="activo" class="form-control">
						<option value="0">Seleccionar Opci&oacute;n</option>
						<option value="ON">ON</option>
						<option value="OFF">OFF</option>
					</select>
				</div>
				<div class="col-md-3"><div id="msgStatus">&nbsp;</div></div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label">Ubicaci&oacute;n</label>
				<div class="col-md-6">
					<select name="ubicacion" id="ubicacion" class="form-control">
						<option value="0">Seleccionar Ubicaci&oacute;n</option>
						<option value="1">1 - Men&uacute; Principal</option>
						<option value="2">2 - Administrador</option> 
					</select>
				</div>
				<div class="col-md-3"><div id="msgLocation">&nbsp;</div></div>
			</div> 
			<div class="form-actions">
				<div class="row">
					<div class="col-md-offset-3 col-md-9">
						<input type="hidden" name="idpadre" id="idpadre" value="<?php print $id;  ?>" />
						<?php	echo "<a href=\"#\" onclick=\"ventana_principal('11','../APP/APP_ADM_MENU/index.php')\" class=\"btn btn-default\"><span>Volver</span></a>";	?>
						<input type="button" name="Guardar" id="Guardar" onclick="app_menu_base(2,'Raiz Padre',0,'../APP/APP_ADM_MENU/DB/ADD_DB.php','principal')" value="Agregar Men&uacute;" class='btn btn-primary' /> 
					</div>
				</div>
			</div> 
	
	<div class="clearfix"></div>
	
	</form>
	</div>			
</div>