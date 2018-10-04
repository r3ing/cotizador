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

    <head>
        <meta charset="utf-8" /> 
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
		<?php 
			include ("../HEAD.php");
		?>
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="assets/layouts/layout4/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/layouts/layout4/css/themes/light.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="assets/layouts/layout4/css/custom.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> </head>
    <!-- END HEAD -->

    <body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo">
		<script type="text/javascript">
			var nuevoalias = jQuery.noConflict();
			nuevoalias(document).ready(function() {
			   // alert("Si salgo es que no hay conflicto!!!");
			});
		</script> 
		<div class="row">
			<div class="col-md-12"> 
				<!-- BEGIN PORTLET-->
				<div class="portlet light bordered">
					<div class="portlet-title">
						<div class="caption">
							<i class="fa fa-search font-blue"></i>
							<span class="caption-subject font-blue bold uppercase">Búsqueda Avanzada</span>
						</div> 
					</div>
					<div class="portlet-body">   
						<?php 
							if(isset($_POST['buscar']))
							{ 									
								$sede=$_POST["N1"];   
								
								for ($i=0; $i<sizeof($sede); $i++) {
								// $CC .= $ccosto[$j].','; 
									echo "<br> Sedes " . $i . ": " . $sede[$i];    
								} 
							}
							else
							{
						?> 
						
						<form method="post" action="RES.php"  id="fo3" name="fo3">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-3">Sede</label>
										<div class="col-md-9">
										<?php
											include ("../../../../lib/adodb/adodb.inc.php");
											include('../../MASTER/config/conect.php');	 
											
											$SQL="EXEC [EERR_JERARQUIA_CENTROSCOSTOS_2] ".$ID_US.",1";
											$RES = $DB2->Execute($SQL); 															
										?> 
										<select name="N1[]" id="multiple" class="form-control select2-multiple" multiple required 
											onchange="from(document.getElementsByName('N1[]').item('N1[]').value,'N2','N2.php')"> 
											<?php foreach($RES as $k => $ROW)  {	 ?>
											<option value="<?php echo $ROW[1]; ?>"><?php echo utf8_encode($ROW[0]); ?></option>
											<?php }?>							
										</select>   
										</div> 
									</div>
								</div>
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
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-actions right">
										<button type="submit" name="buscar" class="btn blue">Mostrar</button>
										<button type="reset" class="btn default">Limpiar</button>
									</div>
								</div> 		
							</div>
						</form>	
						<?php } ?>
						
						<div id="result"></div> 
						
					</div>
				</div>  
			</div>
		</div>                  
                              
		
        <!-- BEGIN CORE PLUGINS -->
        <script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="assets/pages/scripts/components-select2.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="assets/layouts/layout4/scripts/layout.min.js" type="text/javascript"></script>
        <script src="assets/layouts/layout4/scripts/demo.min.js" type="text/javascript"></script>
        <script src="assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS --> 
		
		
		<script type="text/javascript" language="javascript" src="js/ajax.js"></script>
	 

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