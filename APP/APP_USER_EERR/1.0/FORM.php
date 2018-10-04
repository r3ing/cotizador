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
<body style="width:99%">  
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
					 
						<div class="portlet-body">
							<?php  
								include ("../../../../lib/adodb/adodb.inc.php");
								include('../../MASTER/config/conect.php');	 
								
								$SQL="EXEC EERR_PERMISOS_USUARIOS ".$ID_US."";
								$RES = $DB2->Execute($SQL); 
								foreach($RES as $k => $ROW)  { 
								 
								if ($ROW[0] == '')
								{
									echo '<div class="note note-danger">';
										echo '<h4 class="block">Error! Problemas de Comunicaci&oacute;n</h4>';
										echo '<p>';
											echo 'Su cuenta no tiene permisos para utilizar el formulario de b&uacute;squeda. 
												  Favor comunicarse con el &aacute;rea correspondiente para solucionar el problema. ';
										echo '</p>';
									echo '</div>'; 
								} 
								else
								if($ROW[0] == 1 or $ROW[0] == 2 or $ROW[0] == 3)
								{ 
									// USUARIOS QUE TIENEN PERMITIDO VER TODOS LOS CENTROS DE COSTO O MÁS DE 1 
							?>
								<div class="portlet box blue">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-search"></i> B&uacute;squeda Avanzada</div>
										<div class="tools">
											<a href="" class="collapse"> </a> 
										</div>
									</div>
									<div class="portlet-body form">	
										<br>
										<form method="post" action="RES.php" id="fo3" name="fo3" >
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label col-md-3">Sede</label>
														<div class="col-md-9">
														<?php
															include ("../../../../lib/adodb/adodb.inc.php");
															include('../../MASTER/config/conect.php');	 
															
															$SQL="EXEC [EERR_JERARQUIA_CENTROSCOSTOS] ".$ID_US.",1";
															$RES = $DB2->Execute($SQL); 															
														?> 
														<select name="N1" id="" class="form-control input-sm"
															onchange="from(document.getElementsByName('N1').item('N1').value,'N2','N2.php')">
															<option value="0" disabled selected>-- Seleccione --</option>
															<?php foreach($RES as $k => $ROW)  {	 ?>
															<option value="<?php echo $ROW[1]; ?>"><?php echo utf8_encode($ROW[0]); ?></option>
															<?php }?>							
														</select>
														<br>
														</div> 
													</div>
												</div>
												<!--/span-->
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label col-md-3">A&ntilde;o</label>
														<div class="col-md-9">
														<?php 
															$SQL_AG="EXEC EERR_AGNOS_DETALLES";
															$RES_AG = $DB2->Execute($SQL_AG); 																				
														?> 
														<select name="agno" class="form-control input-sm">
															<option value="0" disabled selected>-- Seleccione Opci&oacute;n --</option>
															<?php foreach($RES_AG as $k => $ROW_AG)  {	 ?>
															<option value="<?php echo $ROW_AG[0]; ?>" <?php if($ROW_AG[0] == date("Y")) echo 'selected="selected"'; ?>>
																<?php echo utf8_encode($ROW_AG[0]); ?>
															</option>
															<?php }?>							
														</select>
														</div> 
													</div>
												</div>
												<!--/span-->
											</div>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label col-md-3">Rector&iacute;a / Vicerrector&iacute;a</label>
														<div class="col-md-9">
															<div id="N2">                
																<select name="N2" class="form-control input-sm" id="">                 
																	<option value="0" disabled selected>-- Seleccione --</option>         
																</select>   
															</div>
														</div>
													</div>
												</div>
												<!--/span-->
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label col-md-3">Meses</label>
														<div class="col-md-9"> 
															<select id="ms" name="meses[]" multiple="multiple" required>          
																<option value="01"> Enero</option>
																<option value="02"> Febrero</option>
																<option value="03"> Marzo</option>
																<option value="04"> Abril</option>
																<option value="05"> Mayo</option>
																<option value="06"> Junio</option>
																<option value="07"> Julio</option>
																<option value="08"> Agosto</option>
																<option value="09"> Septiembre</option>
																<option value="10"> Octubre</option>
																<option value="11"> Noviembre</option>
																<option value="12"> Diciembre</option>
															</select> 
														</div>
													</div>
												</div>
												<!--/span--> 
											</div>  
											<br>
											<div class="row">
												<div class="col-md-6 offset-6">
													<div class="form-group">
														<label class="control-label col-md-3">&Aacute;rea</label>
														<div class="col-md-9">
															<div id="N3">
																<select name="IDP_CC" class="form-control input-sm" id="">
																	<option value="0" disabled selected>-- Seleccione --</option>         
																</select>          
															</div>
														</div>
													</div>
												</div>  
											</div>
											<br>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label col-md-3">Centro de Costo</label>
														<div class="col-md-9">
															<div id="CC">
																<select name="CC" class="form-control input-sm">
																	<option value="0" disabled selected>-- Seleccione --</option>          
																</select>          
															</div>
														</div>
													</div>
												</div> 
												<div class="col-md-6">
													<div class="form-actions right">
														<button type="submit" name="buscar" class="btn blue">Mostrar</button>
														<button type="reset" class="btn default">Limpiar</button>
													</div>
												</div> 
											</div>
										</form> 
									</div>
								</div> 
							<?php 
								} 
								else
								if($ROW[0] == 4)
								{
									// USUARIOS QUE TIENEN PERMITIDO VER UN CENTRO DE COSTO
							?>
									<div class="portlet box blue">
										<div class="portlet-title">
											<div class="caption">
												<i class="fa fa-search"></i> B&uacute;squeda Avanzada</div>
											<div class="tools">
												<a href="" class="collapse"> </a> 
											</div>
										</div>
										<div class="portlet-body form">	
											<br>
											<form method="post" action="RES.php" id="fo3" name="fo3" >
												<div class="row"> 
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">A&ntilde;o</label>
															<div class="col-md-9">
															<?php 
																$SQL_AG="EXEC EERR_AGNOS_DETALLES";
																$RES_AG = $DB2->Execute($SQL_AG); 																				
															?> 
															<select name="agno" class="form-control input-sm" required>
																<option value="0" disabled selected>-- Seleccione Opci&oacute;n --</option>
																<?php foreach($RES_AG as $k => $ROW_AG)  {	 ?>
																<option value="<?php echo $ROW_AG[0]; ?>" <?php if($ROW_AG[0] == date("Y")) echo 'selected="selected"'; ?>>
																	<?php echo utf8_encode($ROW_AG[0]); ?>
																</option>
																<?php }?>							
															</select>
															</div> 
														</div>
													</div>
													<!--/span--> 
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Meses</label>
															<div class="col-md-9"> 
																<select id="ms" name="meses[]" multiple="multiple" required>          
																	<option value="01"> Enero</option>
																	<option value="02"> Febrero</option>
																	<option value="03"> Marzo</option>
																	<option value="04"> Abril</option>
																	<option value="05"> Mayo</option>
																	<option value="06"> Junio</option>
																	<option value="07"> Julio</option>
																	<option value="08"> Agosto</option>
																	<option value="09"> Septiembre</option>
																	<option value="10"> Octubre</option>
																	<option value="11"> Noviembre</option>
																	<option value="12"> Diciembre</option>
																</select> 
															</div>
														</div>
													</div>
													<!--/span--> 
												</div>   
												<br>
												<div class="row"> 
													<div class="col-md-6">&nbsp;</div>
													<div class="col-md-6">
														<div class="form-actions right"> 
															<button type="submit" name="buscar" class="btn blue">Mostrar</button>
															<button type="reset" class="btn default">Limpiar</button>
														</div>
													</div> 
												</div>
											</form>		
										</div>
									</div>												
							<?php 
								}
								}
							?>	 
								 
								<!--<div id="loading" width="100%" align="center"><img src="../../MASTER/images/loaders/loader6.gif"> <h1> Cargando Estado de Resultado Web ... </h1></div> -->
								<div id="result"></div> 
						</div>
					</div>
					<!-- END PORTLET-->
				</div>
			</div>  
			<!-- END PAGE CONTENT INNER --> 
		</div>
	</div>
	<!-- END PAGE CONTENT-->   

<script src="js/jquery.min.js"></script>
<script src="js/multiple-select.js"></script>
<script>
    $(function() {
        $('#ms').change(function() {
            console.log($(this).val());
        }).multipleSelect({
            width: '100%'
        });
    });
</script>


<script language="javascript" src="jquery-1.3.min.js"></script>
<script language="javascript">
$(document).ready(function() {
    $().ajaxStart(function() {
        $('#loading').show();
        $('#result').hide();
    }).ajaxStop(function() {
        $('#loading').hide();
        $('#result').fadeIn('slow');
    });
    $('#form, #fat, #fo3').submit(function() {
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function(data) {
                $('#result').html(data);

            }
        })
        
        return false;
    }); 
})  
</script>  
</body> 
</html>  