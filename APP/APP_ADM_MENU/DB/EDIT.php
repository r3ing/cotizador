<?php
include('../../../MASTER/include/verifyAPP.php');
?>
<?php	
if(isset($_POST['id']))
{     
	$tipo = $_POST['tipo'];
	$id = $_POST['id'];
	$nombre = $_POST['nombre'];
	
	if($tipo == 'act')
	{	
		include('../../../MASTER/config/conect.php');  
		$sql = "SELECT * FROM menu WHERE id = ".$id."";  
			
		$link->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ); 
		$consulta = $link->prepare($sql); 
		$consulta->execute(); 
		while ($row = $consulta->fetch()) 
		{ 
			$mod[0] = $row[0];//ID
			$mod[1] = $row[1];//NOMBRE
			$mod[2] = $row[2];//IDPADRE
			$mod[3] = $row[3];//PERMISOS
			$mod[4] = $row[4];//APP
			$mod[5] = $row[5];//ACTIVO	
			$mod[6] = $row[6];//UBICACION
			$mod[7] = $row[7];//ORDEN
			$mod[8] = $row[8];//DESCRIPCION
		}    
		$consulta=null;
		$link = null;
		
		switch ($mod[3])
		{
			case 1: $sel1=" selected ";break;
			case 2: $sel2=" selected ";break;
			case 3: $sel3=" selected ";break;
		}
		
		switch ($mod[5])
		{
			case ON: $act1=" selected ";break;
			case OFF: $act2=" selected ";break;
		}
		
		switch ($mod[6])
		{
			case 1: $ub1=" selected ";break;
			case 2: $ub2=" selected ";break;
			case 3: $ub3=" selected ";break;
			case 4: $ub4=" selected ";break;
			case 5: $ub5=" selected ";break;
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
	<form class="form-horizontal" role="form">
		<div class="form-body">
			<div class="form-group">
				<label class="col-md-3 control-label">Nombre</label>
				<div class="col-md-6">
					<?php echo '<input name="nombre" id="nombre" type="text" maxlength="50" value="'.$mod[1].'" class="form-control" />'; ?>
				</div>
				<div class="col-md-3"><div id="msgName">&nbsp;</div></div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label">Descripci&oacute;n</label>
				<div class="col-md-6">
					<?php echo '<input name="descripcion" id="descripcion" type="text" maxlength="100" value="'.$mod[8].'" class="form-control" />'; ?>
				</div>
				<div class="col-md-3"><div id="msgDescripcion">&nbsp;</div></div>
			</div>
			<div class="form-group">					
				<label class="col-md-3 control-label">Padre</label>
				<div class="col-md-6">
					<?php echo '<input name="antecesor" id="antecesor" type="text" maxlength="30" value="'.$mod[2].'" readonly class="form-control" />'; ?>
				</div>
				<div class="col-md-3"><div id="msgFather">&nbsp;</div></div>
			</div>
		
			<div class="form-group">		
				<label class="col-md-3 control-label">Permisos</label>
				<div class="col-md-6">
					<?php echo '
						<select name="permisos" id="permisos" class="form-control">
							<option value="1" '.$sel1.'>1</option>
							<option value="2" '.$sel2.'>2</option>
							<option value="3" '.$sel3.'>3</option>
						</select>
						';
					 ?>
				</div>
				<div class="col-md-3"><div id="msgPermissions">&nbsp;</div></div>
			</div>
		
			<div class="form-group">						
				<label class="col-md-3 control-label">Aplicaci&oacute;n</label>
				<div class="col-md-6">
					<?php
						echo "<select name='aplicacion' id = 'aplicacion' class='form-control'>";
						echo "<option value='0'>Asignar Aplicacion</option> ";
						include('../../../MASTER/config/conect.php');
						$sql="	SELECT t1.id, t1.nombre
								FROM applications t1 WHERE t1.estado = 'ON'
							 ";
						$link->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ); 
						$consulta = $link->prepare($sql); 
						$consulta->execute(); 
						while ($row = $consulta->fetch()) 
						{
							if ($mod[4] == $row[0] )
							{
								 echo "<option value='".$row[0]."' selected>".$row[2].' - '.$row[1]."</option>";
							}
							else
							{
								 echo "<option value='".$row[0]."'>".$row[2].' - '.$row[1]."</option>";
							}
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
					<?php echo '
						<select name="activo" id="activo" class="form-control">
							<option value="0">Seleccionar Opci&oacute;n</option>
							<option value="ON" '.$act1.'>ON</option>
							<option value="OFF" '.$act2.'>OFF</option>
						</select>
						';
					?>
				</div>
				<div class="col-md-3"><div id="msgStatus">&nbsp;</div></div>
			</div>
		
			<div class="form-group">
				<label class="col-md-3 control-label">Ubicaci&oacute;n</label>
				<div class="col-md-6">
					<?php echo '
						<select name="ubicacion" id="ubicacion" class="form-control">
							<option value="0">Asignar Ubicaci&oacute;n</option>
							<option value="1" '.$ub1.'>1 - Men&uacute; Principal</option>
							<option value="2" '.$ub2.'>2 - Administrador</option>
							<option value="3" '.$ub3.'>3 - Cuenta de Usuario</option>
							<option value="4" '.$ub4.'>4 - Recursos</option> 
						</select>
						';
					 ?>
				</div>
				<div class="col-md-3"><div id="msgLocation">&nbsp;</div></div>
			</div> 
		
			<div class="form-actions">
				<div class="row">
					<div class="col-md-offset-3 col-md-9">
					  <?php	echo "<a href=\"#\" onclick=\"ventana_principal('11','../APP/APP_ADM_MENU/index.php')\" class=\"btn btn-default\"><span>Volver</span></a>";	?>
					  <?php echo '<input type="button" name="Guardar" id="Guardar" onclick="app_menu_base(6,\'act\','.$mod[0].',\'../APP/APP_ADM_MENU/DB/EDIT_DB.php\',\'principal\')" value="Modificar Men&uacute;" class="btn btn-primary" />'; ?>
					  
					  <input type="hidden" name="idpadre" id="idpadre" value="<?php print $id;  ?>" />
					</div>
				</div>
			</div>
		
			<div class="clearfix"></div>
	
	  </form>
	</div>
</div>						  
					 
<!-- *********************************************** DELETE ***************************************** -->
<?php
	}
	else
	{ 
		include('../../../MASTER/config/conect.php');  
		$sql = "DELETE FROM menu WHERE id = ".$id;  
		
		$link->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ); 
		$consulta = $link->prepare($sql); 
		$consulta->execute(); 
		$link=null;
		$consulta=null;
		
?>
		<div class="portlet light">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-user font-blue-sharp"></i>
					<span class="caption-subject font-blue-sharp bold uppercase">Eliminar Men&uacute;</span>
				</div>
				<div class="tools">
					<a href="javascript:;" class="collapse"> </a> 
				</div>
			</div>
			<div class="portlet-body form">		
				<div class="note note-success">
					<h4 class="block">Datos eliminados con &eacute;xito!</h4>
					<p>Cambios realizados exitosamente.</p>
				</div>
		
				<?php	echo "<a href=\"#\" onclick=\"ventana_principal('11','../APP/APP_ADM_MENU/index.php')\" class=\"btn btn-default\"><span>Volver</span></a>";	?> 
			</div>
		</div>
<?php
	}
			
}
else
{ 	
?>
	<div class="portlet light">
		<div class="portlet-title">
			<div class="caption">
				<i class="fa fa-user font-blue-sharp"></i>
				<span class="caption-subject font-blue-sharp bold uppercase">Eliminar Men&uacute;</span>
			</div>
			<div class="tools">
				<a href="javascript:;" class="collapse"> </a> 
			</div>
		</div>
		<div class="portlet-body form">		
			<div class="note note-success">
				<h4 class="block">Error! Problemas de Comunicaci&oacute;n</h4>
				<p>Los cambios no han sido realizados.</p>
			</div>	
			
			<?php	echo "<a href=\"#\" onclick=\"ventana_principal('11','../APP/APP_ADM_MENU/index.php')\" class=\"btn btn-default\"><span>Volver</span></a>";	?> 
		</div>
	</div>  
<?php				
	exit();
} 
?> 