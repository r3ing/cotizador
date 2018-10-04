<?php
include('../../../master/include/verifyAPP.php');
if(isset($_POST['id']))
{
    $id =   $_POST['id'];

    include('../../../master/config/conect.php');
	$SQL="SELECT * FROM CATEGORY WHERE id = ".$id;
	$link->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	$RES = $link->prepare($SQL);
	$RES->execute();
	foreach($RES as $k => $row) 
	{       
        $nombre				=	$row[1];
		$estado				= 	utf8_encode($row[2]);
    }
	$link = null;
	$RES = null;
}
else
{
   echo "no entra a DB";
   exit;
}

?>
<div class="portlet light">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa fa-pencil font-blue-sharp"></i>
			<span class="caption-subject font-blue-sharp bold uppercase">MODIFICAR</span>
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
					<div class="col-md-6">
						<input name="nombre" id="nombre" type="text" maxlength="50" class="form-control" value="<?php echo $nombre; ?>">
					</div>
					<div class="col-md-3"><div id="msgNombre">&nbsp;</div></div>
				</div> 
				<div class="form-group">
					<label class="col-md-3 control-label">Estado</label>
					<div class="col-md-6">
						<select name="estado" id="estado" class="form-control">
							<option value="1" <?php if ($estado == 1) {	echo 'selected="selected"'; } ?>>ON</option>
							<option value="2" <?php if ($estado == 2){	echo 'selected="selected"'; } ?>>OFF</option>
						</select> 
					</div>
					<div class="col-md-3"><div id="msgEstado">&nbsp;</div></div>
				</div>  
			</div>
			<div class="form-actions">
				<div class="row">
					<div class="col-md-offset-3 col-md-9">
						<?php	echo "<a href=\"#\" onclick=\"ventana_principal('11','../APP/APP_ADM_CATEGORY/index.php')\" class=\"btn btn-default\"><span>Volver</span></a>";	?>
						<?php echo '<input type="button" name="Guardar" id="Guardar" onclick="app_categorias(4,'.$id.',\'../APP/APP_ADM_CATEGORY/DB/EDIT_DB.php\',\'vista_categorias\')" value="Modificar"  class="btn btn-primary" />'; ?>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
 	    
						
 