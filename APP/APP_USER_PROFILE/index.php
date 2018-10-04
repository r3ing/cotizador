<?php
	include('../../MASTER/include/verifyAPP.php');	
	include('../../MASTER/config/conect.php');
	$id = $_POST['id'];
	$nombre = $_POST['nombre']; 
	
	$sql="SELECT * FROM users WHERE id = ".$vari[0];
	$link->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ); 
	$consulta = $link->prepare($sql); 
	$consulta->execute();
	$row = $consulta->fetch();
?>
<!-- BEGIN PAGE CONTENT-->
<div class="row">
	<div class="col-md-12"> 
		<!-- PORTLET MAIN -->
		<div class="portlet light profile-sidebar-portlet">
			<!-- SIDEBAR USERPIC -->
			<div align="center">
				<img src="../../../camividal.com/images/<?php echo $row[11];?>/logo.png" class="img-responsive" alt="<?php echo $row[11];?>" width="500">
			</div>
			<!-- END SIDEBAR USERPIC -->
			<!-- SIDEBAR USER TITLE -->
			<div class="profile-usertitle">
				<div class="profile-usertitle-name">
					 <?php echo utf8_encode($row[3].'&nbsp;'.$row[4].'&nbsp;'.$row[5]); ?>
				</div>
				<div class="profile-usertitle-job">
					 <?php echo $row[10]; ?>
				</div>
			</div>
			<!-- END SIDEBAR USER TITLE -->
			<!-- SIDEBAR BUTTONS -->
			<div class="profile-userbuttons">
				<a href="http://<?php echo $row[10]; ?>" target="_blank" class="btn btn-circle green-haze btn-sm"><i class="fa fa-link"></i> Ir al Sitio Web</a>
				<a href="mailto:<?php echo $row[12]; ?>" class="btn btn-circle btn-danger btn-sm"><i class="fa fa-envelope"></i> Enviar Mensaje a Administrador</a>
			</div>
			<!-- END SIDEBAR BUTTONS --> 
			<br /><br />
		</div>
		<!-- END PORTLET MAIN -->
		<!-- PORTLET MAIN -->
		<div class="portlet light"> 
			<div>
				<h4 class="profile-desc-title">Datos de Contacto de <b><?php echo utf8_encode($row[3].'&nbsp;'.$row[4]); ?></b></h4>
				<span class="profile-desc-text">  </span>
				<div class="margin-top-20 profile-desc-link">
					<i class="fa fa-globe"></i>
					<a href="http://<?php echo $row[10]; ?>" target="_blank"><?php echo $row[10]; ?></a>
				</div>
				<div class="margin-top-20 profile-desc-link">
					<i class="fa fa-envelope"></i>
					<a href="mailto:<?php echo $row[8]; ?>"><?php echo $row[8]; ?></a>
				</div>
				<div class="margin-top-20 profile-desc-link">
					<i class="fa fa-mobile"></i>
					<a href="#"><?php echo '+569 '.$row[6]; ?></a>
				</div>
			</div>
		</div>
		<!-- END PORTLET MAIN --> 
	</div>
</div>