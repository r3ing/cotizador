<?php
include('../../MASTER/config/verifica_aplicacion.php');
//if(isset($vari[0]))
if($vari[0] <> 0)
    {
		$id =   $vari[0];  
			
		include('../../MASTER/config/conect.php');
		$sql="SELECT * FROM users WHERE id = ".$id;
		$link->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ); 
		$consulta = $link->prepare($sql); 
		$consulta->execute(); 
		while ($row = $consulta->fetch()) 
		{        
			$user 				= 	utf8_encode($row[1]);
			$pass				= 	utf8_encode($row[2]); 
			$nombre				=	utf8_encode($row[3]); 
			$apellidoPaterno	= 	utf8_encode($row[4]);
			$apellidoMaterno	= 	utf8_encode($row[5]);
			$celular 			= 	utf8_encode($row[6]); 
			$permisos 			= 	utf8_encode($row[7]); 
			$email 				= 	utf8_encode($row[8]);
			$status 			= 	utf8_encode($row[9]);
			$business 			= 	utf8_encode($row[10]);
			$folder 			=	utf8_encode($row[11]);
			$admin	 			= 	utf8_encode($row[12]);
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
<!-- BEGIN PAGE CONTENT-->
<div class="portlet light">
    <div class="portlet-body">
        <div class="row">
            <div class="col-md-3">
                <ul class="ver-inline-menu tabbable margin-bottom-10">
                    <li class="active">
                        <a data-toggle="tab" href="#tab_1">
                        <i class="fa fa-briefcase"></i> Informaci&oacute;n Personal </a>
                        <span class="after">
                        </span>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#tab_2">
                        <i class="icon-lock"></i> Cambiar Contrase&ntilde;a </a>
                    </li> 
                </ul>
            </div>
            <div class="col-md-9">
                <div class="tab-content">
                    <div id="tab_1" class="tab-pane active">
                        <div id="accordion1" class="panel-group"> 
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#accordion1_7">
                                    Modificar mi Informaci&oacute;n Personal</a>
                                    </h4>
                                </div>
                                <div id="accordion1_7" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                         <form action="#" role="form">
                                        	<div class="form-body"> 
                                                <div class="form-group">
                                                	<label for="exampleInputPassword1">Nombres</label>
                                                	<div class="input-group">
                                                	<?php echo '<input name="nombre" id="nombre" type="text" maxlength="100" value="'.$nombre.'" class="form-control" />'; ?>
                                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                                    </div>
                                                </div> 
                                                <div class="form-group">
                                                	<label for="exampleInputPassword1">Apellido Paterno</label>
                                                    <div class="input-group">
                                                	<?php echo '<input name="apellidoPaterno" id="apellidoPaterno" type="text" maxlength="100" value="'.$apellidoPaterno.'" class="form-control" />'; ?>						
                                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                	<label for="exampleInputPassword1">Apellido Materno</label>
                                                    <div class="input-group">
                                                	<?php echo '<input name="apellidoMaterno" id="apellidoMaterno" type="text" maxlength="100" value="'.$apellidoMaterno.'" class="form-control" />'; ?> 
                                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                	<label for="exampleInputPassword1">Celular</label>
                                                    <div class="input-group">
                                                	<?php echo '<input name="celular" id="celular" type="text" maxlength="20" value="'.$celular.'" class="form-control" />'; ?>
                                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>                                                	 
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                	<label for="exampleInputPassword1">E-mail</label>
                                                    <div class="input-group">
                                                	<?php echo '<input name="email" id="email" type="text" maxlength="50" value="'.$email.'" class="form-control" />'; ?>
                                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                                    </div>
                                                </div>
                                        	</div>
                                            <div class="form-actions">
												<?php echo '<input type="button" name="Guardar" id="Guardar" onclick="app_usuarios(4,'.$id.',\'../APP/APP_USER_CONFIGURATION/DB/INFO_EDIT.php\',\'vista_usuarios\')" value="Modificar Usuario" class="btn green" />'; ?>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="tab_2" class="tab-pane">
                        <div id="accordion2" class="panel-group">
                            <div class="panel panel-warning">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#accordion2_1">
                                    Cambiar mi contrase&ntilde;a </a>
                                    </h4>
                                </div>
                                <div id="accordion2_1" class="panel-collapse collapse in">
                                    <div class="panel-body"> 
                                        <form action="#" role="form">
                                        	<div class="form-body">
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Contrase&ntilde;a Actual</label>
                                                    <div class="input-group">
                                                    <input type="password" class="form-control" value="<?php echo $pass; ?>" name="old_pass" id="old_pass" />
                                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                                    </div>
                                                </div> 
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Nueva Contrase&ntilde;a</label>
                                                    <div class="input-group">
                                                    <input type="password" class="form-control" name="password" id="password" />
                                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Confirmar Nueva Contrase&ntilde;a</label>
                                                    <div class="input-group">
                                                    <input type="password" class="form-control" name="cpassword" id="cpassword" />
                                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-actions">
                                                <?php echo '<input type="button" name="Guardar" id="Guardar" onclick="app_usuarios(6,'.$id.',\'../APP/APP_USER_CONFIGURATION/DB/PASS_EDIT.php\',\'vista_usuarios\')" value="Cambiar Password" class="btn green" />'; ?>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END PAGE CONTENT-->