<?php
//include('master/config/destruye.php');
session_start();
if(isset($_GET['error']))
{
    $error = $_GET['error'];
    if ($error==1)
    {
        //$mensaje = " alert('Usuario o Password no corresponde');";
    }
    if ($error==2)
    {
        //$mensaje = " alert('La sesion ha Finalizado, favor volver a Ingresar');";
    }
    if ($error==3)
    {

        $funcion = ' onload="reingreso('.$_GET['user'].',\'master/reingreso.php\',\''.$_GET['option'].'\',\'SI\')"';
    }

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
    <meta charset="utf-8" />
    <title>Task Force | Ripley</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=all" rel="stylesheet" type="text/css" />
    <link href="MASTER/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="MASTER/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="MASTER/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="MASTER/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
    <link href="MASTER/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="MASTER/assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="MASTER/assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="MASTER/assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
    <link href="MASTER/assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="MASTER/assets/pages/css/login-4.min.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <!-- END THEME LAYOUT STYLES -->
    <link rel="shortcut icon" href="favicon.ico" />
</head>
<!-- END HEAD -->

<body class=" login">
<!-- BEGIN LOGO -->
<div class="logo">
</div>
<!-- END LOGO -->
<!-- BEGIN LOGIN -->
<div class="content">
    <!-- BEGIN LOGIN FORM -->
    <a href="index.php">
        <img src="MASTER/assets/pages/img/login/logo_ripley.svg" style="width: 300px;" alt="" />
    </a>
    <form class="login-form" action="MASTER/login.php" method="post">
        <h3 class="form-title">TASK FORCE</h3>
        <p>Bienvenido al Sistema de Analítica para Big Data</p>
        <div class="alert alert-danger display-hide">
            <button class="close" data-close="alert"></button>
            <span> Ingrese usuario y contraseña. </span>
        </div>
        <?php
            if(isset($_SESSION['errorLogin'])){
                echo "<div class='alert alert-danger'>".
                     "<button class='close' data-close='alert'></button>".
                     "<span>Usuario o Password no corresponde.</span></div>";
            }
        ?>
        <div class="form-group">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <label class="control-label visible-ie8 visible-ie9">Usuario</label>
            <div class="input-icon">
                <i class="fa fa-user"></i>
                <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Usuario" name="user" required /> </div>
        </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Contraseña</label>
            <div class="input-icon">
                <i class="fa fa-lock"></i>
                <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Contraseña" name="pass" required /> </div>
        </div>
        <div class="form-actions">
            <label class="checkbox">
                <input type="checkbox" name="remember" value="1" /> Recordarme </label>
            <button type="submit" class="btn green pull-right"> Ingresar </button>
        </div>
        <div class="forget-password">
            <h4>¿Olvidaste tu contraseña?</h4>
            <p> No te preocupes, haz click
                <a href="javascript:;" id="forget-password"> aquí</a> para recuperar tu contraseña. </p>
        </div>
    </form>
    <!-- END LOGIN FORM -->
    <!-- BEGIN FORGOT PASSWORD FORM -->
    <form class="forget-form" action="" method="post">
        <h3>¿Olvidaste tu contraseña?</h3>
        <p> Ingresa tu dirección de correo electrónico para poder recuperar tu contraseña </p>
        <div class="form-group">
            <div class="input-icon">
                <i class="fa fa-envelope"></i>
                <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email" /> </div>
        </div>
        <div class="form-actions">
            <button type="button" id="back-btn" class="btn red btn-outline">Back </button>
            <button type="submit" class="btn green pull-right"> Enviar </button>
        </div>
    </form>
    <!-- END FORGOT PASSWORD FORM -->
</div>
<!-- END LOGIN -->
<!-- BEGIN COPYRIGHT -->
<div class="copyright"> <?php date_default_timezone_set("UTC"); echo date("Y"); ?> Copyright &copy; Stiv. </div>
<!-- END COPYRIGHT -->
<!--[if lt IE 9]>
<script src="MASTER/assets/global/plugins/respond.min.js"></script>
<script src="MASTER/assets/global/plugins/excanvas.min.js"></script>
<![endif]-->
<!-- BEGIN CORE PLUGINS -->
<script src="MASTER/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="MASTER/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="MASTER/assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
<script src="MASTER/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="MASTER/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="MASTER/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="MASTER/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="MASTER/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="MASTER/assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="MASTER/assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
<script src="MASTER/assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
<script src="MASTER/assets/global/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="MASTER/assets/global/scripts/app.min.js" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="MASTER/assets/pages/scripts/login-5.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<!-- END THEME LAYOUT SCRIPTS -->
</body>
</html>
<?php
unset($_SESSION['errorLogin']);
session_destroy();
?>