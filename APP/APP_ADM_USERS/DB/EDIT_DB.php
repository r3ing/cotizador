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
	<div class="portlet-body">	
			<?php
				if(isset($_POST['id']))
				{        
					$id 				= 	$_POST['id'];
					$user	 			= 	$_POST['user'];
					$pass	 			= 	'000';//$_POST['pass'];
					$forename 			= 	$_POST['forename'];
					$paternal			= 	$_POST['paternal'];
					$maternal 			= 	$_POST['maternal'];
					$cellphone			= 	$_POST['cellphone'];
					$permits			= 	$_POST['permits'];
					$email				= 	$_POST['email'];
					$status				=   $_POST['status'];
					$sucrsal            =    $_POST['sucursal'];
					
					$sql = "UPDATE users SET 	user			=	'".trim($user)."',
												pass 			=	'".utf8_decode($pass)."',
												forename		= 	'".trim($forename)."',
												paternal		= 	'".trim($paternal)."',
												maternal		=	'".trim($maternal)."',
												cellphone		=	'".$cellphone."',
												permits			=	'".utf8_decode($permits)."',
												email			= 	'".utf8_decode($email)."',
												status			= 	'".utf8_decode($status)."',
												cod_sucursal    =   '".utf8_decode($sucrsal)."' ";
					$sql = $sql."WHERE id = ".$id;
					
					include('../../../MASTER/config/conect.php');  
					$link->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ); 
					$consulta = $link->prepare($sql); 
					$consulta->execute(); 
					$link=null;
					$consulta=null;
					
					echo '<div class="note note-success">';
						echo '<h4 class="block">Datos modificados con &eacute;xito!</h4>';
						echo '<p>';
							 echo 'Registro modificado exitosamente.';
						echo '</p>';
					echo '</div>'; 
					
					echo "<a href=\"#\" onclick=\"ventana_principal('11','../APP/APP_ADM_USERS/index.php')\" class=\"btn default\">
							<span>Volver</span>
						  </a>";
				}
				else
				{
					echo '<div class="note note-danger">';
						echo '<h4 class="block">Error! Problemas de Comunicaci&oacute;n</h4>';
						echo '<p>';
							echo 'El registro no ha podido ser modificado.';
						echo '</p>';
					echo '</div>';
					echo "<a href=\"#\" onclick=\"ventana_principal('11','../APP/APP_ADM_USERS/index.php')\" class=\"btn default\">
							<span>Volver</span>
						  </a>";
					exit();
				}
			?>
		</div>
</div> 