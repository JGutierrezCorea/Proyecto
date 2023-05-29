<?php
class UsuariosModel extends Query{

    public function __construct()
    {
        parent::__construct();
    }

    public function getUsuario($usuario, $pass){
        $sql = "SELECT p.IdPersona, p.nombres, p.apellidos, p.rol, u.correo, p.telefono, p.estado FROM personas p, usuarios u WHERE p.IdUsuario=u.IdUsuario and u.correo='$usuario' and u.clave='$pass'; ";
        return $this->select($sql);
    }

    public function cant_Productos(){
        $sql = "SELECT COUNT(*)as total FROM productos WHERE eliminado = 1";
        return $this->select($sql); 
    }

    public function cant_Categorias(){
        $sql = "SELECT COUNT(*)as total FROM categorias WHERE eliminado = 1";
        return $this->select($sql); 
    }
}

?>