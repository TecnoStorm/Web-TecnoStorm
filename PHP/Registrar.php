<?php
include "UsuariosRegistrados.php";
$nombre=$_POST["usuario"];
$correo=$_POST["mail"];
$clave=$_POST["clave"];
$confirmacion=$_POST["confirmacion"];
$usuariosRegistrados=new UsuariosRegistrados();
$existe=$usuariosRegistrados->verificarCorreo($correo);
if($clave==$confirmacion){
    if($existe){
        echo "<p style='color:#EDAD14'> Correo ya en uso </p>";
    }
    else{
        $usuariosRegistrados->guardar($nombre,$correo,$clave);
        echo "<p style='green'>usuario registrado </p>";
    }
    
}
else{
    echo "<p style='color:red'>las contraseñas no coinciden</p>";
}
?>