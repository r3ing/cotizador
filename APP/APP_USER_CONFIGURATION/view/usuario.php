<?php
include('../../../MASTER/include/verifyAPP.php');
//if(isset($vari[0]))
echo $vari[0];
if($vari[0] <> 0)
{
	$id =   $vari[0];  	
	include('../../../MASTER/config/conect.php');
	$sql="SELECT * FROM users WHERE id = ".$id;
	$link->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ); 
	$consulta = $link->prepare($sql); 
	$consulta->execute(); 
	
	while ($row = $consulta->fetch()) 
	{        
		$nombre				=	utf8_encode($row[1]);
		$fechaNacimiento	= 	utf8_encode($row[2]);
		$user 				= 	utf8_encode($row[3]);
		$pass				= 	utf8_encode($row[4]);
		$area 				= 	utf8_encode($row[5]);
		$sucursal			= 	utf8_encode($row[6]);
		$ubicacion 			= 	utf8_encode($row[7]);
		$cargo 				= 	utf8_encode($row[8]);
		$anexo 				= 	utf8_encode($row[9]);
		$celular 			= 	utf8_encode($row[10]);
	}
	$consulta=null;
	$link = null; 
}
else
{
	echo "no entra a DB";
	exit;
}    
?>
<?php echo $nombre; ?>
<!--tab_1_2-->
<div class="tab-pane row-fluid profile-account" id="tab_1_3">
	<div class="row-fluid">
		<div class="span12">
			<div class="span3">
				<ul class="ver-inline-menu tabbable margin-bottom-10">
					<li class="active">
						<a data-toggle="tab" href="#tab_1-1">
						<i class="icon-cog"></i> 
						Informaci&oacute;n Personal
						</a> 
						<span class="after"></span>                           			
					</li>
					<li class=""><a data-toggle="tab" href="#tab_2-2"><i class="icon-lock"></i> Cambiar Contrase&ntilde;a</a></li>
				</ul>
			</div>
			<div class="span9">
				<div class="tab-content">
					<div id="tab_1-1" class="tab-pane active">
						<div style="height: auto;" id="accordion1-1" class="accordion collapse">
							<form action="#">
								<label class="control-label">Nombres</label>
								<?php echo '<input name="nombre" id="nombre" type="text" maxlength="100" value="'.$nombre.'" class="m-wrap span8" />'; ?>
								<label class="control-label">Apellido Paterno</label>
								<?php echo '<input name="apellidoPaterno" id="apellidoPaterno" type="text" maxlength="100" value="'.$apellidoPaterno.'" class="m-wrap span8" />'; ?>
								<label class="control-label">Apellido Materno</label>
								<?php echo '<input name="apellidoMaterno" id="apellidoMaterno" type="text" maxlength="100" value="'.$apellidoMaterno.'" class="m-wrap span8" />'; ?>
								<label class="control-label">Fecha Nacimiento</label>
								<?php echo '<input name="fechaNacimiento" id="fechaNacimiento" type="text" maxlength="20" value="'.$fechaNacimiento.'" class="m-wrap span8" />'; ?>
								<span class="help-inline">DD-MM-AAAA</span>
								<label class="control-label">Sexo</label>
								<?php echo '<select name="sexo" id="sexo" class="m-wrap span8"><option value="M" '.$sex[1].'>Masculino</option><option value="F" '.$sex[2].'>Femenino</option></select>'; ?>
								<label class="control-label">Nacionalidad</label>
								<?php echo '<input name="nacionalidad" id="nacionalidad" type="text" maxlength="20" value="'.$nacionalidad.'" class="m-wrap span8" />'; ?> 
								<label class="control-label">Ubicaci&oacute;n</label>
								<?php echo '<input name="ubicacion" id="ubicacion" type="text" maxlength="100" value="'.$ubicacion.'" class="m-wrap span8" />'; ?>
								<label class="control-label">Anexo</label>
								<?php echo '<input name="anexo" id="anexo" type="text" maxlength="20" value="'.$anexo.'" class="m-wrap span8" />'; ?>
								<span class="help-inline">2 270 XXXX</span>
								<label class="control-label">Celular</label>
								<?php echo '<input name="celular" id="celular" type="text" maxlength="20" value="'.$celular.'" class="m-wrap span8" />'; ?>
								<span class="help-inline">0000 0000</span>
								<label class="control-label">E-mail</label>
								<?php echo '<input name="email" id="email" type="text" maxlength="50" value="'.$email.'" class="m-wrap span8" />'; ?>
								<div class="submit-btn">
									<?php echo '<input type="button" name="Guardar" id="Guardar" onclick="app_usuarios(4,'.$id.',\'../app/app_user_configuracion/DB/info_edit.php\',\'vista_usuarios\')" value="Modificar Usuario" class="btn green" />'; ?>
								</div>
							</form>
						</div>
					</div>
					<div id="tab_2-2" class="tab-pane">
						<div style="height: auto;" id="accordion3-3" class="accordion collapse">
							<form action="#">
								<label class="control-label">Contrase&ntilde;a Actual</label>
								<input type="password" class="m-wrap span8" value="<?php echo $pass; ?>" name="old_pass" id="old_pass" />
								<label class="control-label">Nueva Contrase&ntilde;a</label>
								<input type="password" class="m-wrap span8" name="password" id="password" />
								<label class="control-label">Confirmar Nueva Contrase&ntilde;a</label>
								<input type="password" class="m-wrap span8" name="cpassword" id="cpassword" />
								<div class="submit-btn">
									<?php echo '<input type="button" name="Guardar" id="Guardar" onclick="app_usuarios(6,'.$id.',\'../app/app_user_configuracion/DB/pass_edit.php\',\'vista_usuarios\')" value="Cambiar Password" class="btn green" />'; ?>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!--end span9-->                                   
		</div>
	</div>
</div>
<!--end tab-pane-->