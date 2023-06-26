<?php
$nombre=$_POST["nombre"];
$correo=$_POST["correo"];
$apellido=$_POST["apellido"];
$pregunta=$_POST["pregunta"];
$comentario= $nombre. ":". $correo . ":" .$apellido . ":". $pregunta. "\n";

$archivo=fopen("Datos.txt","a");
fwrite($archivo,$comentario);
fclose($archivo);





?>