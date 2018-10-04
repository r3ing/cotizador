<?php
include('../../../MASTER/include/verifyAPP.php');
if(isset($_POST['id']))
    {
  
    $id =   $_POST['id'];  
        
    include('../../../MASTER/config/conect.php');
    $sql="SELECT t1.*, t2.business AS name_emp FROM applications t1 INNER JOIN business t2 ON t2.id = t1.business WHERE t1.id = ".$id;
    $link->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ); 
    $consulta = $link->prepare($sql); 
    $consulta->execute(); 
    while ($row = $consulta->fetch()) 
    {
        
        $nombre 	= $row[1];
        $ruta 		= $row[2];
        $estado		= $row[3];
		$tipo		= $row[4];
		$business 	= $row[5];
		$nom_emp 	= $row[6];     
    }
    $consulta=null;
    $link = null;
    
    switch($estado)
    {
        case "ON": $est[1]=" selected ";break;
        case "OFF": $est[2]=" selected ";break;
    }
	
	switch($tipo)
    {
        case "ADM": 	$type[1]=	" selected ";break;
        case "USER": 	$type[2]=	" selected ";break;
		case "ALL":	 	$type[3]=	" selected ";break;
    }    
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
			<i class="fa fa-user font-blue-sharp"></i>
			<span class="caption-subject font-blue-sharp bold uppercase">MODIFICAR APLICACI&Oacute;N</span>
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
					<?php echo '<input name="nombre" id="nombre" type="text" maxlength="100" class="form-control" value="'.utf8_encode($nombre).'" />'; ?>
				</div>
				<div class="col-md-3"><div id="msgNombre">&nbsp;</div></div>
			</div>
			
			<div class="form-group"> 
				<label class="col-md-3 control-label">Ruta</label>
				<div class="col-md-6">
					<?php echo '<input name="ruta" id="ruta" type="text" maxlength="100" class="form-control" value="'.$ruta.'" />'; ?>
				</div>
				<div class="col-md-3"><div id="msgRuta">&nbsp;</div></div>
			</div> 
		 
			<div class="form-group"> 					
				<label class="col-md-3 control-label">Estado</label>
				<div class="col-md-6">
					<?php echo '
						<select name="estado" id="estado" class="form-control">
							<option value="0">Seleccionar Opci&oacute;n</option>
							<option value="ON" '.$est[1].'>ON</option>
							<option value="OFF" '.$est[2].'>OFF</option>
						</select>
						';
					?>
				</div>
				<div class="col-md-3"><div id="msgEstado">&nbsp;</div></div>
			</div> 
		
			<div class="form-group"> 				
				<label class="col-md-3 control-label">Tipo</label>
				<div class="col-md-6">
					<?php echo '
						<select name="tipo" id="tipo" class="form-control">
							<option value="0">Seleccionar Opci&oacute;n</option>
							<option value="ADM"  '.$type[1].'>	ADM	 </option>
							<option value="USER" '.$type[2].'>	USER </option>
						</select>
						';
					?>
				</div>
				<div class="col-md-3"><div id="msgTipo">&nbsp;</div></div>
			</div> 
			<div class="form-group"> 				
				<label class="col-md-3 control-label">Empresa</label>
				<div class="col-md-6">
					<?php
						echo "<select name='business' id='business' class='form-control'>"; 
						echo "<option value='".$business."'>".utf8_encode($nom_emp)."</option>";
						echo "<option value='0'>-------------------</option>";
						include('../../../MASTER/config/conect.php');
						$sql="SELECT * FROM business WHERE status = 'ON' ORDER BY business";
						$link->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ); 
						$consulta = $link->prepare($sql); 
						$consulta->execute(); 
						while ($row = $consulta->fetch()) 
						{
							echo "<option value='".$row[0]."'>".utf8_encode($row[1])."</option>";
						}
						$consulta=null;
						$link = null;
						echo "</select>";
					?>
				</div> 
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