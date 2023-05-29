<?php
class ProductosModel extends Query
{

    public function __construct()
    {
        parent::__construct();
    }

    public function registrarProducto($idcat, $img_tipo, $nombre, $detalles, $marca, $modelo, $color, $peso_bruto, $peso_neto, $dimensiones, $garantia, $precio, $cantidad)
    {
        $id = $this->ID_PROD_IMG();
        if (strpos($img_tipo, "jpeg")) {
            $strTipo = "jpeg";
        } else if (strpos($img_tipo, "jpg")) {
            $strTipo = "jpg";
        } elseif (strpos($img_tipo, "png")) {
            $strTipo = "png";
        }
        $strImg = "Imagen/Productos/" . $id . '.' . $strTipo;

        $sql = "INSERT INTO productos(IdCateg,imagen,nombre,detalles,marca,modelo,color,peso_bruto,peso_neto,dimensiones,garantia,precio,cantidad) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $array = array($idcat, $strImg, $nombre, $detalles, $marca, $modelo, $color, $peso_bruto, $peso_neto, $dimensiones, $garantia, $precio, $cantidad);
        return $this->insertar($sql, $array);
    }

    public function ActualizarProducto($idProd, $idcat, $img, $nombre, $detalles, $marca, $modelo, $color, $peso_bruto, $peso_neto, $dimensiones, $garantia, $precio, $cantidad)
    {
        if ($img == "") {
            $sql = "UPDATE productos set IdCateg=?, nombre=?, detalles=?, marca=?, modelo=?, color=?, peso_bruto=?, peso_neto=?, dimensiones=?, garantia=?, precio=?, cantidad=? WHERE IdProducto=?";
            $array = array($idcat, $nombre, $detalles, $marca, $modelo, $color, $peso_bruto, $peso_neto, $dimensiones, $garantia, $precio, $cantidad, $idProd);
        } else {
            $sql = "UPDATE productos set IdCateg=?, nombre=?, imagen=?, detalles=?, marca=?, modelo=?, color=?, peso_bruto=?, peso_neto=?, dimensiones=?, garantia=?, precio=?, cantidad=? WHERE IdProducto=?";
            $array = array($idcat, $nombre, $img, $detalles, $marca, $modelo, $color, $peso_bruto, $peso_neto, $dimensiones, $garantia, $precio, $cantidad, $idProd);
        }
        return $this->save($sql, $array);
    }

    public function ID_PROD_IMG()
    {
        //Obteniendo el ID del producto para renombrar la imagen asociada.
        $sql = "SELECT IdProducto FROM productos ORDER BY IdProducto DESC LIMIT 1";
        $cant = $this->select($sql);
        return $cant["IdProducto"] + 1;
    }

    public function subir_imagen($id, $archivo, $tipo, $tam, $ruta_temp)
    {
        //Si el archivo contiene algo y es diferente de vacio
        if (isset($archivo) && $archivo != "") {
            //Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño 2mb
            if (!((strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tam < 2000000))) {
                return false;
            } else {
                if (strpos($tipo, "jpeg")) {
                    $strTipo = "jpeg";
                } else if (strpos($tipo, "jpg")) {
                    $strTipo = "jpg";
                } elseif (strpos($tipo, "png")) {
                    $strTipo = "png";
                }
                $id = $id . "." . $strTipo;
                //Si la imagen es correcta en tamaño y tipo
                /**Si la carpeta no existe, la creamos*/
                if (!file_exists("Imagen/Productos/")) {
                    mkdir("Imagen/Productos/", 0777, true);
                }
                //Se intenta subir al servidor
                if (move_uploaded_file($ruta_temp, "Imagen/Productos/" . $id)) {
                    //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
                    chmod("Imagen/Productos/" . $id, 0777);
                    //SE SUBIO CON EXITO -> CONTINUA CON REGISTRO EN LA DB
                    return true;
                } else {
                    //Si no se ha podido subir la imagen, mostramos un mensaje de error
                    return false;
                }
            }
        }
    }

    public function subir_imagen2($id, $archivo, $tipo, $tam, $ruta_temp)
    {
        //Si el archivo contiene algo y es diferente de vacio
        if (isset($archivo) && $archivo != "") {
            //Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño 2mb
            if (!((strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tam < 2000000))) {
                return false;
            } else {
                if (strpos($tipo, "jpeg")) {
                    $strTipo = "jpeg";
                } else if (strpos($tipo, "jpg")) {
                    $strTipo = "jpg";
                } elseif (strpos($tipo, "png")) {
                    $strTipo = "png";
                }
                $id = $id . "." . $strTipo;
                //Si la imagen es correcta en tamaño y tipo
                /**Si la carpeta no existe, la creamos*/
                if (!file_exists("Imagen/Productos/")) {
                    mkdir("Imagen/Productos/", 0777, true);
                }
                //Se intenta subir al servidor
                if (move_uploaded_file($ruta_temp, "Imagen/Productos/" . $id)) {
                    //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
                    chmod("Imagen/Productos/" . $id, 0777);
                    //SE SUBIO CON EXITO -> CONTINUA CON REGISTRO EN LA DB
                    return true;
                } else {
                    //Si no se ha podido subir la imagen, mostramos un mensaje de error
                    return false;
                }
            }
        }
    }

    public function getListCategorias()
    {
        $sql = "SELECT IdCateg, nombre FROM categorias WHERE estado=0 AND eliminado=1 ORDER BY nombre ASC";
        return $this->selectAll($sql);
    }

    public function ver_productos()
    {
        $sql = "SELECT p.IdProducto,c.nombre as categoria,p.imagen,p.nombre,p.marca,p.modelo,p.color,CONCAT(P.peso_bruto,' - ',P.peso_neto) as peso,p.dimensiones,p.garantia,p.precio,p.cantidad,p.estado FROM productos p, categorias c WHERE p.IdCateg=c.IdCateg AND p.eliminado=1";
        return $this->selectAll($sql);
    }

    public function estado_producto($id, $num)
    {
        $sql = "UPDATE productos SET estado=? WHERE IdProducto=?";
        $array = array($num, $id);
        return $this->save($sql, $array);
    }

    public function info_producto($id)
    {
        $sql = "SELECT p.IdProducto,c.IdCateg,c.nombre as categoria, p.imagen, p.detalles, p.nombre, p.marca, p.modelo, p.color, peso_bruto, peso_neto, p.dimensiones, p.garantia, p.precio, p.cantidad, p.estado FROM productos p, categorias c WHERE p.IdCateg=c.IdCateg AND p.IdProducto=$id";
        return $this->select($sql);
    }

    public function eliminar_producto($id)
    {
        $sql = "UPDATE productos SET eliminado=0 WHERE IdProducto=?";
        $array = array($id);
        return $this->save($sql, $array);
    }

}

?>