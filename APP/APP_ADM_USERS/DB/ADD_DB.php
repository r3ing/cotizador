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
			if(isset($_POST['user']))
			{   
				$user	 			=	 $_POST['user'];
				$pass	 			=	 $_POST['pass'];
				$forename 			=	 $_POST['forename'];
				$paternal			= 	 $_POST['paternal'];
				$maternal			= 	 $_POST['maternal'];
				$cellphone			= 	 $_POST['cellphone'];
				$permits			=	 $_POST['permits'];
				$email				=	 $_POST['email'];
				$status				=	 $_POST['status'];
				
				include('../../../MASTER/config/conect.php');  
				$sql =  "INSERT INTO users(user,
										  pass,
										  forename,
										  paternal,
										  maternal,
										  cellphone,
										  permits,
										  email,
										  status
										 )";
				$sql = $sql."VALUES ('".utf8_decode($user)."',
									 '".utf8_decode($pass)."',
									 '".trim($forename)."',
									 '".trim($paternal)."',
									 '".trim($maternal)."',
									 '".$cellphone."',
									 '".utf8_decode($permits)."',
									 '".utf8_decode($email)."',
									 '".utf8_decode($status)."'
									 )";
				$link->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ); 
				$consulta = $link->prepare($sql); 
				$consulta->execute(); 
				$link=null;
				$consulta=null;
				
				echo '<div class="note note-success">';
					echo '<h4 class="block">Datos ingresados con &eacute;xito!</h4>';
					echo '<p>';
						 echo 'Registro ingresado exitosamente.';
					echo '</p>';
				echo '</div>'; 
				
				echo "<a href=\"#\" onclick=\"ventana_principal('11','../APP/APP_ADM_USERS/index.php')\" class=\"btn default\">
						<span>Volver a Usuarios</span>
					  </a>";
			}
			else
			{
				echo '<div class="note note-danger">';
					echo '<h4 class="block">Error! Problemas de Comunicaci&oacute;n</h4>';
					echo '<p>';
						echo 'El registro no ha podido ser ingresado.';
					echo '</p>';
				echo '</div>';
				echo "<a href=\"#\" onclick=\"ventana_principal('11','../APP/APP_ADM_USERS/index.php')\" class=\"btn default\">
						<span>Volver a Usuarios</span>
					  </a>";
				exit();
			}
		?> 
	</div>
</div> 