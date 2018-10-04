<?php
session_start();
if (isset($_SESSION['usuarioint']))
{
$vari = $_SESSION['usuarioint'];
}
else
{ 
header('Location: ../index.php');
exit;
}    
?>