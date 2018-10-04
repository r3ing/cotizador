<?php

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
                    if(isset($_SESSION['loginErrors'])){unset($_SESSION['loginErrors']);}
                    header('Location: MASTER/index.php');
                    ?>
                    <script type="text/javascript">
                        //document.location.href= 'MASTER/index.php';
                    </script>
                    <?php
                }else{
                    session_start();
                    $_SESSION['loginErrors'] = 1; //Error: Usuario deshabilitado.
                    header('Location: index.php');
                }
            }catch( PDOException $Exception ) {
                session_start();
                $_SESSION['loginErrors'] = 0; //Error: conexion con el servidor.
                header('Location: index.php');
            }
        }else{
            session_start();
            $_SESSION['loginErrors'] = $_POST['user']; //Error: password incorrecto.
            header('Location: index.php');
        }
    }else{
        session_start();
        $_SESSION['loginErrors'] = 0; //Error: conexion con el servidor.
        header('Location: index.php');
    }
}
?>
