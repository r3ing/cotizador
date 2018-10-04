<?php
 session_start();
 if (isset($_SESSION['usuarioint']))
 {
    $vari = $_SESSION['usuarioint'];
 }
 else
 {
    header('location:../index.php?error=2');
 }
    
    
?>