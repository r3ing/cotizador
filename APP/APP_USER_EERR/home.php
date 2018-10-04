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
<script type="text/javascript" language="javascript" src="js/ajax.js"></script>

<!-- <link rel="stylesheet" href="css/bootstrap/css/bootstrap.css" />-->
<link rel="stylesheet" href="css/multiple-select.css" />
 
</head>
<!-- END HEAD -->
<!-- BEGIN BODY --> 
<body style="width:98%">  
<script type="text/javascript">
	var nuevoalias = jQuery.noConflict();
	nuevoalias(document).ready(function() {
	   // alert("Si salgo es que no hay conflicto!!!");
	});
</script> 
<!-- BEGIN PAGE CONTENT-->
<div class="row">
	<div class="col-md-12">
			<!-- BEGIN PAGE CONTENT INNER -->  
			<div class="row"> 
				<div class="col-md-12 col-sm-12">  
					<!-- BEGIN PORTLET-->
					<div class="portlet light ">
						<div class="portlet-title">
							<div class="caption caption-md">
								<i class="icon-bar-chart theme-font-color hide"></i>
								<span class="caption-subject theme-font-color bold uppercase">
									ESTADO DE RESULTADO WEB 
								</span>  
							</div> 
							<div class="actions">
								<a href="#myModal1" style="float:right;" role="button" class="btn blue" data-toggle="modal"> <i class="fa fa-info"></i> Ver mis Permisos </a> 
							</div>
							<!-- MODAL --> 
							<div id="myModal1" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title"><i class="fa fa-user"></i> Permisos asociados a mi cuenta</h4>
										</div>
										<div class="modal-body">
											<table class="table table-striped table-bordered table-hover" id="sample_1" style="font-size:14px;">
												<thead>
													<tr class="success" style="font:bold;">
														<td>Cuentas Contables</td>
														<td>Sedes</td>
														<td>Centros de Costo</td>
													</tr>
												</thead>
												<tbody>
                                                    <tr>
                                                        <td>Todas</td>
                                                        <td>Todas</td>
                                                        <td>Todos</td>
                                                    </tr>
													<?php 
//														include ("../../../../lib/adodb/adodb.inc.php");
//														include('../../MASTER/config/conect.php');
//
//														$SQL= "EXEC EERR_PERMISOS_USUARIO ".$ID_US."";
//														$RES = $DB2->Execute($SQL);
//														foreach($RES as $k => $row)
//														{
//															echo '<tr>';
//																echo '<td>';
//																	if ($row[2] == '-1')
//																	echo 'Todas';
//																	else
//																	echo $row[2];
//																echo '</td>';
//																echo '<td>';
//																	if ($row[3] == '-1')
//																	echo 'Todas';
//																	else
//																	echo '('.$row[3].') '.utf8_encode($row[4]);
//																echo '</td>';
//																echo '<td>';
//																	if ($row[5] == '-1')
//																	echo 'Todos';
//																	else
//																	echo '('.$row[5].') '.utf8_encode($row[6]);
//																echo '</td>';
//															echo '</tr>';
//														}
													?>
												</tbody> 
											</table>
										</div>
										<div class="modal-footer">
											<button class="btn blue" data-dismiss="modal" aria-hidden="true">Cerrar</button> 
										</div>
									</div>
								</div>
							</div> 
							<!-- MODAL -->
						</div>
						<div class="portlet-body">
                            <div class="tab-pane active" id="tab1">
                                <div id="cargando" width="100%" align="center"><img src="../../MASTER/images/loaders/loader6.gif"> <h1> Cargando Estado de Resultado Web ... </h1></div>
                                <p><iframe src="../APP_USER_EERR/EERR.php" width="100%" height="1000" frameborder="0"></iframe></p>
                            </div>
                        </div>
					</div>
					<!-- END PORTLET-->
				</div>
			</div>  
			<!-- END PAGE CONTENT INNER --> 
		</div>
	</div>
	<!-- END PAGE CONTENT-->  
<script src="../../MASTER/assets/global/plugins/jquery.min.js" type="text/javascript"></script>	 
<script src="../../MASTER/assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="../../MASTER/assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="../../MASTER/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../../MASTER/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="../../MASTER/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="../../MASTER/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="../../MASTER/assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="../../MASTER/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="../../MASTER/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="../../MASTER/assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="../../MASTER/assets/global/plugins/jquery-validation/js/additional-methods.min.js"></script>
<script type="text/javascript" src="../../MASTER/assets/global/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="../../MASTER/assets/global/plugins/select2/select2.min.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="../../MASTER/assets/global/scripts/ui-general.min.js" type="text/javascript"></script>
<script src="../../MASTER/assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="../../MASTER/assets/admin/layout4/scripts/layout.js" type="text/javascript"></script>
<script src="../../MASTER/assets/admin/layout4/scripts/demo.js" type="text/javascript"></script>
<script src="../../MASTER/assets/admin/pages/scripts/form-wizard.js"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {       
	// initiate layout and plugins
	Metronic.init(); // init metronic core components
	Layout.init(); // init current layout
	Demo.init(); // init demo features
	FormWizard.init();
});
</script>
   
<script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
<script type="text/javascript">
$(window).load(function () {
  // Una vez se cargue al completo la página desaparecerá el div "cargando"
  $('#cargando').hide();
});
</script>
</body> 
</html> 

<!-- 
SELECT CON BUSCADOR 

<select name="descripcion" id="country_list" class="form-control">
	<option>-- Seleccione Opci&oacute;n --</option>
	<?php 
		/*
		include ("../../../../lib/adodb/adodb.inc.php");
		include('../../MASTER/config/conect.php');		
		$SQL_DS = "EXEC EERR_ESCENARIOS"; 
		$C_DS = $DB2->Execute($SQL_DS); 
		foreach($C_DS as $k => $R_DS) 
		{
	?>
			<option><?php echo utf8_encode($R_DS[1]); ?></option>
	<?php
		}
		*/
	?> 
</select>
-->