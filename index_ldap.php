<?php
include('master/config/destruye.php');

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
    <script type="text/javascript" src="APP/TEMPLATES/JS/jquery-1.3.min.js"></script>
    <script type="text/javascript">

        $(document).ready(function() {

            $('#user').keypress(function (e) {
                if(e.which === 13) {
                    validaUser();
                }
            });

            $('#user').blur(function() {
                validaUser();
            });

            $('#pass').keypress(function (e) {
                if(e.which === 13) {
                    document.getElementById('submit').click();
                }
            });

            function validaUser(){
                if ($('#user').val() != ''){

                    var username = $('#user').val();
                    var dataString = 'username=' + username;
                    $('#loading').show();
                    $('#errorUser').hide();
                    $('#errorPassword').hide();
                    $.ajax({
                        type: "POST",
                        url: "check_username_availablity.php",
                        data: dataString,
                        success: function (data) {
                            if (data == 1) {
                                $('#errorUser').hide();
                                $('#errorPassword').hide();
                                document.getElementById('pass').disabled = false;
                                document.getElementById('submit').disabled = false;
                                document.getElementById('pass').focus();
                            }
                            else if (data == 0) {
                                $('#errorUser').show();
                                $('#errorPassword').hide();
                                document.getElementById('pass').disabled = true;
                                document.getElementById('submit').disabled = true;
                            }
                        },
                        complete: function(){
                            $('#loading').hide();
                        }
                    });
                }
            }
        });
    </script>
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
        <img src="MASTER/assets/pages/img/login/logoR.png" style="width: 300px;" alt="" />
    </a>
    <form class="login-form" id="formLogin" method="post" action="ldap.php" autocomplete="off">
        <h3 class="form-title">TASK FORCE</h3>
        <p>Bienvenido al Sistema de Analítica para Big Data</p>
        <div class="alert alert-danger display-hide">
            <button class="close" data-close="alert"></button>
            <span> Error de conexion con el servidor. </span>
        </div>
          <div class="form-group">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <label class="control-label visible-ie8 visible-ie9">Usuario</label>
            <div class="input-icon">
                <i class="fa fa-user"></i>
                <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Usuario" name="user" id="user" required />
                <div id="errorUser" hidden><span style='color:#FF8A65;"'>El usuario ingresado no existe.</span></div>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Contraseña</label>
            <div class="input-icon">
                <i class="fa fa-lock"></i>
                <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Contraseña" name="pass" id="pass" disabled="disabled" required />
                <div id="errorPassword" hidden><span style='color:#FF8A65;"'>Contrase&ntilde;a incorrecta.</span></div>
            </div>
        </div>
        <div class="form-actions">
            <!-- <label class="checkbox"> <input type="checkbox" name="remember" value="1" /> Recordarme </label> -->
            <button type="submit" id="submit" class="btn green pull-right" disabled="disabled"> Ingresar </button>
        </div>
        <div class="forget-password"></div>

        <!--
        <div class="forget-password">
            <h4>¿Olvidaste tu contraseña?</h4>
            <p> No te preocupes, haz click
                <a href="javascript:;" id="forget-password"> aquí</a> para recuperar tu contraseña. </p>
        </div>
        -->
    </form>
    <!-- END LOGIN FORM -->
    <div id="loading" hidden width="100%" align="center">
        <img src="MASTER/images/loaders/loader12.gif" width="11%" class="img-responsive center-block">
        <label> Verificando Usuario ... </label>
    </div>


<?php

if(isset($_SESSION['loginErrors'])){

    if($_SESSION['loginErrors'] === 0){
        echo "<script type='text/javascript'>$('.alert-danger').show();</script>";
    }
    elseif($_SESSION['loginErrors'] === 1){
        echo "<script type='text/javascript'>alert('Usuario desabilitado, contacte con el administrador.');</script>";
    }
    else{
        echo "<script type='text/javascript'>
                    $('#errorPassword').show();
                    document.getElementById('user').value = '".$_SESSION['loginErrors']."';
                    document.getElementById('pass').disabled = false;
                    document.getElementById('pass').focus();
                    document.getElementById('submit').disabled = false;
                  </script>";
    }
}

if(isset($_SESSION['loginErrors'])){unset($_SESSION['loginErrors']);}

?>

<?php
/*
if($_POST['user']<>"" && $_POST['pass']<>""){
    //desactivamos los erroes por seguridad
    error_reporting(0);
    // error_reporting(E_ALL); //activar los errores (en modo depuración)

    $servidor_LDAP = "10.0.152.168"; //"w782p.ripley.local"
    $servidor_dominio = "ripley";
    $ldap_dn = "dc=ripley,dc=local";
    $usuario_LDAP = 'RIPLEY-MAIN\\'. $_POST['user'];
    $contrasena_LDAP = $_POST['pass'];

    $conectado_LDAP = ldap_connect($servidor_LDAP);
    ldap_set_option($conectado_LDAP, LDAP_OPT_PROTOCOL_VERSION, 3);
    ldap_set_option($conectado_LDAP, LDAP_OPT_REFERRALS, 0);

    if ($conectado_LDAP){
        $autenticado_LDAP = ldap_bind($conectado_LDAP, $usuario_LDAP, $contrasena_LDAP);

        if ($autenticado_LDAP){
            $username = $_POST['user'];

            try {
                include('master/config/conect.php');
                $sql = "SELECT * FROM USERS WHERE user = '".$username."' AND status= 'ON'";
                $link->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
                $consulta = $link->prepare($sql);
                $consulta->execute();
                while ($row = $consulta->fetch()){
                    $paso = 1;
                    $vari[0] = $row[0];
                    $vari[1] = $row[1];
                    $vari[2] = $row[2];
                    $vari[3] = $row[3];
                    $vari[4] = $row[4];
                    $vari[5] = $row[5];
                    $vari[6] = $row[6];
                    $vari[7] = $row[7];
                    $vari[8] = $row[8];
                    $vari[9] = $row[9];
                    $vari[10] = $row[10];
                    $vari[11] = $row[11];
                }
                $consulta=null;
                $link = null;

                if($paso == 1){
                    session_start();
                    $_SESSION['usuarioint'] = $vari;
                    //header('Location:MASTER/index.php');
                ?>
                    <script type="text/javascript">
                        document.location.href= 'MASTER/index.php';
                    </script>
                <?php
                }else{
                    echo "<script type='text/javascript'>alert('Usuario desabilitado');</script>";
                }
            }catch( PDOException $Exception ) {
                header('Location: index.php');
                echo "<script type='text/javascript'>$('.alert-danger').show();</script>";
            }
        }else{
            echo "<script type='text/javascript'>
                    $('#errorPassword').show();
                    document.getElementById('user').value = '".$_POST['user']."';
                    document.getElementById('pass').disabled = false;
                    document.getElementById('pass').focus();
                    document.getElementById('submit').disabled = false;
                  </script>";
            //unset($_POST);
            $_POST = array();
        }
    }else{
        echo "<script type='text/javascript'>$('.alert-danger').show();</script>";
    }
}
*/
?>
    <!-- BEGIN FORGOT PASSWORD FORM
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
     END FORGOT PASSWORD FORM -->
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
<!-- <script src="MASTER/assets/pages/scripts/login-5.min.js" type="text/javascript"></script>-->
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<!-- END THEME LAYOUT SCRIPTS -->
</body>
</html>