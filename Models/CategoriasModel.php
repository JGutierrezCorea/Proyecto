<?php
class CategoriasModel extends Query{
 
    public function __construct()
    {
        parent::__construct();
    }

    public function registrarCategoria($nombre,$img){
        $id = $this->ID_CATEG_IMG();
        if(strpos($img, "jpeg")){
            $strTipo = "jpeg";
        }else if(strpos($img, "jpg")){
            $strTipo = "jpg";
        }elseif(strpos($img, "png")){
            $strTipo = "png";
        }

        $strImg = "Imagen/Categorias/" . $id.'.'.$strTipo;

        $sql = "INSERT INTO categorias(nombre,imagen) VALUES (?,?)";
        $array = array($nombre, $strImg);
        return $this->insertar($sql, $array);
    }

    public function ID_CATEG_IMG()
    {
        //Obteniendo el ID del producto para renombrar la imagen asociada.
        $sql = "SELECT IdCateg FROM categorias ORDER BY IdCateg DESC LIMIT 1";
        $cant = $this->select($sql);
        return $cant["IdCateg"] + 1;
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
                if (!file_exists("Imagen/Categorias/")) {
                    mkdir("Imagen/Categorias/", 0777, true);
                }
                //Se intenta subir al servidor
                if (move_uploaded_file($ruta_temp, "Imagen/Categorias/" . $id)) {
                    //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
                    chmod("Imagen/Categorias/" . $id, 0777);
                    //SE SUBIO CON EXITO -> CONTINUA CON REGISTRO EN LA DB
                    return true;
                } else {
                    //Si no se ha podido subir la imagen, mostramos un mensaje de error
                    return false;
                }
            }
        }
    }

    public function ActualizarCategoria($idcat, $img, $nombre){
        if(empty($img)){
            $sql = "UPDATE categorias set nombre=? WHERE IdCateg=?";
            $array = array($nombre, $idcat);
        }else{
            $sql = "UPDATE categorias set nombre=?, imagen=? WHERE IdCateg=?";
            $array = array($nombre, $img, $idcat);
        }
        return $this->save($sql, $array);
    }

    public function ver_categorias(){
        $sql = "SELECT IdCateg, imagen, nombre, estado FROM categorias WHERE eliminado = 1";
        return $this->selectAll($sql);
    }

    public function estado_categoria($id, $num){
        $sql = "UPDATE categorias SET estado=? WHERE IdCateg=?";
        $array = array($num,$id);
        return $this->save($sql,$array);
    }

    public function info_categoria($id){
        $sql = "SELECT * FROM categorias WHERE IdCateg=$id";
        return $this->select($sql);
    }

    public function eliminar_categoria($id){
        $sql = "UPDATE categorias SET eliminado=0 WHERE IdCateg=?";
        $array = array($id);
        return $this->save($sql,$array);
    }

}
 
?>