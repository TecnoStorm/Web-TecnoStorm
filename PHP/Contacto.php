<?php
$nombre=$_POST["nombre"];
$correo=$_POST["mail"];
$apellido=$_POST["apellido"];
$pregunta=$_POST["pregunta"];
require_once("UsuariosRegistrados.php");
$usuarios=new UsuariosRegistrados();
$existe=$usuarios->verificarCorreo($correo);
$existePregunta=$usuarios->existePregunta($correo);
if($existe){
    if($existePregunta){
        echo "<p style='color:#EDAD14'>usted ya ha realizado una pregunta</p>";
    }
    else{
        $conexion = mysqli_connect(SERVIDOR, USUARIO,PASS,BD);
        if (!$conexion) {
            die('Error en la conexión: ' . mysqli_connect_error());
        }
        $consulta = $conexion ->prepare("INSERT INTO contacto (nombre,apellido,correo,pregunta) values (?,?,?,?)");
        $consulta->bind_param("ssss", $nombre, $apellido, $correo,$pregunta);
        $consulta->execute();
        $consulta->close();
        $conexion->close();
        echo "<p style='color:green'>pregunta enviada con exito</p>";
    }
}
else{
    echo "<p style='color:red'> correo no registrado </p>";
}
?>