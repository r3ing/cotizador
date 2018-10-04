<?php

$directorio = "CMS"; //Lo sacas de donde sea.. a traves de post, get, lo que quieras.

$archivos = scandir($directorio); //hace una lista de archivos del directorio
$num = count($archivos); //los cuenta

//Los borramos
for ($i=0; $i<=$num; $i++) {
 unlink ($archivos[$i]); 
}

//borramos el directorio

rmdir ($directorio);

?>