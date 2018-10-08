<?php
    include('../../MASTER/include/verifyAPP.php'); 
	
	$ID_US	= $vari[0]; 
	
	$name_application 	= $_GET['name_application']; 
	$tipo 				= $_GET['tipo'];
	$descripcion        = $_GET['descripcion'];
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
<body style="width:98%; background: white !important;">
<script type="text/javascript">
	/*
	var nuevoalias = jQuery.noConflict();
	nuevoalias(document).ready(function() {
	   // alert("Si salgo es que no hay conflicto!!!");
	});
	*/
</script> 
<!-- BEGIN PAGE CONTENT--> 
<div class="row">
	<div class="col-md-12">
		<!-- BEGIN SAMPLE TABLE PORTLET-->
		<h3 class="page-title">
			<?php
			if(trim($tipo) == 'ADM')	echo 'MANTENEDOR - ';
			else 				echo '';

			if ($descripcion != '')	echo $descripcion;
			else 							echo '';
			?>
			<small>...</small>
		</h3>
		<div class="portlet light bordered">
			<!-- *********************************************** BEGIN CONTENIDO *********************************************** -->
			<div class="portlet-body">
				<div class="">
					<label> <span class="required">  </span> &nbsp; </label>
						<button onclick="proccess()" name="load" id="load" class="btn purple-intense" value="Procesar"> <i class="fa fa-file-archive-o"></i> Procesar </button>
				</div>

			</div>
			<!-- *********************************************** END   CONTENIDO ***********************************************  style="width:70%"-->
		</div>
		<div class="progress">
			<div class="progress-bar progress-animated progress-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
		</div>
		<div id="result" hidden>
		</div>
		<div id="loading" hidden  width="100%" align="center">
			<br/>
			<img src="../../MASTER/images/loaders/loader10.gif" width="3%" class="img-responsive center-block">
			<h3> Cargando Informaci&oacute;n ... </h3>
		</div>
		<!-- END SAMPLE TABLE PORTLET-->
	</div>
</div>
<?php 
	include ("../FOOTER.php");
?>

<script>
	function proccess(){
		$('.progress-bar').width('%0');
		//$('#progress').show();
		$.ajax({
			type: 'GET',
			url: 'procesar.php',
			xhr: function () {
				var xhr = new window.XMLHttpRequest();
				//Download progress
				xhr.addEventListener("progress", function (evt) {
					if (evt.lengthComputable) {
						var percentComplete = evt.loaded / evt.total * 100;
						$('.progress-bar').animate({
							width: percentComplete + '%'
						},{
							//duration: 1000
						});
					}
				}, false);
				return xhr;
			},
			beforeSend: function(){
				$('.progress-bar').width('%0');
			},
			success: function(data) {
				$('#result').html(data);
			},
			complete: function(){
				$('#loading').hide();
				$('#result').fadeIn('slow');

				//$('#progress-bar').width('%0');
				//$('#progress').hide();
			}
		});
	}

/*
 /*xhr: function () {
 var xhr = $.ajaxSettings.xhr();
 xhr.onprogress = function e() {
 // For downloads
 if (e.lengthComputable) {
 console.log(e.loaded / e.total);
 }
 };
 xhr.upload.onprogress = function (e) {
 // For uploads
 if (e.lengthComputable) {
 console.log(e.loaded / e.total);
 }
 };
 return xhr;
 },
 */
</script>
</body> 
</html>


