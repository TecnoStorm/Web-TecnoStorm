<?php
require_once("Usuario.php");
define('SERVIDOR', '127.0.0.1');
define('USUARIO', 'root');
define('PASS', '');
define('BD','TecnoStorm');
class UsuariosRegistrados{
    private $_usuarios=array();
    public function __construct(){
        $consulta = "SELECT * FROM usuarios";
        $conexion = mysqli_connect(SERVIDOR, USUARIO,PASS,BD);
        $resultado = mysqli_query($conexion, $consulta);
        if (!$conexion) {
            die('Error en la conexión: ' . mysqli_connect_error());
        }
        if (!$resultado){
            die('Error en la consulta SQL: ' . $consulta);
            }
        while($fila = $resultado->fetch_assoc()){
        $this->_usuarios[]= new Usuario($fila['usuario'],$fila['correo'],$fila['contraseña']);
    }
}
    public function guardar($usuario,$correo,$clave){
        
        $conexion = mysqli_connect(SERVIDOR, USUARIO,PASS,BD);
        if (!$conexion) {
            die('Error en la conexión: ' . mysqli_connect_error());
        }
        $consulta = $conexion ->prepare(
         "INSERT INTO usuarios (usuario,correo,contraseña) values (?,?,?)");
        $consulta->bind_param("sss", $usuario, $correo,$clave);
        $consulta->execute();
        $consulta->close();
        $conexion->close();
    }
    
    
    public function comparar($nombre, $clave){
        foreach ($this->_usuarios as $usuario) {
            if($usuario->getNombre()==$nombre && $usuario->getClave()==$clave){
                return "inicio exitoso";
                }else{
                    if($usuario->getNombre()==$nombre && $usuario->getClave()!=$clave){
                        return "clave incorrecta";
                }
            }
        }
        return "usuario no registrado";
    }

    public function verificarCorreo($correo){
        foreach($this->_usuarios as $usuario){
            if($usuario->getCorreo()==$correo){
                return true;
        }
    }

}
   public function existePregunta($correo){
    $existe=false;
    $correos=[];
    $consulta = "SELECT * FROM contacto";
    $conexion = mysqli_connect(SERVIDOR, USUARIO,PASS,BD);
    $resultado = mysqli_query($conexion, $consulta);
    if (!$conexion) {
        die('Error en la conexión: ' . mysqli_connect_error());
    }
    if (!$resultado){
        die('Error en la consulta SQL: ' . $consulta);
        }
    while($fila = $resultado->fetch_assoc()){
    $correos[]=$fila['correo'];
}
for($x=0;$x<count($correos);$x++){
    if($correos[$x]==$correo){
        $existe=true;
    }
}
return $existe;
   }
}
?>