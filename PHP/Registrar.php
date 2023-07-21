<?php
include "UsuariosRegistrados.php";
$nombre=$_POST["usuario"];
$correo=$_POST["mail"];
$clave=$_POST["clave"];
$confirmacion=$_POST["confirmacion"];
$usuariosRegistrados=new UsuariosRegistrados();
if($clave==$confirmacion){
   $usuarioExistente=$usuariosRegistrados->verificarUsuario($nombre);
   if($usuarioExistente){
    echo "usuario ya en uso";
   }
   else{
    $usuariosRegistrados->ponerUsuario($nombre,$correo,$clave);
    $usuariosRegistrados->guardar();
    echo "usuario registrado";
   }
}
else{
    echo "las contraseñas no coinciden";
}

?>