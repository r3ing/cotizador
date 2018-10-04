<?php
include('../../MASTER/config/verifica_aplicacion.php');

// <!-- BEGIN PAGE HEADER-->
echo '<div class="row-fluid">
	<div class="span12">    	
		<!-- BEGIN PAGE TITLE & BREADCRUMB-->		
		<h3 class="page-title">
			Configuraci&oacute;n de la Cuenta
		</h3> 
	</div>
</div>';

echo "<div id ='vista_usuarios'>";
	include('VW/USER.php');
echo '</div>';					
?>  