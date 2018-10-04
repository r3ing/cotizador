<?php
    include('../../MASTER/include/verifyAPP.php'); 
	
	$ID_US	= $vari[0]; 
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
<body style="width:98%; background: transparent;">
<script type="text/javascript">
	var nuevoalias = jQuery.noConflict();
	nuevoalias(document).ready(function() {
	   // alert("Si salgo es que no hay conflicto!!!");
	});
</script> 
<!-- BEGIN PAGE CONTENT-->
<div class="row">
    <div class="col-md-12 ">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-settings font-dark"></i>
                    <span class="caption-subject font-dark sbold uppercase">Agregar Nuevo Proyecto</span>
                </div>
            </div>
            <div class="portlet-body">
                <?php
                if(isset($_POST['Guardar']))
                {
                    $id			        = $_POST['id_proyecto'];
                    $nombre_proyecto	= $_POST['nombre_proyecto'];
                    $descripcion    	= $_POST['editor1'];
                    $fecha_inicio		= date("Y-m-d", strtotime($_POST['datepicker']));
                    $fecha_termino		= date("Y-m-d", strtotime($_POST['datepicker2']));
                    $costo_proyecto     = $_POST['costo_proyecto'];
                    $gasto_proyecto  	= $_POST['gasto_proyecto'];
                    $porcentaje_avance 	= $_POST['porcentaje_avance'];
                    $nombre_responsable = $_POST['nombre_responsable'];
                    $rut_responsable    = $_POST['rut_responsable'];
                    $createUser 		= $ID_US;
                    $createDate			= 'NOW()';


                    include('../../MASTER/config/conect.php');
                    $SQL =  "INSERT INTO proyectos(id
                                                      , nombre_proyecto
                                                      , descripcion
                                                      , fecha_inicio
                                                      , fecha_termino
                                                      , costo
                                                      , gasto
                                                      , avance
                                                      , nombre_reponsable
                                                      , rut_responsable)";
                    $SQL = $SQL."VALUES ('".$id."'
											 , '".$nombre_proyecto."'
											 , '".$descripcion."'
											 , '".$fecha_inicio."'
											 , '".$fecha_termino."'
											 , '".$costo_proyecto."'
											 , '".$gasto_proyecto."'
											 , '".$porcentaje_avance."'
											 , '".$nombre_responsable."'
											 , '".$rut_responsable."' 
											 )";
                    $link->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
                    $CONS = $link->prepare($SQL);
                    $CONS->execute();

                    $id_proyecto                =   $_POST['id_proyecto'];
                    $id_actividad               =   $_POST['id_actividad'];
                    $codigo_actividad           =   $_POST['codigo_actividad'];
                    $nombre_actividad           =   $_POST['nombre_actividad'];
                    $fecha_inicio_actividad     =   $_POST['fecha_inicio_actividad'];
                    $fecha_termino_actividad    =   $_POST['fecha_termino_actividad'];
                    $costo_actividad            =   $_POST['costo_actividad'];
                    $gasto_actividad            =   $_POST['gasto_actividad'];
                    $usuario_responsable        =   $_POST['usuario_responsable'];
                    $avance_actividad           =   $_POST['avance_actividad'];

                    //recorremos y vamos insertando los datos en la tabla mysql
                    for ($i = 0; $i < count($id_actividad); $i++) {
                        $SQL_LIST = "INSERT INTO proyectos_actividad ( id_proyecto 
                                                                           , id_actividad 
                                                                           , codigo
                                                                           , nombre
                                                                           , fecha_inicio
                                                                           , fecha_termino
                                                                           , costo
                                                                           , gasto
                                                                           , usuario_responsable 
                                                                           , avance
                                                                           )
                             VALUES( '".$id_proyecto."' 
                                    , '".$id_actividad[$i]."' 
                                    , '".$codigo_actividad[$i]."' 
                                    , '".$nombre_actividad[$i]."' 
                                    , '".$fecha_inicio_actividad[$i]."' 
                                    , '".$fecha_termino_actividad[$i]."' 
                                    , '".$costo_actividad[$i]."' 
                                    , '".$gasto_actividad[$i]."' 
                                    , '".$usuario_responsable[$i]."' 
                                    , '".$avance_actividad[$i]."')";
                        $link->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
                        $CONS_LIST = $link->prepare($SQL_LIST);
                        $CONS_LIST->execute();

                        // echo $SQL_LIST;
                    }

                    echo '<div class="note note-success">';
                    echo '<h4 class="block">Datos ingresados con &eacute;xito!</h4>';
                    echo '<p>';
                    echo 'Registro ingresado exitosamente.';
                    echo '</p>';
                    echo '</div>';

                    echo '<a onclick="window.history.go(-2)" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Volver</a> ';
                }
                else
                {
                    echo '<div class="note note-danger">';
                    echo '<h4 class="block">Error! Problemas de Comunicaci&oacute;n</h4>';
                    echo '<p>';
                    echo 'El registro no ha podido ser ingresado.';
                    echo '</p>';
                    echo '</div>';
                    echo '<a onclick="window.history.go(-2)" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Volver</a> ';
                    exit();
                }
                ?>
            </div>
        </div>
        <!-- END SAMPLE FORM PORTLET-->
    </div>
<?php 
	include ("../FOOTER.php");
?>   
</body> 
</html>  