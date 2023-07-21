<?php
require_once("Usuario.php");
class UsuariosRegistrados{
    private $_usuarios=array();

    public function __construct(){
        $archivo = fopen("Usuarios.txt","r");
        while(!feof($archivo)) {
            $linea = fgets($archivo, 256);
            $valores = explode(":", $linea);
            $this->_usuarios[] = new Usuario($valores[0], $valores[1], $valores[2]);
        }
    }
    
    public function guardar(){
        $archivo = fopen("Usuarios.txt", "w");
        foreach ($this->_usuarios as $usuario){
            $linea = implode(":", (array)$usuario);
            fwrite($archivo,$linea);
        }
        fclose($archivo);
    }
    
    public function ponerUsuario($nombre,$correo,$clave){
        array_push($this->_usuarios,new Usuario(PHP_EOL . $nombre,$correo,$clave));    
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

    public function verificarUsuario($nombre){
        foreach($this->_usuarios as $usuario){
            if($usuario->getNombre()==$nombre){
                return true;
            }else{
                return false;
            }
            
        }
    
    }

    



}
?>