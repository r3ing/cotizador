<?php
include('../../../MASTER/include/verifyAPP.php');
if(isset($_POST['id']))
    {
  
    $id =   $_POST['id'];  
        
    include('../../../MASTER/config/conect.php');
    $sql="SELECT * FROM business WHERE id = ".$id;
    $link->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ); 
    $consulta = $link->prepare($sql); 
    $consulta->execute(); 
    while ($row = $consulta->fetch()) 
    {
        
        $business 	= $row[1];
        $website	= $row[2];
        $status		= $row[3]; 
     
    }
    $consulta=null;
    $link = null;
    
    switch($status)
    {
        case "ON": $est[1]=" selected ";break;
        case "OFF": $est[2]=" selected ";break;
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
			<span class="caption-subject font-blue-sharp bold uppercase">MODIFICAR EMPRESA</span>
		</div>
		<div class="tools">
			<a href="javascript:;" class="collapse"></a> 
		</div>
	</div>
	<div class="portlet-body form">	
				  
		<form class="form-horizontal" role="form">
		<div class="form-body">
			<div class="form-group"> 
				<label class="col-md-3 control-label">Nombre Empresa</label>
				<div class="col-md-6">
					<?php echo '<input name="business" id="business" type="text" maxlength="100" class="form-control" value="'.utf8_encode($business).'" />'; ?>
				</div>
				<div class="col-md-3"><div id="msgBusiness">&nbsp;</div></div>
			</div>
			
			<div class="form-group"> 
				<label class="col-md-3 control-label">Website</label>
				<div class="col-md-6">
					<?php echo '<input name="website" id="website" type="text" maxlength="100" class="form-control" value="'.$website.'" />'; ?>
				</div>
				<div class="col-md-3"><div id="msgWebsite">&nbsp;</div></div>
			</div> 
		 
			<div class="form-group"> 					
				<label class="col-md-3 control-label">Estado</label>
				<div class="col-md-6">
					<?php echo '
						<select name="status" id="status" class="form-control">
							<option value="0">Seleccionar Opci&oacute;n</option>
							<option value="ON" '.$est[1].'>ON</option>
							<option value="OFF" '.$est[2].'>OFF</option>
						</select>
						';
					?>
				</div>
				<div class="col-md-3"><div id="msgStatus">&nbsp;</div></div>
			</div>  
		</div>
		<div class="form-actions">
			<div class="row">
				<div class="col-md-offset-3 col-md-9">			
					<?php	echo "<a href=\"#\" onclick=\"ventana_principal('11','../APP/APP_ADM_BUSINESS/index.php')\" class=\"btn btn-default\"><span>Volver</span></a>";	?> 
					<input type="button" name="Guardar" id="Guardar" onclick="app_business(4,<?php echo $id; ?>,'','../APP/APP_ADM_BUSINESS/DB/EDIT_DB.php','vista_business')" value="Modificar Empresa" class='btn btn-primary'/> 

				</div>
			</div>
		</div>
		
		<div class="clearfix"></div>
		
		</form>
				 
	</div>
</div> 