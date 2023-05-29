<?php
class PrincipalModel extends Query{
 
    public function __construct()
    {
        parent::__construct();
    }

    public function getProducto($idProducto){
        $sql="SELECT p.IdProducto,p.imagen,p.nombre,p.detalles,p.marca,p.modelo,p.color,p.peso_bruto,p.peso_neto,p.dimensiones,p.garantia,p.precio,c.nombre as categoria
        FROM productos p, categorias c 
        WHERE p.IdCateg = c.IdCateg and IdProducto=$idProducto and p.estado=0 and p.eliminado=1 and p.cantidad>=1";
        return $this->select($sql);
    }

    public function getProductos($desde,$pagina){
        $sql = "SELECT * FROM productos WHERE estado=0 and eliminado=1 and cantidad>=1 LIMIT $desde,$pagina";
        return $this->selectAll($sql);
    }

    // TOTAL DE TODOS LOS PRODUCTOS.
    public function getTotalProductos(){
        $sql = "SELECT COUNT(*)as total FROM productos WHERE estado=0 and eliminado=1 and cantidad>=1";
        return $this->select($sql);
    }

    //Productos relacionados con la categoria.
    public function getProductosCat($IdCateg,$desde,$pagina){
        $sql = "SELECT p.IdProducto, p.nombre, p.imagen, p.marca, p.precio, c.nombre as categoria FROM productos p, categorias c WHERE p.IdCateg=c.IdCateg AND p.estado = 0 and p.eliminado = 1 and p.cantidad >= 1 and p.IdCateg = $IdCateg LIMIT $desde,$pagina";
        return $this->selectAll($sql);
    }

    // TOTDAS DE PRODUCTOS RELACIONADOS CON LA CATEGORIA
    public function getTotalProductosCat($IdCateg){
        $sql = "SELECT COUNT(*)as total FROM productos WHERE estado=0 and eliminado=1 and cantidad>=1 and IdCateg = $IdCateg";
        return $this->select($sql);
    }

    public function buscarProducto($valor){
        $sql = "SELECT p.IdProducto,p.nombre, p.imagen,p.marca,p.precio
        FROM productos p, categorias c 
        WHERE p.IdCateg=c.IdCateg AND p.estado=0 AND p.eliminado = 1 AND p.nombre LIKE '%".$valor."%' LIMIT 5 ";
        return $this->selectAll($sql);
    }


}
 
?>