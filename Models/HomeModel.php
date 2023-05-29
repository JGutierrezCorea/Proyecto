<?php
class HomeModel extends Query{
 
    public function __construct()
    {
        parent::__construct();
    }

    public function getCategorias(){
        $sql = "SELECT * FROM categorias WHERE estado=0 AND eliminado=1 ORDER BY IdCateg DESC LIMIT 6";
        return $this->selectAll($sql);
    }

    public function getNuevosProductos(){
        $sql = "SELECT * FROM productos WHERE estado=0 and eliminado=1 and cantidad>=1 ORDER BY IdProducto DESC LIMIT 3";
        return $this->selectAll($sql);
    }

}
 
?>