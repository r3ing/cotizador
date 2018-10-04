<?php
//var_dump($_POST);
//exit;

include('../../../MASTER/include/verifyAPP.php');
 
if(isset($_POST['id']))
{  
    $id =   $_POST['id'];  
    
	include('../../../MASTER/config/conect.php');
    $SQL="SELECT T1.*, T2.nombre FROM APPLICATIONS T1  
		  INNER JOIN CATEGORY T2 ON T2.id = T1.category
		  WHERE T1.id = ".$id;
	$link->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $RES = $link->prepare($SQL);
	$RES->execute();
    while($row = $RES->fetch())
    { 
        $nombre 		= $row[1];
        $ruta 			= $row[2];
        $estado			= $row[3];
		$tipo			= $row[4]; 
		$category 		= $row[5];
		$nom_category 	= $row[6];
    }
	$consulta=null;
	$link = null;
}
else
{
    echo "no se conecto a la DB";
}   
?>
<!-- Formulario -->
<!-- BEGIN SAMPLE TABLE PORTLET-->
<div class="portlet light">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa fa-pencil font-blue-sharp"></i>
			<span class="caption-subject font-blue-sharp bold uppercase">MODIFICAR</span>
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
				<div class="col-md-6">
					<?php echo '<input name="nombre" id="nombre" type="text" maxlength="100" onkeyup="createRoute();" class="form-control" value="'.$nombre.'" />'; ?>
				</div>
				<div class="col-md-3"><div id="msgNombre">&nbsp;</div></div>
			</div>
			
			<div class="form-group"> 
				<label class="col-md-3 control-label">Ruta</label>
				<div class="col-md-6">
					<?php echo '<input name="ruta" id="ruta" type="text" readonly maxlength="100" class="form-control" value="'.$ruta.'" />'; ?>
				</div>
				<div class="col-md-3"><div id="msgRuta">&nbsp;</div></div>
			</div> 
		 
			<div class="form-group"> 					
				<label class="col-md-3 control-label">Estado</label>
				<div class="col-md-6"> 
					<select name="estado" id="estado" class="form-control">
						<option value="ON"	<?php if ($estado == 'ON')	{	echo 'selected="selected"'; 	} ?>>ON</option>
						<option value="OFF" <?php if ($estado == 'OFF')	{	echo 'selected="selected"'; 	} ?>>OFF</option> 
					</select> 
				</div>
				<div class="col-md-3"><div id="msgEstado">&nbsp;</div></div>
			</div> 
		
			<div class="form-group"> 				
				<label class="col-md-3 control-label">Tipo</label>
				<div class="col-md-6"> 
					<select name="tipo" id="tipo" class="form-control" onchange="createRoute();">
						<option value="ADM"  <?php if ($tipo == 'ADM')	 {	echo 'selected="selected"'; 	} ?>>	ADM	 </option>
						<option value="USER" <?php if ($tipo == 'USER')	 {	echo 'selected="selected"'; 	} ?>>	USER </option>
						<option value="ALL"  <?php if ($tipo == 'ALL')	 {	echo 'selected="selected"'; 	} ?>>	ALL	 </option>
					</select> 
				</div>
				<div class="col-md-3"><div id="msgTipo">&nbsp;</div></div>
			</div>
			
			<div class="form-group"> 				
				<label class="col-md-3 control-label">Categor&iacute;a</label>
				<div class="col-md-6"> 
					<?php
						echo "<select name='category' id='category' class='form-control'>"; 
						echo "<option value='".$category."'>".$nom_category."</option>";

    					include('../../../MASTER/config/conect.php');
						$SQL="SELECT * FROM CATEGORY WHERE estado = 1 ORDER BY nombre";
						$link->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
						$RES = $link->prepare($SQL);
						$RES->execute();
						while($row = $RES->fetch())
						{  
							echo "<option value='".$row[0]."'>".$row[1]."</option>";
						} 
						$link = null;
						$RES = null;
						echo "</select>";
					?>
				</div>
				<div class="col-md-3"><div id="msgTipo">&nbsp;</div></div>
			</div> 
		</div>
		<div class="form-actions">
			<div class="row">
				<div class="col-md-offset-3 col-md-9">			
					<?php	echo "<a href=\"#\" onclick=\"ventana_principal('11','../APP/APP_ADM_APPLICATIONS/index.php')\" class=\"btn btn-default\"><span>Volver</span></a>";	?>
					
					<?php echo '<input type="button" name="Guardar" id="Guardar" onclick="app_aplicaciones(4,'.$id.',\'\',\'../APP/APP_ADM_APPLICATIONS/DB/EDIT_DB.php\',\'vista_aplicaciones\')" value="Modificar Aplicaci&oacute;n" class="btn btn-primary" />'; ?>
				</div>
			</div>
		</div>
		
		<div class="clearfix"></div>
		
		</form>
				 
	</div>
</div> 