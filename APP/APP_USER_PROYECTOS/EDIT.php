<?php
include('../../MASTER/include/verifyAPP.php');
if(isset($_POST['id']))
{
  
    $id =   $_POST['id'];  
    
	include('../../MASTER/config/conect.php');
    $SQL="SELECT * FROM tiendas WHERE id = ".$id;
    $link->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ); 
	$consulta = $link->prepare($SQL); 
	$consulta->execute(); 
	while ($row = $consulta->fetch())  
	{
		$id 				= 	$row[0]; 
		$cod_tienda			=	$row[1];        
        $nombre_tienda		=	$row[2]; 
		$zona_tienda		=	$row[3]; 
		$cluster_tienda		=	$row[4]; 
		$jefe_tienda		= 	$row[5];
		$anexo_jefe			= 	$row[6];
		$mail_jefe			= 	$row[7];
		$estado				=	$row[8];  
    } 
}
else
{
	echo "no entra a DB";
	exit;
}
?> 
<!DOCTYPE html> 
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<meta http-equiv="content-type" content="text/html;charset=UTF-8" /> 
<head>  
<?php 
	include ("../HEAD.php");
?>  
</head>
<!-- END HEAD -->
<!-- BEGIN BODY --> 
<body style="width:98%">  
<script type="text/javascript">
	var nuevoalias = jQuery.noConflict();
	nuevoalias(document).ready(function() {
	   // alert("Si salgo es que no hay conflicto!!!");
	});
</script> 
<!-- BEGIN PAGE CONTENT-->
<div class="row">
	<div class="col-md-12">
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
				<form class="form-horizontal" role="form" action="EDIT_DB.php" method="post">
					<div class="form-body">  
						<div class="form-group">
							<label class="col-md-3 control-label">C&oacute;digo</label>
							<div class="col-md-6">
								<input type="input" class="form-control" value="<?php echo $cod_tienda; ?>" name="cod_tienda" id="cod_tienda"></input>
							</div>
							<div class="col-md-3">&nbsp;</div>
						</div> 
						<div class="form-group">
							<label class="col-md-3 control-label">Nombre</label>
							<div class="col-md-6">
								<input type="input" class="form-control" value="<?php echo $nombre_tienda; ?>" name="nombre_tienda" id="nombre_tienda"></input>
							</div>
							<div class="col-md-3">&nbsp;</div>
						</div>
                        <div class="form-group">
							<label class="col-md-3 control-label">Zona</label>
							<div class="col-md-6">
                            	<select name="zona_tienda" class="form-control" required>   
                                	<option value="">-- Seleccionar Opci&oacute;n --</option>
									<?php  
                                        include('../../MASTER/config/conect.php');
                                        $sql="SELECT * FROM zonas";
                                        $link->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ); 
                                        $consulta = $link->prepare($sql); 
                                        $consulta->execute(); 
                                        while ($row = $consulta->fetch()) 
                                        {
									?>
                                    		<option value='<?php echo $row[0]; ?>' <?php if ($row[0] == $zona_tienda) echo 'selected="selected"' ?>><?php echo $row[1]; ?></option>
                                    <?php     
                                        }
                                        $consulta=null;
                                        $link = null; 
                                    ?>
                                </select>
							</div>
							<div class="col-md-3">&nbsp;</div>
						</div>      
                        <div class="form-group">
							<label class="col-md-3 control-label">Cluster</label>
							<div class="col-md-6">
								<input type="input" class="form-control" value="<?php echo $cluster_tienda; ?>" name="cluster_tienda" id="cluster_tienda"></input>
							</div>
							<div class="col-md-3">&nbsp;</div>
						</div>
                        <div class="form-group">
							<label class="col-md-3 control-label">Jefe Tienda</label>
							<div class="col-md-6">
								<input type="input" class="form-control" value="<?php echo $jefe_tienda; ?>" name="jefe_tienda" id="jefe_tienda" autocomplete="off"></input>
							</div>
							<div class="col-md-3">&nbsp;</div>
						</div>
                        <div class="form-group">
							<label class="col-md-3 control-label">Anexo</label>
							<div class="col-md-6">
								<input type="input" class="form-control" value="<?php echo $anexo_jefe; ?>" name="anexo_jefe" id="anexo_jefe" autocomplete="off"></input>
							</div>
							<div class="col-md-3">&nbsp;</div>
						</div>
                        <div class="form-group">
							<label class="col-md-3 control-label">E-Mail</label>
							<div class="col-md-6">
								<input type="input" class="form-control" value="<?php echo $mail_jefe; ?>" name="mail_jefe" id="mail_jefe" autocomplete="off"></input>
							</div>
							<div class="col-md-3">&nbsp;</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Estado</label>
							<div class="col-md-6">
                            	<select name="estado" class="form-control" required> 
                                	<option value="">-- Seleccionar Opci&oacute;n --</option>
                                	<option value="1" <?php if($estado == 1) echo 'selected="selected;"'; ?>>Activo</option>
                                    <option value="0" <?php if($estado == 0) echo 'selected="selected;"'; ?>>Inactivo</option>
                                </select> 
							</div>
							<div class="col-md-3">&nbsp;</div>
						</div>      
					</div>
					<div class="form-actions">
						<div class="row">
							<div class="col-md-offset-3 col-md-9">	
								<input type="hidden" name="id" id="id" value="<?php echo $id; ?>" />					
								<button type="submit" name="Guardar" class="btn green" value="Guardar"><i class="fa fa-save"></i> Guardar</button>
								<button type="reset" class="btn default"><i class="fa fa-refresh"></i> Limpiar</button>
								<a href="javascript:history.back(1)" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Volver</a> 
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php 
	include ("../FOOTER.php");
?>   
</body> 
</html>  