<?php
include('../../MASTER/include/verifyAPP.php');
if(isset($_POST['id']))
{
  
    $id =   $_POST['id'];  
    
	include('../../MASTER/config/conect.php');
    $SQL="SELECT * FROM proyectos WHERE id = ".$id;
    $link->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ); 
	$consulta = $link->prepare($SQL); 
	$consulta->execute(); 
	while ($row = $consulta->fetch())  
	{
		$id_proyecto 		= 	$row[0];
		$nombre_proyecto	=	$row[1];
        $descripcion		=	$row[2];
		$fecha_inicio		=	$row[3];
        $fecha_termino		=	$row[4];
		$costo		        = 	$row[5];
		$gasto  			= 	$row[6];
		$avance			    = 	$row[7];
		$nombre_reponsable	=	$row[8];
		$rut_reponsable	    =	$row[9];
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
<body style="width:98%; background: transparent;">
<script type="text/javascript">
	var nuevoalias = jQuery.noConflict();
	nuevoalias(document).ready(function() {
	   // alert("Si salgo es que no hay conflicto!!!");
	});
</script> 
<!-- BEGIN PAGE CONTENT-->
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PROFILE SIDEBAR -->

        <!-- PORTLET MAIN -->
        <div class="portlet light profile-sidebar-portlet ">
            <!-- SIDEBAR USER TITLE -->
            <div class="profile-usertitle">
                <a href="javascript:;" class="btn btn-outline sbold blue" id="blockui_sample_2_1" style="font-size: 50px;"> <?php echo $nombre_proyecto; ?> </a>
            </div>
            <!-- END SIDEBAR USER TITLE -->
            <br>
            <!-- STAT -->
            <div class="row list-separated profile-stat">
                <div class="col-md-4 col-sm-4 col-xs-6">
                    <div class="uppercase profile-stat-title"> &#36; <?php echo number_format($costo,0,'.','.'); ?> </div>
                    <div class="uppercase profile-stat-text"> Costo Proyecto </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-6">
                    <div class="uppercase profile-stat-title"> &#36; <?php echo number_format($gasto,0,'.','.'); ?> </div>
                    <div class="uppercase profile-stat-text"> Gastos Proyecto </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-6">
                    <div class="uppercase profile-stat-title"> <?php echo $avance; ?> % </div>
                    <div class="uppercase profile-stat-text"> Avances </div>
                </div>
            </div>
            <!-- END STAT -->
            <!-- END PORTLET MAIN -->
            <!-- PORTLET MAIN -->
            <div class="portlet light ">
                <div>
                    <h4 class="profile-desc-title">Descripción:</h4>
                    <span class="profile-desc-text"> <?php echo $descripcion; ?> </span>
                    <div class="margin-top-20 profile-desc-link">
                        <i class="fa fa-calendar"></i>
                        Fecha Inicio: <a href=""><?php echo $fecha_inicio; ?></a>
                    </div>
                    <div class="margin-top-20 profile-desc-link">
                        <i class="fa fa-calendar"></i>
                        Fecha Término: <a href=""><?php echo $fecha_termino; ?></a>
                    </div>
                    <div class="margin-top-20 profile-desc-link">
                        <i class="fa fa-user"></i>
                        Responsable: <a href=""><?php echo $nombre_reponsable; ?></a>
                    </div>
                    <div class="margin-top-20 profile-desc-link">
                        <i class="fa fa-user"></i>
                        Rut Responsable: <a href=""><?php echo $rut_reponsable; ?></a>
                    </div>
                </div>
            </div>
            <!-- END PORTLET MAIN -->
        </div>
    </div>
    <div class="col-md-12">
        <div class="portlet light portlet-fit bg-inverse ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-bars font-red"></i>
                    <span class="caption-subject bold font-red uppercase"> Registro de Actividades</span>
                </div>
            </div>
            <div class="portlet-body">
                <div class="timeline  white-bg ">
                    <!-- TIMELINE ITEM -->
                    <?php
                        include('../../MASTER/config/conect.php');
                        $SQL="SELECT * FROM proyectos_actividad WHERE id_proyecto = ".$id;
                        $link->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
                        $consulta = $link->prepare($SQL);
                        $consulta->execute();
                        while ($row = $consulta->fetch()) {
                            $id_actividad           = $row[2];
                            $codigo_actividad       = $row[3];
                            $nombre_actividad       = $row[4];
                            $fecha_inicio_actividad = $row[5];
                            $fecha_termino_actividad= $row[6];
                            $costo_actividad        = $row[7];
                            $gasto_actividad        = $row[8];
                            $usuario_responsable    = $row[9];
                            $avance_actividad       = $row[10];
                            ?>
                            <div class="timeline-item">
                                <div class="timeline-badge">
                                    <div class="timeline-icon">
                                        <i class="icon-docs font-red-intense"></i>
                                    </div>
                                </div>
                                <div class="timeline-body">
                                    <div class="timeline-body-arrow"></div>
                                    <div class="timeline-body-head">
                                        <div class="timeline-body-head-caption">
                                            <span class="timeline-body-alerttitle font-green-haze"><?php echo $nombre_actividad; ?></span>
                                            <span class="timeline-body-time font-grey-cascade"><?php echo $fecha_inicio_actividad.' - '.$fecha_termino_actividad; ?></span>
                                        </div>
                                    </div>
                                    <div class="timeline-body-content">
                                        <span class="font-grey-cascade">
                                            &bull; Código: <?php echo $codigo_actividad; ?> <br>
                                            &bull; Costo: &#36; <?php echo number_format($codigo_actividad,0,'.','.'); ?> <br>
                                            &bull; Gasto: &#36; <?php echo number_format($gasto_actividad,0,'.','.'); ?> <br>
                                            &bull; Usuario Responsable: <?php echo $usuario_responsable; ?> <br>
                                            &bull; Avance: <?php echo $avance_actividad; ?> % <br>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    ?>
                    <!-- END TIMELINE ITEM -->
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
	include ("../FOOTER.php");
?>   
</body> 
</html>  