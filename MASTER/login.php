<?php
$user = str_replace("'","", $_POST['user']);
$pass = str_replace("'","", $_POST['pass']);

include('config/conect.php');
$sql = "SELECT T1.* 
        FROM users T1  
        WHERE T1.user = '".$user."' AND T1.pass = '".$pass."' AND T1.status= 'ON'";
$link->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
$consulta = $link->prepare($sql);
$consulta->execute();
while ($row = $consulta->fetch())
{
  $paso = 1;
  $vari[0] = $row[0];
  $vari[1] = $row[1];                   // USER
  $vari[2] = $row[2];                   // PASS
  $vari[3] = $row[3];                   // NOMBRES
  $vari[4] = $row[4];                   // AP. PATERNO
  $vari[5] = $row[5];                   // AP. MATERNO
  $vari[6] = $row[6];                   // CELULAR
  $vari[7] = $row[7];                   // PERMISOS
  $vari[8] = $row[8];                   // E-MAIL
  $vari[9] = $row[9];                   // ESTADO
  $vari[10] = $row[10];                 // ID EMPRESA
  $vari[11] = $row[11];                 // CARPETA
  $vari[12] = $row[12];                 // ADMIN
  $vari[13] = $row[13];                 // ACTUALIZAR
  $vari[14] = $row[14];                 // NOMBRE EMPRESA
  $vari[15] = $row[15];                 // WEBSITE EMPRESA
}
$consulta=null;
$link = null;

if($paso == 1)
{
    session_start();
    $_SESSION['usuarioint'] = $vari;
    header("location:index.php");
}
else
{
    session_start();
    $_SESSION['errorLogin'] = true;
    header("location:../index.php?error=1");
}


// SELECT T1.*, T2.business, T2.website
// FROM users T1
// INNER JOIN business T2 ON T2.id = T1.business
// WHERE T1.user = 'cvidal' AND T1.pass = '1234' AND T1.status= 'ON'
?>