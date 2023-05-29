<?php
class Productos extends Controller
{
    public function __construct()
    {
        session_start();
        parent::__construct();
    }

    public function index()
    {
        $data['title'] = 'Administrador';
        $this->views->getView('admin', "productos", $data);
    }
    public function agregar_producto()
    {
        $data['title'] = 'CPanel - Agregar Producto';
        $data['categorias'] = $this->model->getListCategorias();
        $this->views->getView('admin', "productos_agregar", $data);
    }

    public function ver_productos()
    {
        $data['title'] = 'CPanel - Ver Productos';
        $data['categorias'] = $this->model->getListCategorias();
        $this->views->getView('admin', "productos_ver", $data);
    }

    public function ActualizarProducto($idProd)
    {
        $strImg = "";
        if (empty($_POST['nombre']) || empty($_POST['cbCateg']) || empty($_POST['detalles']) || empty($_POST['marca']) || empty($_POST['modelo']) || empty($_POST['color']) || empty($_POST['dimensiones']) || empty($_POST['peso_bruto']) || empty($_POST['peso_neto']) || empty($_POST['garantia']) || empty($_POST['precio']) || empty($_POST['cantidad'])) {
            $resp = "ERROR";
        } else {
            $idcat = $_POST['cbCateg'];
            $nombre = $_POST['nombre'];
            $detalles = $_POST['detalles'];
            $marca = $_POST['marca'];
            $modelo = $_POST['modelo'];
            $color = $_POST['color'];
            $peso_bruto = $_POST['peso_bruto'];
            $peso_neto = $_POST['peso_neto'];
            $dimensiones = $_POST['dimensiones'];
            $garantia = $_POST['garantia'];
            $precio = $_POST['precio'];
            $cantidad = $_POST['cantidad'];

            if (isset($_FILES['imgProducto'])|| empty($_FILES['imgProducto'])) {

                $archivo = $_FILES['imgProducto']['name'];
                $tipo = $_FILES['imgProducto']['type'];
                $ruta_temp = $_FILES['imgProducto']['tmp_name'];
                $tam = $_FILES['imgProducto']['size'];

                $dataIMG = $this->model->info_producto($idProd);

                //Elimiando imagen anterior
                if (is_writable($dataIMG['imagen'])) {
                    $outPut = unlink($dataIMG['imagen']);
                }
                //------------------------------

                if ($this->model->subir_imagen($idProd, $archivo, $tipo, $tam, $ruta_temp)) {

                    $resp = "IMG-CORRECTO";
                    if (strpos($tipo, "jpeg")) {
                        $strTipo = "jpeg";
                    } else if (strpos($tipo, "jpg")) {
                        $strTipo = "jpg";
                    } elseif (strpos($tipo, "png")) {
                        $strTipo = "png";
                    }
                    $strImg = "Imagen/Productos/" . $idProd . '.' . $strTipo;
                } else {
                    $resp = "ERROR IMG";
                }

            } else {
                $strImg = ""; //no actualiza imagen
            }
            $data = $this->model->ActualizarProducto($idProd, $idcat, $strImg, $nombre, $detalles, $marca, $modelo, $color, $peso_bruto, $peso_neto, $dimensiones, $garantia, $precio, $cantidad);
            if ($data > 0) {
                $resp = "CORRECTO";
            } else {
                $resp = "ERROR REGISTRO";
            }
        }
        echo json_encode($resp);
        die();
    }

    public function RegistrarProducto()
    {
        if (isset($_POST['nombre'])) {
            if (empty($_POST['nombre']) || empty($_POST['cbCateg']) || empty($_POST['detalles']) || empty($_POST['marca']) || empty($_POST['modelo']) || empty($_POST['color']) || empty($_POST['dimensiones']) || empty($_POST['peso_bruto']) || empty($_POST['peso_neto']) || empty($_POST['garantia']) || empty($_POST['precio']) || empty($_POST['cantidad'])) {
                $resp = "ERROR";
            } else {
                if (isset($_FILES['imgProducto'])) {
                    $archivo = $_FILES['imgProducto']['name'];
                    $tipo = $_FILES['imgProducto']['type'];
                    $ruta_temp = $_FILES['imgProducto']['tmp_name'];
                    $tam = $_FILES['imgProducto']['size'];

                    $id = $this->model->ID_PROD_IMG();

                    if ($this->model->subir_imagen($id, $archivo, $tipo, $tam, $ruta_temp)) {
                        $idcat = $_POST['cbCateg'];
                        $img = $_FILES['imgProducto'];
                        $nombre = $_POST['nombre'];
                        $detalles = $_POST['detalles'];
                        $marca = $_POST['marca'];
                        $modelo = $_POST['modelo'];
                        $color = $_POST['color'];
                        $peso_bruto = $_POST['peso_bruto'];
                        $peso_neto = $_POST['peso_neto'];
                        $dimensiones = $_POST['dimensiones'];
                        $garantia = $_POST['garantia'];
                        $precio = $_POST['precio'];
                        $cantidad = $_POST['cantidad'];

                        $data = $this->model->RegistrarProducto($idcat, $tipo, $nombre, $detalles, $marca, $modelo, $color, $peso_bruto, $peso_neto, $dimensiones, $garantia, $precio, $cantidad);

                        if ($data > 0) {
                            $resp = "CORRECTO";
                        } else {
                            $resp = "ERROR REGISTRO";
                        }
                    } else {
                        $resp = "ERROR SUBIR ARCHIVO";
                    }
                } else {
                    $resp = "ERROR - NO HAY IMAGEN";
                }

            }
        }
        echo json_encode($resp);
        die();
    }

    public function cargar_table_productos()
    {
        $estado = 0;
        $id = 0;
        $data = $this->model->ver_productos();
        for ($i = 0; $i < count($data); $i++) {
            $id = $data[$i]['IdProducto'];
            $data[$i]['IdProducto'] = $i + 1; //Se muestra la enumeracion de los productos.
            $estado = $data[$i]['estado'];
            $data[$i]['imagen'] = '<center><img class="img-circle elevation-2" src="' . BASE_URL . $data[$i]['imagen'] . '" alt="User Avatar" width="100"></center>';
            if ($data[$i]['estado'] == 0) {
                $data[$i]['estado'] = '<span class="float-left badge bg-success">Activo</span>';
                $est = 1;
            } else {
                $est = 0;
                $data[$i]['estado'] = '<span class="float-left badge bg-danger">Inactivo</span>';
            }
            $data[$i]['acciones'] = '<div>  
                <a name="" id="" class="btn btn-info btn-sm" href="#" role="button" data-toggle="modal" onclick="info_producto(' . $id . ');" title="más información">
                <i class="fas fa-info-circle"></i> Info
                </a>    
                <a name="" id="" class="btn btn-primary btn-sm" href="#" role="button" onclick="actualizar_estado(' . $id . ',' . $estado . ');" title="cambiar estado del producto">
                <i class="fas fa-toggle-on"></i> Estado
                </a>
                <a name="" id="" class="btn btn-warning btn-sm" href="#" role="button" onclick="verModalEditarProducto(' . $id . ');" title="editar datos">
                <i class="far fa-edit"></i>
                </a>
                <a name="" id="" class="btn btn-danger btn-sm" href="#" role="button" onclick="EliminarProducto(' . $id . ');" title="eliminar registro">
                <i class="far fa-trash-alt"></i>
                </a>
                </div>';
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function estado_activar($id)
    {
        $data = $this->model->estado_producto($id, 0);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function estado_desactivar($id)
    {
        $data = $this->model->estado_producto($id, 1);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function info_producto($id)
    {
        $data = $this->model->info_producto($id);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function eliminar($id)
    {
        $data = $this->model->eliminar_producto($id);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

}
?>