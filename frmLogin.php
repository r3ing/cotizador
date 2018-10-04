<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
<div class="menu-toggler sidebar-toggler">
</div>
<!-- END SIDEBAR TOGGLER BUTTON -->
<!-- BEGIN LOGIN -->
<div class="content">
	<!-- BEGIN LOGIN FORM -->
	<form class="form-login" method="post" name="customForm" id="customForm">
		<!-- BEGIN LOGO --> 
        <center>
        	<img src="master/assets/admin/layout3/img/logo.png" alt="" width="200" /> <br>
            <h3>Panel de Control</h3><br>
        </center>
        <!-- END LOGO -->
		<div class="alert alert-danger display-hide">
			<button class="close" data-close="alert"></button>
			<span>
			Ingrese un Usuario y Contrase&ntilde;a. </span>
		</div>
		<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9">Usuario</label>
			<div class="input-icon">
				<i class="fa fa-user"></i>
				<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Usuario" name="username" id="username" />
			</div>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Contrase&ntilde;a</label>
			<div class="input-icon">
				<i class="fa fa-lock"></i>
				<input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Contrase&ntilde;a" name="password" id="password" disabled="disabled" required/>
			</div>
		</div>
        
        <div id="Info"></div>
        <?php 
			if ($valido==false) {
				echo "<div class='alert alert-danger'>
						<button data-dismiss='alert' class='close'>&times;</button> 
						<i class='fa fa-times'></i> Usuario o Contrase&ntilde;a incorrecto... Intente nuevamente.
					  </div>";
			}
	    ?>
        
		<div class="form-actions">
			<label class="checkbox"> </label>
            <input type="submit" class="btn green pull-right" value="Ingresar a mi Cuenta" name="submit" id="submit" disabled="disabled" />
		</div> 
	</form>
	<!-- END LOGIN FORM -->  
</div>
<!-- END LOGIN -->