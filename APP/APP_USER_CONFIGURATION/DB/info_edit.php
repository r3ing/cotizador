<?php include('../../../MASTER/config/verifica_aplicacion.php'); ?>
<div class="portlet light">
    <div class="portlet-body">
        <div class="row">
		<?php 
            if(isset($_POST['id']))
            {
                $id 				= 	$_POST['id'];
                $nombre 			= 	$_POST['nombre'];
                $celular 			= 	$_POST['celular'];
                $email 				= 	$_POST['email'];
                $apellidoPaterno	= 	$_POST['apellidoPaterno'];
                $apellidoMaterno	= 	$_POST['apellidoMaterno'];
                
                
                $sql = "UPDATE users SET forename			=	 '".utf8_decode($nombre)."',
                                        cellphone			= 	 '".utf8_decode($celular)."',								
                                        email				=	 '".utf8_decode($email)."',
                                        paternal			= 	 '".utf8_decode($apellidoPaterno)."',
                                        maternal			= 	 '".utf8_decode($apellidoMaterno)."' ";
                $sql = $sql."WHERE id = ".$id;
                
                include('../../../MASTER/config/conect.php');  
                $link->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ); 
                $consulta = $link->prepare($sql); 
                $consulta->execute(); 
                $link=null;
                $consulta=null;
                
                echo "<div class='etiqueta'>";
                    echo '<div class="alert alert-success">';
                        echo '<button class="close" data-dismiss="alert"></button>';
                        echo 'Cambios realizados exitosamente.';
                    echo '</div>'; //<!-- notification msgsuccess -->
                    echo "<a href=\"#\" onclick=\"ventana_principal('11','../APP/APP_USER_CONFIGURATION/index.php')\" class=\"btn btn-default\"><span>Volver al Men&uacute; Principal</span></a>";
                echo '</div>'; // FIN ETIQUETA   
            }
            else
            {
                echo "<div class='etiqueta'>";
                    echo '<div class="alert alert-error">';
                        echo '<button class="close" data-dismiss="alert"></button>';
                        echo '<p>ERROR: Los cambios no han sido realizados.</p>';
                    echo '</div>'; //<!-- notification msgerror -->
                    
                    echo "<a href=\"#\" onclick=\"ventana_principal('11','../APP/APP_USER_CONFIGURATION/index.php')\" class=\"btn btn-default\"><span>Volver al Men&uacute; Principal</span></a>";
                echo '</div>'; // FIN ETIQUETA 
                exit(); 
            }
        ?>
		</div>
	</div>
</div>