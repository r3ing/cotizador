<?php
    include('../../MASTER/include/verifyAPP.php'); 
	
	$ID_US	= $vari[0];

    include('../../MASTER/config/conect.php');
    $SQL="SELECT MAX(id) FROM proyectos";
    $link->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $consulta = $link->prepare($SQL);
    $consulta->execute();
    while ($row = $consulta->fetch())
    {
        $id_proyecto .= $row[0] + 1;
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
    <script src="JS/jquery-latest.min.js" type="text/javascript"></script>
    <script src="JS/jquery-ui.min.js"></script>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY --> 
<body style="width:98%; background: transparent">
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
            <div class="portlet-body form">
                <form class="form-horizontal" action="ADD_DB.php" method="post" role="form">
                    <div class="form-body">
                        <h3 class="block">Proporcione los detalles de su proyecto</h3>
                        <div class="form-group">
                            <label class="control-label col-md-3">Nombre Proyecto
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="nombre_proyecto" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Descripción
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-4">
                                <textarea class="wysihtml5 form-control" rows="6" name="editor1" data-error-container="#editor1_error"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Fecha Inicio Proyecto
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-4">
                                <div class="input-group date date-picker" data-date-format="dd-mm-yyyy">
                                    <input type="text" class="form-control" readonly name="datepicker" id="datepicker">
                                    <span class="input-group-btn">
                                        <button class="btn default" type="button">
                                                <i class="fa fa-calendar"></i>
                                            </button>
                                        </span>
                                </div>
                                <!-- /input-group -->
                                <span class="help-block"> Seleccione una fecha </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Fecha estimada de término
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-4">
                                <div class="input-group date date-picker" data-date-format="dd-mm-yyyy">
                                    <input type="text" class="form-control" readonly name="datepicker2">
                                    <span class="input-group-btn">
                                        <button class="btn default" type="button">
                                            <i class="fa fa-calendar"></i>
                                        </button>
                                    </span>
                                </div>
                                <!-- /input-group -->
                                <span class="help-block"> Seleccione una fecha </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Costo total del proyecto
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="costo_proyecto" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Gasto del Proyecto
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="gasto_proyecto" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">% de Avance
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="porcentaje_avance" />
                            </div>
                        </div>

                        <h3 class="block">Proporcione los detalles del Responsable</h3>
                        <div class="form-group">
                            <label class="control-label col-md-3">Nombre
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="nombre_responsable" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">RUT
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="rut_responsable" />
                            </div>
                        </div>

                        <h3 class="block">Proporcione los detalles de las actividades del proyecto</h3>
                        <div class="table-scrollable">
                            <table class="tabla table table-bordered table-hover">
                                <thead>
                                <tr class="success">
                                    <td>ID</td>
                                    <td>Código</td>
                                    <td>Nombre</td>
                                    <td>Fecha Inicio</td>
                                    <td>Fecha Término</td>
                                    <td>Costo</td>
                                    <td>Gasto</td>
                                    <td>Usuario Responsable</td>
                                    <td>% de Avance</td>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><input type="input" class="form-control" name="id_actividad[]" autocomplete="off"></input></td>
                                    <td><input type="input" class="form-control" name="codigo_actividad[]" autocomplete="off"></input></td>
                                    <td><input type="input" class="form-control" name="nombre_actividad[]" autocomplete="off"></input></td>
                                    <td><input type="input" class="form-control" name="fecha_inicio_actividad[]" autocomplete="off"></input></td>
                                    <td><input type="input" class="form-control" name="fecha_termino_actividad[]" autocomplete="off"></input></td>
                                    <td><input type="input" class="form-control" name="costo_actividad[]" autocomplete="off"></input></td>
                                    <td><input type="input" class="form-control" name="gasto_actividad[]" autocomplete="off"></input></td>
                                    <td><input type="input" class="form-control" name="usuario_responsable[]" autocomplete="off"></input></td>
                                    <td><input type="input" class="form-control" name="avance_actividad[]" autocomplete="off"></input></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <input type="hidden" value="<?php echo $id_proyecto; ?>" name="id_proyecto">
                        <button type="button" class="btn blue"><i class="fa fa-plus"></i> Agregar Actividad</button>

                        <script>
                            $('button').click(function() {

                                //creo una nueva fila
                                var fila='<tr>'+
                                    '<td><input type="input" class="form-control" name="id_actividad[]" autocomplete="off"></input></td>'+
                                    '<td><input type="input" class="form-control" name="codigo_actividad[]" autocomplete="off"></input></td>'+
                                    '<td><input type="input" class="form-control" name="nombre_actividad[]" autocomplete="off"></input></td>'+
                                    '<td><input type="input" class="form-control" name="fecha_inicio_actividad[]" autocomplete="off"></input></td>'+
                                    '<td><input type="input" class="form-control" name="fecha_termino_actividad[]" autocomplete="off"></input></td>'+
                                    '<td><input type="input" class="form-control" name="costo_actividad[]" autocomplete="off"></input></td>'+
                                    '<td><input type="input" class="form-control" name="gasto_actividad[]" autocomplete="off"></input></td>'+
                                    '<td><input type="input" class="form-control" name="usuario_responsable[]" autocomplete="off"></input></td>'+
                                    '<td><input type="input" class="form-control" name="avance_actividad[]" autocomplete="off"></input>'+
                                    '</tr>';

                                //añado fila a la tabla
                                $('.tabla').append(fila);
                            });
                        </script>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn green" name="Guardar">Enviar</button>
                                <button type="button" class="btn default">Cancelar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- END SAMPLE FORM PORTLET-->
    </div>
</div>
<?php 
	include ("../FOOTER.php");
?>   
</body> 
</html>  