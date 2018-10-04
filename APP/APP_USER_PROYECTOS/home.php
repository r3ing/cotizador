<?php
    include('../../MASTER/include/verifyAPP.php'); 
	
	$ID_US	= $vari[0]; 
	
	$name_application 	= $_GET['name_application']; 
	$tipo 				= $_GET['tipo']; 
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
<!-- BEGIN PAGE TITLE-->
<!-- END PAGE TITLE-->

<h3 class="page-title">
    <?php
    if(trim($tipo) == 'ADM')	echo 'MANTENEDOR - ';
    else 				echo '';

    if ($name_application != '')	echo $name_application;
    else 							echo '';
    ?>
    <small>Panel de Proyectos</small>
</h3>
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-dark">
                    <i class="icon-settings font-dark"></i>
                    <span class="caption-subject bold uppercase">
                        <?php
                            if(trim($tipo) == 'ADM')	echo 'MANTENEDOR - ';
                            else 				echo '';

                            if ($name_application != '')	echo $name_application;
                            else 							echo '';
                        ?>
                    </span>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-toolbar">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="btn-group">
                                <a href="ADD.php" id="sample_editable_1_new" class="btn sbold blue">
                                    Agregar Proyecto
                                    <i class="fa fa-plus"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="btn-group pull-right">
                                <button class="btn green  btn-outline dropdown-toggle" data-toggle="dropdown">Herramientas
                                    <i class="fa fa-angle-down"></i>
                                </button>
                                <ul class="dropdown-menu pull-right">
                                    <li>
                                        <a href="javascript:;">
                                            <i class="fa fa-print"></i> Imprimir </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <i class="fa fa-file-pdf-o"></i> Guardar como PDF </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <i class="fa fa-file-excel-o"></i> Exportar a Excel </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                    <thead>
                    <tr>
                        <th> ID </th>
                        <th> Nombre Proyecto </th>
                        <th> Fecha Inicio </th>
                        <th> Fecha Término </th>
                        <th> Costo </th>
                        <th> Gasto </th>
                        <th> % Avance </th>
                        <th> Responsable </th>
                        <th>  </th>
                        <th>  </th>
                        <th>  </th>
                        <th>  </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    include('../../MASTER/config/conect.php');
                    $SQL="SELECT * FROM proyectos";

                    $link->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
                    $consulta = $link->prepare($SQL);
                    $consulta->execute();
                    while ($row = $consulta->fetch())
                    {
                        echo '<tr class="odd gradeX">';
                        echo "<td>".utf8_encode($row[0])."</td>";
                        echo "<td>".utf8_encode($row[1])."</td>";
                        echo "<td>".utf8_encode($row[3])."</td>";
                        echo "<td>".utf8_encode($row[4])."</td>";
                        echo "<td>&#36;".number_format(utf8_encode($row[5]),0,'.','.')."</td>";
                        echo "<td>&#36;".number_format(utf8_encode($row[6]),0,'.','.')."</td>";
                        echo "<td>".utf8_encode($row[7])." %</td>";
                        echo "<td>".utf8_encode($row[8])."</td>";
                        ?>
                        <td align ='center'>
                            <form action="DETAILS.php" method="post">
                                <input type="hidden" value="<?php echo $row[0]; ?>" name="id">
                                <button name="details" style="border:0px; background:transparent;"><i class='fa fa-search' style='color:blue;'></i></button>
                            </form>
                        </td>
                        <td>
                            <?php
                            if($row[4] >= date("Y-m-d") && $row[4] != '0000-00-00'){
                                ?>
                                <i class="fa fa-wrench" style="color:blue;"></i>
                                <?php
                            }
                            else
                                if($row[4] <= date("Y-m-d") && $row[4] != '0000-00-00')
                                {
                                ?>
                                <i class="fa fa-check" style="color:green;"></i>
                                <?php
                                }
                            else
                                if($row[4] == '0000-00-00' || $row[4] == ' '){
                                ?>
                                <i class="fa fa-close" style="color:red;"></i>
                                <?php
                            }
                            ?>
                        </td>
                        <td align ='center'>
                            <form method="post">
                                <input type="hidden" value="<?php echo $row[0]; ?>" name="id">
                                <button name="edit" style="border:0px; background:transparent;"><i class='fa fa-pencil' style='color:#0066FF;'></i></button>
                            </form>
                        </td>
                        <td align ='center'>
                            <form method="post">
                                <input type="hidden" value="<?php echo $row[0]; ?>" name="id">
                                <button name="delete" style="border:0px; background:transparent;"><i class='fa fa-times' style='color:#FF0000;'></i></button>
                            </form>
                        </td>
                        <?php
                        echo "</tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>

<?php
	include ("../FOOTER.php");
?>
</body> 
</html> 